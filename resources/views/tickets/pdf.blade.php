<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liste des Tickets</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background-color: #a8e6a3; color: #fff; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Liste des Tickets</h2>
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Priorité</th>
                <th>Statut</th>
                <th>Date de création</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
            <tr>
                <td>{{ $ticket->title }}</td>
                <td>{{ ucfirst($ticket->priority) }}</td>
                <td>{{ ucfirst($ticket->status) }}</td>
                <td>{{ $ticket->created_at->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
