@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <form method="POST" action="{{ route('handleLogin') }}" class="p-4 shadow rounded custom-form" style="max-width: 400px; width: 100%;">
        @csrf

        <div class="text-center mb-4">
            <img src="{{ asset('public/build/assets/images/logo.png') }}" alt="Logo" style="width: 150px;">
            <h4 class="mt-3">Login to Dashboard</h4>
        </div>

        @if(Session::get('error_msg'))
            <div class="alert alert-danger text-center" style="font-size: 13px;">
                {{ Session('error_msg') }}
            </div>
        @endif

        <div class="form-group mb-3">
            <label for="email">Email address</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                <input type="email" name="email" class="form-control" placeholder="Email address" required>
            </div>
        </div>

        <div class="form-group mb-4">
            <label for="password">Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
        </div>

        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>

        <div class="text-center">
            <small>Forgot your password? <a href="#">Reset it</a></small>
        </div>
    </form>
</div>
@endsection
