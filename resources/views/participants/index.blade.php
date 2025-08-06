@extends('layouts.dashboard')

@section('content')
<div class="content-body default-height">
    <div class="container-fluid">
        <div class="form-head mb-4 d-flex flex-wrap align-items-center">
            <div class="me-auto">
                <h2 class="font-w600 mb-0">Participants</h2>
                <!-- Tombol Modal Tambah -->
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createModal">
                    Create New Participant
                </button>
            </div>
            <div class="input-group search-area2 d-xl-inline-flex mb-2 me-lg-4 me-md-2">
                <button class="input-group-text"><i class="flaticon-381-search-2 text-primary"></i></button>
                <input type="text" class="form-control" placeholder="Search here...">
            </div>
        </div>

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="row">
            <div class="col-xl-12">
                <div class="card event-bx">
                    <div class="card-header border-0 mb-0">
                        <h4 class="fs-20 card-title">Daftar Peserta</h4>
                    </div>
                    <div class="card-body dz-scroll loadmore-content pt-0" id="ParticipantListContent">
                        @forelse($participants as $participant)
                        <div class="media event-list d-flex align-items-center justify-content-between pb-3 border-bottom mb-3">
                            <div class="d-flex align-items-center">
                                <div class="image me-3">
                                    <img src="{{ asset('images/default-user.png') }}" alt="avatar" width="80">
                                    <i class="las la-user image-icon"></i>
                                </div>
                                <div class="media-body">
                                    <h4 class="fs-18 mb-1 text-black">{{ $participant->name }}</h4>
                                    <span class="fs-14 text-secondary">{{ $participant->email }}</span>
                                </div>
                            </div>

                            <div class="ms-auto d-flex align-items-center" style="background-color: #f8f9fa; border-radius: 12px; padding: 10px 16px; box-shadow: 0 0 4px rgba(0,0,0,0.1); gap: 12px;">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editModal-{{ $participant->id }}" title="Edit" style="color: #138f68ff; font-size: 1.25rem;">
                                    <i class="fas fa-edit" style="transition: transform 0.2s ease;" onmouseover="this.style.transform='scale(1.2)'" onmouseout="this.style.transform='scale(1)'"></i>
                                </a>

                                <form action="{{ route('participants.destroy', $participant->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="margin: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Delete" style="color: #dc3545; background: none; border: none; font-size: 1.25rem;">
                                        <i class="fas fa-trash-alt" style="transition: transform 0.2s ease;" onmouseover="this.style.transform='scale(1.2)'" onmouseout="this.style.transform='scale(1)'"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Modal Edit Participant -->
                        <div class="modal fade" id="editModal-{{ $participant->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $participant->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <form action="{{ route('participants.update', $participant->id) }}" method="POST" class="modal-content">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel-{{ $participant->id }}">Edit Participant</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="name-{{ $participant->id }}" class="form-label">Nama</label>
                                            <input type="text" name="name" id="name-{{ $participant->id }}" class="form-control" value="{{ $participant->name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email-{{ $participant->id }}" class="form-label">Email</label>
                                            <input type="email" name="email" id="email-{{ $participant->id }}" class="form-control" value="{{ $participant->email }}" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-4">
                            <p class="text-muted">Belum ada peserta.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Participant -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ route('participants.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Participant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<!-- Bootstrap Bundle JS (Pastikan hanya sekali include jika sudah di layout) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endpush