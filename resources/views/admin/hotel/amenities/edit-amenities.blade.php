@extends('admin.layouts.frontend')
@section('title', 'Hotels List Edit Amenity')
@section('meta_description', 'Kaziranga Amenity List Edit Amenity')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        {{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Amenity</h1>
        </div>
        <form method="post" action="{{ route('amenities.item.edit', ['id' => $amenities->id]) }}"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <label for="name" class="form-label fw-bold">Amenity</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ $amenities->amenity }}" placeholder="Amenity....">
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-sm-12">
                    <label for="availability" class="form-label fw-bold">Availability</label>
                    <select class="form-select" id="availability" name="availability">
                        <option value="">Select Availability</option>
                        <option value="1" @if ($amenities->status == '1') selected @endif>Availability</option>
                        <option value="0" @if ($amenities->status == '0') selected @endif>Not Availability</option>
                    </select>
                </div>
            </div>
            <div class="row mt-5">
                <div class="row">
                    <div class="col-sm-12">
                        <label for="image" class="form-label fw-bold">Upload Amenity Logo</label>
                        <input type="file" class="form-control" id="image" name="image" value="">

                        <img class="mt-2" src="{{ '/admin/uploads/amenity/' . $amenities->image }}" width="250px"
                            height="200px">

                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-success btn-block btn-lg">Update</button>
                </div>
                <div class="col-sm-1">
                    <a href="{{ route('amenities-list') }}" class="btn btn-dark btn-block btn-lg">Back</a>
                </div>
            </div>
        </form> --}}

        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Edit Amenity</h3>
            <div class="card-body">
                <form method="post" action="{{ route('amenities.item.edit', ['id' => $amenities->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <label for="amenity" class="form-label fw-bold">Amenity</label>
                            <input type="text" class="form-control" id="amenity" name="amenity"
                                value="{{ $amenities->amenity }}" placeholder="Amenity....">
                            <span class="text-danger">{{ $errors->first('amenity') }}</span>
                        </div>

                        <div class="col-lg-12 mb-2">
                            <label for="status" class="form-label fw-bold">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="">Select Status</option>
                                <option value="1" @if ($amenities->status == '1') selected @endif>Availability
                                </option>
                                <option value="0" @if ($amenities->status == '0') selected @endif>Not Availability
                                </option>
                            </select>
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                        </div>

                        <div class="col-lg-12 mb-2">
                            <label for="image" class="form-label fw-bold">Upload Amenity Logo</label>
                            <input type="file" class="form-control" id="image" name="image" value="">
                            <img class="mt-2" src="{{ asset($amenities->image) }}" width="60px" height="50px">
                        </div>
                    </div>
                    <div class="d-flex gap-3 my-4">
                        <button type="submit" class="btn btn-success px-5">Update</button>
                        <a href="{{ route('amenities-list') }}" class="btn btn-outline-danger ms-auto ">Back</a>
                    </div>
                </form>
            </div>
        </div>

    </main>
@endsection
