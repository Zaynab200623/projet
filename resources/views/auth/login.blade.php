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
        max-width: 500px;
        transition: transform 0.3s ease;
    }

    .glass-card:hover {
        transform: scale(1.02);
    }

    .login-title {
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
        background: #fbc531;
        color: white;
        font-weight: bold;
        border: none;
        border-radius: 25px;
        padding: 10px 30px;
        transition: all 0.3s ease-in-out;
    }

    .btn-glow:hover {
        background:rgb(225, 169, 0);
        box-shadow: 0 0 15px rgba(225, 225, 0, 0.6);
        transform: scale(1.05);
    }

    .form-check-label {
        color: #2d3436;
    }

    .text-muted:hover {
        color: #009ae1;
    }

    .invalid-feedback {
        color: #e74c3c;
        font-size: 0.9rem;
    }
</style>

<div class="container-center">
    <div class="glass-card">
        <div class="login-title">Connexion</div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" required autocomplete="current-password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                       {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <button type="submit" class="btn btn-glow">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="text-decoration-none text-muted" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection
