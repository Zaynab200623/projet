<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
class TicketCreated extends Mailable
{
    public $ticket;

    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }

    public function build()
    {
        return $this->to(Auth::user()->email) // S'assurer que l'adresse est correcte
                    ->subject('Nouveau Ticket Créé')
                    ->view('emails.ticket-created', ['ticket' => $this->ticket]);
    }
}

