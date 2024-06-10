@extends('admin.layouts.frontend')
@section('title', 'About Gir Page ')
@section('meta_description', 'About Gir Page')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">About Gir Page</h3>
            <div class="card-body py-0">
                <form method="post" action="{{ route('page.mangement.about.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="mb-2"><strong>Title</strong></label>
                        <input type="title" class="form-control" id="title" name="title" placeholder="Title"
                            value="{{ old('title', $about_page->title) }}">
                        @error('title')
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
                            <img id="preview" src="{{ $about_page->path }}" style="margin:10px;max-height:150px;">
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label for="banner_image_alt"><strong>Banner Image Alt</strong></label>
                        <input type="banner_image_alt" class="form-control" id="banner_image_alt" name="banner_image_alt"
                            placeholder="Banner Image Alt"
                            value="{{ old('banner_image_alt', $about_page->banner_image_alt) }}">
                        @error('banner_image_alt')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="meta_title"><strong>Meta Title</strong></label>
                        <input type="meta_title" class="form-control" id="meta_title" name="meta_title"
                            placeholder="Meta Title" value="{{ old('meta_title', $about_page->meta_title) }}">
                        @error('meta_title')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="meta_description"><strong>Meta Description</strong></label>
                        <textarea name="meta_description" class="form-control" rows="3" placeholder="Meta Description">{{ old('meta_description', $about_page->meta_description) }}</textarea>
                        @error('meta_description')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="section_1"><strong>Section<strong></label>
                        <textarea name="section_1" class="form-control summernote" rows="3" placeholder="Section">{{ old('section_1', $about_page->section_1) }}</textarea>
                        @error('section_1')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="section_2"><strong>Section<strong></label>
                        <textarea name="section_2" class="form-control summernote" rows="3" placeholder="Section">{{ old('section_2', $about_page->section_2) }}</textarea>
                        @error('section_2')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="section_3"><strong>Section<strong></label>
                        <textarea name="section_3" class="form-control summernote" rows="3" placeholder="Section">{{ old('section_3', $about_page->section_3) }}</textarea>
                        @error('section_3')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>
                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-success ms-2 px-5">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    @push('scripts')
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
    @endpush
@endsection
