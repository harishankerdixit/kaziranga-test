@extends('admin.layouts.frontend')
@section('title', 'Add Package Feature')
@section('meta_description', 'Kaziranga Package Feature List Add Package Feature')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Add Package Feature</h3>
            <div class="card-body">
                <form method="post" action="{{ route('add-feature-add-item') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 my-2">
                            <label for="name" class="form-label fw-bold">Feature</label>
                            <input type="text" class="form-control" id="name" name="name" value=""
                                placeholder="Feature....">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <label for="image" class="form-label fw-bold">Upload Feature Image</label>
                            <input type="file" class="form-control" id="image" name="image" value="">
                        </div>
                    </div>

                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-success ms-2 px-5">Submit</button>
                        <a href="{{ route('feature.list.view') }}" class="btn btn-danger ms-auto px-5 me-2">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
