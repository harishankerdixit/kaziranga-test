@extends('admin.layouts.frontend')
@section('title', 'News Details Settings')
@section('meta_description', 'Kaziranga News Details Settings')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Latest News</h3>
            <div class="card-body">
                <form method="post" action="{{ route('news.settings.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label for="news" class="form-label fw-bold">News</label>
                            <textarea type="text" class="form-control" id="news" name="news" value="" placeholder="News....">{{ $news ?? '' }}</textarea>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="status" class="form-label fw-bold">Show Popup</label>
                            <select class="form-select" id="status" name="status">
                                <option value="">--Select--</option>
                                <option value="1" @if ($status == '1') selected @endif>Yes</option>
                                <option value="0" @if ($status == '0') selected @endif>No</option>
                            </select>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="image" class="form-label fw-bold">Popup Image</label>
                            <input type="file" class="form-control" id="image" name="image" value=""
                                placeholder="Image...">
                            <img src="/admin/auth/{{ $image }}" alt="Popup Image" width="400px" height="200px" />
                        </div>
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
@endsection
