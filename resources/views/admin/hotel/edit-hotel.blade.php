@extends('admin.layouts.frontend')
@section('title', 'Hotels List Edit Item')
@section('meta_description', 'Kaziranga Hotels List Edit Hotel')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Edit Hotel</h3>
            <div class="card-body pb-0">
                <form method="post" action="{{ route('hotel.list.item.update', ['id' => $hotel->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 mb-3">
                            <label for="name" class="form-label fw-bold">Hotel Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $hotel->name }}" placeholder="Hotel name....">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label for="rating" class="form-label fw-bold">Hotel Rating</label>
                            <select class="form-select" id="rating" name="rating">
                                <option value="">Select Rating</option>
                                <option value="3" @if ($hotel->rating == '3') selected @endif>3 Star</option>
                                <option value="4" @if ($hotel->rating == '4') selected @endif>4 Star</option>
                                <option value="5" @if ($hotel->rating == '5') selected @endif>5 Star</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('rating') }}</span>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label for="status" class="form-label fw-bold">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="">Select Availability</option>
                                <option value="1" @if ($hotel->status == '1') selected @endif>Availability
                                </option>
                                <option value="0" @if ($hotel->status == '0') selected @endif>Not Availability
                                </option>
                            </select>
                            <span class="text-danger">{{ $errors->first('status') }}</span>
                        </div>

                        <div class="col-lg-3 mb-3">
                            <label for="price" class="form-label fw-bold">Price</label>
                            <input type="text" class="form-control" id="price" name="price"
                                value="{{ $hotel->price }}" placeholder="₹">
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label for="price_type" class="form-label fw-bold">Price Type</label>
                            <select class="form-select" id="price_type" name="price_type">
                                <option value="" selected disabled>Select Price Type</option>
                                <option value="low" @if ($hotel->price_type == 'low') selected @endif>low</option>
                                <option value="medium" @if ($hotel->price_type == 'medium') selected @endif>medium</option>
                                <option value="high" @if ($hotel->price_type == 'high') selected @endif>high</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('price_type') }}</span>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label for="city" class="form-label fw-bold">City</label>
                            <input type="text" class="form-control" id="city" name="city"
                                value="{{ $hotel->city }}" placeholder="City....">
                            <span class="text-danger">{{ $errors->first('city') }}</span>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label for="state" class="form-label fw-bold">State</label>
                            <select class="form-select" id="state" name="state">
                                <option value="">Select State</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state['id'] }}"
                                        {{ $hotel->state == $state['id'] ? 'selected' : '' }}>{{ $state['state'] }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('state') }}</span>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label for="homepage" class="form-label fw-bold">Home Page</label>
                            <select class="form-select" id="homepage" name="homepage">
                                <option value="" selected disabled>--Select--</option>
                                <option value="1" @if ($hotel->homepage == '1') selected @endif>Yes</option>
                                <option value="0" @if ($hotel->homepage == '0') selected @endif>No</option>
                            </select>
                            {{-- <span class="text-danger">{{ $errors->first('homepage') }}</span> --}}
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="review" class="form-label fw-bold">Review</label>
                            <select class="form-select" id="review" name="review">
                                <option value="" selected disabled>Select Review</option>
                                <option value="1" @if ($hotel->review == '1') selected @endif>1</option>
                                <option value="3" @if ($hotel->review == '2') selected @endif>2</option>
                                <option value="3" @if ($hotel->review == '3') selected @endif>3</option>
                                <option value="4" @if ($hotel->review == '4') selected @endif>4</option>
                                <option value="5" @if ($hotel->review == '5') selected @endif>5</option>
                                <option value="6" @if ($hotel->review == '6') selected @endif>6</option>
                                <option value="7" @if ($hotel->review == '7') selected @endif>7</option>
                                <option value="8" @if ($hotel->review == '8') selected @endif>8</option>
                                <option value="9" @if ($hotel->review == '9') selected @endif>9</option>
                                <option value="10" @if ($hotel->review == '10') selected @endif>10</option>
                            </select>
                            {{-- <span class="text-danger">{{ $errors->first('review') }}</span> --}}
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="review_status" class="form-label fw-bold">Review Status</label>
                            <select class="form-select" id="review_status" name="review_status">
                                <option value="" selected disabled>Select Review Status</option>
                                <option value="Good" @if ($hotel->review_status == 'Good') selected @endif>
                                    Good
                                </option>
                                <option value="Very Good" @if ($hotel->review_status == 'Very Good') selected @endif>
                                    Very Good
                                </option>
                                <option value="Excellent" @if ($hotel->review_status == 'Excellent') selected @endif>
                                    Excellent
                                </option>
                            </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="property_type" class="form-label fw-bold">Property Type</label>
                            <select class="form-select" id="property_type" name="property_type">
                                <option value="">Select Property Type</option>
                                <option value="Hotel" @if ($hotel->property_type == 'Hotel') selected @endif>
                                    Hotel
                                </option>
                                <option value="Villa" @if ($hotel->property_type == 'Villa') selected @endif>
                                    Villa
                                </option>
                                <option value="Resort" @if ($hotel->property_type == 'Resort') selected @endif>
                                    Resort
                                </option>
                                <option value="Apartment" @if ($hotel->property_type == 'Apartment') selected @endif>
                                    Apartment
                                </option>
                                <option value="Guest House" @if ($hotel->property_type == 'Guest House') selected @endif>
                                    Guest House
                                </option>
                                <option value="Hostel" @if ($hotel->property_type == 'Hostel') selected @endif>
                                    Hostel
                                </option>
                                <option value="Hotel & Resort" @if ($hotel->property_type == 'Hotel & Resort') selected @endif>
                                    Hotel & Resort
                                </option>
                            </select>
                        </div>


                        <div class="col-lg-12 mb-3">
                            <label for="address" class="form-label fw-bold">Address</label>
                            <textarea class="form-control" id="address" name="address" placeholder="Address...">{{ $hotel->address }}</textarea>
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="description" class="form-label fw-bold">About Hotel</label>
                            <textarea type="text" class="form-control" id="description" name="description" value=""
                                placeholder="about hotel....">{{ $hotel->description }}</textarea>
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="meta_title" class="form-label fw-bold">Meta Title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title"
                                value="{{ $hotel->meta_title }}" placeholder="Meta Title....">
                            {{-- <span class="text-danger">{{ $errors->first('meta_title') }}</span> --}}
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="meta_description" class="form-label fw-bold">Meta Description</label>
                            <textarea type="text" class="form-control" id="meta_description" name="meta_description"
                                placeholder="Meta Description....">{{ $hotel->meta_description }}</textarea>
                            {{-- <span class="text-danger">{{ $errors->first('meta_description') }}</span> --}}
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="image" class="form-label fw-bold">Upload Thumbnail (Please upload image
                                dimension of
                                340 X 328 OR square size image)</label>
                            <input type="file" class="form-control" id="image" name="image" value="">
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                            <img class="mt-2" src="{{ asset($hotel->image) }}" width="150px" height="100px">
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="thumb_alt" class="form-label fw-bold">Thumbnail Alt Tag</label>
                            <input type="text" class="form-control" id="thumb_alt" name="thumb_alt"
                                value="{{ $hotel->thumb_alt }}" placeholder="Thumbnail Alt Tag....">
                            {{-- <span class="text-danger">{{ $errors->first('images') }}</span> --}}
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="package_image" class="form-label fw-bold">Upload Cover Image (Please upload image
                                dimension of 1140 X 300)</label>
                            <input type="file" class="form-control" id="package_image" name="package_image"
                                value="">
                            <span class="text-danger">{{ $errors->first('package_image') }}</span>
                            <img class="mt-2" src="{{ asset($hotel->package_image) }}" width="150px" height="100px">
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="package_alt" class="form-label fw-bold">Package Alt Tag</label>
                            <input type="text" class="form-control" id="package_alt" name="package_alt"
                                value="{{ $hotel->package_alt }}" placeholder="Package Alt Tag....">
                            {{-- <span class="text-danger">{{ $errors->first('images') }}</span> --}}
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="images" class="form-label fw-bold">Upload Hotel Images (Please upload images
                                with
                                dimensions of 834 X 411)</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                            {{-- @if (File::isDirectory(public_path('admin/uploads/hotels/' . $hotel->id)))
                                @foreach (File::files(public_path('admin/uploads/hotels/' . $hotel->id)) as $imagePath)
                                    <img class="m-2" src="{{ asset('admin/uploads/hotels/'.$hotel->id.'/'.basename($imagePath)) }}" width="250px" height="200px">
                                @endforeach
                            @endif --}}

                            @if ($hotel->images->isNotEmpty())
                                <div class="image-container">
                                    @foreach ($hotel->images as $key => $imagePath)
                                        <img class="crossimages border border-secondary border-4 rounded-3 m-2"
                                            src="{{ asset($imagePath['image']) }}" width="150px" height="100px">
                                        <span class="crossicon hotelImageDelete"
                                            onclick="hotelImageDelete({{ $hotel->id }},{{ $imagePath->id }})"
                                            title="Delete">
                                            <i class="bi bi-x-circle-fill fs-4 text-danger"></i>
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="gallery_alt" class="form-label fw-bold">Thumbnail Alt Tag</label>
                            <input type="text" class="form-control" id="gallery_alt" name="gallery_alt"
                                value="{{ $hotel->gallery_alt }}" placeholder="Thumbnail Alt Tag....">
                            {{-- <span class="text-danger">{{ $errors->first('gallery_alt') }}</span> --}}
                        </div>
                    </div>
                    <div class="d-flex gap-3 my-4">
                        <button type="submit" class="btn btn-success ms-2 px-5">Update</button>
                        <a href="{{ route('hotel-list') }}" class="btn btn-outline-danger ms-auto px-3 me-2">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    @push('scripts')
        <script>
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            function hotelImageDelete(hotelId, imageId) {
                var url = '{{ route('hotel.list.item.image.delete', ['hotelId' => ':hotelId', 'imageId' => ':imageId']) }}';
                url = url.replace(':hotelId', hotelId);
                url = url.replace(':imageId', imageId);

                $.ajax({
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    url: url,
                    success: function(response) {
                        $('.image-container').find('img[src$="' + response.deletedImagePath + '"]')
                            .parent().remove();
                        toastr.success(response.message);
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        toastr.error('Image hatane mein galti');
                    }
                });
            }
        </script>
    @endpush
@endsection
