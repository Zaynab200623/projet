<x-mail::message>
# Ticket Closed

Hello, 

The ticket titled **{{ $ticket->title }}** has been successfully closed.

**Description:**  
{{ $ticket->description }}

If you have any further questions, please feel free to contact us.

<x-mail::button :url="route('tickets.show', $ticket->id)">
View Your Ticket
</x-mail::button>

Thanks,  
{{ config('app.name') }}
</x-mail::message>
