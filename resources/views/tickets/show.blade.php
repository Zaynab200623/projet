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

    .ticket-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .ticket {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
        max-width: 650px;
        width: 100%;
        position: relative;
        padding: 40px;
        text-align: left;
        overflow: hidden;
    }

    .ticket::before, .ticket::after {
        content: '';
        position: absolute;
        width: 40px;
        height: 40px;
        background: #f0f0f0;
        border-radius: 50%;
        z-index: 5;
    }

    .ticket::before {
        top: 50%;
        left: -20px;
        transform: translateY(-50%);
    }

    .ticket::after {
        top: 50%;
        right: -20px;
        transform: translateY(-50%);
    }

    .ticket-header {
        border-bottom: 2px dashed #ccc;
        margin-bottom: 25px;
        padding-bottom: 15px;
    }

    .ticket-title {
        font-size: 2rem;
        font-weight: 700;
        color: #2d3436;
        margin: 0;
    }

    .ticket-body {
        font-size: 1rem;
        color: #555;
    }

    .ticket-info {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .ticket-info h5 {
        margin: 10px 0;
        font-size: 1.1rem;
    }

    .badge {
        padding: 6px 14px;
        font-size: 0.95rem;
        font-weight: 600;
        border-radius: 50px;
        text-transform: capitalize;
    }

    .btn-vip {
        display: inline-block;
        margin-top: 25px;
        padding: 12px 28px;
        background: linear-gradient(135deg, #00b894, #00cec9);
        border: none;
        color: #fff;
        font-weight: bold;
        border-radius: 30px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        text-decoration: none;
        transition: 0.3s ease;
    }

    .btn-vip:hover {
        background: linear-gradient(135deg, #00cec9, #00b894);
    }

    @media (max-width: 768px) {
        .ticket-info {
            flex-direction: column;
        }
    }
</style>

<div class="ticket-container">
    <div class="ticket">
        <div class="ticket-header">
            <h1 class="ticket-title">{{ $ticket->title }}</h1>
        </div>

        <div class="ticket-body">
            <div class="ticket-info">
                <h5>Priorité :
                    <span class="badge bg-{{ $ticket->priority == 'high' ? 'danger' : ($ticket->priority == 'medium' ? 'warning' : 'success') }}">
                        {{ ucfirst($ticket->priority) }}
                    </span>
                </h5>

                <h5>Statut :
                    <span class="badge bg-{{ $ticket->status == 'open' ? 'primary' : ($ticket->status == 'in_progress' ? 'warning' : 'success') }}">
                        {{ ucfirst($ticket->status) }}
                    </span>
                </h5>
            </div>

            <p>{{ $ticket->description }}</p>

            <a href="{{ route('tickets.index') }}" class="btn-vip">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection
