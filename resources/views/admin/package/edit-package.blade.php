@extends('admin.layouts.frontend')
@section('title', 'Package List Edit Item')
@section('meta_description', 'Kaziranga Package List Edit Package')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Edit Package</h3>
            <div class="card-body">
                <form method="post" action="{{ route('package.list.item.update', ['id' => $package->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-3 mb-3">
                            <label for="name" class="form-label fw-bold">Package Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $package->name }}" placeholder="Package name....">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label for="rating" class="form-label fw-bold">Package Rating</label>
                            <select class="form-select" id="rating" name="rating">
                                <option value="">Select Rating</option>
                                <option value="3" @if ($package->rating == '3') selected @endif>3 Star</option>
                                <option value="4" @if ($package->rating == '4') selected @endif>4 Star</option>
                                <option value="5" @if ($package->rating == '5') selected @endif>5 Star</option>
                            </select>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label for="availability" class="form-label fw-bold">Availability</label>
                            <select class="form-select" id="availability" name="availability">
                                <option value="">Select Availability</option>
                                <option value="1" @if ($package->status == '1') selected @endif>Availability
                                </option>
                                <option value="0" @if ($package->status == '0') selected @endif>Not Availability
                                </option>
                            </select>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label for="price" class="form-label fw-bold">Price</label>
                            <input type="text" class="form-control" id="price" name="price"
                                value="{{ $package->price }}" placeholder="₹">
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="homepage" class="form-label fw-bold">Home Page</label>
                            <select class="form-select" id="homepage" name="homepage">
                                <option value="">--Select--</option>
                                <option value="1" @if ($package->homepage == '1') selected @endif>Yes</option>
                                <option value="0" @if ($package->homepage == '0') selected @endif>No</option>
                            </select>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="description" class="form-label fw-bold">About Package</label>
                            <textarea type="text" class="form-control summernote" id="description" name="description" value=""
                                placeholder="about package....">{{ $package->description }}</textarea>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="meta_title" class="form-label fw-bold">Meta Title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title"
                                value="{{ $package->meta_title }}" placeholder="Meta Title....">
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="meta_description" class="form-label fw-bold">Meta Description</label>
                            <textarea type="text" class="form-control" id="meta_description" name="meta_description" value=""
                                placeholder="Meta Description....">{{ $package->meta_description }}</textarea>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="image" class="form-label fw-bold">Upload Image (Please upload image dimension of
                                358 X
                                274)</label>
                            <input type="file" class="form-control" id="image" name="image" value="">
                            <img class="mt-2" src="{{ asset($package->image) }}" width="250px" height="200px">
                        </div>
                    </div>

                    <div class="d-flex gap-3 my-4">
                        <button type="submit" class="btn btn-success px-5">Submit</button>
                        <a href="{{ route('package-list') }}" class="btn btn-outline-danger">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.summernote').summernote({
                    height: 250, // Set the desired height of the editor
                    // Add any other Summernote options you want to customize
                });
            });
        </script>
    @endpush
@endsection
