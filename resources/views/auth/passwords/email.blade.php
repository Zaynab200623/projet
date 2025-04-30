@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(120deg, #d0f4de, #a9def9, #fffcc9);
        background-size: 400% 400%;
        animation: bgGradient 12s ease infinite;
        font-family: 'Poppins', sans-serif;
    }

    @keyframes bgGradient {
        0% { background-position: 0% 50% }
        50% { background-position: 100% 50% }
        100% { background-position: 0% 50% }
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.3);
        border-radius: 20px;
        padding: 40px;
        backdrop-filter: blur(12px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: 0.3s ease;
    }

    .glass-card:hover {
        transform: scale(1.01);
    }

    .form-title {
        font-size: 1.6rem;
        font-weight: 600;
        text-align: center;
        color: #006d77;
        margin-bottom: 30px;
    }

    .btn-send {
        background-color: #ffd166;
        color: #073b4c;
        font-weight: 600;
        border-radius: 30px;
        padding: 10px 25px;
        border: none;
        transition: 0.3s ease;
    }

    .btn-send:hover {
        background-color: #fcbf49;
        box-shadow: 0 0 10px rgba(252, 191, 73, 0.6);
    }

    .form-control {
        border-radius: 12px;
    }

    label {
        font-weight: 500;
        color: #26547c;
    }

    .alert-success {
        background-color: #caffbf;
        border-color: #b5f7b1;
        color: #2b9348;
        font-weight: 500;
    }
</style>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6">
        <div class="glass-card">
            <div class="form-title">🔑 {{ __('Reset Password') }}</div>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-3">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-send">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
