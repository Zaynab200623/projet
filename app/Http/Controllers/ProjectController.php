<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller 
{
    public function index()
    {
        $projects = Project::where('user_id', auth()->id())->get();
        return view('projects.index', compact('projects'));
    }
    
    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        Log::info('Méthode ProjectController@store appelée avec données:', $request->all());
        
        try {
            // Validation du formulaire
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);
            
            // Récupérer l'utilisateur connecté
            $user = auth()->user();
            
            // Vérification que l'utilisateur est connecté
            if (!$user) {
                Log::error('Aucun utilisateur connecté');
                return redirect()->back()->withErrors(['auth' => 'Vous devez être connecté pour créer un projet']);
            }
            
            // Créer le projet associé à l'utilisateur
            $project = Project::create([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'user_id' => $user->id,
            ]);
            
            Log::info('Projet créé avec succès: ', ['id' => $project->id, 'name' => $project->name]);
            
            return redirect()->route('projects.index')->with('success', 'Projet créé avec succès.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création du projet: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Une erreur est survenue: ' . $e->getMessage()]);
        }
    }

    public function show(Project $project)
    {
        $tickets = Ticket::where('project_id', $project->id)->get();
        $users = User::all();
        
        return view('projects.show', compact('project', 'tickets', 'users'));
    }
}


