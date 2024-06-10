@extends('admin.layouts.frontend')
@section('title', 'Add SEO')
@section('meta_description', 'Kaziranga Add SEO')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Add Seo</h3>
            <div class="card-body">
                <form method="post" action="{{ route('seo.manager.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <label for="url" class="form-label fw-bold">URL</label>
                            <input type="text" class="form-control" id="url" name="url" value=""
                                placeholder="URL..">
                        </div>

                        <div class="col-lg-12 mb-2">
                            <label for="meta_title" class="form-label fw-bold">Meta Title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title" value=""
                                placeholder="Meta Title....">
                        </div>

                        <div class="col-lg-12 mb-2">
                            <label for="meta_description" class="form-label fw-bold">Meta Description</label>
                            <input type="text" class="form-control" id="meta_description" name="meta_description"
                                value="" placeholder="Meta Description..">
                        </div>
                    </div>

                    <div class="d-flex gap-3 my-3">
                        <button type="submit" class="btn btn-success px-5">Submit</button>
                        <a href="{{ route('seo-manager-view') }}" class="btn btn-outline-danger ms-auto px-5 me-2">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
