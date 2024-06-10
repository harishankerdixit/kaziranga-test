@extends('admin.layouts.frontend')
@section('title', 'Add Package Festival Date')
@section('meta_description', 'Kaziranga Add Package Festival Date')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Add Package Festival Date</h3>
            <div class="card-body">
                <form method="post" action="{{ route('packagefestivaldates.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="start" class="form-label fw-bold">Start Date</label>
                            <input type="date" class="form-control" id="start" name="start" value=""
                                placeholder="Start Date....">
                        </div>
                        <div class="col-sm-6">
                            <label for="end" class="form-label fw-bold">End Date</label>
                            <input type="date" class="form-control" id="end" name="end" value=""
                                placeholder="End Date....">
                        </div>
                    </div>

                    <div class="d-flex gap-3 my-3">
                        <button type="submit" class="btn btn-success px-5">Submit</button>
                        <a href="{{ route('packagefestivaldates.list.view') }}"
                            class="btn btn-outline-danger ms-auto me-2">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
