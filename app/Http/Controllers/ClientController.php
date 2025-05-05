<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    /**
     * Afficher le formulaire de création d'un client
     */
    public function create()
    {
        // Vérifier si l'utilisateur a déjà un client
        $user = auth()->user();
        $existingClient = $user->client;
        
        if ($existingClient) {
            return redirect()->route('projects.create')
                ->with('info', 'Vous avez déjà un client associé à votre compte.');
        }
        
        return view('clients.create');
    }

    /**
     * Enregistrer un nouveau client
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $user = auth()->user();
            
            // Vérifier si l'utilisateur a déjà un client
            $existingClient = $user->client;
            
            if ($existingClient) {
                return redirect()->route('projects.create')
                    ->with('info', 'Vous avez déjà un client associé à votre compte.');
            }
            
            // Créer le client associé à l'utilisateur
            $client = Client::create([
                'name' => $validated['name'],
                'user_id' => $user->id
            ]);
            
            Log::info('Client créé avec succès pour l\'utilisateur', [
                'user_id' => $user->id,
                'client_id' => $client->id
            ]);
            
            return redirect()->route('projects.create')
                ->with('success', 'Client créé avec succès. Vous pouvez maintenant créer un projet.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création du client: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Une erreur est survenue: ' . $e->getMessage()]);
        }
    }
}