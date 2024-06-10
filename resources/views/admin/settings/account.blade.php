@extends('admin.layouts.frontend')
@section('title', 'My Account Details Settings')
@section('meta_description', 'Kaziranga My Account Details Settings')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">My Account</h3>
            <div class="card-body">
                <form method="post" action="{{ route('account.settings.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label for="name" class="form-label fw-bold">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $name ?? '' }}" placeholder="Full Name.." />
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $email ?? '' }}" placeholder="Email Address...." />
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="image" class="form-label fw-bold">Popup Image</label>
                            <input type="file" class="form-control" id="image" name="image" value=""
                                placeholder="Image...">
                            <img src="/admin/auth/{{ $image }}" class="mt-4" alt="Popup Image" width="400px"
                                height="200px" />
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
