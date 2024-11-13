@extends('layouts.dashboard')

@section('content')
<div class="content-body default-height">
    <div class="container-fluid">
        <div class="form-head mb-4 d-flex flex-wrap align-items-center">
            <div class="me-auto">
                <h2 class="font-w600 mb-0">Edit Event</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card event-bx">
                    <div class="card-header border-0 mb-0">
                        <h4 class="fs-20 card-title">Edit Event</h4>
                    </div>
                    <div class="card-body">
                        <!-- Form to Edit Event -->
                        <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Method Spoofing for Update -->

                            <div class="form-group">
                                <label for="title">Event Title</label>
                                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $event->title) }}" required>
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" id="location" name="location" class="form-control" value="{{ old('location', $event->location) }}" required>
                                @error('location')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" id="start_date" name="start_date" class="form-control" value="{{ old('start_date', $event->start_date->format('Y-m-d')) }}" required>
                                @error('start_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" class="form-control" required>{{ old('description', $event->description) }}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" id="price" name="price" class="form-control" value="{{ old('price', $event->price) }}" required>
                                @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="banner_image">Banner Image</label>
                                <input type="file" id="banner_image" name="banner_image" class="form-control">
                                
                                @if ($event->banner_image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $event->banner_image) }}" alt="Banner Image" class="img-fluid" width="150">
                                    </div>
                                @endif
                                @error('banner_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update Event</button>
                            <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
