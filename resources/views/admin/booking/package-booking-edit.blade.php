@extends('admin.layouts.frontend')
@section('title', 'Safari Booking Edit')
@section('meta_description', 'Kaziranga Safari Booking Edit Page')
@section('content')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Package Booking Details</h3>
            <div class="card-body py-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Booking Type</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Transaction ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Package</td>
                                <td>{{ $booking_details[0]['date'] }}</td>
                                <td>{{ $booking_details[0]['timing'] }}</td>
                                <td>{{ $booking_details[0]['total'] }}</td>
                                <td>{{ $booking_details[0]['payment_id'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Customer Details</h1>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm">
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

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Package Details</h1>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Package</th>
                                <th scope="col">Room Type</th>
                                <th scope="col">No. of Rooms</th>
                                <th scope="col">Adults</th>
                                <th scope="col">Kids</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $package->name??'' }}</td>
                                <td>{{ $category->category }}</td>
                                <td>{{ $booking_details[0]['rooms'] }}</td>
                                <td>{{ $booking_details[0]['adults'] }}</td>
                                <td>{{ $booking_details[0]['children'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
