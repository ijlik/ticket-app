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
}
