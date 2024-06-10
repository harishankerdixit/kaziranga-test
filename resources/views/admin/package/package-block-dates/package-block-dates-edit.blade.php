@extends('admin.layouts.frontend')
@section('title', 'Edit Package Block Date')
@section('meta_description', 'Kaziranga Edit Package Block Date')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Edit Package Block Date</h3>
            <div class="card-body py-0">
                <form method="post" action="{{ route('packageblockdates.edit', ['id' => $id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="start" class="form-label fw-bold">Start Date</label>
                            <input type="date" class="form-control" id="start" name="start"
                                value="{{ $start }}" placeholder="Start Date....">
                        </div>
                        <div class="col-sm-6">
                            <label for="end" class="form-label fw-bold">End Date</label>
                            <input type="date" class="form-control" id="end" name="end"
                                value="{{ $end }}" placeholder="End Date....">
                        </div>
                    </div>

                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-success ms-2 px-5">Update</button>
                        <a href="{{ route('packageblockdates.list.view') }}"
                            class="btn btn-danger ms-auto px-5 me-2">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
