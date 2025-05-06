@extends('layouts.app')
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap');
    
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
        color: #333;
    }
    
    .container-center {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
    
    .form-card {
        background-color: white;
        border-radius: 12px;
        padding: 40px;
        width: 100%;
        max-width: 500px;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease;
    }
    
    .form-title {
        text-align: center;
        font-size: 24px;
        font-weight: 600;
        color: #333;
        margin-bottom: 30px;
        letter-spacing: -0.5px;
    }
    
    .form-group {
        margin-bottom: 25px;
    }
    
    .form-label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        font-weight: 500;
        color: #555;
    }
    
    .form-control {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #e1e4e8;
        border-radius: 6px;
        font-size: 15px;
        color: #333;
        transition: all 0.2s ease;
        background-color: #fff;
    }
    
    .form-control:focus {
        border-color: #555;
        outline: none;
        box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.05);
    }
    
    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }
    
    .btn-container {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }
    
    .btn-submit {
        background-color: #333;
        color: white;
        border: none;
        border-radius: 6px;
        padding: 12px 28px;
        font-size: 15px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .btn-submit:hover {
        background-color: #222;
        transform: translateY(-2px);
    }
    
    .btn-submit:active {
        transform: translateY(1px);
    }
    
    .alert {
        background-color: #fff8f8;
        border-left: 3px solid #e74c3c;
        padding: 12px 16px;
        margin-bottom: 25px;
        border-radius: 6px;
    }
    
    .alert ul {
        margin: 0;
        padding-left: 16px;
    }
    
    .alert li {
        color: #e74c3c;
        font-size: 14px;
    }
    
    /* Simple underline animation for focus */
    .input-wrapper {
        position: relative;
    }
    
    .input-wrapper::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background-color: #333;
        transition: width 0.3s ease, left 0.3s ease;
    }
    
    .input-wrapper:focus-within::after {
        width: 100%;
        left: 0;
    }
</style>

<div class="container-center">
    <div class="form-card">
        <div class="form-title">Créer un Projet</div>
        
        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Nom du projet</label>
                <div class="input-wrapper">
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <div class="input-wrapper">
                    <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                </div>
            </div>
            
            <div class="btn-container">
                <button type="submit" class="btn-submit">Soumettre</button>
            </div>
        </form>
    </div>
</div>
@endsection