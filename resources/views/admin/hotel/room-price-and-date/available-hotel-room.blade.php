@extends('admin.layouts.frontend')
@section('title', 'Available Hotel Room')
@section('meta_description', 'Gir Lion Hotel Room List Available Hotel Room')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">{{ $getHotelRoomName }} Date Price</h3>
            <div class="card-body py-0">

                <form method="post" action="{{ route('available.hotel.room.store') }}">
                    @csrf
                    <input type="hidden" class="form-control" id="hotel_id" name="hotel_id" value="{{ $hotel_id }}">
                    <input type="hidden" class="form-control" id="room_id" name="room_id" value="{{ $room_id }}">

                    <div class="row">
                        <div class="col-lg-4">
                            <label for="room_check_in" class="form-label">Room Check In</label>
                            <input type="date" class="form-control" id="room_check_in" name="room_check_in"
                                value="" placeholder="Room Check In....">
                        </div>
                        <div class="col-lg-4">
                            <label for="room_check_out" class="form-label">Room Check Out</label>
                            <input type="date" class="form-control" id="room_check_out" name="room_check_out"
                                value="" placeholder="Room Check Out....">
                        </div>


                        <div class="col-lg-4">
                            <label for="availability" class="form-label">Availability</label>
                            <select class="form-select" id="availability" name="availability">
                                <option value="">Select Availability</option>
                                <option value="1">Available</option>
                                <option value="0">Not Available</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="only_room" class="form-label">Only Room</label>
                            <input type="text" class="form-control" id="only_room" name="only_room" value=""
                                placeholder="₹ Only Room....">
                        </div>
                        <div class="col-lg-6">
                            <label for="room_with_breakfast" class="form-label">Room With Breakfast</label>
                            <input type="text" class="form-control" id="room_with_breakfast" name="room_with_breakfast"
                                value="" placeholder="₹ Room With Breakfast....">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="room_with_breakfast_dinner" class="form-label">Room With Breakfast Dinner</label>
                            <input type="text" class="form-control" id="room_with_breakfast_dinner"
                                name="room_with_breakfast_dinner" value=""
                                placeholder="₹ Room With Breakfast Dinner....">
                        </div>
                        <div class="col-lg-6">
                            <label for="room_with_breakfast_lunch_dinner" class="form-label">Room With Breakfast Lunch
                                Dinner</label>
                            <input type="text" class="form-control" id="room_with_breakfast_lunch_dinner"
                                name="room_with_breakfast_lunch_dinner" value=""
                                placeholder="₹ Room With Breakfast Lunch Dinner....">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" name="custom_amount_status" type="checkbox" role="switch"
                                    id="customAmountSwitchCheckDefault">
                                <label class="form-check-label fw-bold" for="customAmountSwitchCheckDefault">
                                    Add
                                    Custom Amount
                                </label>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" id="adult_custom_amount"
                                        name="adult_custom_amount" value="" max="100"
                                        placeholder="Please enter custom percentage for adult....">
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="child_custom_amount"
                                        name="child_custom_amount" value="" max="100"
                                        placeholder="Please enter custom percentage for child....">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="note" class="form-label">Note</label>
                            <input type="text" class="form-control" id="note" name="note" value=""
                                placeholder="Note....">
                        </div>
                        <div class="col-lg-12 mt-3">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Set Availability</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="tabsection jungle">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped tablesection">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Only Room</th>
                                    <th scope="col">Room With Breakfast</th>
                                    <th scope="col">Room With Breakfast Dinner</th>
                                    <th scope="col">Room With Breakfast Lunch Dinner</th>
                                    <th scope="col">Custom Amount Status</th>
                                    <th scope="col">Child Custom Amount</th>
                                    <th scope="col">Adult Custom Amount</th>
                                    <th scope="col">Check In Date</th>
                                    <th scope="col">Check Out Date</th>
                                    <th scope="col">Note</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($hotelRoomAvailable??[] as $room)
                                    <tr>
                                        <td>{{ $room->id }}</td>
                                        <td>{{ $room->only_room }}</td>
                                        <td>{{ $room->room_with_breakfast }}</td>
                                        <td>{{ $room->room_with_breakfast_dinner }}</td>
                                        <td>{{ $room->room_with_breakfast_lunch_dinner }}</td>
                                        <td>
                                            {{ $room->custom_amount_status==1?'On':'-' }}
                                        </td>
                                        <td>{{ $room->child_custom_amount??'-' }}</td>
                                        <td>{{ $room->adult_custom_amount??'-' }}</td>
                                        <td>{{ $room->room_check_in }}</td>
                                        <td>{{ $room->room_check_out }}</td>
                                        <td>{{ $room->note }}</td>
                                        <td>
                                            <label class="switch availability-switch"
                                                onchange="checkAvailability({{ $room->id }});">
                                                <input type="checkbox" {{ $room->status == 1 ? 'checked' : '' }}
                                                    data-val="{{ $room->id }}" id="Available">
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group"
                                                aria-label="Basic mixed styles example">
                                                <a href="{{ route('available.hotel.room.delete', $room['id']) }}"
                                                    class="btn btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">
                                            <h6>Records Not Found.</h1>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination-container">
                        <p>
                            <b>Total records: {{ $hotelRoomAvailable->total() }},
                                Displaying records {{ $hotelRoomAvailable->firstItem() }}
                                to {{ $hotelRoomAvailable->lastItem() }}
                                of {{ $hotelRoomAvailable->total() }}
                            </b>
                        </p>
                        {{ $hotelRoomAvailable->links('pagination::bootstrap-4') }}
                    </div>
                </div>

                <hr>

                <div class="card my-4 shadow bg-body-tertiary br-1">
                    <h3 class="card-header">Block {{ $getHotelRoomName }} Date</h3>
                    <div class="card-body py-0">
                        <form method="post" action="{{ route('block-hotel-room-item') }}">
                            @csrf
                            <input type="hidden" class="form-control" id="block_hotel_id" name="block_hotel_id"
                                value="{{ $hotel_id }}">
                            <input type="hidden" class="form-control" id="block_room_id" name="block_room_id"
                                value="{{ $room_id }}">

                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="block_room_check_in" class="form-label">Block Date</label>
                                    <input type="date" class="form-control" id="block_room_check_in"
                                        name="block_room_check_in" value="" placeholder="Block Date....">
                                </div>
                                <div class="col-lg-2 align-self-end">
                                    <button type="submit" class="btn btn-primary">Block</button>
                                </div>
                            </div>
                        </form>

                        <div class="tabsection jungle">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped tablesection">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Date</th>
                                            {{-- <th scope="col">Check Out</th> --}}
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($hotelRoomBlock??[] as $block)
                                            <tr>
                                                <td>{{ $block->id }}</td>
                                                <td>{{ $block->room_check_in }}</td>
                                                {{-- <td>{{ $block->room_check_out }}</td> --}}
                                                <td>
                                                    <div class="btn-group" role="group"
                                                        aria-label="Basic mixed styles example">
                                                        <a href="{{ route('benefit.delete', $block->id) }}"
                                                            class="btn btn-danger">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>
                                                    </div>
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
                                <p>
                                    <b>Total records: {{ $hotelRoomBlock->total() }},
                                        Displaying records {{ $hotelRoomBlock->firstItem() }}
                                        to {{ $hotelRoomBlock->lastItem() }}
                                        of {{ $hotelRoomBlock->total() }}
                                    </b>
                                </p>
                                {{ $hotelRoomBlock->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
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
                    url: '{{ route('hotel-list.room.available') }}',
                    data: JSON.stringify({
                        'id': id,
                        'newAvailability': newAvailability
                    }),
                    contentType: 'application/json',
                    dataType: 'json',
                    success: function(response) {
                        // Handle the success response
                        console.log(response);

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

            $(document).ready(function() {
                $('#adult_custom_amount').hide();
                $('#child_custom_amount').hide();

                $('#customAmountSwitchCheckDefault').change(function() {
                    if ($(this).is(':checked')) {
                        $('#adult_custom_amount').show().attr('name', 'adult_custom_amount');
                        $('#child_custom_amount').show().attr('name', 'child_custom_amount');
                    } else {
                        $('#adult_custom_amount').hide().removeAttr('name');
                        $('#child_custom_amount').hide().removeAttr('name');
                    }
                });
            });
        </script>
    @endpush
@endsection
