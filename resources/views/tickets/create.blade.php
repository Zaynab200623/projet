@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #a0f1ea, #c3ddfd, #fff3b0);
        background-size: 400% 400%;
        animation: gradient 15s ease infinite;
        font-family: 'Poppins', sans-serif;
    }

    @keyframes gradient {
        0% { background-position: 0% 50% }
        50% { background-position: 100% 50% }
        100% { background-position: 0% 50% }
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        padding: 40px;
        transition: transform 0.3s ease;
    }

    .glass-card:hover {
        transform: scale(1.02);
    }

    .form-title {
        text-align: center;
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 30px;
        color: #2f3640;
    }

    .form-label {
        color: #333;
        font-weight: 500;
        margin-bottom: 8px;
        display: block;
    }

    .form-control {
        border: 2px solid rgba(136, 212, 171, 0.5);
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(5px);
        color: #333;
        font-weight: 500;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control:focus {
        border-color: #88d4ab;
        box-shadow: 0 0 10px rgba(136, 212, 171, 0.5);
        background-color: rgba(255, 255, 255, 0.5);
    }

    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg fill='%23333' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 16px 16px;
        padding-right: 40px;
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
        background: rgb(0, 154, 225);
        box-shadow: 0 0 20px rgba(251, 197, 49, 0.6);
        transform: scale(1.05);
    }
    
</style>

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-md-6">
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
                    <select name="priority" id="priority" class="form-control" required>
                        <option value="low">Faible</option>
                        <option value="medium">Moyenne</option>
                        <option value="high">Élevée</option>
                    </select>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-glow">Soumettre</button>
                </div>
            </form>
        </div>
    </div>
</div>


</div>

@endsection
