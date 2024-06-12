@extends('front.layouts.main')
@section('content')
    <style>
        .hidden {
            display: none;
        }
    </style>

    <main id="main">

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

        <div class="search-container">
            <div class="container p-lg-2 mt-lg-2 mt-sm-2">
                <div class="row">
                    <div class="col-lg-3 sidebar_hotel">
                        <div class="row mt-2 justify-content-between">
                            <div class="filter-card border-right">
                                <h3 class="fw-bolder">Filter</h3>
                                <form method="get" action="{{ route('hotels') }}">
                                    <div class="filtercategory">
                                        <h3>Star Rating</h3>
                                        @for ($i = 5; $i >= 1; $i--)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="rating[]" value="{{ $i }}"
                                                        {{ in_array($i, (array) request('rating', [])) ? 'checked' : '' }}>
                                                    @for ($j = 0; $j < $i; $j++)
                                                        <span class="fa fa-star checked"></span>
                                                    @endfor
                                                    <span>{{ $i }} rating</span>
                                                </label>
                                            </div>
                                        @endfor
                                    </div>

                                    <div class="filtercategory">
                                        <h3>Property Type</h3>
                                        @foreach (['Hotel', 'Villa', 'Resort', 'Apartment', 'Guest House', 'Hostel', 'Hotel & Resort'] as $type)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="property_type[]"
                                                        value="{{ $type }}"
                                                        {{ in_array($type, (array) request('property_type', [])) ? 'checked' : '' }}>
                                                    <span>{{ $type }}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="filtercategory">
                                        <h3>Budget Per Night(In Rs.)</h3>
                                        @foreach (['low', 'medium', 'high'] as $priceRange)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="price[]" value="{{ $priceRange }}"
                                                        {{ in_array($priceRange, (array) request('price', [])) ? 'checked' : '' }}>
                                                    <span>{{ ucwords(str_replace('-', ' - ', $priceRange)) }}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row mt-2">
                                        <div class="d-flex gap-2">
                                            <button type="submit" class="btn btn-primary px-4">Filter</button>

                                            <a href="{{ route('hotels') }}" class="btn btn-outline-primary px-3">Clear
                                                Filter</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        @forelse($kazi_hotels as $hotel)
                            <div class="row search-card-result" style="background-color:rgb(248, 250, 252);">
                                <div class="col-md-4 image_carousel">
                                    <div id="carouselExampleControls{{ $hotel->id }}"
                                        class="carousel slide first_image" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach ($hotel['images'] as $key => $image)
                                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                    <img src="{{ asset($image['image']) }}" class="d-block w-100"
                                                        alt="{{ $hotel->name }}">
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleControls{{ $hotel->id }}"
                                            data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleControls{{ $hotel->id }}"
                                            data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>

                                    <div class="imghotelList">
                                        @php
                                            $showCount = 3;
                                            $totalImages = count($hotel['images']);
                                        @endphp
                                        @if ($totalImages > 0)
                                            @foreach ($hotel['images'] as $key => $image)
                                                <span class="imghotelCont{{ $key >= $showCount ? ' hidden' : '' }}">
                                                    <a href="{{ asset($image['image']) }}"
                                                        data-gallery="portfolio-gallery-app{{ $hotel->id }}"
                                                        class="glightbox">
                                                        <img class="imghotel" src="{{ asset($image['image']) }}"
                                                            alt="...">
                                                    </a>
                                                </span>
                                            @endforeach

                                            <span class="imghotelCont smokyBg">
                                                <a href="{{ asset($hotel['images'][0]['image']) }}"
                                                    data-gallery="portfolio-gallery-app{{ $hotel->id }}"
                                                    class="glightbox">
                                                    <img class="imghotel"
                                                        src="{{ asset($hotel['images'][0]['image']) }}">
                                                    <span class="viewAllText">View All</span>
                                                </a>
                                            </span>

                                            @for ($i = 1; $i < count($hotel->images); $i++)
                                                <a href="{{ asset($hotel->images[$i]['image']) }}"
                                                    data-gallery="portfolio-gallery-remodeling2"
                                                    class="glightbox preview-link" style="display: none;">
                                                    <img class="next_imgs"
                                                        src="{{ asset($hotel->images[$i]['image']) }}" />
                                                </a>
                                            @endfor
                                        @else
                                            <p>Images not available.</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="title_star mt-2 mb-1">
                                        <h5>
                                            <a
                                                href="{{ route('hotel-details', ['slug' => $hotel['slug']]) }}">{{ $hotel['name'] }}</a>
                                        </h5>
                                        <div class="review mt-1">
                                            @for ($i = 0; $i < $hotel->rating; $i++)
                                                <span class="fa fa-star checked"></span>
                                            @endfor
                                        </div>
                                    </div>

                                    <p class="hotel_subtitle">
                                        <span>
                                            <i class="fa fa-location"></i>
                                            {{ $hotel->address }}
                                        </span>
                                    </p>
                                    <div class="large-icons">
                                        {{-- <i class="fas fa-swimmer m-1 fa-2x"></i>
                                        <i class="fas fa-utensils m-1 fa-2x"></i>
                                        <i class="fas fa-wifi m-1 fa-2x"></i>
                                        <i class="fas fa-car m-1 fa-2x"></i> --}}
                                        <ul class="list-unstyled d-flex">
                                            @forelse ($hotel->amenities??[] as $amenity)
                                                <li>
                                                    <img src="{{ $amenity['amenity']['image'] }}" alt=""
                                                        height="20px" width="20px">
                                                    {{-- {{ $amenity['amenity']['amenity'] }} --}}
                                                </li>
                                            @empty
                                                <h6 class="text-danger text-center">Amenities not available.</h6>
                                            @endforelse
                                        </ul>
                                    </div>
                                    <p class="hotel-description">
                                        {!! Str::limit($hotel->description, 145, '...') ?? '' !!}
                                    </p>
                                    <div>
                                        <img src="{{ asset('front/assets/img/package/couple-transparent-4.png') }}"
                                            class="small-image" alt="couples" height="30px" width="40px" />Couple
                                        Friendly
                                    </div>
                                </div>

                                <div class="col-md-2 border-left text-right more-offers mt-1">
                                    <div class="mobile_flex">
                                        <div class="left_text">
                                            <p class="rev"> {{ $hotel['review_status'] }}&nbsp;
                                                <span class="hotel_badge">{{ $hotel['review'] }}.0</span>
                                            </p>
                                        </div>
                                        <div class="">
                                            {{-- <h4 class="mb-1">₹ 4,499</h4>
                                            <p class="additions mt-2">+ ₹ 462 taxes & fees Per Night</p> --}}
                                            <h4 id="setHotelPrice mb-1">₹ {{ $hotel['price'] }}</h4>
                                            <p class="additions mt-2">+ ₹0 taxes & fees Per Night</p>
                                        </div>
                                    </div>
                                    <div class="rightbuttongroup ">
                                        <a class="btn enquire_now" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            onclick="enquiryNow('{{ $hotel['id'] }}');">
                                            Enquire Now
                                        </a>
                                        <a href="{{ route('hotel-details', ['slug' => $hotel['slug']]) }}"
                                            class="btn view_more">View
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h1>Hotels Not Available.</h1>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <section class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
    <!-- ======testing code=====  -->
    <div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content hotel-enquire-form">
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold justify-content-center" id="exampleModalLabel">Enquiry Now</h5>
                    <button type="button" class="btn-close  btn-close-white fw-bold px-4" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="mt-0">
                        <div class="pop-up-form ps-2 px-2">
                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="pop-up-form ps-2 px-2">
                            <label for="recipient-name" class="col-form-label">Email:</label>
                            <input type="text" class="form-control" id="recipient-Email">
                        </div>
                        <div class="pop-up-form ps-2 px-2">
                            <label for="recipient-name" class="col-form-label">Address:</label>
                            <input type="text" class="form-control" id="recipient-Address">
                        </div>
                        <div class="pop-up-form ps-2 px-2">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-form-reset-popup"
                        data-bs-dismiss="modal">Close</button>
                    <button type="button" class=" btn  btn-hotelform-popup">Send message</button>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.enquire-btn').click(function() {
                    var hotelId = $(this).data('hotel-id');
                    $('#hotel_id').val(hotelId);

                    var hotelName = $(this).data('hotel-name');
                    $('#hotel_name').val(hotelName);
                });



                $(".total-persons-selector").on("click", function() {
                    $("#dropdownMenu").css("display", function(index, value) {
                        return value === "none" ? "block" : "none";
                    });
                });

                // Function to update price labels and hidden input fields
                function updatePriceValues(minValue, maxValue) {
                    $('#minPrice').text('Min ₹' + minValue.toLocaleString());
                    $('#maxPrice').text('Max ₹' + maxValue.toLocaleString());
                    $('#min_price_input').val(minValue);
                    $('#max_price_input').val(maxValue);
                }

                // Update labels and hidden input fields when slider value changes
                $('#priceRange').on('input', function() {
                    updatePriceValues($(this).val(), $('#max_price_input').val());
                });

            });


            $(document).ready(function() {
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
            });



            let Counter = 1;

            function selectTravellers(type, level, room) {
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
                getTotalTravellers(Counter);
            }

            function addRoom() {
                const container = document.getElementById("dropdownMenu");
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
                        <hr class="my-1">
                        <span class="m-2 fw-bold" style="font-size: small">
                            Room ${roomCounter}
                        </span>
                        <hr class="my-1">
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
                            <a href="#" class="btn btn-outline-danger ms-2" onclick="removeRoom('room' + ${roomCounter});" id="room${roomCounter}">Remove room</a>
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
                var roomDiv = document.querySelector("." + roomClass);
                if (roomDiv) {
                    roomDiv.remove();
                    Counter = Counter - 1;
                } else {
                    console.error("Room not found.");
                }
                getTotalTravellers(Counter);
            }

            function getTotalTravellers(rooms) {
                var adultsInputs = document.getElementsByClassName("getAdults");
                var childInputs = document.getElementsByClassName("getChild");
                var roomsData = [];
                for (var i = 0; i < rooms; i++) {
                    var adults = parseInt(adultsInputs[i].value) || 0;
                    var children = parseInt(childInputs[i].value) || 0;
                    roomsData.push({
                        room: i + 1,
                        adults: adults,
                        children: children
                    });
                }
                var jsonData = JSON.stringify(roomsData);
                $("#setJsonData").val(jsonData);
                return jsonData;
            }


            function getTotalTravellers(rooms) {
                var adultsInputs = document.getElementsByClassName("getAdults");
                var childInputs = document.getElementsByClassName("getChild");
                var roomsData = [];
                for (var i = 0; i < rooms; i++) {
                    var adults = parseInt(adultsInputs[i].value) || 0;
                    var children = parseInt(childInputs[i].value) || 0;
                    roomsData.push({
                        room: i + 1,
                        adults: adults,
                        children: children
                    });
                }
                var jsonData = JSON.stringify(roomsData);
                $("#setJsonData").val(jsonData);
                return jsonData;
            }

            function setNights() {
                var checkIn = new Date($('#checkinDate').val());
                var checkOut = new Date($('#checkoutDate').val());
                if (isNaN(checkIn.getTime()) || isNaN(checkOut.getTime())) {
                    return;
                }
                var timeDifference = checkOut.getTime() - checkIn.getTime();
                var nightDifference = timeDifference / (1000 * 3600 * 24);
                if (nightDifference == '0') {
                    nightDifference = 1;
                }
                $('#setNightsDiff').val(nightDifference);

            }

            function applyFilterData() {
                var values = $('#setJsonData').val();
                var data = JSON.parse(values);
                var totalRooms = data.length;
                var totalAdults = 0;
                var totalChildren = 0;
                data.forEach(function(item) {
                    totalAdults += item.adults;
                    totalChildren += item.children;
                });
                var guest = totalAdults + totalChildren;
                $("#totalPersonsInput").val(`${totalRooms} Room ${guest} Guest`);
                var element = document.getElementById("dropdownMenu");
                element.classList.remove("show");
                $("#dropdownMenu").hide();
            }

            //for safari booking enquiry
            $(".mobile_noss").keyup(function(event) {
                if ($(this).val().length == 10 && $('.namess').val() != '') {
                    var type = 'hotel';

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "Post",
                        dataType: "json",
                        url: "{{ route('save-enquiry') }}",
                        data: {
                            'type': type,
                            'booking_date': $('.calendarss').val(),
                            'timing': $('.time_slotss').val(),
                            'mode': $('#mode').val() ?? '',
                            'name': $('.namess').val(),
                            'phone': $(this).val(),
                            'email': $('.emailss').val()
                        },
                        success: function(data) {}
                    });
                }
            });


            $(".show-more").click(function() {
                if ($(".text").hasClass("show-more-height")) {
                    $(this).text("Show Less");
                } else {
                    $(this).text("Show More");
                }

                $(".text").toggleClass("show-more-height");
            });
        </script>
    @endpush
@endsection
