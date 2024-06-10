@extends('admin.layouts.frontend')
@section('title', 'Add Room Facility')
@section('meta_description', 'Kaziranga Room Facility List Add Room Facility')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header">
                <div class="row">
                    <div class="p-2">
                        <h3>Add Room Facility</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('add-facility-add-item') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="name" class="form-label fw-bold">Facility</label>
                            <input type="text" class="form-control" id="name" name="name" value=""
                                placeholder="Facility....">
                        </div>
                    </div>

                    <div class="d-flex gap-3 my-4">
                        <button type="submit" class="btn btn-success px-5">Submit</button>
                        <a href="{{ route('room.facility-list') }}" class="btn btn-outline-danger ms-auto px-3">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
