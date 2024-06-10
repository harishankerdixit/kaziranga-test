@extends('admin.layouts.frontend')
@section('title', 'News List Add Item')
@section('meta_description', 'Kaziranga News List')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Add News</h3>
            <div class="card-body">
                <form method="post" action="{{ route('news.list.item.add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label for="date" class="form-label fw-bold">News Date</label>
                            <input type="date" class="form-control" id="date" name="date"
                                placeholder="News date">
                            @error('date')
                                <span class="text-danger fw-bold">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label for="description"><strong>News Description<strong></label>
                            <textarea name="description" class="form-control summernote" rows="3" placeholder="News Description"></textarea>
                            @error('description')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label for="url" class="form-label fw-bold">News Url</label>
                            <input type="url" class="form-control" id="url" name="url" placeholder="News Url">
                            @error('url')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label for="status" class="form-label fw-bold">Availability</label>
                            <select class="form-select" id="status" name="status">
                                <option value="">Select Availability</option>
                                <option value="1">Availability</option>
                                <option value="0">Not Availability</option>
                            </select>
                            @error('status')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        {{-- <div class="col-lg-12 mb-3">
                            <label for="meta_title" class="form-label fw-bold">Meta Title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title" value=""
                                placeholder="Meta Title....">
                        </div> --}}

                        {{-- <div class="col-lg-12 mb-3">
                            <label for="meta_description" class="form-label fw-bold">Meta Description</label>
                            <textarea type="text" class="form-control" id="meta_description" name="meta_description" value=""
                                placeholder="Meta Description...."></textarea>
                        </div> --}}
                    </div>

                    <div class="d-flex gap-3 my-4">
                        <button type="submit" class="btn btn-success ms-2 px-5">Submit</button>
                        <a href="{{ route('news-list') }}" class="btn btn-outline-danger ms-auto ">Back</a>
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
