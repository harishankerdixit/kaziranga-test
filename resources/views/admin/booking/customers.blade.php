@extends('admin.layouts.frontend')
@section('title', 'Customers List')
@section('meta_description', 'Kaziranga Booking customers List')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Customers Booking</h3>
            <div class="card-body pb-0">
                <div class="top_fields">
                    <form method="get" action="{{ route('customers-list') }}">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 mb-2">
                                <label for="filter_name" class="form-label">Filter by name</label>
                                <input type="text" class="form-control" id="filter_name" name="filter_name"
                                    value="{{ $filter_name ?? '' }}" placeholder="Filter by name...">
                            </div>
                            <div class="col-lg-3 col-md-4 mb-2">
                                <label for="filter_number" class="form-label">Filter by number</label>
                                <input type="text" class="form-control" id="filter_number" name="filter_number"
                                    value="{{ $filter_number ?? '' }}" placeholder="Filter by number...">
                            </div>
                            <div class="col-lg-3 col-md-4 mb-2">
                                <label for="filter_email" class="form-label">Filter by email</label>
                                <input type="email" class="form-control" id="filter_email" name="filter_email"
                                    value="{{ $filter_email ?? '' }}" placeholder="Filter by email...">
                            </div>
                            <div class="d-flex gap-3 align-items-end col-md-6 col-lg-3 mb-2">
                                <button type="submit" class="btn btn-primary">Filter</button>

                                <a href="{{ route('customers-list') }}" class="btn btn-primary">Clear Filter</a>
                            </div>
                        </div>
                    </form>

                    <div class="tabsection jungle">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Date/TIme</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Mobile No.</th>
                                        <th scope="col">Email.</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($customers??[] as $customer)
                                        <tr>
                                            <td>{{ $customer['created_at'] }}</td>
                                            <td>{{ $customer['name'] }}</td>
                                            <td>{{ $customer['phone'] }}</td>
                                            <td>{{ $customer['email'] }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <form action="{{ route('customer.delete', $customer['id']) }}"
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

    {{-- <script>
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
                url: '{{ route("date.jungle.trail.updateAvailability") }}',
                data: JSON.stringify({ 'id': id, 'newAvailability': newAvailability }),
                contentType: 'application/json',
                dataType: 'json',
                success: function (response) {
                    // Handle the success response

                    // Show a success popup
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.msg,
                    });
                },
                error: function (error) {
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

        function ImportCsv(){
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
                url: '{{ route("date.jungle.trail.importcsv") }}',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.msg,
                    });
                },
                error: function (error) {
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
              url: '{{ route("export-csv") }}',
              method: 'GET',
              data: {
                  'filter_date': filter_date,
              },
              success: function (data) {
                  var blob = new Blob([data], { type: 'text/csv' });

                  var link = document.createElement('a');
                  link.href = window.URL.createObjectURL(blob);

                  var currentDate = new Date();
                  var formattedDate = currentDate.toISOString().slice(0, 19).replace("T", " ");
                  var csvFileName = 'jungle_trail_date_' + formattedDate + '.csv';

                  link.download = csvFileName;

                  link.click();
              }
          });
}
    </script> --}}
@endsection
