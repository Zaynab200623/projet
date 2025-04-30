@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #f9f1ff, #a0f1ea, #ffeaa7);
        background-size: 400% 400%;
        animation: gradient 20s ease infinite;
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
        padding: 35px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease-in-out;
    }

    .glass-card:hover {
        transform: scale(1.01);
    }

    .verify-title {
        font-size: 1.7rem;
        font-weight: bold;
        color: #2d3436;
        text-align: center;
        margin-bottom: 25px;
    }

    .verify-text {
        font-size: 1rem;
        color: #333;
        text-align: center;
        margin-bottom: 15px;
    }

    .btn-request {
        background-color: #00cec9;
        color: white;
        border-radius: 25px;
        padding: 8px 22px;
        border: none;
        transition: all 0.3s ease-in-out;
        font-weight: 600;
    }

    .btn-request:hover {
        background-color: #00b894;
        box-shadow: 0 0 12px rgba(0, 206, 201, 0.5);
    }

    .alert-success {
        background-color: #dff9fb;
        color: #0984e3;
        border-radius: 10px;
        padding: 10px;
        margin-bottom: 20px;
        font-weight: 500;
        text-align: center;
    }
</style>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6">
        <div class="glass-card">
            <div class="verify-title">📧 {{ __('Verify Your Email Address') }}</div>

            <div class="verify-text">
                @if (session('resent'))
                    <div class="alert alert-success">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                {{ __('Before proceeding, please check your email for a verification link.') }}
            </div>

            <div class="verify-text">
                {{ __('If you did not receive the email') }},
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-request mt-2">
                        {{ __('Click here to request another') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
