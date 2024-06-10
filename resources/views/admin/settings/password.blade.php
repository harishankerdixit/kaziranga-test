@extends('admin.layouts.frontend')
@section('title', 'Change Account Password Settings')
@section('meta_description', 'Kaziranga Change Account Password Settings')
@section('content')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Change Password</h3>
            <div class="card-body">
                <form method="post" action="{{ route('password.settings.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label for="current_password" class="form-label fw-bold">Current password*</label>
                            <input type="password" class="form-control" id="current_password" name="current_password"
                                placeholder="Current password*...." />
                        </div>


                        <div class="col-lg-12 mb-3">
                            <label for="new_password" class="form-label fw-bold">New password*</label>
                            <input type="password" class="form-control" id="new_password" name="new_password"
                                placeholder="New password*...." />
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="new_password_confirmation" class="form-label fw-bold">New password
                                confirmation*</label>
                            <input type="password" class="form-control" id="new_password_confirmation"
                                name="new_password_confirmation" placeholder="New password confirmation*...." />
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-success ms-2 px-5">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </main>
@endsection
