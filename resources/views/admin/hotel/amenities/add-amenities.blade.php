@extends('admin.layouts.frontend')
@section('title', 'Add Amenity')
@section('meta_description', 'Kaziranga Amenity List Add Amenity')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Add Amenity</h3>
            <div class="card-body">
                <form method="post" action="{{ route('add-amenities-add-item') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <label for="amenity" class="form-label fw-bold">Amenity</label>
                            <input type="text" class="form-control" id="amenity" name="amenity" value=""
                                placeholder="Amenity....">
                            <span class="text-danger">{{ $errors->first('amenity') }}</span>
                        </div>

                        <div class="col-lg-12 mb-2">
                            <label for="status" class="form-label fw-bold">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="">Select Status</option>
                                <option value="1">Availability</option>
                                <option value="0">Not Availability</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                        </div>

                        <div class="col-lg-12 mb-2">
                            <label for="image" class="form-label fw-bold">Upload Amenity Logo</label>
                            <input type="file" class="form-control" id="image" name="image" value="">
                            {{-- <span class="text-danger">{{ $errors->first('images') }}</span> --}}
                        </div>
                    </div>
                    <div class="d-flex gap-3 my-4">
                        <button type="submit" class="btn btn-success px-5">Submit</button>
                        <a href="{{ route('amenities-list') }}" class="btn btn-outline-danger ms-auto px-3">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
