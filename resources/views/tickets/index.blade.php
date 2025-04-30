@extends('layouts.app')
<style>
   
    /* Container principal */
    .container {
        margin-top: 10px;
        max-width: 1200px;
    }

    /* Titre principal */
    .page-title {
        font-size: 3rem;
        font-weight: 700;
        color: #2c3e50;
        background-color: #ecf0f1;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Bouton Créer un Ticket */
    .btn-create {
        background-color:rgb(31, 188, 157);
        border-color: #1abc9c;
        padding: 12px 30px;
        font-weight: 600;
        border-radius: 50px;
        transition: background-color 0.3s ease;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }

    .btn-create:hover {
        background-color: #16a085;
        border-color: #16a085;
    }
    

    /* Table */
    .table {
    background-color: #fff !important;
    border-radius: 10px !important;
    overflow: hidden !important;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1) !important;
}

.table th {
    background-color:#a8e6a3 !important;
    color: #fff !important;
    font-weight: 600 !important;
    text-align: center !important;
}

.table td {
    text-align: center !important;
    vertical-align: middle !important;
}

.table-striped tbody tr:nth-child(odd) {
    background-color: #f7f7f7 !important;
}

.table-hover tbody tr:hover {
    background-color: #f0f0f0 !important;
    cursor: pointer !important;
}

/* Badge de Priorité */
.badge.priority-high {
    background-color: #e74c3c !important;
    color: #fff !important;
    font-weight: 600 !important;
    padding: 6px 12px !important;
    border-radius: 12px !important;
}

.badge.priority-medium {
    background-color:rgb(252, 222, 114) !important;
    color: #fff !important;
    font-weight: 600 !important;
    padding: 6px 12px !important;
    border-radius: 12px !important;
}

.badge.priority-low {
    background-color: #2ecc71 !important;
    color: #fff !important;
    font-weight: 600 !important;
    padding: 6px 12px !important;
    border-radius: 12px !important;
}

/* Badge de Statut */
.badge.status-open {
    background-color: #3498db !important;
    color: #fff !important;
    font-weight: 600 !important;
    padding: 6px 12px !important;
    border-radius: 12px !important;
}

.badge.status-in_progress {
    background-color: #f39c12 !important;
    color: #fff !important;
    font-weight: 600 !important;
    padding: 6px 12px !important;
    border-radius: 12px !important;
}

.badge.status-closed {
    background-color: #2ecc71 !important;
    color: #fff !important;
    font-weight: 600 !important;
    padding: 6px 12px !important;
    border-radius: 12px !important;
}

/* Boutons d'actions */
.btn-view, .btn-edit, .btn-close-ticket, .btn-delete {
    border-radius: 50px !important;
    font-weight: 600 !important;
    padding: 10px 25px !important;
    margin: 6px !important;
    transition: transform 0.2s ease-in-out !important;
    font-size: 1rem !important;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1) !important;
}

.btn-view {
    background-color: #17a2b8 !important;
    color: #fff !important;
}

.btn-view:hover {
    background-color: #138496 !important;
    transform: scale(1.05) !important;
}

.btn-edit {
    background-color:rgb(248, 228, 96) !important;
    color: #fff !important;
}

.btn-edit:hover {
    background-color: #e67e22 !important;
    transform: scale(1.05) !important;
}

.btn-close-ticket {
    background-color:rgb(31, 188, 157) !important;
    color: #fff !important;
}

.btn-close-ticket:hover {
    background-color: #c0392b !important;
    transform: scale(1.05) !important;
}

.btn-delete {
    background-color: #e74c3c !important;
    color: #fff !important;
}

.btn-delete:hover {
    background-color: #c0392b !important;
    transform: scale(1.05) !important;
}

/* Alertes de succès */
.alert {
    border-radius: 10px !important;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1) !important;
    font-size: 1.1rem !important;
}

.alert-success {
    background-color: #2ecc71 !important;
    color: #fff !important;
}

/* Responsive */
@media (max-width: 768px) {
    .page-title {
        font-size: 2rem !important;
        padding: 20px !important;
    }

    .table {
        font-size: 0.9rem !important;
    }

    .btn-create, .btn-view, .btn-edit, .btn-close-ticket, .btn-delete {
        font-size: 0.9rem !important;
        padding: 8px 20px !important;
    }
}


.btn-vip {
    background: linear-gradient(135deg, #84fab0, #8fd3f4); /* Vert clair + Bleu */
    border: none;
    color: white;
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 8px;
    transition: background 0.3s ease;
}

.btn-vip:hover {
    background: linear-gradient(135deg, #8fd3f4, #84fab0);
}


/* Style pour le formulaire de filtrage */
/* Style pour le formulaire de filtrage */
@media (max-width: 768px) {
    .container {
        padding: 0 15px;
    }

    .page-title {
        font-size: 2rem !important;
        padding: 20px !important;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .col-12 {
        width: 100%;
    }

    .col-sm-6 {
        width: 48%; /* Les éléments se placent côte à côte avec un petit espacement */
        margin-bottom: 10px;
    }

    .col-md-2, .col-md-3 {
        width: 48%; /* Même comportement pour les autres colonnes */
        margin-bottom: 10px;
    }

    .form-control {
        font-size: 0.9rem !important;
        padding: 12px 15px !important;
    }

    .btn-vip {
        font-size: 1rem !important;
        padding: 10px 20px !important;
        width: 100%;
    }

    .btn-create {
        width: 100%;
        font-size: 1rem !important;
        padding: 12px 0 !important;
    }
}

@media (max-width: 576px) {
    .page-title {
        font-size: 1.8rem !important;
        padding: 15px !important;
    }

    .btn-create, .btn-vip {
        font-size: 0.9rem !important;
        padding: 10px 15px !important;
    }

    .form-control {
        font-size: 0.85rem !important;
    }

    .col-12, .col-sm-6, .col-md-2, .col-md-3 {
        width: 100%;
        margin-bottom: 10px;
    }
}



</style>
@section('content')
<div class="container">
    <!-- Titre de la page -->
    <h1 class="page-title text-center mb-4">Mes Tickets</h1>

    <!-- Bouton Créer un Ticket -->
    @auth
        <a href="{{ route('tickets.create') }}" class="btn btn-create mb-4">Créer un Ticket</a>
    @endauth

    <!-- Message de succès -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Succès!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @auth
        @if($tickets->count() > 0)
            <form method="GET" action="{{ route('tickets.index') }}" class="mb-4">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-2 mb-2">
                        <select name="priority" class="form-control">
                            <option value="">-- Priorité --</option>
                            <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>Elevée</option>
                            <option value="medium" {{ request('priority') == 'medium' ? 'selected' : '' }}>Moyenne</option>
                            <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Faible</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-6 col-md-2 mb-2">
                        <select name="status" class="form-control">
                            <option value="">-- Statut --</option>
                            <option value="open" {{ request('status') == 'open' ? 'selected' : '' }}>Opened</option>
                            <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 mb-2">
                        <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                    </div>
                    <div class="col-12 col-sm-6 col-md-2 mb-2">
                        <button type="submit" class="btn btn-vip w-100">Filtrer</button>
                    </div>
                </div>
            </form>
        @endif
    @else
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Attention!</strong> Vous devez être connecté pour voir vos tickets.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endauth

    <!-- Table des tickets -->
    @auth
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Priorité</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->title }}</td>
                            <td>
                                <span class="badge priority-{{ $ticket->priority }}">
                                    {{ ucfirst($ticket->priority) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge status-{{ $ticket->status }}">
                                    {{ ucfirst($ticket->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-view">Voir</a>

                                @if($ticket->status == 'open')
                                    <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-edit">Modifier</a>
                                @endif

                                @if($ticket->status == 'open')
                                    <form action="{{ route('tickets.close', $ticket) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-close-ticket">Fermer</button>
                                    </form>
                                @endif

                                <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" style="display:inline;" onsubmit="return confirm('Es-tu sûr de vouloir supprimer ce ticket ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endauth
</div>
@endsection



