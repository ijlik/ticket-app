@extends('layouts.dashboard')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <h2 class="font-w600 mb-4">{{ $event->title }}</h2>
        <img src="{{ asset('storage/' . $event->banner_image) }}" alt="{{ $event->title }}" class="mb-4" style="width: 100%; max-height: 400px; object-fit: cover;">
        <p><strong>Location:</strong> {{ $event->location }}</p>
        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }}</p>
        <p><strong>Price:</strong> Rp.{{ number_format($event->price, 2) }}</p>
        <p><strong>Description:</strong></p>
        <p>{{ $event->description }}</p>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Back to Events</a>
    </div>
</div>
@endsection