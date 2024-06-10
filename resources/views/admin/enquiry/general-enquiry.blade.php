@extends('admin.layouts.frontend')
@section('title', 'Contact Enquiry List')
@section('meta_description', 'Kaziranga Booking Contact Enquiry List')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Contact Enquiries</h3>
            <div class="card-body">
                <div class="top_fields">

                    <form method="get" action="{{ route('general-enquiry-list') }}">
                        <div class="row">
                            <div class="col-lg-3 mb-lg-3 mb-2">
                                <label for="filter_name" class="form-label">Filter by name</label>
                                <input type="text" class="form-control" id="filter_name" name="filter_name"
                                    value="{{ $filter_name ?? '' }}" placeholder="Filter by name...">
                            </div>
                            <div class="col-lg-3 mb-2">
                                <label for="filter_number" class="form-label">Filter by number</label>
                                <input type="text" class="form-control" id="filter_number" name="filter_number"
                                    value="{{ $filter_number ?? '' }}" placeholder="Filter by number...">
                            </div>
                            <div class="col-lg-3 mb-2">
                                <label for="filter_booking_date" class="form-label">Filter by Booking Date</label>
                                <input type="date" class="form-control" id="filter_booking_date"
                                    name="filter_booking_date" value="{{ $filter_booking_date ?? '' }}"
                                    placeholder="Filter by email...">
                            </div>
                            <div class="col-lg-3 mb-2">
                                <label for="filter_booking_created" class="form-label">Filter by Booking Date</label>
                                <input type="date" class="form-control" id="filter_booking_created"
                                    name="filter_booking_created" value="{{ $filter_booking_created ?? '' }}"
                                    placeholder="Filter by email...">
                            </div>
                            <div class="col-lg-4 d-flex gap-3 my-2">
                                <button type="submit" class="btn btn-primary">Filter</button>

                                <a href="{{ route('general-enquiry-list') }}" class="btn btn-primary">Clear Filter</a>
                            </div>
                        </div>
                    </form>

                    <div class="tabsection jungle">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Booking Date</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($customers as $customer)
                                        <tr>
                                            <td>{{ $customer['id'] }}</td>
                                            <td>{{ $customer['booking_date'] }}</td>
                                            <td>{{ $customer['traveller_name'] }}</td>
                                            <td>{{ $customer['mobile_no'] }}</td>
                                            <td>{{ $customer['message'] }}</td>
                                            <td>{{ $customer['created_at'] }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <form action="{{ route('general.enquiry.delete', $customer['id']) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">
                                                            <span data-feather="trash"></span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">
                                                <h6>Records Not Found.</h1>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination-container">
                            <p><b>Total records: {{ $customers->total() }}, Displaying records
                                    {{ $customers->firstItem() }} to
                                    {{ $customers->lastItem() }} of {{ $customers->total() }}</b></p>
                            {{ $customers->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
