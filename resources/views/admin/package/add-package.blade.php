@extends('admin.layouts.frontend')
@section('title', 'Package List Add Item')
@section('meta_description', 'Kaziranga Package List Add Hotel')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Add Package</h3>
            <div class="card-body">
                <form method="post" action="{{ route('package.list.item.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-3 mb-3">
                            <label for="name" class="form-label fw-bold">Package Name</label>
                            <input type="text" class="form-control" id="name" name="name" value=""
                                placeholder="Package name....">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label for="rating" class="form-label fw-bold">Package Rating</label>
                            <select class="form-select" id="rating" name="rating">
                                <option value="">Select Rating</option>
                                <option value="3">3 Star</option>
                                <option value="4">4 Star</option>
                                <option value="5">5 Star</option>
                            </select>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label for="availability" class="form-label fw-bold">Availability</label>
                            <select class="form-select" id="availability" name="availability">
                                <option value="">Select Availability</option>
                                <option value="1">Availability</option>
                                <option value="0">Not Availability</option>
                            </select>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label for="price" class="form-label fw-bold">Price</label>
                            <input type="text" class="form-control" id="price" name="price" value=""
                                placeholder="₹">
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="homepage" class="form-label fw-bold">Home Page</label>
                            <select class="form-select" id="homepage" name="homepage">
                                <option value="">--Select--</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="description" class="form-label fw-bold">About Package</label>
                            <textarea type="text" class="form-control summernote" id="description" name="description" value=""
                                placeholder="about package...."></textarea>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="meta_title" class="form-label fw-bold">Meta Title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title" value=""
                                placeholder="Meta Title....">
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="meta_description" class="form-label fw-bold">Meta Description</label>
                            <textarea type="text" class="form-control" id="meta_description" name="meta_description" value=""
                                placeholder="Meta Description...."></textarea>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="image" class="form-label fw-bold">Upload Image (Please upload image dimension of
                                358 X
                                274)</label>
                            <input type="file" class="form-control" id="image" name="image" value="">
                        </div>
                    </div>

                    <div class="d-flex gap-3 my-4">
                        <button type="submit" class="btn btn-success ms-2 px-5">Submit</button>
                        <a href="{{ route('package-list') }}" class="btn btn-outline-danger ms-auto ">Back</a>
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
