@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #f8e8ff, #a0f1ea, #fff1f5);
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
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(15px);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 40px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease-in-out;
    }

    .glass-card:hover {
        transform: scale(1.01);
    }

    .form-title {
        font-size: 1.8rem;
        font-weight: 600;
        color:rgb(6, 7, 7);
        text-align: center;
        margin-bottom: 30px;
    }

    .btn-register {
        background-color:rgb(14, 57, 247);
        color: white;
        font-weight: 600;
        padding: 10px 25px;
        border-radius: 30px;
        border: none;
        transition: all 0.3s ease-in-out;
    }

    .btn-register:hover {
        background-color:rgb(67, 183, 232);
        box-shadow: 0 0 12px rgba(253, 121, 168, 0.5);
    }

    .form-control {
        border-radius: 12px;
    }
-
    label {
        font-weight: 500;
        color: #555;
    }
</style>


<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6">
        <div class="glass-card">
            <div class="form-title"> {{ __('Créer un compte') }}</div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control"
                        name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-register">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
