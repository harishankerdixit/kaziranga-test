@extends('admin.layouts.frontend')
@section('title', 'Safari Booking Details')
@section('meta_description', 'Kaziranga Safari Booking Details Page')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Safari Booking Details</h3>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Booking Zone</th>
                                <th scope="col">Mode</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Transaction ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $booking_details[0]['zone'] }}</td>
                                <td>{{ $booking_details[0]['vehicle'] }}</td>
                                <td>{{ $booking_details[0]['date'] }}</td>
                                <td>{{ $booking_details[0]['timing'] }}</td>
                                <td>{{ $booking_details[0]['total'] }}</td>
                                <td>{{ $booking_details[0]['payment_id'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- @php
            dump($users->toArray());
        @endphp --}}
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Customer Details</h3>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Mobile Number</th>
                                <th scope="col">Email</th>
                                <th scope="col">State</th>
                                <th scope="col">Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $users[0]['name'] }}</td>
                                <td>{{ $users[0]['phone'] }}</td>
                                <td>{{ $users[0]['email'] }}</td>
                                <td>{{ $users[0]['state'] }}</td>
                                <td>{{ $users[0]['address'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Traveller Details</h3>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Age</th>
                                <th scope="col">Customer Type</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Nationality</th>
                                <th scope="col">State/Country</th>
                                <th scope="col">Id Proof Type</th>
                                <th scope="col">Id Proof Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($traveller_details as $details)
                                <tr>
                                    <td>{{ $details->name }}</td>
                                    <td>{{ $details->age }}</td>
                                    <td>{{ $details->type }}</td>
                                    <td>{{ $details->gender }}</td>
                                    <td>{{ $details->nationality }}</td>
                                    <td>{{ $details->state }}</td>
                                    <td>{{ $details->idproof }}</td>
                                    <td>{{ $details->idproof_number }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
