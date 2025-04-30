@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="vip-ticket p-5">
        <h1 class="vip-title">{{ $ticket->title }}</h1>

        <div class="vip-ticket-body">
            <div class="vip-ticket-info">
                <h5>Priorité :
                    <span class="badge badge-priority bg-{{ $ticket->priority == 'high' ? 'danger' : ($ticket->priority == 'medium' ? 'warning' : 'success') }}">
                        {{ ucfirst($ticket->priority) }}
                    </span>
                </h5>

                <h5>Statut :
                    <span class="badge badge-status bg-{{ $ticket->status == 'open' ? 'primary' : ($ticket->status == 'in_progress' ? 'warning' : 'success') }}">
                        {{ ucfirst($ticket->status) }}
                    </span>
                </h5>
            </div>

            <p class="vip-ticket-description">{{ $ticket->description }}</p>

            <a href="{{ route('tickets.index') }}" class="btn btn-vip mt-4">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection

<style>
body {
    background: linear-gradient(135deg, #d4fc79, #96e6a1, #89f7fe, #66a6ff);
    background-size: 400% 400%;
    animation: gradient 20s ease infinite;
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
}

@keyframes gradient {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.vip-ticket {
    background: linear-gradient(145deg, #e0f7fa, #e0f2f1);
    border: 3px solid #00c9ff;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    max-width: 650px;
    width: 100%;
    position: relative;
    overflow: hidden;
    text-align: center;
    padding: 40px 30px;
}

.vip-ticket::before, .vip-ticket::after {
    content: '';
    position: absolute;
    width: 25px;
    height: 25px;
    background: #e0f2f1;
    border: 3px solid #00c9ff;
    border-radius: 50%;
    z-index: 2;
}

.vip-ticket::before {
    top: -13px;
    left: 50%;
    transform: translateX(-50%);
}

.vip-ticket::after {
    bottom: -13px;
    left: 50%;
    transform: translateX(-50%);
}

.vip-title {
    font-size: 2.5rem;
    font-weight: bold;
    color: #0077b6;
    margin-bottom: 30px;
    text-shadow: 2px 2px 5px rgba(0,0,0,0.2);
}

.vip-ticket-body {
    padding: 10px;
}

.vip-ticket-info h5 {
    margin-bottom: 20px;
    font-size: 1.2rem;
    color: #333;
}

.vip-ticket-description {
    margin-top: 20px;
    font-size: 1.2rem;
    color: #444;
    padding: 0 10px;
}

.badge-priority, .badge-status {
    padding: 8px 16px;
    font-size: 1rem;
    font-weight: 600;
    border-radius: 50px;
}

/* Nouveau style pour le bouton */
.btn-vip {
    border: 2px solid #00b894;
    background: linear-gradient(135deg, #00b894, #00cec9);
    color: white;
    font-weight: bold;
    padding: 12px 30px;
    font-size: 1.1rem;
    transition: all 0.4s ease;
    border-radius: 30px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    text-decoration: none;
}

.btn-vip:hover {
    background: linear-gradient(135deg, #00cec9, #00b894);
    color: white;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
}

/* Responsive */
@media (max-width: 768px) {
    .vip-ticket {
        margin: 20px;
    }
}
</style>
