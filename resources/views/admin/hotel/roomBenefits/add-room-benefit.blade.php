@extends('admin.layouts.frontend')
@section('title', 'Add Room Benefit')
@section('meta_description', 'Kaziranga Room Benefit List Add Room Benefit')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header">
                <div class="row">

                    <h3>Add Room Benefit</h3>

                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('add-benefit-add-item') }}" enctype="mulipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="name" class="form-label fw-bold">Benefit</label>
                            <input type="text" class="form-control" id="name" name="name" value=""
                                placeholder="Benefit....">
                        </div>
                    </div>

                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="btn btn-success ms-2 px-5">Submit</button>
                        <a href="{{ route('room.benefit-list') }}" class="btn btn-outline-danger ms-auto px-3">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
