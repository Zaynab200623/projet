<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\TicketCreated;
use App\Mail\TicketClosed;
use Barryvdh\DomPDF\Facade\Pdf;

class TicketController extends Controller
{   
    public function edit(Ticket $ticket)
    {
        $projects = Project::all();
        $users = User::all();
        return view('tickets.edit', compact('ticket', 'projects', 'users'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:open,in_progress,closed',
            'project_id' => 'nullable|exists:projects,id',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $ticket->update($validated);

        return redirect()->route('tickets.index')->with('success', 'Ticket mis à jour avec succès.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('tickets.index')->with('success', 'Ticket supprimé avec succès.');
    }

    public function index(Request $request)
    {
        $query = Ticket::query()->where('user_id', Auth::id());

        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $tickets = $query->latest()->paginate(10);

        return view('tickets.index', compact('tickets'));
    }

    public function create(Request $request)
    {
        $project = null;
        $users = User::all();

        if ($request->has('project_id')) {
            $project = Project::findOrFail($request->project_id);
        }

        return view('tickets.create', compact('project', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|string|in:low,medium,high',
            'project_id' => 'nullable|exists:projects,id',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $ticket = new Ticket($validated);
        $ticket->user_id = Auth::id();
        $ticket->status = 'open';

        if ($request->filled('project_id')) {
            $project = Project::findOrFail($request->project_id);
            $ticket->project()->associate($project);
        }

        if (isset($validated['assigned_to'])) {
            $ticket->assigned_to = $validated['assigned_to'];
        }

        $ticket->save();

        // Optionnel : envoyer un mail à l'utilisateur assigné
        // if ($ticket->assigned_to) {
        //     Mail::to($ticket->assignedUser->email)->send(new TicketCreated($ticket));
        // }

        return redirect()->route('tickets.index')->with('success', 'Ticket créé avec succès.');
    }
    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }
    public function close(Ticket $ticket)
{
    $ticket->status = 'closed';
    $ticket->save();

    return redirect()->route('tickets.index')->with('success', 'Le ticket a été fermé avec succès.');
}

    
} 