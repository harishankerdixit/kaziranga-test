@extends('front.layouts.main')
@section('title', $hotel->title)
@section('meta_title', $hotel->meta_title)
@section('meta_description', $hotel->meta_description)
{{-- @php
    $fullUrl = request()->fullUrl();
@endphp
@section('links', $fullUrl) --}}
@section('content')
    <main id="main">
        @php
            $hId = $hotel->id;
        @endphp

        @if ($searching_filter == 'searching2')
            <div class="alert alert-success text-center" role="alert">
                <strong style="font-size: 15px;">Filter Set Successfully with {{ $setRoomsTotal ?? 1 }} Room and
                    {{ $setAdultsTotal + $setChildTotal ?? 1 }} Guest !!</strong>
            </div>
        @endif
        <div class="floating_form">
            @if ($searching_filter == 'searching')
                <div class="alert text-center" role="alert" style="background-color: #ff7043;">
                    <strong style="font-size: 15px;">Filter Set Successfully with {{ $setRoomsTotal ?? 1 }} Room and
                        {{ $setAdultsTotal + $setChildTotal ?? 1 }} Guest !!</strong>
                </div>
            @endif
            <div class="container d-flex justify-content-center">
                <form class="row" action="{{ route('hotels') }}" method="get" id="headerForm">
                    @csrf
                    <input type="hidden" name="searching_filter" value="searching" />
                    <input type="hidden" name="setNightsDiff" value="1" id="setNightsDiff" />

                    <div class="form-group">
                        <label>Select Hotel</label>
                        <select class="form-select" id="all_hotels" name="all_hotels">
                            <option value="" disabled selected>All Hotels in Gir</option>
                            @foreach ($hotel_name as $hotelOption)
                                <option value="{{ $hotelOption['name'] }}"
                                    @if ($allHotels == $hotelOption['name']) selected @endif>
                                    {{ $hotelOption['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>CHECK-IN / CHECK-OUT</label>
                        <div class="d-flex gap-1">
                            <input type="text" class="form-control" name="check_in" id="checkinDate"
                                placeholder="Check-in Date" value="{{ $checked_in ?? '' }}" />
                            <input type="text" class="form-control" name="check_out" id="checkoutDate"
                                placeholder="Check-out Date" onchange="setNights();" value="{{ $checked_out ?? '' }}" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="safaribooking-total_persons">Select Travellers</label>
                        <div class="dropdown">
                            <input type="text" id="totalPersonsInput" class="form-control total-persons-selector"
                                {{-- value="1 Room 1 Guest" --}}
                                value="{{ $setRoomsTotal ?? 1 }} Room {{ $setAdultsTotal + $setChildTotal == 0 ? 2 : $setAdultsTotal + $setChildTotal }} Guest"
                                type="button" readonly />

                            <div class="dropdown-menu" id="dropdownMenu">
                                <span class="m-2 fw-bold" style="font-size: small">
                                    {{-- Room {{$setRoomsTotal ?? 1 }}</span --}}
                                    Room 1
                                </span>
                                <hr class="my-1">
                                <div class="dropdown-item">
                                    <div class="" style="margin-right: 1rem">
                                        <label>Adults<span> (13-99Y)</span></label>
                                    </div>

                                    <div class="inc_dec">
                                        <div id="adults" class="row">
                                            <a href="#" onclick="selectTravellers('adults','decrease', 1);">➖</a>
                                            <input id="adultInput1" class="adult-input getAdults" name="trav_adults"
                                                data-value type="text" {{-- value="{{$setAdultsTotal ?? 1}}" --}} value="2" readonly />
                                            <a href="#" onclick="selectTravellers('adults' ,'increase', 1);">➕</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="" style="margin-right: 1rem">
                                        <label>Children<span> (3-12Y)</span></label>
                                    </div>
                                    <div class="inc_dec">
                                        <div id="children" class="row">
                                            <a href="#" onclick="selectTravellers('child', 'decrease', 1);">➖</a>
                                            <input id="childInput1" class="child-input getChild" name="trav_child"
                                                data-value type="text" min="0" {{-- value="{{$setChildTotal ?? 0}}" --}}
                                                value="0" readonly />

                                            <input type="hidden" value="2" name="setAdultsTotal" id="setAdultsTotal">
                                            <input type="hidden" value="0" name="setChildTotal" id="setChildTotal">
                                            <input type="hidden" value="1" name="setRoomsTotal" id="setRoomsTotal">

                                            <input type="hidden" value='[{"room":1,"adults":2,"children":0}]'
                                                name="setJsonData" id="setJsonData">

                                            <a href="#" onclick="selectTravellers('child', 'increase', 1);">➕</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <a href="#" class="btn btn-outline-success" id="addButton"
                                        onclick="addRoom();">
                                        Add Room
                                    </a>
                                    <div class="applyBtnId">
                                        <a href="#" class="btn btn-outline-primary" onclick="applyFilterData();">
                                            Apply
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="search-group d-flex align-items-center mt-3">
                        <button class="btn btn-success btn-hotelform" type="submit">Search</button>
                        <a href="{{ route('hotels') }}" class="btn btn-danger" style="margin-left:10px;">Reset</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="inner_hotel mt-5">
            <div class="container">
                <div class="top mb-4 align-items-center">
                    <div class="d-flex flex-column">
                        <div class="d-flex title_side gap-1">
                            <h2>{{ $hotel->name ?? '' }}</h2>
                            <div class="p-1">
                                @for ($i = 0; $i < $hotel->rating; $i++)
                                    <span><i class="fa-solid fa-star"></i></span>
                                @endfor
                            </div>
                        </div>
                        <p>{{ $hotel->address ?? '' }}</p>
                    </div>
                    <a class="button-29" href="#rooms">Select Room &#8599;</a>
                </div>

                <div class="image-group">
                    @if (!empty($hotel->images) && count($hotel->images) > 0)
                        <div class="first-image">
                            <a href="{{ asset($hotel->images[0]['image']) }}"
                                data-gallery="portfolio-gallery-remodeling2" class="glightbox preview-link">
                                <img class="firstimg" src="{{ asset($hotel->images[0]['image']) }}" />
                            </a>
                        </div>
                        <div class="other-images">
                            @php
                                $imageCount = count($hotel->images);
                                $loopCount = min($imageCount, 3);
                            @endphp

                            @for ($i = 0; $i < $loopCount; $i++)
                                <a href="{{ asset($hotel->images[$i]['image']) }}"
                                    data-gallery="portfolio-gallery-remodeling2" class="glightbox preview-link">
                                    <img class="next_imgs" src="{{ asset($hotel->images[$i]['image']) }}" />
                                </a>
                            @endfor
                            {{-- @for ($i = 1; $i < 4; $i++)
                                <a href="{{ asset($hotel->images[$i]['image']) }}"
                                    data-gallery="portfolio-gallery-remodeling2" class="glightbox preview-link">
                                    <img class="next_imgs" src="{{ asset($hotel->images[$i]['image']) }}" />
                                </a>
                            @endfor --}}

                            <div class="position-relative">
                                <div class="position-absolute bottom-0 end-0 p-2">
                                    <div class="btn px-3 py-2 bg-light text-dark js-gallery" role="button">
                                        <a href="{{ asset($hotel['images'][0]['image']) }}"
                                            data-gallery="portfolio-gallery-remodeling2" class="glightbox preview-link">
                                            See All Photos
                                        </a>
                                    </div>
                                </div>
                                <a href="{{ asset($hotel['images'][0]['image']) }}"
                                    data-gallery="portfolio-gallery-remodeling2" class="glightbox preview-link">
                                    <img class="next_imgs" src="{{ asset($hotel['images'][0]['image']) }}" />
                                </a>
                            </div>
                            @for ($i = 1; $i < count($hotel->images); $i++)
                                <a href="{{ asset($hotel->images[$i]['image']) }}"
                                    data-gallery="portfolio-gallery-remodeling2" class="glightbox preview-link"
                                    style="display: none;">
                                    <img class="next_imgs" src="{{ asset($hotel->images[$i]['image']) }}" />
                                </a>
                            @endfor
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="middle_hotelpage">
            <div class="container">
                <div class="row my-4">
                    <div class="col-xl-8">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-22 fw-500">Property highlights</h3>
                                <div class="row my-2">
                                    @php
                                        $counter = 0;
                                    @endphp
                                    @forelse ($allAmenities as $amenity)
                                        @if ($counter < 4)
                                            <div class="col-lg-3 col-6 mt-4">
                                                <div class="text-center texticons">
                                                    <img src="{{ asset($amenity['image']) }}" alt=""
                                                        height="20px" width="20px">
                                                    <div class="text-15" style="white-space: nowrap;">
                                                        {{ $amenity['amenity'] }}
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                                $counter++;
                                            @endphp
                                        @endif
                                    @empty
                                        <h6>Amenities not available.</h6>
                                    @endforelse
                                </div>
                            </div>
                            <div id="overview" class="col-12 my-3">
                                <h3 class="text-22 fw-500 pt-40 border-top-light">
                                    Overview
                                </h3>
                                <p class="text-dark-1 text-15">{{ $hotel->description ?? '' }}</p>
                            </div>
                            <div class="col-12 mb-3">
                                <h3 class="text-22 fw-500 border-top-light">
                                    Most Popular Facilities
                                </h3>
                                <div class="row mt-3">
                                    @forelse ($allAmenities??[] as $amenity)
                                        <div class="col-md-5">
                                            <div class="d-flex items-center p-1">
                                                <span class=" ">
                                                    <img src="{{ asset($amenity['image']) }}" alt=""
                                                        class="" height="20px" width="20px">
                                                </span>&nbsp;&nbsp;
                                                <div class="text-15">{{ $amenity['amenity'] }}</div>
                                            </div>
                                        </div>
                                    @empty
                                        <h6>Amenities not available.</h6>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <aside class="ml-50 lg:ml-0">
                            <div class="px-30 py-30 border-light rounded-4 shadow-4">
                                <form action="{{ route('enquiry') }}" method="POST" class="enquiry-form mt-2"
                                    id="enquiryForm">
                                    <h4>Enquiry Form</h4>
                                    <input type="hidden" name="type" id="type" value="hotel">
                                    <input type="hidden" name="hotel_id" id="hotel_id" value="{{ $hId }}">
                                    <!-- Name -->

                                    <div class="mb-2">
                                        <input type="text" name="traveller_name" class="form-control" id="traveller_name"
                                            placeholder="Your Name" value="{{ old('traveller_name') }}" />
                                    </div>

                                    <!-- Mobile Number -->
                                    <div class="mb-2">
                                            <input type="number" name="mobile_no" class="form-control" id="phone_no"
                                            placeholder="Your Mobile Number" value="{{ old('mobile_no') }}"
                                            minlength="10" maxlength="10" pattern="[0-9]{10,15}"
                                            title="Please enter a valid phone number (minimum 10 digits)">
                                    </div>

                                    <!-- Date -->
                                    <div class="mb-2">
                                        <input type="text" name="booking_date" class="form-control" id="calendar"
                                            placeholder="Select Booking Date" value="{{ old('booking_date') }}"
                                            autocomplete="off">
                                    </div>

                                    <!-- Timing -->
                                    <div class="mb-2">
                                        <select class="form-select" name="time_slot" id="time_slot">
                                            <option value="" disabled selected>Select Time Slot</option>
                                            <option value="Morning" @if (old('time_slot') == 'Morning') selected @endif>
                                                Morning
                                            </option>
                                            <option value="Evening" @if (old('time_slot') == 'Evening') selected @endif>
                                                Evening
                                            </option>
                                        </select>
                                    </div>

                                    <!-- Email Address -->
                                    <div class="mb-2">
                                        <input type="email" name="email_id" class="form-control" id="email"
                                            placeholder="Your Email Address" value="{{ old('email_id') }}">
                                    </div>

                                    <!-- Message -->
                                    <div class="mb-2">
                                        <textarea class="form-control" name="message" rows="3" placeholder="Message">{{ old('message') }}</textarea>
                                    </div>

                                    <div class="text-center">
                                        {{-- <a class="button-29" type="submit"> Book Now </a> --}}
                                        <button type="submit" class="button-29">Book Now </button>
                                    </div>
                                </form>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>

        <section id="rooms" class="pt-30">
            <div class="container">
                <div class="row pb-20">
                    <div class="col-auto">
                        <h3 class="text-22 fw-500">Available Rooms</h3>
                    </div>
                </div>
                @forelse ($hotelRooms??[] as $rooms)
                    <div class="firstbox px-4 py-4">
                        <div class="row y-gap-20">
                            <div class="col-12">
                                <h3 class="text-18 fw-500">{{ $rooms['room'] }}</h3>
                                <div class="roomGrid">
                                    <div class="roomGrid__header mob_hide">
                                        <div>Room Type</div>
                                        <div>Meal Plan</div>
                                        <div>Facilities</div>
                                        <div>Inclusions</div>
                                    </div>
                                    <div class="roomGrid__grid">
                                        <div>
                                            <div class="">
                                                <img src="{{ asset('/admin/uploads/rooms/' . $rooms['image']) }}"
                                                    alt="{{ $rooms['room'] ?? 'Image Not Found' }}"
                                                    class="img-ratio rounded-4" />
                                            </div>
                                            <div class="d-flex flex-column mt-2"></div>
                                            <a href="#enquiryForm" class="d-block p-2 shadower">Get
                                                More Room Information</a>
                                        </div>
                                        <div class="y-gap-30">
                                            <div class="betweenheader">
                                                <span>Meal Plan</span>
                                                <span>Facilities</span>
                                                <span>Inclusions</span>
                                            </div>
                                            <div class="roomGrid__content">
                                                <div>
                                                    <div class="">
                                                        <div class="radio-container">
                                                            @php
                                                                // Convert string dates to Carbon objects using Carbon\Carbon::parse()
                                                                $check_in_date = \Carbon\Carbon::parse($check_in);
                                                                $check_out_date = \Carbon\Carbon::parse($check_out);

                                                                $paisa = getPaisaData(
                                                                    $hotelId,
                                                                    $rooms['id'],
                                                                    $check_in_date,
                                                                    $check_out_date,
                                                                );

                                                                if ($paisa) {
                                                                    $paisa = $paisa;
                                                                } else {
                                                                    $paisa = App\Models\HotelRoom::where(
                                                                        'hotel_id',
                                                                        $hotelId,
                                                                    )
                                                                        ->where('id', $rooms['id'])
                                                                        ->where('status', true)
                                                                        ->first();
                                                                }
                                                            @endphp
                                                            <div class="radiomeals">
                                                                <div class="d-flex gap-2 align-items-baseline"><input
                                                                        type="radio"
                                                                        name="meal_price{{ $rooms['id'] }}"
                                                                        checked="checked"
                                                                        onchange="handleMealChange('{{ $rooms['id'] }}')"
                                                                        value="{{ $paisa->only_room }}" /><span
                                                                        class=""> Only Room</span></div>
                                                                <div class="d-flex gap-2 align-items-baseline"><input
                                                                        type="radio"
                                                                        name="meal_price{{ $rooms['id'] }}"
                                                                        class="mt-4"
                                                                        onchange="handleMealChange('{{ $rooms['id'] }}')"value="{{ $paisa->room_with_breakfast }}" /><span
                                                                        class=""> Room With Breakfast</span></div>
                                                                <div class="d-flex gap-2 align-items-baseline"><input
                                                                        type="radio"
                                                                        name="meal_price{{ $rooms['id'] }}"
                                                                        class="mt-4"
                                                                        onchange="handleMealChange('{{ $rooms['id'] }}')"
                                                                        value="{{ $paisa->room_with_breakfast_dinner }}" /><span
                                                                        class=""> Room With Breakfast Dinner</span>
                                                                </div>
                                                                <div style="display: flex; gap:4px; align-items:baseline;">
                                                                    <input type="radio"
                                                                        name="meal_price{{ $rooms['id'] }}"
                                                                        class="mt-4"
                                                                        onchange="handleMealChange('{{ $rooms['id'] }}')"
                                                                        value="{{ $paisa->room_with_breakfast_lunch_dinner }}" /><span
                                                                        class=""> Room With Breakfast Lunch
                                                                        Dinner</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="d-flex flex-column facilitygrid">
                                                        @foreach ($rooms->facilities as $facility)
                                                            <div class="d-flex items-center p-1">
                                                                <div class="text-15">
                                                                    &nbsp;{{ $facility->facility }}</div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="inclusiongrids">
                                                    <div class="meal_types{{ $rooms['id'] }}">
                                                        <h5> Only Room</h5>
                                                    </div>

                                                    <div class="mt-3">
                                                        @foreach ($rooms->benefits as $benefit)
                                                            <div class="d-flex items-center text-green-2 mt-2">
                                                                <i class="fa-solid fa-check me-1 p-1"></i>
                                                                <div class="text-15">{{ $benefit->benefit }}</div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div></div>
                                            </div>
                                        </div>
                                        <div class="lastGrid__content">
                                            <div class="text-14">1 rooms for
                                                <span style="float:right; font-weight:800;"
                                                    class="meal_room_price_actual{{ $rooms['id'] }}">
                                                    ₹ {{ $paisa->only_room }}
                                                </span>
                                            </div>
                                            <div class="text-22 fw-bold mt-1">
                                                @php
                                                    $filterSetPrice = intval($paisa->only_room);
                                                    $setPrice = (intval($filterSetPrice) * 2) / 100;
                                                    $setPriceFinal = $filterSetPrice - $setPrice;
                                                @endphp
                                                <span class="meal_room_price{{ $rooms['id'] }}">
                                                    ₹ {{ $setPriceFinal }}
                                                </span>
                                                <span style="font-size: 14px;">
                                                    (2% off)
                                                </span>
                                            </div>
                                            <input type="hidden" id="mealTypeHidden{{ $rooms['id'] }}"
                                                value="1" />
                                            <a href="#"
                                                onclick="reserveRooms{{ $rooms->id }}{{ $hId }}('{{ $rooms->id }}', '{{ $hId }}');"
                                                class="button-29 my-2">Reserve ↗</a>
                                            <div class="my-3" style="font-size: 14px">
                                                You‘ll be taken to the next step
                                            </div>
                                            <ol class="text-14">
                                                <li>Confirmation is immediate</li>
                                                <li>No registration required</li>
                                                <li>No booking or credit card fees!</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function reserveRooms{{ $rooms->id }}{{ $hId }}(roomId, hId) {
                            var mealTypeHidden = $('#mealTypeHidden' + roomId).val();

                            if (roomId != "" && hId != "" && mealTypeHidden != "") {
                                window.location.href = `/hotel-room-booking-payment/${roomId}/${hId}/${mealTypeHidden}`;
                            }
                        }
                    </script>
                @empty
                    <h6 class="text-danger">Rooms not available.</h6>
                @endforelse
            </div>
        </section>
    </main>
    @push('scripts')
    <script>
        $(document).ready(function() {
            $(".total-persons-selector").on("click", function() {
                $("#dropdownMenu").css("display", function(index, value) {
                    return value === "none" ? "block" : "none";
                });
            });


            $("#checkinDate")
                .datepicker({
                    autoclose: true,
                    format: "mm/dd/yyyy",
                    todayHighlight: true,
                    orientation: "bottom",
                })
                .on("changeDate", function(selected) {
                    var minDate = new Date(selected.date.valueOf());
                    $("#checkoutDate").datepicker("setStartDate", minDate);
                    $("#checkoutDate").datepicker("setDate", minDate);
                    $("#checkoutDate").focus();
                });

            $("#checkoutDate").datepicker({
                autoclose: true,
                format: "mm/dd/yyyy",
                todayHighlight: true,
                orientation: "bottom",
            });

            $('.destination_value').val({{ $hotelId }}).change();
            $('.destination_value').prop('disabled', true);
        });


        function handleMealChange(room_id) {
            var selectedRadio = document.querySelector(`input[name="meal_price${room_id}"]:checked`);

            // Check if a radio button is selected
            if (selectedRadio) {
                var selectedValue = selectedRadio.value;

                // Get the associated <span> element
                var selectedTextSpan = selectedRadio.nextElementSibling;

                // Get the text content of the <span> element
                var selectedText = selectedTextSpan.textContent;

                // Output the selected value and text
                var calPrice = selectedValue * 2 / 100;
                var CalPriceFinal = selectedValue - calPrice;

                // Update UI or perform other actions based on the selected value and text
                $('.meal_room_price_actual' + room_id).text('₹' + selectedValue);
                $('.meal_room_price' + room_id).text('₹' + CalPriceFinal);
                $('.meal_types' + room_id).text(selectedText);

                // Set the value of mealTypeHidden input
                selectedText = selectedText.trim();

                if (selectedText == "Only Room") {
                    $('#mealTypeHidden' + room_id).val(1);
                } else if (selectedText == "Room With Breakfast") {
                    $('#mealTypeHidden' + room_id).val(2);
                } else if (selectedText == "Room With Breakfast Dinner") {
                    $('#mealTypeHidden' + room_id).val(3);
                } else {
                    $('#mealTypeHidden' + room_id).val(4);
                }
            }
        }

        let Counter = 1;

        function selectTravellers(type, level, room) {
            // var room = $("#travRooms").val();
            var adults = $('#adultInput' + room).val();
            var child = $('#childInput' + room).val();
            var total = parseInt(adults) + parseInt(child);
            if (total == 4) {
                addRoom();
                return;
            }
            if (type == 'adults') {

                if (level == 'decrease') {
                    if (adults == '1') {
                        $('#adultInput' + room).val(1);
                        return;
                    }

                    if (total <= 4) {
                        var adu = parseInt(adults) - 1;
                        $('#adultInput' + room).val(adu);
                    }

                } else {
                    if (total < 4) {
                        var adu = parseInt(adults) + 1;
                        $('#adultInput' + room).val(adu);
                    }
                }

            } else {
                if (level == 'decrease') {
                    if (child == '0') {
                        return;
                    }

                    if (total <= 4) {
                        var chi = parseInt(child) - 1;
                        $('#childInput' + room).val(chi);
                    }

                } else {
                    if (total < 4) {
                        var chi = parseInt(child) + 1;
                        $('#childInput' + room).val(chi);
                    }
                }
            }

            // $('#totalPersonsInput').val(room+' Room '+total+' Guest');
            getTotalTravellers(Counter);
        }

        function addRoom() {

            const container = document.getElementById("dropdownMenu");

            // var room = parseInt($("#travRooms").val());
            // var room = 1;
            var roomCounter = Counter + 1;

            if (roomCounter >= 4) {
                return;
            } else {
                var divs = document.getElementsByClassName("applyBtnId");
                var divsArray = Array.from(divs);
                divsArray.forEach(function(div) {
                    div.parentNode.removeChild(div);
                });

                const newDiv = document.createElement("div");
                newDiv.className = `room${roomCounter}`;

                const addRoom = `
                <span class="m-2 fw-bold" style="font-size: small">
                Room ${roomCounter}
                </span>
                <div class="dropdown-item">
                <div class="" style="margin-right: 1rem">
                <label>Adults<span> (13-99Y)</span></label>
                </div>
                <div class="inc_dec">
                <div class="row">
                    <a href="#" onclick="selectTravellers('adults', 'decrease', ${roomCounter});">➖</a>
                    <input
                    id="adultInput${roomCounter}"
                    class="adult-input${roomCounter} getAdults"
                    name="trav_adults"
                    data-value
                    type="text"
                    value="2"
                    readonly
                    />
                    <a href="#" onclick="selectTravellers('adults', 'increase', ${roomCounter});">➕</a>
                </div>
                </div>
                </div>
                <div class="dropdown-item">
                <div class="" style="margin-right: 1rem">
                <label>Children<span> (3-12Y)</span></label>
                </div>
                <div class="inc_dec">
                <div class="row">
                    <a href="#" onclick="selectTravellers('child', 'decrease', ${roomCounter});">➖</a>
                    <input
                    id="childInput${roomCounter}"
                    class="child-input${roomCounter} getChild"
                    name="trav_child"
                    data-value
                    type="text"
                    min="0"
                    value="0"
                    readonly
                    />
                    <a href="#" onclick="selectTravellers('child', 'increase', ${roomCounter});">➕</a>
                </div>
                </div>
                </div>
                <div class="d-flex">
                <a href="#" class="btn btn-outline-danger" onclick="removeRoom('room' + ${roomCounter});" id="room${roomCounter}">Remove room</a>
                <div class="applyBtnId"></div>
                </div>
                `;

                newDiv.innerHTML = addRoom;
                container.appendChild(newDiv);

                const applyBtnContainer = newDiv.querySelector('.applyBtnId');
                const applyBtn = document.createElement('a');
                applyBtn.href = "#";
                applyBtn.className = "btn btn-outline-primary";
                applyBtn.textContent = "Apply";
                applyBtn.onclick = applyFilterData;
                applyBtnContainer.appendChild(applyBtn);

                Counter = roomCounter;

                getTotalTravellers(roomCounter);
                // $("#travRooms").val(roomCounter);

            }
        }

        function removeRoom(roomClass) {

            if (Counter === 3 && roomClass !== "room3") {

                Swal.fire({
                    icon: 'error',
                    title: 'Alert!',
                    text: 'To remove a room, please remove the last room first!',
                });

                getTotalTravellers(Counter);

                return;
            }

            // // Select the div element with the specified class name
            var roomDiv = document.querySelector("." + roomClass);

            // Check if the div exists
            if (roomDiv) {
                // Remove the div and its contents
                roomDiv.remove();
                // if(Counter=='3'){
                //   var roomAnchor = document.getElementById(roomClass);
                //   if (roomAnchor) {
                //     // Remove the anchor tag
                //     roomAnchor.hide();
                //   }
                // }
                Counter = Counter - 1;


            } else {
                console.error("Room not found.");
            }
            getTotalTravellers(Counter);
        }

        function getTotalTravellers(rooms) {
            // Get all elements with the specified class
            var adultsInputs = document.getElementsByClassName("getAdults");
            var childInputs = document.getElementsByClassName("getChild");

            // Initialize an array to hold the data for each room
            var roomsData = [];

            // Loop through each room
            for (var i = 0; i < rooms; i++) {
                // Parse the value of the input field for adults and children
                var adults = parseInt(adultsInputs[i].value) || 0;
                var children = parseInt(childInputs[i].value) || 0;

                // Push an object representing the current room to the array
                roomsData.push({
                    room: i + 1,
                    adults: adults,
                    children: children
                });
            }

            // Convert the array to JSON format
            var jsonData = JSON.stringify(roomsData);

            $("#setJsonData").val(jsonData);

            return jsonData;
        }

        function setNights() {
            var checkIn = new Date($('#checkinDate').val());
            var checkOut = new Date($('#checkoutDate').val());

            // Check if either check-in or check-out dates are invalid
            if (isNaN(checkIn.getTime()) || isNaN(checkOut.getTime())) {
                return;
            }

            // Calculate the difference in milliseconds
            var timeDifference = checkOut.getTime() - checkIn.getTime();

            // Convert the difference to days
            var nightDifference = timeDifference / (1000 * 3600 * 24);

            if (nightDifference == '0') {
                nightDifference = 1;
            }
            $('#setNightsDiff').val(nightDifference);
        }

        function applyFilterData() {
            var values = $('#setJsonData').val();
            // Parse JSON string to JavaScript object
            var data = JSON.parse(values);

            // Initialize variables to hold total values
            var totalRooms = data.length; // Count the number of objects in the array
            var totalAdults = 0;
            var totalChildren = 0;

            // Iterate over each object in the array
            data.forEach(function(item) {
                // Add adults and children values to the totals
                totalAdults += item.adults;
                totalChildren += item.children;
            });

            var guest = totalAdults + totalChildren;

            $("#totalPersonsInput").val(`${totalRooms} Room ${guest} Guest`);
            var element = document.getElementById("dropdownMenu");
            element.classList.remove("show");
            $("#dropdownMenu").hide();
        }
    </script>
@endpush
@endsection
