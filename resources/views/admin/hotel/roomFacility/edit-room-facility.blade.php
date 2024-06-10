@extends('admin.layouts.frontend')
@section('title', 'Edit Room Facility')
@section('meta_description', 'Kaziranga Room Facility List Edit Room Facility')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Edit Room Facility</h3>
            <div class="card-body py-0">
                <form method="post" action="{{ route('facility.item.edit', ['id' => $facility->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="name" class="form-label fw-bold">Facility</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $facility->facility }}" placeholder="Facility....">
                        </div>
                    </div>
                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="btn btn-success ms-2 px-5">Submit</button>
                        <a href="{{ route('room.facility-list') }}" class="btn btn-danger ms-auto px-5 me-2">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
