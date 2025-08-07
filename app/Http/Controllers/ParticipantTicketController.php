<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Participant;
use App\Models\ParticipantTicket;

class ParticipantTicketController extends Controller
{
    public function index()
    {
        $tickets = ParticipantTicket::with('participant', 'event')->get();
        $participants = Participant::all();
        $events = Event::all();
        return view('participants_ticket.index', compact('tickets', 'participants', 'events'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'participant_id' => 'required|uuid|exists:participants,id',
            'event_id' => 'required|uuid|exists:events,id',
            'ticket_number' => 'required|string|unique:participant_tickets,ticket_number',
            'price' => 'required|numeric',
        ]);

        $validated['payment_data'] = []; // default kosong

        ParticipantTicket::create($validated);

        return redirect()->back()->with('success', 'Tiket berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'participant_id' => 'required|exists:participants,id',
            'event_id' => 'required|exists:events,id',
            'ticket_number' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $ticket = ParticipantTicket::findOrFail($id);
        $ticket->update([
            'participant_id' => $request->participant_id,
            'event_id' => $request->event_id,
            'ticket_number' => $request->ticket_number,
            'price' => $request->price,
        ]);

        return redirect()->route('participant_ticket.index')->with('success', 'Tiket berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $ticket = ParticipantTicket::findOrFail($id);
        $ticket->delete();

        return redirect()->route('participant_ticket.index')->with('success', 'Tiket berhasil dihapus.');
    }
}
