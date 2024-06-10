@extends('admin.layouts.frontend')
@section('title', 'Devalia')
@section('meta_description', 'Kaziranga Manage Safari Date Devalia')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header p-0 my-0">

                <div class="row">
                    <div class="col-md-6">
                        <h3>Kaziranga Devalia Safari</h3>
                    </div>
                    <div class="col-md-6 my-0">
                        <div class="row my-0">
                            <div class="col-6 my-0">
                                <label for="file_input" class="form-label">Import CSV file</label>
                                <input onchange="ImportCsv();" class="form-control" type="file" id="file_input">
                            </div>
                            <div class="col-3 my-0 pe-0">
                                <a href="{{ route('date.devalia.trail.create') }}" class=" btn btn-success"
                                    style="margin-top: 1.95rem !important;">
                                    Create Event
                                </a>
                            </div>
                            <div class="col-3 my-0 ps-0">
                                <button class=" btn btn-success" onclick="exportCsv();"
                                    style="margin-top: 1.95rem !important;">Export Data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body py-0">
                <div class="top_fields mt-0">
                    <form method="get" action="{{ route('getdevaliaTrail') }}">
                        <div class="row my-0">
                            <div class="col-sm-3">
                                <label for="filter_date" class="form-label">Filter by date</label>
                                <input type="date" class="form-control" id="filter_date" name="filter_date"
                                    value="{{ $filter_date ?? '' }}">
                            </div>
                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                            <div class="col-sm-2">
                                <a href="{{ route('getdevaliaTrail') }}" class="btn btn-primary"
                                    style="margin-top: 1.80rem !important;">Clear Filter</a>
                            </div>
                        </div>
                    </form>
                    <div class="tabsection jungle">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Booking Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Availability</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($dates??[] as $date)
                                        <tr>
                                            <td>{{ $date['date'] }}</td>
                                            <td>{{ $date['time'] }}</td>
                                            <td>
                                                <label class="switch availability-switch"
                                                    onchange="checkAvailability({{ $date['id'] }});">
                                                    <input type="checkbox" {{ $date['status'] == 1 ? 'checked' : '' }}
                                                        data-val="{{ $date['id'] }}">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('date.devalia.trail.edit', $date['id']) }}"
                                                        class="btn btn-warning"
                                                        style="height: 9%; margin-top: 30%; margin-right: 10%;">
                                                        <i class="bi bi-pencil-fill"></i>
                                                    </a>
                                                    <form action="{{ route('date.devalia.trail.delete', $date['id']) }}"
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
                                            <td colspan="4" class="text-center">
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

    <script>
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
                url: '{{ route('date.devalia.trail.updateAvailability') }}',
                data: JSON.stringify({
                    'id': id,
                    'newAvailability': newAvailability
                }),
                contentType: 'application/json',
                dataType: 'json',
                success: function(response) {
                    // Handle the success response

                    // Show a success popup
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.msg,
                    });
                },
                error: function(error) {
                    // Handle the error response
                    console.error(error);

                    // Show an error popup
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to update availability. Please try again later.',
                    });
                }
            });
        }

        function ImportCsv() {
            var fileInput = document.getElementById('file_input');
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
                url: '{{ route('date.devalia.trail.importcsv') }}',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.msg,
                    });
                },
                error: function(error) {
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
                url: '{{ route('dev-export-csv') }}',
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
                    var csvFileName = 'devalia_date_' + formattedDate + '.csv';

                    link.download = csvFileName;

                    link.click();
                }
            });
        }
    </script>

@endsection
