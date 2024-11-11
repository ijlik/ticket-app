@extends('layouts.dashboard')

@section('content')
    <div class=" content-body default-height">
        <!-- row -->
        <div class="container-fluid">
            <div class="form-head mb-4 d-flex flex-wrap align-items-center">
                <div class="me-auto">
                    <h2 class="font-w600 mb-0">Create new Event</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="row">
                    </div>
                </div>
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Input Style</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" name="title" class="form-control input-default " placeholder="Title">
                                    </div>

                                    <div class="mb-3">
                                        <textarea class="form-control" name="description" rows="8" id="comment" placeholder="Description"></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <input type="text" name="location" class="form-control input-default " placeholder="Location">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <input type="date" name="start_date" class="form-control input-default " placeholder="Start Date">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <input type="number" name="price" min="1" class="form-control input-default " placeholder="Price">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <input type="file" name="banner_image" accept="image/*" class="form-control input-default " placeholder="Banner Image">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
