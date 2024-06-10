@extends('admin.layouts.frontend')
@section('title', 'Razorpay Settings')
@section('meta_description', 'Kaziranga Razorpay Settings')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Razorpay Settings</h3>
            <div class="card-body">
                <img src="/admin/auth/razorpay.png" alt="razorpay logo" width="200rem" height="auto" />

                <form method="post" action="{{ route('razorpay.settings.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label for="razorpay_key" class="form-label fw-bold">Razorpay Key</label>
                            <input type="text" class="form-control" id="razorpay_key" name="razorpay_key"
                                value="{{ $razorpay_key ?? '' }}" placeholder="Razorpay Key....">
                        </div>

                        <div class="col-lg-12">
                            <label for="razorpay_secret_key" class="form-label fw-bold">Razorpay Secret Key</label>
                            <input type="text" class="form-control" id="razorpay_secret_key" name="razorpay_secret_key"
                                value="{{ $razorpay_secret_key ?? '' }}" placeholder="Razorpay Secret Key....">
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
