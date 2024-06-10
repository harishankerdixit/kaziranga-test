@extends('admin.layouts.frontend')
@section('title', 'Package Page')
@section('meta_description', 'Package Page')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Package Page</h3>
            <div class="card-body">
                <form method="post" action="{{ route('page.mangement.package.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="title"><strong>Title</strong></label>
                        <input type="title" class="form-control" id="title" name="title" placeholder="Title"
                            value="{{ old('title', $package_page->title) }}">
                        @error('title')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
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
                            <img id="preview" src="{{ $package_page->path }}" style="margin:10px;max-height:150px;">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="banner_image_alt"><strong>Banner Image Alt</strong></label>
                        <input type="banner_image_alt" class="form-control" id="banner_image_alt" name="banner_image_alt"
                            placeholder="Banner Image Alt"
                            value="{{ old('banner_image_alt', $package_page->banner_image_alt) }}">
                        @error('banner_image_alt')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="meta_title"><strong>Meta Title</strong></label>
                        <input type="meta_title" class="form-control" id="meta_title" name="meta_title"
                            placeholder="Meta Title" value="{{ old('meta_title', $package_page->meta_title) }}">
                        @error('meta_title')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="meta_description"><strong>Meta Description</strong></label>
                        <textarea name="meta_description" class="form-control" rows="3" placeholder="Meta Description">{{ old('meta_description', $package_page->meta_description) }}</textarea>
                        @error('meta_description')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="section_1"><strong>Feature<strong></label>
                        <textarea name="section_1" class="form-control summernote" rows="3" placeholder="Feature">{{ old('section_1', $package_page->section_1) }}</textarea>
                        @error('section_1')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="section_2"><strong>Section 2<strong></label>
                        <textarea name="section_2" class="form-control summernote" rows="3" placeholder="Section 2">{{ old('section_2', $package_page->section_2) }}</textarea>
                        @error('section_2')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="section_3"><strong>Section 3<strong></label>
                        <textarea name="section_3" class="form-control summernote" rows="3" placeholder="Section 3">{{ old('section_3', $package_page->section_3) }}</textarea>
                        @error('section_3')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="section_4"><strong>Section 4<strong></label>
                        <textarea name="section_4" class="form-control summernote" rows="3" placeholder="Section 4">{{ old('section_4', $package_page->section_4) }}</textarea>
                        @error('section_4')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="section_5"><strong>Section 5<strong></label>
                        <textarea name="section_5" class="form-control summernote" rows="3" placeholder="Section 5">{{ old('section_5', $package_page->section_5) }}</textarea>
                        @error('section_5')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="section_6"><strong>Section 6<strong></label>
                        <textarea name="section_6" class="form-control summernote" rows="3" placeholder="Section 6">{{ old('section_6', $package_page->section_6) }}</textarea>
                        @error('section_6')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="section_7"><strong>Section 7<strong></label>
                        <textarea name="section_7" class="form-control summernote" rows="3" placeholder="Section 7">{{ old('section_7', $package_page->section_7) }}</textarea>
                        @error('section_7')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="section_8"><strong>Section 8<strong></label>
                        <textarea name="section_8" class="form-control summernote" rows="3" placeholder="Section 8">{{ old('section_8', $package_page->section_8) }}</textarea>
                        @error('section_8')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="section_9"><strong>Section 9<strong></label>
                        <textarea name="section_9" class="form-control summernote" rows="3" placeholder="Section 9">{{ old('section_9', $package_page->section_9) }}</textarea>
                        @error('section_9')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="section_10"><strong>Section 10<strong></label>
                        <textarea name="section_10" class="form-control summernote" rows="3" placeholder="Section 10">{{ old('section_10', $package_page->section_10) }}</textarea>
                        @error('section_10')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="row my-4">
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-success ms-2 px-5">Submit</button>
                        </div>
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
    </script>

@endsection
