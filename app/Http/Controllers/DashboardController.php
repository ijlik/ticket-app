<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
    

class DashboardController extends Controller
{
    //
    public function showTickets()
    {
        $tickets = \App\Models\Ticket::with('event')->latest()->get();

        return view('main', compact('tickets'));
    }
}
