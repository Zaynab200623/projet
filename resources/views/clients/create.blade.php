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
        max-width: 500px;
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
    
    .form-control {
        background: transparent;
        border: none;
        border-bottom: 2px solid #ccc;
        border-radius: 0;
        color: #34495e;
        font-weight: 500;
        padding-left: 0;
    }
    
    .form-control:focus {
        border-color: #00a8ff;
        background-color: transparent;
        box-shadow: none;
    }
    
    .btn-glow {
        background: #f0932b;
        color: white;
        font-weight: bold;
        border: none;
        border-radius: 25px;
        padding: 10px 30px;
        transition: all 0.3s ease-in-out;
    }
    
    .btn-glow:hover {
        background: #e17055;
        box-shadow: 0 0 15px rgba(241, 196, 15, 0.6);
        transform: scale(1.05);
    }

    .alert {
        border-radius: 15px;
        margin-bottom: 20px;
    }
</style>

<div class="container-center">
    <div class="glass-card">
        <div class="form-title">Créer un Client</div>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <form action="{{ route('clients.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label for="name" class="form-label">Nom du client</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-glow">Créer le client</button>
            </div>
        </form>
    </div>
</div>
@endsection