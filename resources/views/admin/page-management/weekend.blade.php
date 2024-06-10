@extends('admin.layouts.frontend')
@section('title', 'Weekend Page')
@section('meta_description', 'Weekend Page')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Weekend Page</h3>
            <div class="card-body">
                <form method="post" action="{{ route('page.mangement.term.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title"><strong>Title</strong></label>
                        <textarea type="text" class="form-control summernote" id="title" name="title" placeholder="Title"
                            value="">{{ old('title', $weekend_page->title) }}</textarea>
                        @error('title')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="heading"><strong>Heading</strong></label>
                        <input type="text" class="form-control" id="heading" name="heading" placeholder="heading"
                            value="{{ old('heading', $weekend_page->heading) }}">
                        @error('heading')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="sub_heading"><strong>Sub Heading</strong></label>
                        <input type="text" class="form-control" id="sub_heading" name="sub_heading"
                            placeholder="sub_heading" value="{{ old('sub_heading', $weekend_page->sub_heading) }}">
                        @error('sub_heading')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>


                    <div class="form-group mt-3">
                        <label for="images"><strong>Banner Image</strong></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" multiple
                                    onchange="preview_image(this);">
                            </div>
                        </div>
                        @error('image')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                        <div>
                            <img id="preview" src="{{ $weekend_page->path }}" style="margin:10px;max-height:150px;">
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label for="banner_image_alt"><strong>Banner Image Alt</strong></label>
                        <input type="banner_image_alt" class="form-control" id="banner_image_alt" name="banner_image_alt"
                            placeholder="Banner Image Alt"
                            value="{{ old('banner_image_alt', $weekend_page->banner_image_alt) }}">
                        @error('banner_image_alt')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="offer_status" class="form-label fw-bold">Offer Status</label>
                        <select class="form-select" id="offer_status" name="offer_status">
                            <option value="">Select offer Status</option>
                            <option value="1" {{ $weekend_page->status == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ $weekend_page->status == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="meta_title"><strong>Meta Title</strong></label>
                        <textarea type="text" class="form-control" id="meta_title" name="meta_title" placeholder="meta_title" value="">{{ old('meta_title', $weekend_page->meta_title) }}</textarea>
                        @error('meta_title')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="meta_description"><strong>Meta Description</strong></label>
                        <textarea type="text" class="form-control" id="meta_description" name="meta_description"
                            placeholder="meta_description" value="">{{ old('meta_description', $weekend_page->meta_description) }}</textarea>
                        @error('meta_description')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div id="sheriList">
                        @if (!empty($weekend_attr))
                            @foreach ($weekend_attr as $ind => $fest)
                                @if ($ind == 0)
                                    <div class="" style="float: right;padding: 19px;">
                                        <input type="button" onClick="addMoreHotelDiv({{ $ind }})"
                                            class="btn btn-primary" value="Add More Hotel">
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                    <div class="row my-4">
                        <button type="submit" class="btn btn-success ms-2 px-5">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        function preview_image(input, id) {
            id = id || '#preview';
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(id)
                        .attr('src', e.target.result)
                    // .width(150)
                    // .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300, // Set the desired height of the editor
                // Add any other Summernote options you want to customize
            });
        });


        var addedElements = [];
        // var elementNum = 1;
        var j = 0
        var hotelNum = 0;

        function addMoreOffer(rowNum, udata = '') {
            if (udata != '') {
                var u_data = udata;
            } else {
                var u_data = "data";
            }

            // if(elementNum<=4)
            // {
            let newRaw = `<div class="form-group row" id="listOffer">
                                    <div class="col-sm-4 mb-3">
                                        <label for="name">Hotel Offer List</label>
                                        <input type="name" class="form-control" id="hotel_offers" name="${u_data}[${rowNum}][hotel][left_offer][]" placeholder="Left Side Title" value="">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="name">Hotel Offer List</label>
                                        <input type="name" class="form-control" id="hotel_offers" name="${u_data}[${rowNum}][hotel][right_offer][]" placeholder="Right Side Title" value="">
                                    </div>
                                    <div class="col-sm-2 mt-4">
                                        <label for="addBtn"></label>
                                        <button type="button" id="DeleteRow" class="btn btn-danger">X</button>
                                    </div>
                            </div>`;
            $(".more-feilds_" + rowNum).append(newRaw);
            addedElements.push(newRaw);
            // elementNum++;
            j++;
            // }else{
            //     alert("You can not add more than 4 element.");
            // }


        }

        $("body").on("click", "#DeleteRow", function() {
            $(this).parents("#listOffer").remove();
            // elementNum--;
        });
        $("body").on("click", "#removeBlockDiv", function() {
            $(this).parents("#addMoreBlock").remove();
            // elementNum--;
        });


        function addMoreHotelDiv() {
            ++hotelNum;
            let newBlock = `<div id="addMoreBlock">
                            <div class="form-group row">
                                <div class="col-sm-8 mb-3">
                                        <label for="hotel_title">Hotel Title</label>
                                        <input type="text" class="form-control" id="hotel_title" name="data[${hotelNum}][hotel][hotel_title]" placeholder="Corbett River Side Resort" value="">
                                </div>
                                <div class="col-sm-4 mt-4">
                                        <button type="button" id="removeBlockDiv" class="btn btn-danger">Remove Block</button>
                                </div>
                            </div>
                            <div class="form-group row">
                            <div class=" col-sm-4 mb-3 custom-file">
                                <label for="section_1">Section 1 - Corbett River Side Resort images</label>
                                    <input type="file" class="custom-file-input" id="section_1" name="data[${hotelNum}][hotel][hotel_images][]"
                                        multiple onchange="preview_image(this);">
                                    <input type="hidden" class="custom-file-input" id="old_section_1" name="old_hotel_images[]" value="">
                                </div>
                                <div>
                                </div>
                            </div>

                                <div class="form-group row" id="listOffer">
                                    <div class="col-sm-4 mb-3">
                                            <label for="name">Hotel Offer List</label>
                                            <input type="name" class="form-control" id="hotel_offers" name="data[${hotelNum}][hotel][left_offer][]" placeholder="Left Side Title" value="">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                            <label for="name">Hotel Offer List</label>
                                            <input type="name" class="form-control" id="hotel_offers" name="data[${hotelNum}][hotel][right_offer][]" placeholder="Right Side Title" value="">
                                    </div>
                                    <div class="col-sm-2 mt-4">
                                        <label for="addBtn"></label>
                                        <input type="button" onClick="addMoreOffer(${hotelNum})" class="btn btn-primary" id="addBtn" name="addBtn" placeholder="Left Side Title" value="+">
                                    </div>
                                </div>
                                <div class="more-feilds_${hotelNum}"></div>
                        </div>`;
            $("#addMoreSection").append(newBlock);
        }

        $("body").on("click", "#removeBlockDiv", function() {
            let dataID = $(this).attr('data-id')
            if (confirm("Are you sure you want to delete this?")) {
                $.ajax({
                    url: 'removeHotel/' + dataID,
                    type: 'GET',
                    dataType: "JSON",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(resp) {
                        $(this).parents("#addMoreBlock").remove();
                        alert("Hotel removed successfully")
                    }
                })
            } else {
                return false;
            }

        });
    </script>

@endsection
