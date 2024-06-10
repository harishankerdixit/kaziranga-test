@extends('admin.layouts.frontend')
@section('title', 'Localfood Page')
@section('meta_description', 'Localfood Page')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Local Foods Page</h3>
            <div class="card-body">
                <form method="post" action="{{ route('page.mangement.localfood.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="title"><strong>Title</strong></label>
                        <input type="title" class="form-control" id="title" name="title" placeholder="Title"
                            value="{{ old('title', $localfood_page->title) }}">
                        @error('title')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>


                    <div class="form-group mb-3">
                        <label for="meta_title"><strong>Meta Title</strong></label>
                        <input type="meta_title" class="form-control" id="meta_title" name="meta_title"
                            placeholder="Meta Title" value="{{ old('meta_title', $localfood_page->meta_title) }}">
                        @error('meta_title')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="meta_description"><strong>Meta Description</strong></label>
                        <textarea name="meta_description" class="form-control" rows="3" placeholder="Meta Description">{{ old('meta_description', $localfood_page->meta_description) }}</textarea>
                        @error('meta_description')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="section_1"><strong>Section 1<strong></label>
                        <textarea name="section_1" class="form-control summernote" rows="3" placeholder="Section">{{ old('section_1', $localfood_page->section_1) }}</textarea>
                        @error('section_1')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="section_2"><strong>Section 2<strong></label>
                        <textarea name="section_2" class="form-control summernote" rows="3" placeholder="Section">{{ old('section_2', $localfood_page->section_2) }}</textarea>
                        @error('section_2')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="section_3"><strong>Section 3<strong></label>
                        <textarea name="section_3" class="form-control summernote" rows="3" placeholder="Section">{{ old('section_3', $localfood_page->section_3) }}</textarea>
                        @error('section_3')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="section_4"><strong>Section 4<strong></label>
                        <textarea name="section_4" class="form-control summernote" rows="3" placeholder="Section">{{ old('section_4', $localfood_page->section_4) }}</textarea>
                        @error('section_4')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="section_5"><strong>Section 5<strong></label>
                        <textarea name="section_5" class="form-control summernote" rows="3" placeholder="Section">{{ old('section_5', $localfood_page->section_5) }}</textarea>
                        @error('section_5')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="section_6"><strong>Section 6<strong></label>
                        <textarea name="section_6" class="form-control summernote" rows="3" placeholder="Section">{{ old('section_6', $localfood_page->section_6) }}</textarea>
                        @error('section_6')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="section_7"><strong>Section 7<strong></label>
                        <textarea name="section_7" class="form-control summernote" rows="3" placeholder="Section">{{ old('section_7', $localfood_page->section_7) }}</textarea>
                        @error('section_7')
                            <code>
                                {{ $message }}
                            </code>
                        @enderror
                    </div>


                    <div class="row my-3">
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
