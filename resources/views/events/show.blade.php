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
        <hr>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
         <h3 class="mt-4">Buy Ticket</h3>
        <form action="{{ route('tickets.purchase', $event->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Purchase Ticket</button>
        </form>
    </div>
</div>
@endsection