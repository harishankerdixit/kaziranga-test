@extends('front.layouts.main')
@section('content')
    <main id="main">
        <div class="floating_form ps-4">
            <div class="container d-flex justify-content-center">
                <form class="row">
                    <div class="form-group">
                        <label>Select Hotel</label>
                        <select class="form-select" id="timing" required>
                            <option value="" disabled selected>All Hotels in Gir</option>
                            <option value="Morning">Hotel Umang</option>
                            <option value="Evening">Amidhara Resort</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>CHECK-IN / CHECK-OUT</label>
                        <div class="d-flex gap-1">
                            <input type="celender" class="form-control" id="checkinDate" placeholder="Check-in Date" />
                            <input type="celender" class="form-control" id="checkoutDate" placeholder="Check-out Date" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="safaribooking-total_persons">Select Travellers</label>
                        <div class="dropdown">
                            <input type="text" id="totalPersonsInput" class="form-control total-persons-selector"
                                value="1 Adult" type="button" />

                            <div class="dropdown-menu" id="dropdownMenu">
                                <span class="m-2 fw-bold" style="font-size: small">
                                    Room 1</span>
                                <div class="dropdown-item">
                                    <div class="" style="margin-right: 1rem">
                                        <label>Adults<span> (13-99Y)</span></label>
                                    </div>

                                    <div class="inc_dec">
                                        <div id="adults" class="row">
                                            <button id="adultDecrease" data-decrease>➖</button>
                                            <input id="adultInput" class="adult-input" data-value type="text"
                                                value="1" />
                                            <button id="adultIncrease" data-increase>➕</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="" style="margin-right: 1rem">
                                        <label>Children<span> (3-12Y)</span></label>
                                    </div>
                                    <div class="inc_dec">
                                        <div id="children" class="row">
                                            <button id="childDecrease" data-decrease>➖</button>
                                            <input id="childInput" class="child-input" data-value type="text"
                                                min="0" value="0" />
                                            <button id="childIncrease" data-increase>➕</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button class="btn btn-outline-success" id="addButton">
                                        Add Room
                                    </button>
                                    <button class="btn btn-outline-danger">Remove room</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="search-group mt-lg-4 mt-md-4 mt-sm-0">
                        <button class="btn btn-success btn-hotelform" type="submit">Search</button>
                        <button class="btn btn-danger btn-form-reset" type="reset">reset</button>
                        <!-- <button class="btn-reset button-29" type="submit">Search</button> -->
                    </div>
                </form>
            </div>
        </div>
        <!-- ======= Breadcrumbs ======= -->
        {{-- <div class="breadcrumbs d-flex align-items-center">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade"></div>
        </div> --}}
        <!-- End Breadcrumbs -->

        <div class="inner_hotel mt-5">
            <div class="container">
                <div class="top mb-4 align-items-center">
                    <div class="d-flex title_side gap-1">
                        <h2>The Montcalm At Brewery London City</h2>
                        <div class="p-1">
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                            <span><i class="fa-solid fa-star"></i></span>
                        </div>
                    </div>

                    <a class="button-29">Select Room &#8599;</a>
                </div>

                <div class="image-group">
                    <div class="first-image">
                        <a href="https://gotrip-reactjs.ibthemespro.com/img/hotels/1.png"
                            data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link">
                            <img class="firstimg" src="https://gotrip-reactjs.ibthemespro.com/img/hotels/1.png" />
                        </a>
                    </div>
                    <div class="other-images">
                        <a href="https://gotrip-reactjs.ibthemespro.com/img/gallery/1/2.png"
                            data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link">
                            <img class="next_imgs" src="https://gotrip-reactjs.ibthemespro.com/img/gallery/1/2.png" />
                        </a>
                        <a href="https://gotrip-reactjs.ibthemespro.com/img/gallery/1/4.png"
                            data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link">
                            <img class="next_imgs" src="https://gotrip-reactjs.ibthemespro.com/img/gallery/1/4.png" />
                        </a>
                        <a href="https://gotrip-reactjs.ibthemespro.com/img/gallery/1/4.png"
                            data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link">
                            <img class="next_imgs" src="https://gotrip-reactjs.ibthemespro.com/img/gallery/1/4.png" />
                        </a>

                        <div class="position-relative">
                            <div class="position-absolute bottom-0 end-0 p-2">
                                <div class="btn px-3 py-2 bg-light text-dark js-gallery" role="button">
                                    <a href="https://gotrip-reactjs.ibthemespro.com/img/gallery/1/4.png"
                                        data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link">See All
                                        Photos</a>
                                </div>
                            </div>
                            <a href="https://gotrip-reactjs.ibthemespro.com/img/hotels/1.png"
                                data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link">
                                <img class="next_imgs" src="https://gotrip-reactjs.ibthemespro.com/img/hotels/1.png" />
                            </a>
                        </div>
                    </div>
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
                                    <div class="col-lg-3 col-6 mt-4">
                                        <div class="text-center texticons">
                                            <i class="material-icons brown">pool</i>
                                            <div class="text-15">Swimming Pool</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6 mt-4">
                                        <div class="text-center texticons">
                                            <i class="material-icons brown">kitchen</i>
                                            <div class="text-15">Kitchen</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6 mt-4">
                                        <div class="text-center texticons">
                                            <i class="material-icons brown">security</i>
                                            <div class="text-15">Safety &amp; security</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6 mt-4">
                                        <div class="text-center texticons">
                                            <i class="material-icons brown">local_parking</i>
                                            <div class="text-15">Parking</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="overview" class="col-12 my-3">
                                <h3 class="text-22 fw-500 pt-40 border-top-light">
                                    Overview
                                </h3>
                                <p class="text-dark-1 text-15">
                                    You can directly book the best price if your travel dates
                                    are available, all discounts are already included. In the
                                    following house description you will find all information
                                    about our listing.<br /><br />2-room terraced house on 2
                                    levels. Comfortable and cosy furnishings: 1 room with 1
                                    french bed and radio. Shower, sep. WC. Upper floor: (steep
                                    stair) living/dining room with 1 sofabed (110 cm, length 180
                                    cm), TV. Exit to the balcony. Small kitchen 2 hot plates,
                                    oven,
                                </p>
                            </div>
                            <div class="col-12 mb-3">
                                <h3 class="text-22 fw-500 border-top-light">
                                    Most Popular Facilities
                                </h3>
                                <div class="row mt-3">
                                    <div class="col-md-5">
                                        <div class="d-flex items-center p-1">
                                            <i class="material-icons">smoke_free</i>
                                            <div class="text-15">&nbsp;Non-smoking rooms</div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="d-flex items-center p-1">
                                            <i class="material-icons">wifi</i>
                                            <div class="text-15">&nbsp;Free WiFi</div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="d-flex items-center p-1">
                                            <i class="material-icons">local_parking</i>
                                            <div class="text-15">&nbsp;Parking</div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="d-flex items-center p-1">
                                            <i class="material-icons">kitchen</i>
                                            <div class="text-15">&nbsp;Kitchen</div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="d-flex items-center p-1">
                                            <i class="material-icons">meeting_room</i>
                                            <div class="text-15">&nbsp;Living Area</div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="d-flex items-center p-1">
                                            <i class="material-icons">security</i>
                                            <div class="text-15">&nbsp;Safety &amp; security</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <aside class="ml-50 lg:ml-0">
                            <div class="px-30 py-30 border-light rounded-4 shadow-4">
                                <form class="enquiry-form mt-2" id="enquiryForm">
                                    <h4>Enquiry Form</h4>

                                    <!-- Name -->

                                    <div class="mb-2">
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Your Name" required />
                                    </div>

                                    <!-- Mobile Number -->
                                    <div class="mb-2">
                                        <input type="tel" class="form-control" id="mobile"
                                            placeholder="Your Mobile Number" required />
                                    </div>

                                    <!-- Date -->
                                    <div class="mb-2">
                                        <input type="date" class="form-control" id="" required />
                                    </div>

                                    <!-- Timing -->
                                    <div class="mb-2">
                                        <select class="form-select" id="timing" required>
                                            <option value="" disabled selected>
                                                Select Package
                                            </option>
                                            <option value="Morning">Morning</option>
                                            <option value="Evening">Evening</option>
                                        </select>
                                    </div>

                                    <!-- Email Address -->
                                    <div class="mb-2">
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Your Email Address" required />
                                    </div>

                                    <!-- Message -->
                                    <div class="mb-2">
                                        <textarea class="form-control" name="message" rows="3" placeholder="Message" required></textarea>
                                    </div>

                                    <div class="text-center">
                                        <a class="button-29" type="submit"> Book Now </a>
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
                <div class="firstbox px-4 py-4">
                    <div class="row y-gap-20">
                        <div class="col-12">
                            <h3 class="text-18 fw-500">Standard Twin Room</h3>
                            <div class="roomGrid">
                                <div class="roomGrid__header">
                                    <div>Room Type</div>
                                    <div>Meal Plan</div>
                                    <div class="mob_hide">Sleeps</div>
                                    <div>Inclusions</div>
                                    <div></div>
                                </div>
                                <div class="roomGrid__grid">
                                    <div>
                                        <div class="">
                                            <img src="https://girlionsafari.com/storage/uploads/hotels/7/thumbnail.png"
                                                alt="image" class="img-ratio rounded-4" />
                                        </div>

                                        <div class="d-flex flex-column mt-2">
                                            <div class="d-flex items-center p-1">
                                                <i class="material-icons">smoke_free</i>
                                                <div class="text-15">&nbsp;Non-smoking rooms</div>
                                            </div>

                                            <div class="d-flex items-center p-1">
                                                <i class="material-icons">wifi</i>
                                                <div class="text-15">&nbsp;Free WiFi</div>
                                            </div>

                                            <div class="d-flex items-center p-1">
                                                <i class="material-icons">local_parking</i>
                                                <div class="text-15">&nbsp;Parking</div>
                                            </div>

                                            <div class="d-flex items-center p-1">
                                                <i class="material-icons">kitchen</i>
                                                <div class="text-15">&nbsp;Kitchen</div>
                                            </div>
                                        </div>

                                        <a href="#" class="d-block text-15 fw-500 underline text-blue-1 mt-15">Show
                                            Room Information</a>
                                    </div>
                                    <div class="y-gap-30">
                                        <div class="roomGrid__content">
                                            <div>
                                                <div class="text-15 text-black mb-2">
                                                    Your price includes:
                                                </div>
                                                <div class="">
                                                    <div class="d-flex items-center text-green-2">
                                                        <i class="fa-solid fa-check me-1 p-1"></i>
                                                        <div class="text-15">Room with Breakfast</div>
                                                    </div>
                                                    <div class="d-flex items-center text-green-2">
                                                        <i class="fa-solid fa-check me-1 p-1"></i>
                                                        <div class="text-15">
                                                            Easy Cancellation Process
                                                        </div>
                                                    </div>
                                                    <div class="d-flex items-center text-green-2">
                                                        <i class="fa-solid fa-check me-1 p-1"></i>
                                                        <div class="text-15">24*7 Support</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mob_hide">
                                                <div class="d-flex align-items-center p-2">
                                                    <div><i class="fas fa-male fa-xl"></i></div>
                                                    <div>&nbsp;<i class="fas fa-male fa-xl"></i></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-18 lh-15 fw-500">US$72</div>
                                                <div class="text-14 lh-18 text-light-1">
                                                    Includes taxes and charges
                                                </div>
                                            </div>
                                        </div>
                                        <div class="roomGrid__content">
                                            <div>
                                                <div class="text-15 text-black mb-2">
                                                    Your price includes:
                                                </div>
                                                <div class="">
                                                    <div class="d-flex items-center text-green-2">
                                                        <i class="fa-solid fa-check me-1 p-1"></i>
                                                        <div class="text-15">
                                                            Room with Breakfast & Dinner
                                                        </div>
                                                    </div>
                                                    <div class="d-flex items-center text-green-2">
                                                        <i class="fa-solid fa-check me-1 p-1"></i>
                                                        <div class="text-15">
                                                            Easy Cancellation Process
                                                        </div>
                                                    </div>
                                                    <div class="d-flex items-center text-green-2">
                                                        <i class="fa-solid fa-check me-1 p-1"></i>
                                                        <div class="text-15">24*7 Support</div>
                                                    </div>
                                                    <div class="d-flex items-center text-green-2">
                                                        <i class="fa-solid fa-check me-1 p-1"></i>
                                                        <div class="text-15">
                                                            Below 5 yr Child Complimentary
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mob_hide">
                                                <div class="d-flex align-items-center p-2">
                                                    <div><i class="fas fa-male fa-xl"></i></div>
                                                    <div>&nbsp;<i class="fas fa-male fa-xl"></i></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-18 lh-15 fw-500">US$72</div>
                                                <div class="text-14 lh-18 text-light-1">
                                                    Includes taxes and charges
                                                </div>
                                            </div>
                                            <div></div>
                                        </div>
                                        <div class="roomGrid__content">
                                            <div>
                                                <div class="text-15 text-black mb-2">
                                                    Your price includes:
                                                </div>
                                                <div class="">
                                                    <div class="d-flex items-center text-green-2">
                                                        <i class="fa-solid fa-check me-1 p-1"></i>
                                                        <div class="text-15">
                                                            Room with Breakfast, Lunch & Dinner
                                                        </div>
                                                    </div>
                                                    <div class="d-flex items-center text-green-2">
                                                        <i class="fa-solid fa-check me-1 p-1"></i>
                                                        <div class="text-15">
                                                            Easy Cancellation Process
                                                        </div>
                                                    </div>
                                                    <div class="d-flex items-center text-green-2">
                                                        <i class="fa-solid fa-check me-1 p-1"></i>
                                                        <div class="text-15">24*7 Support</div>
                                                    </div>
                                                    <div class="d-flex items-center text-green-2">
                                                        <i class="fa-solid fa-check me-1 p-1"></i>
                                                        <div class="text-15">
                                                            Below 5 yr child Complimentary
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mob_hide">
                                                <div class="d-flex align-items-center p-2">
                                                    <div><i class="fas fa-male fa-xl"></i></div>
                                                    <div>&nbsp;<i class="fas fa-male fa-xl"></i></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-18 lh-15 fw-500">US$72</div>
                                                <div class="text-14 lh-18 text-light-1">
                                                    Includes taxes and charges
                                                </div>
                                            </div>
                                            <div></div>
                                        </div>
                                    </div>
                                    <div class="lastGrid__content">
                                        <div class="text-14">3 rooms for</div>
                                        <div class="text-22 fw-bold mt-1">US$72</div>
                                        <a href="#" class="button-29 my-2">Reserve ↗ </a>
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
                <div class="firstbox px-4 py-4 mt-4">
                    <div class="row y-gap-20">
                        <div class="col-12">
                            <h3 class="text-18 fw-500 mb-15">Deluxe King Room</h3>
                            <div class="roomGrid">
                                <div class="roomGrid__header">
                                    <div>Room Type</div>
                                    <div>Benefits</div>
                                    <div>Sleeps</div>
                                    <div>Price for 5 nights</div>
                                    <div></div>
                                </div>
                                <div class="roomGrid__grid">
                                    <div>
                                        <div class="">
                                            <img src="https://girlionsafari.com/storage/uploads/hotels/8/g1.jpg"
                                                alt="image" class="img-ratio rounded-4" />
                                        </div>
                                        <div class="d-flex flex-column mt-2">
                                            <div class="d-flex items-center p-1">
                                                <i class="material-icons">smoke_free</i>
                                                <div class="text-15">&nbsp;Non-smoking rooms</div>
                                            </div>

                                            <div class="d-flex items-center p-1">
                                                <i class="material-icons">wifi</i>
                                                <div class="text-15">&nbsp;Free WiFi</div>
                                            </div>

                                            <div class="d-flex items-center p-1">
                                                <i class="material-icons">local_parking</i>
                                                <div class="text-15">&nbsp;Parking</div>
                                            </div>

                                            <div class="d-flex items-center p-1">
                                                <i class="material-icons">kitchen</i>
                                                <div class="text-15">&nbsp;Kitchen</div>
                                            </div>
                                        </div>
                                        <a href="#" class="d-block text-15 fw-500 underline text-blue-1 mt-15">Show
                                            Room Information</a>
                                    </div>
                                    <div class="y-gap-30">
                                        <div class="roomGrid__content">
                                            <div>
                                                <div class="text-15 text-black mb-2">
                                                    Your price includes:
                                                </div>
                                                <div class="">
                                                    <div class="d-flex items-center text-green-2">
                                                        <i class="fa-solid fa-check me-1 p-1"></i>
                                                        <div class="text-15">Pay at the hotel</div>
                                                    </div>
                                                    <div class="d-flex items-center text-green-2">
                                                        <i class="fa-solid fa-check me-1 p-1"></i>
                                                        <div class="text-15">
                                                            Pay nothing until March 30, 2022
                                                        </div>
                                                    </div>
                                                    <div class="d-flex items-center text-green-2">
                                                        <i class="fa-solid fa-check me-1 p-1"></i>
                                                        <div class="text-15">
                                                            Free cancellation before April 1, 2022
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mob_hide">
                                                <div class="d-flex align-items-center p-2">
                                                    <div><i class="fas fa-male fa-xl"></i></div>
                                                    <div>&nbsp;<i class="fas fa-male fa-xl"></i></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-18 lh-15 fw-500">US$72</div>
                                                <div class="text-14 lh-18 text-light-1">
                                                    Includes taxes and charges
                                                </div>
                                            </div>
                                            <div></div>
                                        </div>
                                        <div class="roomGrid__content">
                                            <div>
                                                <div class="text-15 text-black mb-2">
                                                    Your price includes:
                                                </div>
                                                <div class="">
                                                    <div class="d-flex items-center text-green-2">
                                                        <i class="fa-solid fa-check me-1 p-1"></i>
                                                        <div class="text-15">Pay at the hotel</div>
                                                    </div>
                                                    <div class="d-flex items-center text-green-2">
                                                        <i class="fa-solid fa-check me-1 p-1"></i>
                                                        <div class="text-15">
                                                            Pay nothing until March 30, 2022
                                                        </div>
                                                    </div>
                                                    <div class="d-flex items-center text-green-2">
                                                        <i class="fa-solid fa-check me-1 p-1"></i>
                                                        <div class="text-15">
                                                            Free cancellation before April 1, 2022
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mob_hide">
                                                <div class="d-flex align-items-center p-2">
                                                    <div><i class="fas fa-male fa-xl"></i></div>
                                                    <div>&nbsp;<i class="fas fa-male fa-xl"></i></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-18 lh-15 fw-500">US$72</div>
                                                <div class="text-14 lh-18 text-light-1">
                                                    Includes taxes and charges
                                                </div>
                                            </div>
                                            <div></div>
                                        </div>
                                        <div class="roomGrid__content">
                                            <div>
                                                <div class="text-15 text-black mb-2">
                                                    Your price includes:
                                                </div>
                                                <div class="">
                                                    <div class="d-flex items-center text-green-2">
                                                        <i class="fa-solid fa-check me-1 p-1"></i>
                                                        <div class="text-15">Pay at the hotel</div>
                                                    </div>
                                                    <div class="d-flex items-center text-green-2">
                                                        <i class="fa-solid fa-check me-1 p-1"></i>
                                                        <div class="text-15">
                                                            Pay nothing until March 30, 2022
                                                        </div>
                                                    </div>
                                                    <div class="d-flex items-center text-green-2">
                                                        <i class="fa-solid fa-check me-1 p-1"></i>
                                                        <div class="text-15">
                                                            Free cancellation before April 1, 2022
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mob_hide">
                                                <div class="d-flex align-items-center p-2">
                                                    <div><i class="fas fa-male fa-xl"></i></div>
                                                    <div>&nbsp;<i class="fas fa-male fa-xl"></i></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-18 lh-15 fw-500">US$72</div>
                                                <div class="text-14 lh-18 text-light-1">
                                                    Includes taxes and charges
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lastGrid__content">
                                        <div class="text-14">3 rooms for</div>
                                        <div class="text-22 fw-bold mt-1">US$72</div>
                                        <a href="#" class="button-29 my-2">Reserve ↗ </a>
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
            </div>
        </section>




    </main><!-- End #main -->
@endsection
