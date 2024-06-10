@extends('admin.layouts.frontend')
@section('title', 'Edit Inclusion')
@section('meta_description', 'Kaziranga Edit Inclusion')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Edit Inclusion</h3>
            <div class="card-body">
                <form method="post" action="{{ route('inclusion.edit', ['id' => $id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="description" class="form-label fw-bold">Inclusion</label>
                            <input type="text" class="form-control" id="description" name="description"
                                value="{{ $feature }}" placeholder="Feature....">
                        </div>
                    </div>

                    <div class="d-flex gap-3 my-3">
                        <button type="submit" class="btn btn-success  px-5">Submit</button>
                        <a href="{{ route('inclusion.list.view') }}" class="btn btn-outline-danger me-2">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
