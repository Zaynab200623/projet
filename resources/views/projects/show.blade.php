@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #a8edea, #fed6e3);
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

    .glass-card {
        background: rgba(255, 255, 255, 0.3);
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 30px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .page-title {
        color: #2f3640;
        font-size: 2.2rem;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .project-description {
        color: #34495e;
        font-size: 1.1rem;
        margin-bottom: 30px;
        line-height: 1.6;
    }

    .section-title {
        color: #2c3e50;
        font-size: 1.8rem;
        font-weight: bold;
        margin: 30px 0 20px;
    }

    .btn-create {
        background: #2ecc71;
        color: white;
        font-weight: 600;
        border: none;
        border-radius: 25px;
        padding: 10px 25px;
        transition: all 0.3s ease;
    }

    .btn-create:hover {
        background: #27ae60;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(46, 204, 113, 0.4);
    }

    .btn-back {
        background: #3498db;
        color: white;
        font-weight: 600;
        border: none;
        border-radius: 25px;
        padding: 10px 25px;
        transition: all 0.3s ease;
    }

    .btn-back:hover {
        background: #2980b9;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
    }

    .ticket-list {
        margin-top: 30px;
    }

    .ticket-card {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: transform 0.3s ease;
    }

    .ticket-card:hover {
        transform: translateY(-5px);
    }

    .ticket-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .ticket-priority {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 500;
        margin-right: 10px;
    }

    .priority-low {
        background-color: rgba(46, 204, 113, 0.2);
        color: #27ae60;
    }

    .priority-medium {
        background-color: rgba(241, 196, 15, 0.2);
        color: #f39c12;
    }

    .priority-high {
        background-color: rgba(231, 76, 60, 0.2);
        color: #c0392b;
    }

    .ticket-status {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 500;
    }

    .status-open {
        background-color: rgba(52, 152, 219, 0.2);
        color: #2980b9;
    }

    .status-in_progress {
        background-color: rgba(155, 89, 182, 0.2);
        color: #8e44ad;
    }

    .status-closed {
        background-color: rgba(149, 165, 166, 0.2);
        color: #7f8c8d;
    }

    .ticket-actions {
        margin-top: 15px;
    }

    .btn-sm {
        padding: 5px 15px;
        font-size: 0.9rem;
    }

    .no-tickets {
        text-align: center;
        font-size: 1.2rem;
        color: #7f8c8d;
        margin: 40px 0;
    }
</style>

<div class="container">
    <div class="glass-card">
        <h1 class="page-title">{{ $project->name }}</h1>
        <p class="project-description">{{ $project->description }}</p>
        
        <div class="d-flex mb-4">
            <a href="{{ route('projects.index') }}" class="btn btn-back me-3">
                <i class="fas fa-arrow-left"></i> Retour aux projets
            </a>
            <a href="{{ route('tickets.create', ['project_id' => $project->id]) }}" class="btn btn-create">
                <i class="fas fa-plus"></i> Ajouter un ticket
            </a>
        </div>
    </div>

    <h2 class="section-title">Tickets du projet</h2>
    
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="ticket-list">
        @if (count($tickets) > 0)
            @foreach ($tickets as $ticket)
            <div class="ticket-card">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="ticket-title">{{ $ticket->title }}</h3>
                    <div>
                        <span class="ticket-priority priority-{{ $ticket->priority }}">
                            {{ ucfirst(trans('tickets.priorities.' . $ticket->priority)) }}
                        </span>
                        <span class="ticket-status status-{{ $ticket->status }}">
                            {{ ucfirst(trans('tickets.statuses.' . $ticket->status)) }}
                        </span>
                    </div>
                </div>
                <div>
                    @if ($ticket->assigned_to)
                        <p class="text-muted">
                            <i class="fas fa-user"></i> Assigné à: 
                            {{ $users->find($ticket->assigned_to)->name }}
                        </p>
                    @else
                        <p class="text-muted"><i class="fas fa-user-slash"></i> Non assigné</p>
                    @endif
                </div>
                <div class="ticket-actions">
                    <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-primary btn-sm">
                        Voir
                    </a>
                    <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-warning btn-sm">
                        Modifier
                    </a>
                    <form action="{{ route('tickets.close', $ticket->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-secondary btn-sm">
                            Fermer
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        @else
            <p class="no-tickets">Aucun ticket n'a encore été créé pour ce projet.</p>
        @endif
    </div>
</div>
@endsection 