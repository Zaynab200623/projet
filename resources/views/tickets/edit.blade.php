@extends('layouts.app')

@section('content')
    <h1>Modifier le ticket</h1>

    <form action="{{ route('tickets.update', $ticket->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Titre :</label>
        <input type="text" name="title" value="{{ $ticket->title }}">

        <label for="description">Description :</label>
        <textarea name="description">{{ $ticket->description }}</textarea>

        <label for="priority">Priorité :</label>
        <select name="priority">
            <option value="low" {{ $ticket->priority == 'low' ? 'selected' : '' }}>Faible</option>
            <option value="medium" {{ $ticket->priority == 'medium' ? 'selected' : '' }}>Moyenne</option>
            <option value="high" {{ $ticket->priority == 'high' ? 'selected' : '' }}>Elevée</option>
        </select>

        <label for="status">Statut :</label>
        <select name="status">
            <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>opened</option>
            <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>closed</option>
        </select>

        <button type="submit">Mettre à jour</button>
    </form>
    
@endsection

    <style>
        body {
            background: linear-gradient(135deg, #a0f1ea, #c3ddfd, #fff3b0) !important;
            background-size: 400% 400% !important;
            animation: gradient 15s ease infinite !important;
            font-family: 'Poppins', sans-serif !important;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        h1 {
            text-align: center;
            color: #2f3640 !important;
            font-size: 2rem !important;
            margin-bottom: 30px !important;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        }

        form {
            background:  linear-gradient(135deg, #a0f1ea, #c3ddfd, #fff3b0);
            padding: 20px !important;
            border-radius: 10px !important;
            max-width: 600px !important;
            margin: auto !important;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1) !important;
        }

        label {
            font-size: 16px !important;
            color: #333 !important;
            font-weight: 500 !important;
            margin-bottom: 8px !important;
            display: block !important;
        }

        input, textarea, select {
            width: 100% !important;
            padding: 12px !important;
            margin-bottom: 20px !important;
            border: 2px solid #ccc !important;
            border-radius: 8px !important;
            font-size: 16px !important;
        }

        textarea {
            resize: vertical !important;
            min-height: 150px !important;
        }

        select {
            padding: 10px !important;
        }

        button {
            background-color: #4caf50 !important;
            color: white !important;
            padding: 10px 20px !important;
            border: none !important;
            border-radius: 5px !important;
            font-size: 16px !important;
            cursor: pointer !important;
        }

        button:hover {
            background-color: #45a049 !important;
        }
    </style>
