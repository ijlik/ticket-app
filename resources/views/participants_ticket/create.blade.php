@extends('layouts.dashboard')

@section('content')
<div class="content-body default-height">
    <div class="container-fluid">
        <div class="form-head mb-4 d-flex flex-wrap align-items-center">
            <div class="me-auto">
                <h2 class="font-w600 mb-0">Buat Tiket Baru</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card event-bx">
                    <div class="card-header border-0 mb-0">
                        <h4 class="fs-20 card-title">Formulir Tiket</h4>
                    </div>
                    <div class="card-body dz-scroll loadmore-content pt-0" id="CreateTicketContent">
                        <form action="{{ route('participants_ticket.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="participant_id" class="form-label">ID Peserta</label>
                                <input type="text" name="participant_id" id="participant_id" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="event_id" class="form-label">ID Event</label>
                                <input type="text" name="event_id" id="event_id" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="ticket_number" class="form-label">Nomor Tiket</label>
                                <input type="text" name="ticket_number" id="ticket_number" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Harga</label>
                                <input type="number" name="price" id="price" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="payment_data" class="form-label">Data Pembayaran (Opsional)</label>
                                <textarea name="payment_data" id="payment_data" class="form-control"></textarea>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                                <a href="{{ route('participants_ticket.index') }}" class="btn btn-secondary btn-sm">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection