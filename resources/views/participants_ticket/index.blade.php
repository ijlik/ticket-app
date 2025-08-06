@extends('layouts.dashboard')

@section('content')
<div class="content-body default-height">
    <div class="container-fluid">
        <div class="form-head mb-4 d-flex flex-wrap align-items-center">
            <div class="me-auto">
                <h2 class="font-w600 mb-0">Participant Tickets</h2>
            </div>
            <div>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createTicketModal">
                    Tambah Tiket
                </button>
            </div>
        </div>

        {{-- Flash Message --}}
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            <div class="col-xl-12">
                <div class="card event-bx">
                    <div class="card-header border-0 mb-0">
                        <h4 class="fs-20 card-title">Daftar Tiket</h4>
                    </div>
                    <div class="card-body pt-0">
                        @forelse($tickets as $ticket)
                        <div class="media d-flex align-items-center justify-content-between pb-3 border-bottom mb-3">
                            <div class="d-flex align-items-center">
                                <div class="image me-3">
                                    <img src="{{ asset('images/default-user.png') }}" alt="avatar" width="80">
                                </div>
                                <div class="media-body">
                                    <h4 class="fs-18 mb-1 text-black">{{ $ticket->participant->name ?? '-' }}</h4>
                                    <span class="fs-14 text-secondary">Tiket: {{ $ticket->ticket_number }}</span><br>
                                    <span class="fs-14 text-secondary">Harga: Rp{{ number_format($ticket->price, 0, ',', '.') }}</span>
                                </div>
                            </div>
                            <div class="ms-auto d-flex align-items-center" style="background-color: #f8f9fa; border-radius: 12px; padding: 10px 16px; box-shadow: 0 0 4px rgba(0,0,0,0.1); gap: 12px;">
                                <a href="{{ route('participant_ticket.edit', $ticket->id) }}" class="text-success">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('participant_ticket.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: none; border: none; color: #dc3545;">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-4">
                            <p class="text-muted">Belum ada tiket peserta.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Create Ticket -->
<div class="modal fade" id="createTicketModal" tabindex="-1" aria-labelledby="createTicketModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('participant_ticket.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTicketModalLabel">Tambah Tiket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="participant_id" class="form-label">Peserta</label>
                        <select class="form-control" name="participant_id" id="participant_id" required>
                            <option value="">-- Pilih Peserta --</option>
                            @foreach($participants as $participant)
                            <option value="{{ $participant->id }}">{{ $participant->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="ticket_number" class="form-label">Nomor Tiket</label>
                        <input type="text" class="form-control" name="ticket_number" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="price" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection