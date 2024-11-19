<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    //
    public function purchase(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $ticket = Ticket::create([
            'event_id' => $event->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'price' => $event->price,
        ]);

        Mail::send('emails.ticket', ['ticket' => $ticket, 'event' => $event], function ($message) use ($ticket) {
            $message->to($ticket->email)
                    ->subject('Ticket Purchase Confirmation');
        });

        return redirect()->back()->with('success', 'Ticket purchased successfully! Check your email for details.');
    }
}
