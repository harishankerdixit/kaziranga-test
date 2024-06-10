@extends('admin.layouts.frontend')
@section('title', 'Package Exclusion')
@section('meta_description', 'Kaziranga Package Exclusion List')
@section('content')


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Package Exclusion</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('exclusion.add.view.index') }}" class="btn btn-success float-end me-3 px-5">
                            Add Exclusion
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="d-flex flex-wrap">
                        @foreach ($UpdateExclusion as $update)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="amenityCheckbox{{ $update['id'] }}"
                                    value="{{ $update['description'] }}"
                                    onchange="updateAmenityStatus('{{ $update['id'] }}', this.checked)"
                                    {{ in_array($update['id'], $getexclusionsId) ? 'checked' : '' }}>
                                <label class="form-check-label" for="amenityCheckbox{{ $update['id'] }}"
                                    style="margin-right:10px;">{{ strtoupper($update['description']) }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>



                <div class="tabsection jungle">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Availability</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($exclusions??[] as $exclusion)
                                    <tr>
                                        <td>{{ $exclusion->exclusion->id }}</td>
                                        <td>{{ $exclusion->exclusion->description }}</td>
                                        <td>
                                            <label class="switch availability-switch"
                                                onchange="checkAvailability({{ $exclusion->exclusion->id }});">
                                                <input type="checkbox" {{ $exclusion->status == 1 ? 'checked' : '' }}
                                                    data-val="{{ $exclusion->exclusion->id }}" id="Available">
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
                        <p><b>Total records: {{ $exclusions->total() }}, Displaying records {{ $exclusions->firstItem() }}
                                to
                                {{ $exclusions->lastItem() }} of {{ $exclusions->total() }}</b></p>
                        {{ $exclusions->links('pagination::bootstrap-4') }}
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
                url: '{{ route('package-list.item.exclusion.updateAvailability') }}',
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

        function updateAmenityStatus(exclusion_id, status) {

            var available = status == true ? '1' : '0';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('separate-package.item.exclusion.availability') }}',
                data: JSON.stringify({
                    'exclusion_id': exclusion_id,
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
