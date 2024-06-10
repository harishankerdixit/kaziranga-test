@extends('admin.layouts.frontend')
@section('title', 'Add Hotel Room')
@section('meta_description', 'Kaziranga Hotel Room List Add Hotel Room')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card my-4 shadow bg-body-tertiary br-1">
            <h3 class="card-header">Add Hotel Room</h3>
            <div class="card-body">
                <form method="post" action="{{ route('add-hotel-room-item', ['hotel_id' => $hotel_id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 mb-2">
                            <label for="name" class="form-label fw-bold">Room Name</label>
                            <input type="text" class="form-control" id="name" name="name" value=""
                                placeholder="Room Name....">
                        </div>

                        <div class="col-lg-12 mb-2">
                            <label for="availability" class="form-label fw-bold">Availability</label>
                            <select class="form-select" id="availability" name="availability">
                                <option value="">Select Availability</option>
                                <option value="1">Availability</option>
                                <option value="0">Not Availability</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="only_room" class="form-label fw-bold">Only Room</label>
                            <input type="text" class="form-control" id="only_room" name="only_room" value=""
                                placeholder="Only Room....">
                        </div>
                        <div class="col-lg-6">
                            <label for="room_with_breakfast" class="form-label fw-bold">Room With Breakfast</label>
                            <input type="text" class="form-control" id="room_with_breakfast" name="room_with_breakfast"
                                value="" placeholder="Room With Breakfast....">
                        </div>
                        <div class="col-lg-6">
                            <label for="room_with_breakfast_dinner" class="form-label fw-bold">Room With Breakfast
                                Dinner</label>
                            <input type="text" class="form-control" id="room_with_breakfast_dinner"
                                name="room_with_breakfast_dinner" value=""
                                placeholder="Room With Breakfast Dinner....">
                        </div>

                        <div class="col-lg-6">
                            <label for="room_with_breakfast_lunch_dinner" class="form-label fw-bold">Room With Breakfast
                                Lunch
                                Dinner</label>
                            <input type="text" class="form-control" id="room_with_breakfast_lunch_dinner"
                                name="room_with_breakfast_lunch_dinner" value=""
                                placeholder="Room With Breakfast Lunch Dinner....">
                        </div>
                        <div class="col-sm-12 my-3">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="custom_amount_status" type="checkbox"
                                            role="switch" id="customAmountSwitchCheckDefault">
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
                        </div>
                        <div class="col-sm-12">
                            <label for="image" class="form-label fw-bold">Upload Room Image</label>
                            <input type="file" class="form-control" id="image" name="image" value="">
                        </div>
                        <div class="col-lg-12">
                            <label for="room_facility" class="form-label fw-bold mb-0">Room facilities:</label>
                            <div id="facilityContainer"></div>
                            <button type="button" class="btn btn-success" onclick="addFacility()">Add
                                Facility</button>
                        </div>
                        <div class="col-lg-12 my-0">
                            <label for="room_benefit" class="form-label fw-bold mb-0">Room Inclusions:</label>
                            <div id="benefitContainer"></div>
                            <button type="button" class="btn btn-success my-0" onclick="addBenefit()">Add
                                Inclusion</button>
                        </div>
                    </div>
                    <div class="d-flex gap-3 my-4">
                        <button type="submit" class="btn btn-success px-5">Submit</button>
                        <a href="{{ route('hotel-list') }}" class="btn btn-outline-danger">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    @push('scripts')
        <script>
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

            document.addEventListener("DOMContentLoaded", function() {
                addFacility();
                addBenefit();
            });

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
                container.className = "d-flex mt-0";
                container.appendChild(input);
                container.appendChild(removeButton);

                document.getElementById("facilityContainer").appendChild(container);
            }

            function removeFacility(element) {
                element.parentNode.remove();
            }

            function addBenefit() {
                var input = document.createElement("input");
                input.type = "text";
                input.className = "form-control";
                input.name = "room_benefit[]";
                input.placeholder = "Room benefits....";

                var removeButton = document.createElement("button");
                removeButton.innerHTML = "Remove";
                removeButton.className = "btn btn-danger";
                removeButton.onclick = function() {
                    removeBenefit(input);
                };

                var container = document.createElement("div");
                container.className = "d-flex";
                container.appendChild(input);
                container.appendChild(removeButton);

                document.getElementById("benefitContainer").appendChild(container);
            }

            function removeBenefit(element) {
                element.parentNode.remove();
            }
        </script>
    @endpush
@endsection
