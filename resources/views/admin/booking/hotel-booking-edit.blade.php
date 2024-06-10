@extends('admin.layouts.frontend')
@section('title', 'Hotel Booking Edit')
@section('meta_description', 'Gir Lion Hotel Booking Edit Page')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Hotel Booking Details</h3>
            <div class="card-body py-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Type</th>
                                <th scope="col">Created Date</th>
                                {{-- <th scope="col">Time</th> --}}
                                <th scope="col">Amount</th>
                                <th scope="col">Transaction ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $booking_details[0]['type'] }}</td>
                                <td>{{ $booking_details[0]['created_at'] }}</td>
                                {{-- <td>{{ $booking_details[0]['timing'] }}</td> --}}
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

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Hotel Details</h1>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Hotel</th>
                                <th scope="col">Payment Pay</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Hotel Due Amount</th>
                                <th scope="col">Adults</th>
                                <th scope="col">Children</th>
                                <th scope="col">Rooms</th>
                                <th scope="col">Check In</th>
                                <th scope="col">Check Out</th>
                                <th scope="col">Room Category</th>
                                <th scope="col">Meal Plan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $hotel->name ?? '' }}</td>
                                <td>{{ $booking_details[0]['payment_value'] }}</td>
                                <td>{{ $booking_details[0]['total'] }}</td>
                                <td>{{ $booking_details[0]['hotel_due_amount'] ?? '0' }}</td>
                                <td>{{ $booking_details[0]['adults'] }}</td>
                                <td>{{ $booking_details[0]['children'] }}</td>
                                <td>{{ $booking_details[0]['rooms'] }}</td>
                                <td>{{ $booking_details[0]['check_in'] }}</td>
                                <td>{{ $booking_details[0]['check_out'] }}</td>
                                <td>{{ $booking_details[0]['room_category'] }}</td>
                                <td>{{ $booking_details[0]['meal_plan'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
