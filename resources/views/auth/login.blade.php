@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap');
    
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f5f7fa;
        margin: 0;
        padding: 0;
        color: #333;
        min-height: 100vh;
    }
    
    .container-center {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
    
    .login-card {
        background-color: white;
        border-radius: 12px;
        padding: 40px;
        width: 100%;
        max-width: 420px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .login-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background-color: #555;
        opacity: 0.8;
    }
    
    .login-title {
        text-align: left;
        font-size: 26px;
        font-weight: 600;
        margin-bottom: 30px;
        color: #333;
        letter-spacing: -0.5px;
        padding-left: 10px;
        border-left: none;
        position: relative;
    }
    
    .form-group {
        margin-bottom: 28px;
        position: relative;
    }
    
    .form-label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        font-weight: 500;
        color: #555;
        transition: all 0.2s ease;
    }
    
    .form-control {
        width: 100%;
        padding: 12px 0;
        background: transparent;
        border: none;
        border-bottom: 1px solid #ddd;
        border-radius: 0;
        font-size: 15px;
        font-weight: 400;
        color: #333;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        outline: none;
        border-color: #555;
        box-shadow: none;
    }
    
    .input-line {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background-color: #555;
        transition: all 0.3s ease;
    }
    
    .form-control:focus ~ .input-line {
        width: 100%;
    }
    
    .form-check {
        display: flex;
        align-items: center;
        padding-left: 0;
    }
    
    .form-check-input {
        margin-right: 8px;
        cursor: pointer;
    }
    
    .form-check-label {
        font-size: 14px;
        color: #666;
        cursor: pointer;
    }
    
    .btn-login {
        background-color: #333;
        color: white;
        font-weight: 500;
        border: none;
        border-radius: 6px;
        padding: 12px 24px;
        font-size: 15px;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .btn-login:hover {
        background-color: #222;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .forgot-password {
        color: #666;
        font-size: 14px;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    
    .forgot-password:hover {
        color: #333;
    }
    
    .actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }
    
    .invalid-feedback {
        color: #dc3545;
        font-size: 13px;
        margin-top: 5px;
    }
    
    /* Custom checkboxes */
    .custom-checkbox {
        position: relative;
        padding-left: 28px;
        cursor: pointer;
        user-select: none;
    }
    
    .custom-checkbox input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }
    
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 18px;
        width: 18px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 3px;
        transition: all 0.2s ease;
    }
    
    .custom-checkbox:hover input ~ .checkmark {
        border-color: #aaa;
    }
    
    .custom-checkbox input:checked ~ .checkmark {
        background-color: #555;
        border-color: #555;
    }
    
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }
    
    .custom-checkbox input:checked ~ .checkmark:after {
        display: block;
    }
    
    .custom-checkbox .checkmark:after {
        left: 6px;
        top: 2px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }
</style>

<div class="container-center">
    <div class="login-card">
        <h2 class="login-title">Connexion</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <div class="input-line"></div>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" required autocomplete="current-password">
                <div class="input-line"></div>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check mb-4">
                <label class="custom-checkbox">
                    {{ __('Remember Me') }}
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="checkmark"></span>
                </label>
            </div>

            <div class="actions">
                <button type="submit" class="btn-login">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="forgot-password" href="{{ route('password.request') }}">
                        {{ __('Forgot Password?') }}
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection