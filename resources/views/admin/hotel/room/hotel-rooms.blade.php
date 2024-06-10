@extends('admin.layouts.frontend')
@section('title', 'Hotel Rooms')
@section('meta_description', 'Kaziranga Hotel Rooms')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6 p-2">
                        <h3>Hotel Rooms</h3>
                    </div>
                    <div class="col-md-6 p-2">
                        <a href="{{ route('hotel-list') }}" class="btn btn-outline-danger float-end ">
                            Back
                        </a>
                        <a href="{{ route('hotel.add.room.index', ['hotel_id' => $id]) }}"
                            class="btn btn-success float-end me-3 px-4">Add Room</a>
                    </div>
                </div>
            </div>
            <div class="card-body pb-0">
                <div class="tabsection jungle">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Amenity</th>
                                    <th scope="col">Availability</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($hotelRoom??[] as $room)
                                    <tr>
                                        <td>{{ $room->id }}</td>
                                        <td>{{ $room->room }}</td>
                                        <td>
                                            <label class="switch availability-switch"
                                                onchange="checkAvailability({{ $room->id }});">
                                                <input type="checkbox" {{ $room->status == 1 ? 'checked' : '' }}
                                                    data-val="{{ $room->id }}" id="Available">
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <a href="{{ route('hotel.room.available', ['hotel_id' => $id, 'room_id' => $room->id]) }}"
                                                    class="btn btn-success">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('hotel.room.edit', ['hotel_id' => $id, 'room_id' => $room->id]) }}"
                                                    class="btn btn-warning">
                                                    <i class="fa-solid fa-pen"></i>
                                                </a>
                                                <a href="{{ route('hotel.room.delete', ['hotel_id' => $id, 'room_id' => $room->id]) }}"
                                                    class="btn btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
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
                        <p>
                            <b>
                                Total records: {{ $hotelRoom->total() }},
                                Displaying records {{ $hotelRoom->firstItem() }}
                                to {{ $hotelRoom->lastItem() }}
                                of {{ $hotelRoom->total() }}
                            </b>
                        </p>
                        {{ $hotelRoom->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </main>
    @push('scripts')
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
                    url: '{{ route('hotel-list.item.room.updateAvailability') }}',
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
        </script>
    @endpush
@endsection
