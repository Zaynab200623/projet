@extends('layouts.app')

@section('content')

<style>
    body {
        background: linear-gradient(135deg, #43cea2, #185a9d);
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
        backdrop-filter: blur(10px);
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
        color: #fff;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    .form-label {
        font-weight: 500;
        color: #fff;
        font-size: 1rem;
        margin-bottom: 8px;
        display: block;
    }

    .form-control {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        border-radius: 8px;
        padding: 15px;
        color: #fff;
        font-weight: 500;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        background: rgba(255, 255, 255, 0.3);
        box-shadow: 0 0 15px rgba(255, 255, 255, 0.3);
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }

    .btn-glow {
        background: rgba(255, 255, 255, 0.25);
        color: #fff;
        font-weight: bold;
        border: none;
        border-radius: 8px;
        padding: 15px 30px;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }

    .btn-glow:hover {
        background: rgba(255, 255, 255, 0.4);
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .invalid-feedback {
        color: #ffcccc;
        font-size: 0.9rem;
        margin-top: -15px;
        margin-bottom: 15px;
    }

    .login-link {
        text-align: center;
        margin-top: 25px;
        color: #fff;
    }

    .login-link a {
        color: #fff;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .login-link a:hover {
        text-shadow: 0 0 8px rgba(255, 255, 255, 0.8);
    }
</style>

<div class="container-center">
    <div class="glass-card">
        <div class="form-title">{{ __('Créer un compte') }}</div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="form-label">{{ __('Nom') }}</label>
                <input id="name" type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                       placeholder="Votre nom">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="form-label">{{ __('Adresse Email') }}</label>
                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email"
                       placeholder="Votre email">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" required autocomplete="new-password"
                       placeholder="Votre mot de passe">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password-confirm" class="form-label">{{ __('Confirmer le mot de passe') }}</label>
                <input id="password-confirm" type="password"
                       class="form-control"
                       name="password_confirmation" required autocomplete="new-password"
                       placeholder="Confirmer votre mot de passe">
            </div>

            <div class="text-center">
                <button type="submit" class="btn-glow">
                    {{ __('S\'inscrire') }}
                </button>
            </div>

            <div class="login-link">
                <p>Vous avez déjà un compte? <a href="{{ route('login') }}">Connectez-vous</a></p>
            </div>
        </form>
    </div>
</div>
@endsection