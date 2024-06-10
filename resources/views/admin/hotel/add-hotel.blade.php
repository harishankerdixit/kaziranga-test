@extends('admin.layouts.frontend')
@section('title', 'Hotels List Add Item')
@section('meta_description', 'Kaziranga Hotels List Add Hotel')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Add Hotel</h3>
            <div class="card-body pb-0">
                <form method="post" action="{{ route('hotel.list.item.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 mb-3">
                            <label for="name" class="form-label fw-bold">Hotel Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}" placeholder="Hotel name....">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label for="rating" class="form-label fw-bold">Hotel Rating</label>
                            <select class="form-select" id="rating" name="rating">
                                <option value="">Select Rating</option>
                                <option value="3" {{ old('rating') == '3' ? 'selected' : '' }}>3 Star</option>
                                <option value="4" {{ old('rating') == '4' ? 'selected' : '' }}>4 Star</option>
                                <option value="5" {{ old('rating') == '5' ? 'selected' : '' }}>5 Star</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('rating') }}</span>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label for="status" class="form-label fw-bold">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="">Select Status</option>
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Availability</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Not Availability
                                </option>
                            </select>
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                        </div>

                        <div class="col-lg-3 mb-3">
                            <label for="price" class="form-label fw-bold">Price</label>
                            <input type="text" class="form-control" id="price" name="price"
                                value="{{ old('price') }}" placeholder="₹">
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label for="price_type" class="form-label fw-bold">Price Type</label>
                            <select class="form-select" id="price_type" name="price_type">
                                <option value="" selected disabled>Select Price Type</option>
                                <option value="low">low</option>
                                <option value="medium">medium</option>
                                <option value="high">high</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('price_type') }}</span>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label for="city" class="form-label fw-bold">City</label>
                            <input type="text" class="form-control" id="city" name="city"
                                value="{{ old('city') }}" placeholder="Location....">
                            <span class="text-danger">{{ $errors->first('city') }}</span>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label for="state" class="form-label fw-bold">State</label>
                            <select class="form-select" id="state" name="state">
                                <option value="">Select State</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state['id'] }}"
                                        {{ old('state') == $state['id'] ? 'selected' : '' }}>{{ $state['state'] }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('state') }}</span>
                        </div>



                        <div class="col-lg-6 mb-3">
                            <label for="homepage" class="form-label fw-bold">Home Page</label>
                            <select class="form-select" id="homepage" name="homepage">
                                <option value="">--Select--</option>
                                <option value="1" {{ old('homepage') == '1' ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ old('homepage') == '0' ? 'selected' : '' }}>No</option>
                            </select>
                            {{-- <span class="text-danger">{{ $errors->first('homepage') }}</span> --}}
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="review" class="form-label fw-bold">Review</label>
                            <select class="form-select" id="review" name="review">
                                <option value="">Select Review</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">9</option>
                                <option value="10">10</option>
                            </select>
                            {{-- <span class="text-danger">{{ $errors->first('review') }}</span> --}}
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="review_status" class="form-label fw-bold">Review Status</label>
                            <select class="form-select" id="review_status" name="review_status">
                                <option value="">--Select--</option>
                                <option value="Good">Good</option>
                                <option value="Very Good">Very Good</option>
                                <option value="Excellent">Excellent</option>
                            </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="property_type" class="form-label fw-bold">Property Type</label>
                            <select class="form-select" id="property_type" name="property_type">
                                <option value="">--Select--</option>
                                <option value="Hotel">Hotel</option>
                                <option value="Villa">Villa</option>
                                <option value="Resort">Resort</option>
                                <option value="Apartment">Apartment</option>
                                <option value="Guest House">Guest House</option>
                                <option value="Hostel">Hostel</option>
                                <option value="Hotel & Resort">Hotel & Resort</option>
                            </select>
                        </div>



                        <div class="col-lg-12 mb-3">
                            <label for="address" class="form-label fw-bold">Address</label>
                            <textarea type="text" class="form-control" id="address" name="address" placeholder="address....">{{ old('address') }}</textarea>
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        </div>


                        <div class="col-lg-12 mb-3">
                            <label for="description" class="form-label fw-bold">About Hotel</label>
                            <textarea type="text" class="form-control" id="description" name="description" placeholder="about hotel....">{{ old('description') }}</textarea>
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        </div>



                        <div class="col-lg-12 mb-3">
                            <label for="meta_title" class="form-label fw-bold">Meta Title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title"
                                value="{{ old('meta_title') }}" placeholder="Meta Title....">
                            {{-- <span class="text-danger">{{ $errors->first('meta_title') }}</span> --}}
                        </div>


                        <div class="col-lg-12 mb-3">
                            <label for="meta_description" class="form-label fw-bold">Meta Description</label>
                            <textarea type="text" class="form-control" id="meta_description" name="meta_description"
                                placeholder="Meta Description....">{{ old('meta_description') }}</textarea>
                            {{-- <span class="text-danger">{{ $errors->first('meta_description') }}</span> --}}
                        </div>



                        <div class="col-lg-12 mb-3">
                            <label for="image" class="form-label fw-bold">Upload Thumbnail (Please upload image
                                dimension of
                                340 X 328 OR square size image)</label>
                            <input type="file" class="form-control" id="image" name="image"
                                value="{{ old('image') }}">
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="thumb_alt" class="form-label fw-bold">Thumbnail Alt Tag</label>
                            <input type="text" class="form-control" id="thumb_alt" name="thumb_alt"
                                value="{{ old('thumb_alt') }}" placeholder="Thumbnail Alt Tag....">
                            {{-- <span class="text-danger">{{ $errors->first('thumb_alt') }}</span> --}}
                        </div>



                        <div class="col-lg-12 mb-3">
                            <label for="package_image" class="form-label fw-bold">Upload Cover Image (Please upload
                                image
                                dimension of 1140 X 300)</label>
                            <input type="file" class="form-control" id="package_image" name="package_image"
                                value="{{ old('package_image') }}">
                            <span class="text-danger">{{ $errors->first('package_image') }}</span>
                        </div>



                        <div class="col-lg-12 mb-3">
                            <label for="package_alt" class="form-label fw-bold">Package Alt Tag</label>
                            <input type="text" class="form-control" id="package_alt" name="package_alt"
                                value="{{ old('package_alt') }}" placeholder="Package Alt Tag....">
                            {{-- <span class="text-danger">{{ $errors->first('package_alt') }}</span> --}}
                        </div>


                        <div class="col-lg-12 mb-3">
                            <label for="images" class="form-label fw-bold">
                                Upload Hotel Images (Please upload images with dimensions of 834 X 411)
                            </label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                            <span class="text-danger">{{ $errors->first('images') }}</span>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="gallery_alt" class="form-label fw-bold">Thumbnail Alt Tag</label>
                            <input type="text" class="form-control" id="gallery_alt" name="gallery_alt"
                                value="{{ old('package_alt') }}" placeholder="Thumbnail Alt Tag....">
                            {{-- <span class="text-danger">{{ $errors->first('gallery_alt') }}</span> --}}
                        </div>

                        <div class="d-flex gap-3 my-4">
                            <button type="submit" class="btn btn-success ms-2 px-5">Submit</button>
                            <a href="{{ route('hotel-list') }}" class="btn btn-outline-danger ms-auto px-3">Back</a>
                        </div>
                </form>
            </div>
        </div>
    </main>
@endsection
