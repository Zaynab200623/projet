<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller 
{
    public function create()
    {
        // Vérifier si l'utilisateur a un client associé
        $user = auth()->user();
        $client = $user->client;
        
        // Si l'utilisateur n'a pas de client, le rediriger vers la création de client
        if (!$client) {
            return redirect()->route('clients.create')
                ->with('info', 'Vous devez d\'abord créer un client avant de pouvoir créer un projet.');
        }
        
        return view('projects.create');
    }

    public function store(Request $request)
    {
        Log::info('Méthode ProjectController@store appelée avec données:', $request->all());
        
        try {
            // Étape 1 : Validation du formulaire
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);
            
            // Étape 2 : Récupérer l'utilisateur connecté
            $user = auth()->user();
            
            // Vérification que l'utilisateur est connecté
            if (!$user) {
                Log::error('Aucun utilisateur connecté');
                return redirect()->back()->withErrors(['auth' => 'Vous devez être connecté pour créer un projet']);
            }
            
            $client = $user->client;
            
            // Étape 3 : Vérifier si un client est associé à cet utilisateur
            if (!$client) {
                Log::error('Aucun client associé à l\'utilisateur: ' . $user->id);
                return redirect()->route('clients.create')
                    ->with('info', 'Vous devez d\'abord créer un client avant de pouvoir créer un projet.');
            }
            
            // Étape 4 : Créer le projet avec le client_id
            $project = Project::create([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'client_id' => $client->id,
            ]);
            
            Log::info('Projet créé avec succès: ', ['id' => $project->id, 'name' => $project->name]);
            
            return redirect()->route('tickets.index')->with('success', 'Projet créé avec succès.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création du projet: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Une erreur est survenue: ' . $e->getMessage()]);
        }
    }
}


