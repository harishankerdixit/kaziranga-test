@extends('admin.layouts.frontend')
@section('title', 'Edit Hotel Room')
@section('meta_description', 'Kaziranga Hotel Room List Edit Hotel Room')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Edit Hotel Room</h3>
            <div class="card-body py-0">
                <form method="post"
                    action="{{ route('edit-hotel-room-item', ['hotel_id' => $hotel_id, 'room_id' => $room_id]) }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-sm-12">
                            <label for="name" class="form-label fw-bold">Room Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $hotelRoomData[0]['room'] }}" placeholder="Room Name....">
                        </div>
                        <div class="col-sm-12">
                            <label for="availability" class="form-label fw-bold">Availability</label>
                            <select class="form-select" id="availability" name="availability">
                                <option value="">Select Availability</option>
                                <option value="1" {{ $hotelRoomData[0]['status'] == 1 ? 'selected' : '' }}>Availability
                                </option>
                                <option value="0" {{ $hotelRoomData[0]['status'] == 0 ? 'selected' : '' }}>Not
                                    Availability
                                </option>
                            </select>
                        </div>

                        @php

                            $only_room = round(($hotelRoomData[0]['only_room'] * 2) / 100);
                            $room_with_breakfast = round(($hotelRoomData[0]['room_with_breakfast'] * 2) / 100);
                            $room_with_breakfast_dinner = round(
                                ($hotelRoomData[0]['room_with_breakfast_dinner'] * 2) / 100,
                            );
                            $room_with_breakfast_lunch_dinner = round(
                                ($hotelRoomData[0]['room_with_breakfast_lunch_dinner'] * 2) / 100,
                            );

                            $only_room = $hotelRoomData[0]['only_room'] - $only_room;
                            $room_with_breakfast = $hotelRoomData[0]['room_with_breakfast'] - $room_with_breakfast;
                            $room_with_breakfast_dinner =
                                $hotelRoomData[0]['room_with_breakfast_dinner'] - $room_with_breakfast_dinner;
                            $room_with_breakfast_lunch_dinner =
                                $hotelRoomData[0]['room_with_breakfast_lunch_dinner'] -
                                $room_with_breakfast_lunch_dinner;
                        @endphp
                        <div class="col-lg-6">
                            <label for="only_room" class="form-label fw-bold">Only Room</label>
                            <input type="text" class="form-control" id="only_room" name="only_room"
                                value="{{ $only_room }}" placeholder="Only Room....">
                        </div>
                        <div class="col-lg-6">
                            <label for="room_with_breakfast" class="form-label fw-bold">Room With Breakfast</label>
                            <input type="text" class="form-control" id="room_with_breakfast" name="room_with_breakfast"
                                value="{{ $room_with_breakfast }}" placeholder="Room With Breakfast....">
                        </div>
                        <div class="col-lg-6">
                            <label for="room_with_breakfast_dinner" class="form-label fw-bold">Room With Breakfast
                                Dinner</label>
                            <input type="text" class="form-control" id="room_with_breakfast_dinner"
                                name="room_with_breakfast_dinner" value="{{ $room_with_breakfast_dinner }}"
                                placeholder="Room With Breakfast Dinner....">
                        </div>
                        <div class="col-lg-6">
                            <label for="room_with_breakfast_lunch_dinner" class="form-label fw-bold">Room With Breakfast
                                Lunch
                                Dinner</label>
                            <input type="text" class="form-control" id="room_with_breakfast_lunch_dinner"
                                name="room_with_breakfast_lunch_dinner" value="{{ $room_with_breakfast_lunch_dinner }}"
                                placeholder="Room With Breakfast Lunch Dinner....">
                        </div>
                        <div class="col-sm-12 my-3">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="custom_amount_status" type="checkbox"
                                            role="switch" id="customAmountSwitchCheckDefault"
                                            {{ $hotelRoomData[0]['custom_amount_status'] ? 'checked' : '' }}>
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
                                                name="adult_custom_amount"
                                                value="{{ $hotelRoomData[0]['adult_custom_amount'] ?? '' }}" max="100"
                                                placeholder="Please enter custom percentage for adult....">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" id="child_custom_amount"
                                                name="child_custom_amount"
                                                value="{{ $hotelRoomData[0]['child_custom_amount'] ?? '' }}" max="100"
                                                placeholder="Please enter custom percentage for child....">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label for="image" class="form-label fw-bold">Upload Room Image</label>
                            <input type="file" class="form-control" id="image" name="image" value="">
                            <img class="mt-2" src="{{ '/admin/uploads/rooms/' . $hotelRoomData[0]['image'] }}"
                                width="250px" height="200px">
                        </div>
                        <div class="col-lg-12">
                            <label for="room_facility" class="form-label fw-bold">Room facilities:</label>
                            <div id="facilityContainer">
                                @foreach ($hotelRoomFacility as $facility)
                                    <div class="d-flex" id="facility-item{{ $facility['id'] }}">
                                        <input type="text" class="form-control" name="room_facility[]"
                                            placeholder="Room facilities...." value="{{ $facility['facility'] }}">
                                        <button class="btn btn-danger remove-facility"
                                            onclick="removeFacility({{ $facility['id'] }});">Remove</button>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-success my-3" onclick="addFacility()">Add
                                Facility</button>
                        </div>
                        <div class="col-lg-12">
                            <label for="room_benefit" class="form-label fw-bold">Room benefit:</label>
                            <div id="benefitContainer">
                                @foreach ($hotelRoomBenefit as $benefit)
                                    <div class="d-flex" id="benefit-item{{ $benefit['id'] }}">
                                        <input type="text" class="form-control" name="room_benefit[]"
                                            placeholder="Room benefit...." value="{{ $benefit['benefit'] }}">
                                        <button class="btn btn-danger remove-benefit"
                                            onclick="removeBenefit({{ $benefit['id'] }});">Remove</button>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-success my-3" onclick="addBenefit()">Add
                                Benefit</button>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-success ms-2 px-5">Update</button>
                        <a href="{{ route('hotel-list') }}" class="btn btn-danger ms-auto px-5 me-2">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    @push('scripts')
        <script>
            $(document).ready(function() {
                // Initially hide the input fields if custom_amount_status is unchecked
                if (!$('#customAmountSwitchCheckDefault').is(':checked')) {
                    $('#adult_custom_amount').hide();
                    $('#child_custom_amount').hide();
                }

                // Toggle visibility of input fields when custom_amount_status checkbox is clicked
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

            // document.addEventListener("DOMContentLoaded", function () {
            //     addFacility();
            // });

            function addFacility() {
                var input = document.createElement("input");
                input.type = "text";
                input.className = "form-control";
                input.name = "room_facility[]";
                input.placeholder = "Room facilities....";

                var removeButton = document.createElement("button");
                removeButton.innerHTML = "Remove";
                removeButton.className = "btn btn-danger";
                removeButton.onclick = function() {
                    removeFacility(input);
                };

                var container = document.createElement("div");
                container.className = "d-flex";
                container.appendChild(input);
                container.appendChild(removeButton);

                document.getElementById("facilityContainer").appendChild(container);
            }

            function removeFacility(facilityId) {
                var element = document.getElementById('facility-item' + facilityId);
                if (element) {
                    element.remove();
                }
            }
        </script>
    @endpush
@endsection
