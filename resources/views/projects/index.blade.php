@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #f6d365, #fda085);
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

    .container {
        padding: 20px;
    }

    .project-card {
        background: rgba(255, 255, 255, 0.25);
        border-radius: 20px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: transform 0.3s ease;
    }

    .project-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 36px rgba(0, 0, 0, 0.15);
    }

    .page-title {
        text-align: center;
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 30px;
        color: #2f3640;
    }

    .project-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #2c3e50;
    }

    .project-description {
        color: #34495e;
        margin-bottom: 20px;
    }

    .btn-primary {
        background: #3498db;
        color: white;
        font-weight: bold;
        border: none;
        border-radius: 25px;
        padding: 10px 20px;
        transition: all 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background: #2980b9;
        box-shadow: 0 0 15px rgba(52, 152, 219, 0.5);
    }

    .btn-success {
        background: #2ecc71;
        color: white;
        font-weight: bold;
        border: none;
        border-radius: 25px;
        padding: 10px 20px;
        transition: all 0.3s ease-in-out;
    }

    .btn-success:hover {
        background: #27ae60;
        box-shadow: 0 0 15px rgba(46, 204, 113, 0.5);
    }

    .no-projects {
        text-align: center;
        font-size: 1.2rem;
        color: #2c3e50;
        margin: 50px 0;
    }
</style>

<div class="container">
    <h1 class="page-title">Mes Projets</h1>

    <div class="mb-4 text-center">
        <a href="{{ route('projects.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Créer un nouveau projet
        </a>
    </div>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (count($projects) > 0)
        <div class="row">
            @foreach ($projects as $project)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="project-card">
                    <h2 class="project-title">{{ $project->name }}</h2>
                    <p class="project-description">
                        {{ Str::limit($project->description, 100) }}
                    </p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary">
                            Voir le projet
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <p class="no-projects">Vous n'avez pas encore créé de projets. Commencez par en créer un !</p>
    @endif
</div>
@endsection 