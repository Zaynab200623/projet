@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #a0f1ea, #c3ddfd, #fff3b0);
        background-size: 400% 400%;
        animation: gradient 15s ease infinite;
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
    }

    @keyframes gradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .container-center {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.25);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        width: 100%;
        max-width: 600px;
        transition: transform 0.3s ease;
    }

    .glass-card:hover {
        transform: scale(1.02);
    }

    .form-title {
        text-align: center;
        font-size: 2.2rem;
        font-weight: bold;
        margin-bottom: 30px;
        color: #2f3640;
    }

    .form-label {
        font-weight: 500;
        color: #2c3e50;
    }

    .form-control, .form-select {
        background: transparent;
        border: none;
        border-bottom: 2px solid #ccc;
        border-radius: 0;
        color: #34495e;
        font-weight: 500;
        padding-left: 0;
    }

    .form-control:focus, .form-select:focus {
        border-color: #00a8ff;
        background-color: transparent;
        box-shadow: none;
    }

    .btn-glow {
        background: #fbc531;
        color: white;
        font-weight: bold;
        border: none;
        border-radius: 25px;
        padding: 10px 30px;
        transition: all 0.3s ease-in-out;
    }

    .btn-glow:hover {
        background: rgb(225, 169, 0);
        box-shadow: 0 0 15px rgba(225, 202, 0, 0.6);
        transform: scale(1.05);
    }
</style>

<div class="container-center">
    <div class="glass-card">
        <div class="form-title">Créer un Ticket</div> 
        <form action="{{ url('/tickets') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="title" class="form-label">Titre</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="mb-4">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-4">
                <label for="priority" class="form-label">Priorité</label>
                <select name="priority" id="priority" class="form-select" required>
                    <option value="low">Faible</option>
                    <option value="medium">Moyenne</option>
                    <option value="high">Élevée</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="project_id" class="form-label">Projet</label>
                <select name="project_id" id="project_id" class="form-select">
                    <option value="">Sélectionner un projet</option>
                    @foreach (App\Models\Project::where('user_id', auth()->id())->get() as $project)
                        <option value="{{ $project->id }}" {{ isset($project_id) && $project_id == $project->id ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="assigned_to" class="form-label">Assigner à</label>
                <select name="assigned_to" id="assigned_to" class="form-select">
                    <option value="">Non assigné</option>
                    @foreach (App\Models\User::all() as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Retour</a>
                <button type="submit" class="btn btn-glow">Soumettre</button>
            </div>
        </form>
    </div>
</div>
@endsection 
 