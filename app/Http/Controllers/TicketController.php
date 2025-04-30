<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketCreated;
use App\Mail\TicketClosed;
use Illuminate\Support\Facades\Auth; 

class TicketController extends Controller
{
    public function index(Request $request)
    {
        $query = Ticket::query();
    
        $query->where('user_id', Auth::id()); 
    
        // Filtrage par priorité
        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        // Filtrage par statut
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $tickets = $query->latest()->paginate(10);

        return view('tickets.index', compact('tickets'));
    }




    public function create()
    {
        return view('tickets.create');
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|string|in:low,medium,high',
        ]);
    


        Ticket::create([
            'user_id' => Auth::id(),  
            'title' => $validated['title'],
            'description' => $validated['description'],
            'priority' => $validated['priority'],
            'status' => 'open',
        ]);
    
        return redirect('/tickets')->with('success', 'Ticket créé avec succès.');
    }
    

    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }



    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }



    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'priority' => 'required|in:low,medium,high',
        ]);

        $ticket->update($request->only('title', 'description', 'priority'));
        return redirect()->route('tickets.index')->with('success', 'Ticket mis à jour avec succès');
    }


    public function close($ticketId)
{
    $ticket = Ticket::findOrFail($ticketId);
    

    $ticket->status = 'closed';
    $ticket->save();

    $user = $ticket->user; 
    if ($user && $user->email) {
        Mail::to($user->email)->send(new TicketClosed($ticket));
    } else {
       
    }

    return redirect()->route('tickets.index')->with('status', 'Ticket fermé avec succès.');
}
    public function destroy(Ticket $ticket)
{
    $ticket->delete();

    return redirect()->route('tickets.index')->with('success', 'Ticket supprimé avec succès.');
}


}