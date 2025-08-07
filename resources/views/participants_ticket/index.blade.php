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
                        <table id="ticketTable" class="display table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Peserta</th>
                                    <th>Nomor Tiket</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->participant->name ?? '-' }}</td>
                                    <td>{{ $ticket->ticket_number }}</td>
                                    <td>{{ number_format($ticket->price, 0, ',', '.') }}</td>
                                    <td>
                                        <div class="d-flex align-items-center" style="gap: 12px;">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#editTicketModal{{ $ticket->id }}" title="Edit" style="color: #138f68ff; font-size: 1.25rem;">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('participant_ticket.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')" style="margin: 0;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Delete" style="color: #dc3545; background: none; border: none; font-size: 1.25rem;">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Tiket -->
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
                        <select class="form-control select2" name="participant_id" id="participant_id" required>
                            <option value="">Pilih Peserta</option>
                            @foreach($participants as $participant)
                            <option value="{{ $participant->id }}">{{ $participant->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="event_id" class="form-label">Event</label>
                        <select class="form-control select2" name="event_id" id="event_id" required>
                            <option value="">Pilih Event</option>
                            @foreach($events as $event)
                            <option value="{{ $event->id }}">{{ $event->title }}</option>
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
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>

@foreach($tickets as $ticket)
<!-- Modal Edit Tiket -->
<div class="modal fade" id="editTicketModal{{ $ticket->id }}" tabindex="-1" aria-labelledby="editTicketModalLabel{{ $ticket->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('participant_ticket.update', $ticket->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTicketModalLabel{{ $ticket->id }}">Edit Tiket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="participant_id_{{ $ticket->id }}" class="form-label">Peserta</label>
                        <select class="form-control select2" name="participant_id" id="participant_id_{{ $ticket->id }}" required>
                            <option value="">Pilih Peserta</option>
                            @foreach($participants as $participant)
                            <option value="{{ $participant->id }}" {{ $ticket->participant_id == $participant->id ? 'selected' : '' }}>
                                {{ $participant->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="event_id_{{ $ticket->id }}" class="form-label">Event</label>
                        <select class="form-control select2" name="event_id" id="event_id_{{ $ticket->id }}" required>
                            <option value="">Pilih Event</option>
                            @foreach($events as $event)
                            <option value="{{ $event->id }}" {{ $ticket->event_id == $event->id ? 'selected' : '' }}>
                                {{ $event->title }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="ticket_number_{{ $ticket->id }}" class="form-label">Nomor Tiket</label>
                        <input type="text" class="form-control" name="ticket_number" id="ticket_number_{{ $ticket->id }}" value="{{ $ticket->ticket_number }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="price_{{ $ticket->id }}" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="price" id="price_{{ $ticket->id }}" value="{{ $ticket->price }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach

<script>
    $(document).ready(function() {
        $('.select2').each(function() {
            $(this).select2({
                dropdownParent: $(this).closest('.modal')
            });
        });

        $(document).ready(function() {
            $('#ticketTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
                }
            });
        });
    });
</script>
@endsection