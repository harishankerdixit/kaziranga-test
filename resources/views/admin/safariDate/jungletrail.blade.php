@extends('admin.layouts.frontend')
@section('title', 'Jungle Trail')
@section('meta_description', 'Kaziranga Lion Manage Safari Date Jungle Trail')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header p-0 my-0">
                <div class="d-flex my-2 p-2 flex-column-mobile">
                    <div class="col-md-6">
                        <h3 class="p-2">Safari Dates</h3>
                    </div>
                    <div class="col-md-6 my-0">
                        <!-- Spinner -->
                        <div id="spinner" style="display: none; text-align: center;">
                            <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="form-label fw-bold" for="file_input" class="form-label">Import CSV
                                    file</label>
                                <input onchange="ImportCsv();" class="form-control" type="file" id="file_input">
                            </div>
                            <div class="d-flex align-items-end gap-3 col-lg-6">
                                <a href="{{ route('date.jungle.trail.create') }}" class=" btn btn-success mt-3 mt-lg-0"
                                    {{-- style="margin-top: 1.95rem !important;" --}}>
                                    Create Event
                                </a>

                                <button class=" btn btn-success mt-3 mt-lg-0" onclick="exportCsv();"
                                    {{-- style="margin-top: 1.95rem !important;" --}}>Export
                                    Data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="top_fields mt-0">
                    <form method="get" action="{{ route('getJungleTrail') }}">
                        <div class="row my-0">
                            <div class="col-lg-3 col-md-3 mb-2">
                                <label class="form-label fw-bold" for="filter_date" class="form-label">Filter by
                                    date</label>
                                <input type="date" class="form-control" id="filter_date" name="filter_date"
                                    value="{{ $filter_date }}">
                            </div>
                            <div class="col-lg-3 col-md-3 mb-2">
                                <div class="form-group">
                                    <label class="form-label fw-bold" for="filter_time">Time</label>
                                    <select class="form-control" id="filter_time" name="filter_time">
                                        <option value="">Select Time</option>
                                        <option value="7:30 AM to 10:00 AM"
                                            {{ $filter_time == '7:30 AM to 10:00 AM' ? 'selected' : '' }}>
                                            7:30 AM to 10:00 AM
                                        </option>
                                        <option value="1:30 PM to 3:00 PM"
                                            {{ $filter_time == '1:30 PM to 3:00 PM' ? 'selected' : '' }}>
                                            1:30 PM to 3:00 PM
                                        </option>
                                        <option value="5:30 AM to 6:00 AM"
                                            {{ $filter_time == '5:30 AM to 6:00 AM' ? 'selected' : '' }}>
                                            5:30 AM to 6:00 AM
                                        </option>
                                        <option value="6:00 AM to 7:00 AM"
                                            {{ $filter_time == '6:00 AM to 7:00 AM' ? 'selected' : '' }}>
                                            6:00 AM to 7:00 AM
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 mb-2">
                                <div class="form-group">
                                    <label class="form-label fw-bold" for="filter_mode">Mode</label>
                                    <select class="form-control" id="filter_mode" name="filter_mode">
                                        <option value="" disabled selected>Select Mode</option>
                                        <option value="jeep" {{ $filter_mode == 'jeep' ? 'selected' : '' }}>
                                            Jeep
                                        </option>
                                        <option value="elephant" {{ $filter_mode == 'elephant' ? 'selected' : '' }}>
                                            elephant
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 mb-2">
                                <div class="form-group">
                                    <label class="form-label fw-bold" for="filter_zone">Zone</label>
                                    <select class="form-control" id="filter_zone" name="filter_zone">
                                        <option value="">Select Zone</option>
                                        <option value="Kaziranga Range, Kohora"
                                            {{ $filter_zone == 'Kaziranga Range, Kohora' ? 'selected' : '' }}>Kaziranga
                                            Range, Kohora
                                        </option>
                                        <option value="Western Range, Bagori"
                                            {{ $filter_zone == 'Western Range, Bagori' ? 'selected' : '' }}>Western Range,
                                            Bagori
                                        </option>
                                        <option value="Burapahar Range, Ghorakati"
                                            {{ $filter_zone == 'Burapahar Range, Ghorakati' ? 'selected' : '' }}>Burapahar
                                            Range, Ghorakati</option>
                                        <option value="Eastern Range, Agaratoli"
                                            {{ $filter_zone == 'Eastern Range, Agaratoli' ? 'selected' : '' }}>Eastern
                                            Range, Agaratoli</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 mb-3 mb-md-0">
                                <div class="form-group">
                                    <label class="form-label fw-bold" for="filter_availability">Availability</label>
                                    <select class="form-control" id="filter_availability" name="filter_availability">
                                        <option value="">Select Availability</option>
                                        <option value="1" {{ $filter_availability == '1' ? 'selected' : '' }}>Yes
                                        </option>
                                        <option value="0" {{ $filter_availability == '0' ? 'selected' : '' }}>No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex align-items-end gap-3 col-lg-6">
                                <button type="submit" class="btn btn-primary">Filter</button>
                                <a href="{{ route('getJungleTrail') }}" class="btn btn-primary">Clear Filter</a>
                                <a href="{{ route('deleteAllDates') }}" class="btn btn-danger delete-button">
                                    Delete All Dates
                                </a>
                            </div>
                        </div>
                    </form>
                    <div class="tabsection jungle">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr. No.</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Mode</th>
                                        <th scope="col">Zone</th>
                                        <th scope="col">Availability</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($dates??[] as $date)
                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>
                                            <td>{{ $date['date'] }}</td>
                                            <td>{{ $date['time'] }}</td>
                                            <td>{{ ucfirst($date['mode']) }}</td>
                                            <td>{{ $date['zone'] }}</td>
                                            <td>
                                                <label class="switch availability-switch"
                                                    onchange="checkAvailability({{ $date['id'] }});">
                                                    <input type="checkbox" {{ $date['status'] == 1 ? 'checked' : '' }}
                                                        data-val="{{ $date['id'] }}">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td>
                                                {{-- <div class="btn-group" role="group">
                                                    <a href="{{ route('date.jungle.trail.edit', $date['id']) }}"
                                                        class="btn btn-warning"
                                                        style="height: 9%; margin-top: 30%; margin-right: 10%;">
                                                        <i class="bi bi-pencil-fill"></i>
                                                    </a>
                                                    <form action="{{ route('date.jungle.trail.delete', $date['id']) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">
                                                            <span data-feather="trash"></span>
                                                        </button>
                                                    </form>
                                                </div> --}}
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example">
                                                    <a href="{{ route('date.jungle.trail.edit', $date['id']) }}"
                                                        class="btn btn-warning">
                                                        <i class="fa-solid fa-pen"></i>
                                                    </a>
                                                    <a href="{{ route('date.jungle.trail.delete', $date['id']) }}"
                                                        class="btn btn-danger">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
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
                            <p><b>Total records: {{ $dates->total() }}, Displaying records {{ $dates->firstItem() }} to
                                    {{ $dates->lastItem() }} of {{ $dates->total() }}</b></p>
                            {{ $dates->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.delete-button').on('click', function(event) {
                    var confirmed = confirm('Are you sure you want to delete all dates?');
                    if (!confirmed) {
                        event.preventDefault();
                    }
                });
            });

            function checkAvailability(id) {
                var checkbox = $('input[data-val="' + id + '"]');
                var newAvailability = checkbox.prop('checked') ? 1 : 0;

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '{{ route('date.jungle.trail.updateAvailability') }}',
                    data: JSON.stringify({
                        'id': id,
                        'newAvailability': newAvailability
                    }),
                    contentType: 'application/json',
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.msg,
                        });
                    },
                    error: function(error) {
                        console.error(error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Failed to update availability. Please try again later.',
                        });
                    }
                });
            }

            function ImportCsv() {
                // Show the spinner
                $('#spinner').show();

                var fileInput = $('#file_input')[0];
                var file = fileInput.files[0];
                var formData = new FormData();
                formData.append('file', file);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '{{ route('date.jungle.trail.importcsv') }}',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Hide the spinner on success
                        $('#spinner').hide();

                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.msg,
                        });
                        setTimeout(() => {
                            location.reload()
                        }, 1000);
                    },
                    error: function(error) {
                        // Hide the spinner on error
                        $('#spinner').hide();

                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Failed to update availability. Please try again later.',
                        });
                    }
                });
            }


            function exportCsv() {
                var filter_name = $('#filter_name').val();
                var filter_mobile = $('#filter_mobile').val();
                var filter_email = $('#filter_email').val();
                var filter_order_date = $('#filter_order_date').val();
                var filter_date = $('#filter_date').val();
                var filter_time = $('#filter_time').val();
                var filter_user = $('#filter_user').val();
                var filter_website = $('#filter_website').val();
                var filter_type = $('#filter_type').val();
                var type_safari = $('#type_safari').val();
                var filter_payment_status = $('#filter_payment_status').val();
                var filter_sanctuary = $('#filter_sanctuary').val();
                var filter_daterange = $('#filter_daterange').val();
                var filter_id = $('#filter_id').val();
                var filter_vendor = $('#filter_vendor').val();

                $.ajax({
                    url: '{{ route('export-csv') }}',
                    method: 'GET',
                    data: {
                        'filter_date': filter_date,
                    },
                    success: function(data) {
                        var blob = new Blob([data], {
                            type: 'text/csv'
                        });

                        var link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        var currentDate = new Date();
                        var formattedDate = currentDate.toISOString().slice(0, 19).replace("T", " ");
                        var csvFileName = 'kaziranga_date_import_' + formattedDate + '.csv';
                        link.download = csvFileName;
                        link.click();
                    }
                });
            }
        </script>
    @endpush
@endsection
