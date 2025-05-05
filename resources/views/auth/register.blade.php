@extends('layouts.app')

@section('content')

<style>
    body {
        background: linear-gradient(135deg, #a0f1ea, #c3ddfd, #fff3b0);
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
    }

    .container-center {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .glass-card {
        background-color:  #d0f0ff;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
        transition: transform 0.3s ease;
        border: none;
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

    .invalid-feedback {
        color: #e74c3c;
        font-size: 0.9rem;
    }
</style>

<div class="container-center">
    <div class="glass-card">
        <div class="form-title">{{ __('Créer un compte') }}</div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input id="name" type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" required autocomplete="new-password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password"
                       class="form-control"
                       name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-glow">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection