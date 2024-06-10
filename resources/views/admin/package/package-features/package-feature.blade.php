@extends('admin.layouts.frontend')
@section('title', 'Package Features')
@section('meta_description', 'Kaziranga Package Features List')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Package Features</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('feature.add.view.index') }}" class="btn btn-success float-end me-3 px-5">Add
                            Feature</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="d-flex flex-wrap">
                        @foreach ($UpdateFeature as $update)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="amenityCheckbox{{ $update['id'] }}"
                                    value="{{ $update['name'] }}"
                                    onchange="updateAmenityStatus('{{ $update['id'] }}', this.checked)"
                                    {{ in_array($update['id'], $getFeaturesId) ? 'checked' : '' }}>
                                <label class="form-check-label" for="amenityCheckbox{{ $update['id'] }}"
                                    style="margin-right:10px;">{{ strtoupper($update['name']) }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="tabsection jungle">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Availability</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($features??[] as $feature)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $feature->feature->name }}</td>
                                        <td>
                                            <label class="switch availability-switch"
                                                onchange="checkAvailability({{ $feature->feature->id }});">
                                                <input type="checkbox" {{ $feature->status == 1 ? 'checked' : '' }}
                                                    data-val="{{ $feature->feature->id }}" id="Available">
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            <h6>Records Not Found.</h1>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-container">
                        <p><b>Total records: {{ $features->total() }}, Displaying records {{ $features->firstItem() }} to
                                {{ $features->lastItem() }} of {{ $features->total() }}</b></p>
                        {{ $features->links('pagination::bootstrap-4') }}
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
                url: '{{ route('package-list.item.feature.updateAvailability') }}',
                data: JSON.stringify({
                    'id': id,
                    'newAvailability': newAvailability,
                    'package_id': '{{ $package_id }}'
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

        function updateAmenityStatus(feature_id, status) {

            var available = status == true ? '1' : '0';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('separate-package.item.feature.availability') }}',
                data: JSON.stringify({
                    'feature_id': feature_id,
                    'available': available,
                    'package_id': '{{ $package_id }}'
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
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to update availability. Please try again later.',
                    });
                }
            });
        }
    </script>
@endsection
