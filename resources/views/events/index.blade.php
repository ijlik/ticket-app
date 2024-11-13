@extends('layouts.dashboard')

@section('content')
<div class="content-body default-height">
    <div class="container-fluid">
        <div class="form-head mb-4 d-flex flex-wrap align-items-center">
            <div class="me-auto">
                <h2 class="font-w600 mb-0">Events</h2>
                @can('create events')
                <a href="{{ route('events.create') }}" class="btn btn-primary btn-sm">Create New Event</a>
                @endcan
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
                        <h4 class="fs-20 card-title">Daftar Acara Terbaru</h4>
                    </div>
                    <div class="card-body dz-scroll loadmore-content pt-0" id="EventListContent">
                        @foreach($events as $event)
                        <div class="media event-list pb-3 border-bottom mb-3">
                            <div class="image">
                                <img src="{{ asset('storage/' . $event->banner_image) }}" alt="">
                                <i class="las la-film image-icon"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="fs-18 mb-sm-0 mb-2">
                                    <a href="javascript:void(0);" class="text-black">{{ $event->title }}</a>
                                </h4>
                                <span class="fs-14 d-block mb-sm-2 mb-2 text-secondary">{{ $event->location }}</span>
                                <p class="fs-12">{{ $event->description }}</p>
                            </div>
                            <div class="media-footer">
                                <div class="text-center">
                                    <span class="ticket-icon-1 mb-3"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                    <div class="fs-12 text-primary">Rp.{{ number_format($event->price, 2) }}</div>
                                </div>
                                <div class="text-center">
                                    <span class="ticket-icon-1 mb-3"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                    <div class="fs-12 text-primary">{{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }}</div>
                                </div>
                                @can('edit events')
                                <div class="text-center mt-3">
                                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                </div>
                                @endcan
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
