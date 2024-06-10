@extends('admin.layouts.frontend')
@section('title', 'Edit Cancellation Policy')
@section('meta_description', 'Kaziranga Edit Cancellation Policy')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Edit Cancellation Policy</h3>
            <div class="card-body py-0">
                <form method="post" action="{{ route('cancellationpolicy.edit', ['id' => $id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="description" class="form-label fw-bold">Cancellation Policy</label>
                            <input type="text" class="form-control" id="description" name="description"
                                value="{{ $feature }}" placeholder="Payment Policy....">
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-success ms-2 px-5">Update</button>
                        <a href="{{ route('cancellationpolicy.list.view') }}" class="btn btn-danger ms-auto px-5 me-2">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
