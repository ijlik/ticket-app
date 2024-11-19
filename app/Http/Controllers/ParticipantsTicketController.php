<?php

namespace App\Http\Controllers;

use App\Models\ParticipantsTicket;
use Illuminate\Http\Request;

class ParticipantsTicketController extends Controller
{
    // Menampilkan semua data participants_ticket
    public function index()
    {
        // Mengambil semua data dari tabel participants_ticket
        $tickets = ParticipantsTicket::all();

        // Mengembalikan view dan melemparkan data ke view
        return view('participants_ticket.index', compact('tickets'));
    }

    // Menampilkan form untuk membuat data baru
    public function create()
    {
        return view('participants_ticket.create');
    }

    // Menyimpan data baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'participant_name' => 'required|max:255',
            'ticket_number' => 'required|unique:participants_ticket,ticket_number',
            'issued_at' => 'required|date',
        ]);

        // Menyimpan data baru ke database
        ParticipantsTicket::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('participants_ticket.index')->with('success', 'Ticket created successfully.');
    }

    // Menampilkan form untuk mengedit data berdasarkan ID
    public function edit($id)
    {
        // Mencari data berdasarkan ID
        $ticket = ParticipantsTicket::findOrFail($id);

        // Mengembalikan view dan melemparkan data ke view
        return view('participants_ticket.edit', compact('ticket'));
    }

    // Mengupdate data di database
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'participant_name' => 'required|max:255',
            'ticket_number' => 'required|unique:participants_ticket,ticket_number,' . $id,
            'issued_at' => 'required|date',
        ]);

        // Mencari data berdasarkan ID
        $ticket = ParticipantsTicket::findOrFail($id);

        // Mengupdate data
        $ticket->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('participants_ticket.index')->with('success', 'Ticket updated successfully.');
    }

    // Menghapus data berdasarkan ID
    public function destroy($id)
    {
        // Mencari data berdasarkan ID
        $ticket = ParticipantsTicket::findOrFail($id);

        // Menghapus data
        $ticket->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('participants_ticket.index')->with('success', 'Ticket deleted successfully.');
    }
}
