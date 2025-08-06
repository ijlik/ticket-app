@extends('layouts.dashboard')

@section('content')
<div class="content-body default-height">
    <div class="container-fluid">
        <div class="form-head d-flex flex-wrap mb-4 align-items-center">
            <div class="me-auto">
                <h2 class="font-w600 mb-0">Daftar Peserta</h2>
                <a href="{{ route('participants.create') }}" class="btn btn-primary btn-sm mt-2">+ Tambah Peserta</a>
            </div>
            <div class="input-group search-area2 d-xl-inline-flex mb-2 me-lg-4 me-md-2 mt-2">
                <button class="input-group-text"><i class="flaticon-381-search-2 text-primary"></i></button>
                <input type="text" class="form-control" placeholder="Cari peserta...">
            </div>
        </div>

        <div class="row">
            @forelse ($participants as $participant)
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="{{ asset('default-avatar.png') }}" alt="avatar" class="rounded-circle mb-3" width="80" height="80">
                        <h5 class="card-title mb-1">{{ $participant->name }}</h5>
                        <p class="card-text text-muted">{{ $participant->email }}</p>

                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('participants.edit', $participant->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('participants.destroy', $participant->id) }}" method="POST" onsubmit="return confirm('Hapus peserta ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    Belum ada peserta terdaftar.
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection