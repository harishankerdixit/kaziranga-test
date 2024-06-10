<!-- -----slider----- -->
<style>
    li.halfPayment label span {
        padding: 10px;
        border: 2px solid #ffea00;
        border-radius: 5px;
        color: #ebebeb;
        transition: background-color 0.3s, color 0.3s;
    }

    li.fullPayment label span {
        padding: 10px;
        border: 2px solid #ffea00;
        border-radius: 5px;
        color: #fff;
        transition: background-color 0.3s, color 0.3s;
    }
</style>
<div class="container safari_package">
    <div class="container_nation">
        <div class="switches-container">
            <input type="radio" id="switchIndia" name="btnradio" value="indian" checked onchange="calculateRooms();" />
            <input type="radio" id="switchForeign" name="btnradio" value="foreigner" onchange="calculateRooms();" />
            <label for="switchIndia">Indian</label>
            <label for="switchForeign">Foreigner</label>
            <div class="switch-wrapper">
                <div class="switch">
                    <div>Indian</div>
                    <div>Foreigner</div>
                </div>
            </div>
            <input name="nationality_type" type="hidden" value="indian" id="nationality">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs">
                @forelse ($kazi_package->available_categories??[] as $kk => $category)
                    <li class="nav-item">
                        <label class="nav-link removeActive  @if ($loop->first) active @endif"
                            id="active{{ $category->id }}">
                            <input type="radio" onClick="changeCategory({{ $kazi_package->id }},{{ $category->id }})"
                                class="btn-check categoryBtn" data-val="{{ strtolower($category->category) }}"
                                id="    {{ $category->id }}" name="btnradiocat" value="{{ $category->id }}"
                                @if ($kk == 0) checked="checked" @endif>
                            <span class="forcustom">{{ $category->category }}</span>
                        </label>
                    </li>
                @empty
                    <h6 class="text-white">Hotels not available in this package.</h6>
                @endforelse
            </ul>
            <div class="tab-content">
                @forelse ($kazi_package->available_categories??[] as $key => $category)
                    <div id="category_{{ $category->id }}"
                        class="tab-pane fade show @if ($key == 0) active @endif">
                        <div class="row">
                            <!-- Testimonials Section -->
                            <section id="testimonials" class="testimonials pb-0">
                                <div class="container">
                                    <div class="slides-{{ $category->id }} swiper" data-aos-delay="100">
                                        <div class="swiper-wrapper">
                                            <!-- Images for this category will be dynamically populated here -->
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                            </section>
                        </div>
                    </div>
                @empty
                    <h6>Room categories not available.</h6>
                @endforelse
            </div>
        </div>
    </div>


    <div class="form-container" id="form-container">
        <h4>Proceed with your information</h4>
        <table style="color: white; border:1px solid white;">

            <thead>
                <tr>
                    <th>Travel Date</th>
                    <th>Adults</th>
                    <th>Kids</th>
                    <th>No. of Rooms</th>
                    <th>Safari Goers</th>
                    <th>Total Calculated Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Travel Date"><input type="date" class="form-control date" name="travel_date"
                            id="travel_date" min="2023-10-19" onchange="getPrices(null);">
                        {{-- <span id="date_span_id" style="color:red; font-size:12px;"></span> --}}
                    </td>
                    <td data-label="Adults">
                        <span class="input-number-decrement" onClick="totalCountingDecrease('adults');">
                            –
                        </span>
                        <input class="input-number" id="adults" type="text" value="1" min="0"
                            max="100">
                        <span class="input-number-increment" onClick="totalCountingIncrease('adults');">
                            +
                        </span>
                    </td>
                    <td data-label="Kids">
                        <span class="input-number-decrement" onClick="totalCountingDecrease('childs');">
                            –
                        </span>
                        <input class="input-number" id="childs" type="text" value="0" min="0"
                            max="100">
                        <span class="input-number-increment" onClick="totalCountingIncrease('childs');">
                            +
                        </span>
                    </td>
                    <td data-label="No. of Rooms">
                        <span class="input-number-decrement" onclick="calculateRooms();">
                            –
                        </span>
                        <input class="input-number" id="rooms" type="text" value="1" min="0"
                            max="10">
                        <span class="input-number-increment" onclick="calculateRooms();">
                            +
                        </span>
                    </td>
                    <td data-label="Total Safari Members">
                        <span name="safariMembers" id="safari-members"></span>
                    </td>
                    <td data-label="Total Price">
                        <span name="safariPrice" id="final-price"></span>
                    </td>
                </tr>
            </tbody>
        </table>


        <div class="col-lg-12 mt-1">
            <input type="hidden" name="type" id="type" value="package">
            <input type="hidden" name="package_id" value="{{ $kazi_package->id }}">
            <input type="hidden" name="package_name" id="package_name" value="{{ $kazi_package->name }}"
                id="package_name">
            <input type="hidden" name="option_id" value="" id="option_id">
            <input type="hidden" name="hotel_type" id="hotel_type" value="{{ $category->category ?? '' }}">
            <input type="hidden" name="payable_amount" id="payable_amount" value="0">
            <div class="jeep_goers">
                <div class="row">
                    {{-- <div class="col-md-2 mt-2 form-group">
                        <input type="date" id="date" class="form-control date" name="travel_date"
                            min="2023-10-19">
                    </div> --}}
                    <div class="col-md-3 mt-2 form-group">
                        <input type="text" name="name" class="form-control name" id="name"
                            placeholder="Your Name" required>
                    </div>
                    <div class="col-md-2 mt-2 form-group ">
                        <input type="tel" id="phone" name="phone" required class="form-control phone"
                            placeholder="Your Phone no." required>
                    </div>
                    <div class="col-md-2 mt-2 form-group ">
                        <input type="email" class="form-control email" name="email" id="email"
                            placeholder="Your Email" required>
                    </div>
                    <div class="col-md-3 mt-2 form-group">
                        <select class="form-select state" id="state" required>
                            @foreach ($states as $state)
                                <option value="{{ $state['state'] }}">{{ $state['state'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mt-2 form-group">
                        <input type="text" name="country" class="form-control country" id="country"
                            placeholder="Your Country" required>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="button" class="proceed-button" onclick="bookingPaymentModal();">Proceed</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdropss" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header"
                style="background-image: radial-gradient(100% 100% at 100% 0, #ffca91 0, rgb(255, 106, 56) 100%);">
                <h3>Booking Overview</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background-color: #0c0b09;">
                <main id="main">
                    <div class="container traveler-container">
                        <div class="row">
                            <div class="col-md-5 col-sm-12">
                                <div class="traveler-D">
                                    <h4 class="text-center my-4"><strong>Traveler Details</strong></h4>
                                    <table class="table table-bordered border-dark table-striped"
                                        style="box-shadow: 5px 10px #c1782a">
                                        <tbody>
                                            <tr>
                                                <td>Travel Date :</td>
                                                <td id="date1">2023-11-15</td>
                                            </tr>
                                            <tr>
                                                <td>Name :</td>
                                                <td id="name1">v</td>
                                            </tr>
                                            <tr>
                                                <td>Mobile :</td>
                                                <td id="mobile1">5678900121</td>
                                            </tr>
                                            <tr>
                                                <td>Email ID :</td>
                                                <td id="email1">c@gmail.com</td>
                                            </tr>
                                            <tr>
                                                <td>Packages :</td>
                                                <td id="package1">Corbett Fun Tour With 1 Jeep Safari</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <div class="package-D">
                                    <h4 class="text-center my-4"><strong>Package Details</strong></h4>
                                    <table class="packdetails table table-bordered border-dark table-striped">
                                        <tbody style="box-shadow: 5px 10px #c1782a">
                                            <tr>
                                                <td>Package :</td>
                                                <td id="category1">Standard</td>
                                            </tr>
                                            <tr>
                                                <td>Adults :</td>
                                                <td id="adults1">1</td>
                                            </tr>
                                            <tr>
                                                <td>Kids :</td>
                                                <td id="child1">2</td>
                                            </tr>
                                            <tr>
                                                <td>No of Rooms :</td>
                                                <td id="room1">1 Room</td>
                                            </tr>
                                            <tr>
                                                <td>Safari Members :</td>
                                                <td class=" SafariMembers" id="members1">3</td>
                                            </tr>
                                            <tr>
                                                <td>Price (RS) :</td>
                                                <td id="package-price">14600</td>
                                            </tr>
                                            <tr>
                                                <td>GST :</td>
                                                <td class=" taxamt" id="gst1">730</td>
                                            </tr>
                                            <tr class="payment_row">
                                                <td class=" text-left">Payable Amount:</td>
                                                <td class=" text-right total-payable-amount1"
                                                    id="total-payable-amount">15330</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12 paydiv">
                                <div class="paynowoption">
                                    <ul class="list-inline usertype">
                                        <li class="halfPayment">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" value="0"
                                                        class="nationality-type halfop half-payable-amount1"
                                                        name="pay-payment" data-val="half-paid">
                                                    <span
                                                        class="forcustom half-payable-amount half-payable-amount1-text">Pay
                                                        50% ( INR 7665)</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="fullPayment">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" value="0"
                                                        class="nationality-type fullop total-payable-amount2"
                                                        name="pay-payment" checked="" data-val="paid">
                                                    <span
                                                        class="forcustom total-payable-amount total-payable-amount2-text">Pay
                                                        full (INR 15330)</span>
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="paymentfooter">
                                    <button type="button" id="razorpay" class="btn btn-success paynow">Pay
                                        Now</button>
                                    <button type="button" id="goback" class="btn btn-danger goback"
                                        onclick="goBackModal();">Go back</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </main>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        changeCategory("{{ $kazi_package->id }}", $("input[name='btnradiocat']:checked").val());

        function changeCategory(package_id, category_id) {
            $(".date").val('');
            $(".removeActive").removeClass("active");
            $("#active" + category_id).addClass("active");

            $("[id^='category_']").hide();
            $("#category_" + category_id).show();

            $(".bookingForm").trigger("reset");
            $("#final-price").html('');
            $("#safari-members").html('');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('getHotelImages') }}",
                data: {
                    package_id: package_id,
                    category_id: category_id
                },
                success: function(resp) {
                    let result = JSON.parse(resp);
                    let html = "";

                    result.data.forEach((value) => {
                        var hotelImages = value.hotel.images;
                        var hotelName = value.hotel.name;

                        hotelImages.forEach((item) => {
                            html += `<div class="swiper-slide">
                                        <div class="testimonial-wrap">
                                            <div class="testimonial-item">
                                                <div class="portfolio-item">
                                                    <div class="portfolio-wrap">
                                                        <img src="{{ asset('${item}') }}" class="img-fluid" alt="${hotelName}">
                                                    </div>
                                                    <h4>${hotelName}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                        });
                    });

                    // // Insert the constructed HTML into the carousel
                    // $(".roomSlider").html(html);


                    // Clear previous images and populate images for the current category
                    $(".slides-" + category_id + " .swiper-wrapper").empty().html(html);

                    // Destroy previous Swiper instance if it exists
                    if ($(".slides-" + category_id).hasClass('swiper-container-initialized')) {
                        $(".slides-" + category_id)[0].swiper.destroy();
                    }

                    // getPrices(null);

                    new Swiper(".slides-" + category_id, {
                        speed: 600,
                        loop: true,
                        autoplay: {
                            delay: 5000,
                            disableOnInteraction: false
                        },
                        slidesPerView: 'auto',
                        pagination: {
                            el: ".slides-" + category_id + ' .swiper-pagination',
                            type: 'bullets',
                            clickable: true
                        },
                        navigation: {
                            nextEl: ".slides-" + category_id + ' .swiper-button-next',
                            prevEl: ".slides-" + category_id + ' .swiper-button-prev',
                        },
                        breakpoints: {
                            320: {
                                slidesPerView: 1,
                                spaceBetween: 40
                            },
                            768: {
                                slidesPerView: 2,
                                spaceBetween: 10
                            },
                            1200: {
                                slidesPerView: 3,
                            }
                        }
                    });
                }
            });
        }

        var optionData;

        // function handleCost(r) {
        //     var dataTypes = $("input[name='btnradio']:checked").val()
        //     if (dataTypes == "indian") {
        //         $(".costRemoveActive").removeClass("active");
        //         $(".costRemoveActiveInd").addClass("active");
        //     }
        //     if (dataTypes == "foreigner") {
        //         $(".costRemoveActive").removeClass("active");
        //         $(".costRemoveActiveFor").addClass("active");
        //     }
        //     // return;

        //     // optionData = [];
        //     let room_price = ""
        //     let extra_bed_ch = ""
        //     let adult_extra_bed_price = ""
        //     let s_de_price = ""
        //     var nationality = $("input[name='btnradio']:checked").val();
        //     var category_id = $("input[name='btnradiocat']:checked").val();
        //     var category_name = $("input[name='btnradiocat']:checked").attr('data-val');
        //     var package_id = "{{ $kazi_package->id }}";
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        //     $.ajax({
        //         type: "Post",
        //         dataType: "json",
        //         url: "{{ route('kazirangaPackageOption') }}",
        //         data: {
        //             category_id: category_id,
        //             package_id: package_id,
        //             type: nationality
        //         },
        //         success: function(response) {
        //             optionData = response.data[0]; //hotel_type
        //             $('#option_id').val(optionData.id);
        //             $('#hotel_type').val(category_name);
        //         },

        //     });
        //     setTimeout(function() {
        //         room_price = optionData.price;
        //         extra_bed_ch = optionData.extra_bed_ch;
        //         adult_extra_bed_price = optionData.extra_beds;
        //         s_de_price = optionData.s_de_price;
        //         var adlts = parseInt(document.querySelector("#adults").value);
        //         var chlds = parseInt(document.querySelector("#childs").value);
        //         var trm = (r == null) ? Math.ceil(((adlts + chlds) / 4)) : r;
        //         var left_person = Math.max(0, parseInt((adlts + chlds) - (trm * 2)));
        //         var adult_extra_bed = Math.max(0, parseInt(left_person - chlds));
        //         $('#rooms').val(trm);
        //         $('#safari-members').html(adlts + chlds);

        //         var jeep = adlts + chlds;
        //         var safari_price = parseInt(s_de_price) * jeep;
        //         var cost = parseInt((trm) * room_price) + parseInt(chlds * extra_bed_ch) + parseInt(
        //             adult_extra_bed_price * adult_extra_bed) + safari_price;
        //         $('#final-price').html(cost);
        //         $('#payable_amount').val(cost);
        //     }, 1000);
        // }

        //////////////////////////////////////////////////////////////////////////////////////
        function getPrices(r) {
            var dataTypes = $("input[name='btnradio']:checked").val();
            if (dataTypes == "indian") {
                $(".costRemoveActive").removeClass("active");
                $(".costRemoveActiveInd").addClass("active");
            }
            if (dataTypes == "foreigner") {
                $(".costRemoveActive").removeClass("active");
                $(".costRemoveActiveFor").addClass("active");
            }

            let element = $('#travel_date');
            let hotel_type = $("input[name='btnradiocat']:checked").attr('data-val');
            let nationality = $("input[name='btnradio']:checked").val();
            // element[0].addEventListener('input',function(e){
            let selected_date = element.val();
            if (selected_date == '') {
                let currentDate = new Date();
                let year = currentDate.getFullYear();
                let month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Month is zero-based
                let day = String(currentDate.getDate()).padStart(2, '0');
                let selected_date = `${year}-${month}-${day}`;

                // $("#date_span_id").html("Please Select Travel Date!").fadeIn(2000).fadeOut(7000);
                alert("Please Choose Travel Date!");
                return;
            }
            $.ajax({
                url: "{{ route('check.package.festival.date') }}",
                type: "POST",
                data: {
                    selected_date: selected_date,
                    hotel_type: hotel_type,
                    nationality: nationality,
                    package_id: '{{ $kazi_package->id }}',
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    updatePrices((response.success), hotel_type);
                },
                error: function(error) {
                    console.error(error);
                }
            });
            // });
            return true;
        }

        function updatePrices(prices, category) {
            $('#option_id').val(prices.package_option_id);
            let adults = parseInt($('#adults').val());
            let childs = parseInt($('#childs').val());
            let rooms = parseInt($('#rooms').val());
            let total_person = parseInt(adults) + parseInt(childs);

            let room_assign = rooms * 2;
            let left_person = Math.max(0, parseInt(total_person - room_assign));
            let adult_extra_bed = Math.max(0, parseInt(left_person - childs));
            let room_price = parseInt(prices.room_p) * rooms;
            let adult_extra_bed_price = 0;
            let child_extra_bed_price = 0;
            if (left_person) {
                if (adult_extra_bed) {
                    adult_extra_bed_price = parseInt(prices.adult_p) * adult_extra_bed;
                }
                if (childs) {
                    child_extra_bed_price = parseInt(prices.child_p) * childs;
                }
            }
            let jeep = (total_person % 6 != 0) ? (parseInt(total_person / 6) + 1) : (parseInt(total_person / 6));
            let safari_price = parseInt(prices.safari_price) * jeep;

            let grand_total = room_price + adult_extra_bed_price + child_extra_bed_price + safari_price;
            $('#input-no-jeep').val(jeep);
            $('#final-price').html('Rs. ' + grand_total);
            $('#payable_amount').val(grand_total);

            $('#safari-members').html(adults + childs);

            //  var rooms = calculateRooms();
            // var adults = parseInt(document.querySelector("#adults").value);
            // var children = parseInt(document.querySelector("#childs").value);
            var totalPersons = adults + childs;
            var totalRooms = Math.ceil(totalPersons / 4);
            $('#rooms').val(totalRooms);
            // return ;

        }

        function calculateRooms() {
            var adults = parseInt(document.querySelector("#adults").value);
            var children = parseInt(document.querySelector("#childs").value);
            var totalPersons = adults + children;
            var totalRooms = Math.ceil(totalPersons / 4);
            $('#rooms').val(totalRooms);

            getPrices(null);
            // return totalRooms;
        }
        /////////////////////////////////////////////////////////////////////////////////////

        $(document).ready(function() {
            $("#phone").keyup(function(event) {
                if ($(this).val().length == 10 && $('#name').val() != '') {
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
                            'booking_date': $('#date').val(), //
                            'name': $('#name').val(),
                            'phone': $(this).val(),
                            'type': $('#type').val(), //
                            'package_name': $('#package_name').val(), //
                        },
                        success: function(data) {}
                    });
                }

            });
            // getPrices(null);
        });

        function totalCountingIncrease(type) {
            var countElement = document.getElementById(type);
            var count = parseInt(countElement.value);
            if (type === "adults") {
                count++;
                // handleCost(null);
            } else if (type === "childs") {
                count++;
                // handleCost(null);
            }
            countElement.value = count;
            calculateRooms();
        }

        function totalCountingDecrease(type) {
            var countElement = document.getElementById(type);
            var count = parseInt(countElement.value);
            if (type === "adults") {
                if (count > 1) {
                    count--;
                    // handleCost(null);
                }
            } else if (type === "childs") {
                if (count > 0) {
                    count--;
                    // handleCost(null);
                }
            }
            countElement.value = count;
            calculateRooms();
        }

        // function roomChange(sv) {
        //     let room_price = ""
        //     let extra_bed_ch = ""
        //     let adult_extra_bed_price = ""
        //     let s_de_price = ""
        //     var nationality = $("input[name='btnradio']:checked").val();
        //     var category_id = $("input[name='btnradiocat']:checked").val();
        //     var category_name = $("input[name='btnradiocat']:checked").attr('data-val');
        //     var package_id = "{{ $package->id }}";
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        //     $.ajax({
        //         type: "Post",
        //         dataType: "json",
        //         url: "{{ route('kazirangaPackageOption') }}",
        //         data: {
        //             category_id: category_id,
        //             package_id: package_id,
        //             type: nationality
        //         },
        //         success: function(response) {
        //             optionData = response.data[0];
        //         },

        //     });
        //     var ads = parseInt(document.querySelector("#adults").value);
        //     var chs = parseInt(document.querySelector("#childs").value);
        //     var t = Math.ceil(((ads + chs) / 4));
        //     var v = t - 1;
        //     let cost = 0;
        //     if (sv <= v) {
        //         $('#rooms').val($("#rooms option:eq(" + (t - 1) + ")").val());
        //         cost = parseInt((t) * optionData.price) + parseInt(chs * optionData.extra_beds);
        //     } else {
        //         $('#rooms').val($("#rooms option:eq(" + (sv - 1) + ")").val());
        //         cost = parseInt((sv) * room_price) + parseInt(chs * optionData.extra_bed_ch);
        //         getPrices(sv);
        //     }
        // }
    </script>

    {{-- // Razorpay code Start From Here... --}}
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        $('#razorpay').on('click', function(event) {
            event.preventDefault();
            var getFinalData = bookingPaymentModal();

            var key = '{{ getRazorpayKey() }}';
            var dorazorpay = true;
            var secretkey = '{{ getRazorpaySecretKey() }}';
            var amount_without_convenience1 = getFinalData.amount;
            var amount = parseInt(amount_without_convenience1) + parseInt(amount_without_convenience1 * 3 / 100);
            if (amount == 0 && error == false && amount < 0) {
                alert('Please Fill The Booking Details.');
                return false;
            }

            var options = {
                "key_secret": secretkey,
                "key": key,
                "amount": Math.round(amount * 100),
                "name": "Jungle Safari India",
                "description": "Payment",
                "image": "{{ asset('/assets/img/fav-apple-touch.jpeg') }}",
                "handler": function(response) {
                    if (typeof response.razorpay_payment_id != 'undefined' || response.razorpay_payment_id >
                        1 || response.razorpay_payment_id != '') {
                        $('#razorpy_payment_id').val(response.razorpay_payment_id);
                        saveHotelBookingData(
                            getFinalData.name,
                            getFinalData.email,
                            getFinalData.phone,
                            getFinalData.country,
                            getFinalData.state,
                            getFinalData.date,
                            response.razorpay_payment_id,
                            getFinalData.adultCount,
                            getFinalData.childCount,
                            getFinalData.rooms,
                            '{{ $kazi_package->id }}',
                            amount,
                            getFinalData.package_option_id,
                            getFinalData.room_category,
                            getFinalData.paymentType);
                        return false;
                    }
                },
                "modal": {
                    "ondismiss": function() {
                        return false;
                    },
                },
                "prefill": {
                    "contact": $(".phone").val(),
                    "email": $(".email").val(),
                },
                "theme": {
                    "color": "#528FF0"
                }
            };

            setTimeout(function() {
                if (dorazorpay == false) {
                    window.location.href = '/';
                    return false;
                }
                var rzp1 = new Razorpay(options);
                rzp1.open();
                event.preventDefault();
            }, 500);

            $('#save').attr('disabled', false);
        });

        function saveHotelBookingData(name, email, phone, country, state, date, razorpay_payment_id, adultCount, childCount,
            rooms, package_id, amount, package_option_id, room_category, paymentType) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('package-booking-save-final') }}",
                data: JSON.stringify({
                    'name': name,
                    'email': email,
                    'phone': phone,
                    'country': country,
                    'state': state,
                    'date': date,
                    'razorpay_payment_id': razorpay_payment_id,
                    'adultCount': adultCount,
                    'childCount': childCount,
                    'rooms': rooms,
                    'package_id': package_id,
                    'amount': amount,
                    'package_option_id': package_option_id,
                    'room_category': room_category,
                    'paymentType': paymentType,
                }),
                contentType: 'application/json',
                dataType: 'json',
                success: function(response) {
                    if (response.status == "success") {
                        window.location.href = '/payment-success';
                    }

                },
                error: function(error) {
                    console.error(error);
                    $("#error_messagess").html(error).fadeIn(2000).fadeOut(5000);
                }
            });
        }

        function bookingPaymentModal() {
            var error = false;
            var name = $('.name').val();
            var email = $('.email').val();
            var phone = $('.phone').val();
            var date = $('.date').val();
            var country = $('.country').val();
            var state = $('.state').val();

            if (date == '') {
                alert("Please Choose Travel Date!");
                // $("#date_span_id").html("Please Select Travel Date!").fadeIn(2000).fadeOut(7000);
                return;
            }

            $(".booking-errors").remove();
            $(".jeep_goers").each(function() {
                var $this = $(this);
                var date = $this.find('.date').val();
                var name = $this.find('.name').val();
                var phone = $this.find('.phone').val();
                var email = $this.find('.email').val();
                var country = $this.find('.country').val();
                var state = $this.find('.state').val();
                if (date == '' || name == '' || phone == '' || email == '' || country == '' || state == '') {
                    error = true;
                    if (date == '') {
                        $this.find('.date').after(
                            '<span class="text-danger booking-errors" style="font-size:12px;">Please Select Date.</span>'
                        );
                    }
                    if (name == '') {
                        $this.find('.name').after(
                            '<span class="text-danger booking-errors" style="font-size:12px;">Please Enter Name.</span>'
                        );
                    }
                    if (phone == '') {
                        $this.find('.phone').after(
                            '<span class="text-danger booking-errors" style="font-size:12px;">Please Enter Phone Number.</span>'
                        );
                    }
                    if (email == '') {
                        $this.find('.email').after(
                            '<span class="text-danger booking-errors" style="font-size:12px;">Please Enter Email.</span>'
                        );
                    }
                    if (country == '') {
                        $this.find('.country').after(
                            '<span class="text-danger booking-errors" style="font-size:11px;">Please Enter Your Country.</span>'
                        );
                    }
                    if (state == '') {
                        $this.find('.state').after(
                            '<span class="text-danger booking-errors" style="font-size:11px;">Please Select State.</span>'
                        );
                    }
                }
            });

            if (error) {
                return false;
                $('#staticBackdropss').modal('hide');
            }

            var adultCount = $('#adults').val();
            var childCount = $('#childs').val();
            var rooms = $('#rooms').val();
            var package_option_id = $('#option_id').val();
            console.log('package_option_id', package_option_id);
            var room_category = $("input[name='btnradiocat']:checked").attr('data-val');
            var amount_without_convenience = $('#payable_amount').val();
            var amount1 = parseInt(amount_without_convenience);
            var gst = amount1 * 5 / 100;
            var amount = amount1 + parseInt(gst);
            var halfAmount = amount / 2;

            $('#staticBackdropss').modal('show');
            $("#name1").text(name);
            $("#email1").text(email);
            $("#mobile1").text(phone);
            $("#date1").text(date);
            $("#package1").text("{{ $kazi_package->name }}");
            $("#category1").text(room_category);
            $("#adults1").text(adultCount);
            $("#child1").text(childCount);
            $("#room1").text(rooms);
            $("#members1").text(parseInt(adultCount) + parseInt(childCount));
            $("#package-price").text(amount1);
            $("#gst1").text(gst);
            $(".total-payable-amount1").text(amount);
            $(".total-payable-amount2").val(amount);
            $(".half-payable-amount1").val(halfAmount);
            $(".total-payable-amount2-text").text(`Pay Full ( INR ${amount})`);
            $(".half-payable-amount1-text").text(`Pay 50% ( INR ${halfAmount})`);

            var payAmount = $("input[name='pay-payment']:checked").attr('data-val');
            if (payAmount == "half-paid") {
                amountFinal = halfAmount;
                paymentType = "Half";
            } else {
                amountFinal = amount;
                paymentType = "Full";
            }
            return {
                name: name,
                email: email,
                phone: phone,
                date: date,
                country: country,
                state: state,
                adultCount: adultCount,
                childCount: childCount,
                rooms: rooms,
                package_option_id: package_option_id,
                room_category: room_category,
                amount: amountFinal,
                paymentType: paymentType
            };
        }

        function goBackModal() {
            $('#staticBackdropss').modal('hide');
        }
    </script>
@endpush
