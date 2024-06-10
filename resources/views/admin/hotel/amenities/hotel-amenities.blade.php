@extends('admin.layouts.frontend')
@section('title', 'Hotel Amenities')
@section('meta_description', 'Kaziranga Hotel Amenities List')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header">
                <div class="row">
                    <div class="d-flex justify-content-between p-2">
                        <h3>Hotel Amenities</h3>

                        <a href="{{ route('hotel-list') }}" class="btn btn-danger">
                            Back
                        </a>
                    </div>
                    {{-- <div class="col-md-6">
                        <a href="{{ route('amenities.add.view.index') }}" class="btn btn-success float-end me-3 px-5">
                            Add Amenities
                        </a>
                    </div> --}}
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="d-flex flex-wrap">
                        @foreach ($UpdateAmenities as $update)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="amenityCheckbox{{ $update['id'] }}"
                                    value="{{ $update['amenity'] }}"
                                    onchange="updateAmenityStatus('{{ $update['id'] }}', this.checked)"
                                    {{ in_array($update['id'], $getAmenityId) ? 'checked' : '' }}>
                                <label class="form-check-label" for="amenityCheckbox{{ $update['id'] }}"
                                    style="margin-right:10px;">{{ strtoupper($update['amenity']) }}</label>
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
                                    <th scope="col">Amenity</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Availability</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($amenities??[] as $amenity)
                                    <tr>
                                        <td>{{ $amenity->amenity->id }}</td>
                                        <td>{{ $amenity->amenity->amenity }}</td>
                                        <td>
                                            <img src="{{ asset($amenity->amenity->image) }}" width="50px" height="50px">
                                        </td>
                                        <td>
                                            <label class="switch availability-switch"
                                                onchange="checkAvailability({{ $amenity->amenity->id }});">
                                                <input type="checkbox" {{ $amenity->status == 1 ? 'checked' : '' }}
                                                    data-val="{{ $amenity->amenity->id }}" id="Available">
                                                <span class="slider round"></span>
                                            </label>
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
                        <p>
                            <b>
                                Total records: {{ $amenities->total() }},
                                Displaying records {{ $amenities->firstItem() }}
                                to {{ $amenities->lastItem() }} of {{ $amenities->total() }}
                            </b>
                        </p>
                        {{ $amenities->links('pagination::bootstrap-4') }}
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
                url: '{{ route('hotel-list.item.amenities.updateAvailability') }}',
                data: JSON.stringify({
                    'id': id,
                    'newAvailability': newAvailability,
                    'hotel_id': '{{ $hotel_id }}'
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

        function updateAmenityStatus(amenity_id, status) {

            var available = status == true ? '1' : '0';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('separate-hotel.item.amenities.availability') }}',
                data: JSON.stringify({
                    'amenity_id': amenity_id,
                    'available': available,
                    'hotel_id': '{{ $hotel_id }}'
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
