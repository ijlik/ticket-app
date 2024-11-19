@extends('layouts.dashboard')

@section('content')
<div class="content-body default-height">
    <div class="container-fluid">
        <div class="form-head mb-4 d-flex flex-wrap align-items-center">
            <div class="me-auto">
                <h2 class="font-w600 mb-0">Detail Tiket</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card event-bx">
                    <div class="card-header border-0 mb-0">
                        <h4 class="fs-20 card-title">Informasi Tiket</h4>
                    </div>
                    <div class="card-body dz-scroll loadmore-content pt-0">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID Tiket</th>
                                <td>{{ $ticket->id }}</td>
                            </tr>
                            <tr>
                                <th>ID Peserta</th>
                                <td>{{ $ticket->participant_id }}</td>
                            </tr>
                            <tr>
                                <th>ID Event</th>
                                <td>{{ $ticket->event_id }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Tiket</th>
                                <td>{{ $ticket->ticket_number }}</td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>{{ number_format($ticket->price, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Data Pembayaran</th>
                                <td>{{ $ticket->payment_data ? json_encode($ticket->payment_data) : '-' }}</td>
                            </tr>
                        </table>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('participants_ticket.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection