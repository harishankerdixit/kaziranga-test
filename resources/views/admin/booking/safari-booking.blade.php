@extends('admin.layouts.frontend')
@section('title', 'Safari Booking')
@section('meta_description', 'Kaziranga Safari Booking')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Safari Booking</h3>
            <div class="card-body pb-0">
                <div class="top_fields">
                    <form method="get" action="{{ route('safari-booking', ['type' => 'safari']) }}">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 mb-2">
                                <label for="filter_user" class="form-label">Customer Name</label>
                                <input type="text" class="form-control" id="filter_user" name="filter_user"
                                    value="{{ $filter_user ?? '' }}" placeholder="Customer Name">
                            </div>
                            <div class="col-lg-3 col-md-3 mb-2">
                                <label for="filter_phone" class="form-label">Customer Number</label>
                                <input type="text" class="form-control" id="filter_phone" name="filter_phone"
                                    value="{{ $filter_phone ?? '' }}" placeholder="Customer Number">
                            </div>
                            <div class="col-lg-3 col-md-3 mb-2">
                                <label for="filter_email" class="form-label">Customer Email</label>
                                <input type="email" class="form-control" id="filter_email" name="filter_email"
                                    value="{{ $filter_email ?? '' }}" placeholder="Customer Email">
                            </div>
                            <div class="col-lg-3 col-md-3 mb-2">
                                <label for="filter_date" class="form-label">Booking Date</label>
                                <input type="date" class="form-control" id="filter_date" name="filter_date"
                                    value="{{ $filter_date ?? '' }}">
                            </div>
                            <div class="col-lg-3 col-md-3 mb-2">
                                <label for="" class="form-label">Booking Type</label>
                                <select name="filter_booking_type" id="filter_booking_type" class="form-control">
                                    <option value="">--Select Safari Type--</option>
                                    <option value="jungle_trail"
                                        {{ $filter_booking_type == 'jungle_trail' ? 'selected' : '' }}>Kaziranga
                                        Jungle Trail</option>
                                    <option value="devalia" {{ $filter_booking_type == 'devalia' ? 'selected' : '' }}>
                                        Devalia Safari
                                    </option>
                                    <option value="kankai" {{ $filter_booking_type == 'kankai' ? 'selected' : '' }}>Kankai
                                        Temple
                                        Safari</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-3 mb-2">
                                <label for="" class="form-label">Payment Status</label>
                                <select name="filter_status" id="filter_status" class="form-control">
                                    <option value="">--Select Payment Status--</option>
                                    <option value="pending" {{ $filter_status == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="partially-paid"
                                        {{ $filter_status == 'partially-paid' ? 'selected' : '' }}>
                                        Partially Paid</option>
                                    <option value="paid" {{ $filter_status == 'paid' ? 'selected' : '' }}>Paid</option>
                                </select>
                            </div>

                            <div class="col-lg-3 col-md-3 mb-2">
                                <label for="filter_created_date" class="form-label">Created Date</label>
                                <input type="date" class="form-control" id="filter_created_date"
                                    name="filter_created_date" value="{{ $filter_created_date ?? '' }}">
                            </div>
                            <div class="d-flex align-items-end gap-3 col-lg-3 mb-2">
                                <button type="submit" class="btn btn-primary">Filter</button>

                                <a href="{{ route('safari-booking', ['type' => 'safari']) }}" class="btn btn-primary">Clear
                                    Filter</a>
                            </div>

                        </div>
                    </form>

                    <div class="tabsection jungle">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Zone</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Customer Email</th>
                                        <th scope="col">Customer Phone</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Payment Status</th>
                                        <th scope="col">Created at</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($bookings??[] as $booking)
                                        <tr>
                                            <td>{{ $booking->date }}</td>
                                            <td>{{ $booking->zone }}</td>
                                            {{-- <td>Safari</td> --}}
                                            <td>{{ $booking->user->name }}</td>
                                            <td>{{ $booking->user->email }}</td>
                                            <td>{{ $booking->user->phone }}</td>
                                            <td>{{ $booking->total }}</td>
                                            <td>{{ $booking->status }}</td>
                                            <td>{{ $booking->created_at }}</td>
                                            <td>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example">
                                                    <a href="{{ route('safari-booking-edit', $booking->id) }}"
                                                        class="btn btn-warning">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <a href="{{ route('safari-booking.delete', $booking->id) }}"
                                                        class="btn btn-danger">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">
                                                <h6>Records Not Found.</h1>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination-container">
                            <p><b>Total records: {{ $bookings->total() }}, Displaying records {{ $bookings->firstItem() }}
                                    to
                                    {{ $bookings->lastItem() }} of {{ $bookings->total() }}</b></p>
                            {{ $bookings->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
