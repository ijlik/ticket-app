@extends('layouts.dashboard')

@section('content')
<div class="content-body default-height">
    <div class="container-fluid">
        <div class="form-head mb-4 d-flex flex-wrap align-items-center">
            <div class="me-auto">
                <h2 class="font-w600 mb-0">Daftar Tiket</h2>
                <a href="{{ route('participants_ticket.create') }}" class="btn btn-primary btn-sm">Buat Tiket Baru</a>
            </div>
            <div class="input-group search-area2 d-xl-inline-flex mb-2 me-lg-4 me-md-2">
                <button class="input-group-text"><i class="flaticon-381-search-2 text-primary"></i></button>
                <input type="text" class="form-control" placeholder="Search here...">
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card event-bx">
                    <div class="card-header border-0 mb-0">
                        <h4 class="fs-20 card-title">Daftar Tiket Terbaru</h4>
                    </div>
                    <div class="card-body dz-scroll loadmore-content pt-0" id="TicketListContent">
                        @foreach($tickets as $ticket)
                        <div class="media event-list pb-3 border-bottom mb-3">
                            <div class="image">
                                <i class="las la-ticket-alt image-icon"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="fs-18 mb-sm-0 mb-2">
                                    <a href="{{ route('participants_ticket.show', $ticket->id) }}" class="text-black" title="Lihat Detail" style="text-decoration: none; transition: all 0.3s;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">
                                        Nomor Tiket: {{ $ticket->ticket_number }}
                                    </a>
                                </h4>
                                <span class="fs-14 d-block mb-sm-2 mb-2 text-secondary">Harga: Rp.{{ number_format($ticket->price, 2, ',', '.') }}</span>
                            </div>
                            <div class="media-footer">
                                @can('edit tickets')
                                <div class="text-center">
                                    <a href="{{ route('participants_ticket.edit', $ticket->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                </div>
                                @endcan
                                <div class="text-center mt-3">
                                    <form action="{{ route('participants_ticket.destroy', $ticket->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus tiket ini?')">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection