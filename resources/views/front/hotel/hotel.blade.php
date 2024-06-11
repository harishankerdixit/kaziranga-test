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

        <div class="search-container">
            <div class="container p-lg-2 mt-lg-2 mt-sm-2">
                <div class="row">
                    <div class="col-lg-3 sidebar_hotel">
                        <div class="row mt-2 justify-content-between">
                            <div class="filter-card border-right">
                                <h5>Filter</h5>
                                <div class="filtercategory">
                                    <h3>Star Rating</h3>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="star" value="five-star" />
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span>5 star</span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="star" value="four-star" />
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span>4 star</span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="star" value="three-star" />
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span>3 star</span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="star" value="two-star" />
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span>2 star</span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="star" value="four-star" />
                                            <span class="fa fa-star checked"></span>
                                            <span>1 star</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="filtercategory">
                                    <h3>Property Type</h3>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="duration" value="half-day" />
                                            <span>Hotel</span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="duration" value="full-day" />
                                            <span>Villa</span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="duration" value="half-day" />
                                            <span>Resort</span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="duration" value="full-day" />
                                            <span>Apartment</span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="duration" value="full-day" />
                                            <span>Guest House</span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="duration" value="full-day" />
                                            <span>Hostel</span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="duration" value="full-day" />
                                            <span>Hotel & Resort</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="filtercategory">
                                    <h3>Budget Per Night(In Rs.)</h3>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="price" value="low" />
                                            <span>500 - 1000</span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="price" value="medium" />
                                            <span>1000 - 2000</span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="price" value="high" />
                                            <span>2000 - 3000</span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="price" value="high" />
                                            <span>3000 - 4000</span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="price" value="high" />
                                            <span>4000 - 5000</span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="price" value="high" />
                                            <span>Above 5000</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row search-card-result" style="background-color:rgb(248, 250, 252);">
                            <div class="col-md-4 image_carousel">
                                <div id="carouselExampleControls" class="carousel slide first_image"
                                    data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                class="d-block w-100" alt="..." />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="https://jimcorbett.in/storage/uploads/hotels/2/WhatsApp%20Image%202021-09-01%20at%206.06.29%20PM%20(1).jpeg"
                                                class="d-block w-100" alt="..." />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="https://jimcorbett.in/storage/uploads/hotels/3/WhatsApp%20Image%202021-07-15%20at%203.02.00%20PM%20(9).jpg"
                                                class="d-block w-100" alt="..." />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="https://jimcorbett.in/storage/uploads/hotels/4/WhatsApp%20Image%202022-04-18%20at%204.38.37%20PM.jpeg"
                                                class="d-block w-100" alt="..." />
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>

                                <div class="imghotelList">
                                    <span class="imghotelCont">
                                        <a href="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                            data-gallery="portfolio-gallery-app" class="glightbox">
                                            <img class="imghotel"
                                                src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                alt="hotel_image_1" />
                                        </a>
                                    </span>
                                    <span class="imghotelCont">
                                        <a href="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                            data-gallery="portfolio-gallery-app" class="glightbox">
                                            <img class="imghotel"
                                                src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                alt="hotel_image_1" />
                                        </a>
                                    </span>
                                    <span class="imghotelCont">
                                        <a href="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                            data-gallery="portfolio-gallery-app" class="glightbox">
                                            <img class="imghotel"
                                                src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                alt="hotel_image_1" />
                                        </a>
                                    </span>
                                    <span class="imghotelCont smokyBg">
                                        <a href="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                            data-gallery="portfolio-gallery-app" class="glightbox">
                                            <img class="imghotel"
                                                src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg" />
                                            <span class="viewAllText">View All</span>
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="title_star mt-2 mb-1">
                                    <h5>Bagheera Bagh Camp </h5>
                                    <div class="review mt-1">
                                        <span class="fas fa-star checked"></span>
                                        <span class="fas fa-star checked"></span>
                                        <span class="fas fa-star checked"></span>
                                        <span class="fas fa-star checked"></span>
                                        <span class="fas fa-star checked"></span>
                                    </div>
                                </div>

                                <p class="hotel_subtitle">
                                    Ramnagar, Dhikuli, Uttarakhand 244715
                                </p>
                                <div class="large-icons">
                                    <i class="fas fa-swimmer m-1 fa-2x"></i>
                                    <i class="fas fa-utensils m-1 fa-2x"></i>
                                    <i class="fas fa-wifi m-1 fa-2x"></i>
                                    <i class="fas fa-car m-1 fa-2x"></i>
                                </div>
                                <p class="hotel-description">
                                    This property is a luxurious stay that offers 5 Royal AC tents & 5 Deluxe AC tents.
                                    These tents are
                                    well-equipped and have attached bathrooms.
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
                                        <p class="rev">
                                            Very Good &nbsp;
                                            <span class="hotel_badge">8.5</span>
                                        </p>
                                    </div>
                                    <div class="">
                                        <h4 class="mb-1">₹ 4,499</h4>
                                        <p class="additions mt-2">+ ₹ 462 taxes & fees Per Night</p>
                                    </div>
                                </div>
                                <div class="rightbuttongroup ">
                                    <a href="innerhotel.html" class="btn enquire_now" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Enquire Now</a>

                                    <a href="{{ route('hotel-details') }}" class="btn view_more">View More</a>
                                </div>
                            </div>
                        </div>
                        <div class="row search-card-result" style="background-color:rgb(248, 250, 252);">
                            <div class="col-md-4 image_carousel">
                                <div id="carouselExampleControls" class="carousel slide first_image"
                                    data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                class="d-block w-100" alt="..." />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="https://jimcorbett.in/storage/uploads/hotels/2/WhatsApp%20Image%202021-09-01%20at%206.06.29%20PM%20(1).jpeg"
                                                class="d-block w-100" alt="..." />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="https://jimcorbett.in/storage/uploads/hotels/3/WhatsApp%20Image%202021-07-15%20at%203.02.00%20PM%20(9).jpg"
                                                class="d-block w-100" alt="..." />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="https://jimcorbett.in/storage/uploads/hotels/4/WhatsApp%20Image%202022-04-18%20at%204.38.37%20PM.jpeg"
                                                class="d-block w-100" alt="..." />
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>

                                <div class="imghotelList">
                                    <span class="imghotelCont">
                                        <a href="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                            data-gallery="portfolio-gallery-app" class="glightbox">
                                            <img class="imghotel"
                                                src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                alt="hotel_image_1" />
                                        </a>
                                    </span>
                                    <span class="imghotelCont">
                                        <a href="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                            data-gallery="portfolio-gallery-app" class="glightbox">
                                            <img class="imghotel"
                                                src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                alt="hotel_image_1" />
                                        </a>
                                    </span>
                                    <span class="imghotelCont">
                                        <a href="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                            data-gallery="portfolio-gallery-app" class="glightbox">
                                            <img class="imghotel"
                                                src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                alt="hotel_image_1" />
                                        </a>
                                    </span>
                                    <span class="imghotelCont smokyBg">
                                        <a href="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                            data-gallery="portfolio-gallery-app" class="glightbox">
                                            <img class="imghotel"
                                                src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg" />
                                            <span class="viewAllText">View All</span>
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="title_star mt-2 mb-1">
                                    <h5>Bagheera Bagh Camp </h5>
                                    <div class="review mt-1">
                                        <span class="fas fa-star checked"></span>
                                        <span class="fas fa-star checked"></span>
                                        <span class="fas fa-star checked"></span>
                                        <span class="fas fa-star checked"></span>
                                        <span class="fas fa-star checked"></span>
                                    </div>
                                </div>

                                <p class="hotel_subtitle">
                                    Ramnagar, Dhikuli, Uttarakhand 244715
                                </p>
                                <div class="large-icons">
                                    <i class="fas fa-swimmer m-1 fa-2x"></i>
                                    <i class="fas fa-utensils m-1 fa-2x"></i>
                                    <i class="fas fa-wifi m-1 fa-2x"></i>
                                    <i class="fas fa-car m-1 fa-2x"></i>
                                </div>
                                <p class="hotel-description">
                                    This property is a luxurious stay that offers 5 Royal AC tents & 5 Deluxe AC tents.
                                    These tents are
                                    well-equipped and have attached bathrooms.
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
                                        <p class="rev">
                                            Very Good &nbsp;
                                            <span class="hotel_badge">8.5</span>
                                        </p>
                                    </div>
                                    <div class="">
                                        <h4 class="mb-1">₹ 4,499</h4>
                                        <p class="additions mt-3">+ ₹ 462 taxes & fees Per Night</p>
                                    </div>
                                </div>
                                <div class="rightbuttongroup">
                                    <a href="innerhotel.html" class="btn enquire_now" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Enquire Now</a>

                                    <a href="{{ route('hotel-details') }}" class="btn view_more">View More</a>
                                </div>
                            </div>
                        </div>
                        <div class="row search-card-result" style="background-color:rgb(248, 250, 252);">
                            <div class="col-md-4 image_carousel">
                                <div id="carouselExampleControls" class="carousel slide first_image"
                                    data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                class="d-block w-100" alt="..." />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="https://jimcorbett.in/storage/uploads/hotels/2/WhatsApp%20Image%202021-09-01%20at%206.06.29%20PM%20(1).jpeg"
                                                class="d-block w-100" alt="..." />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="https://jimcorbett.in/storage/uploads/hotels/3/WhatsApp%20Image%202021-07-15%20at%203.02.00%20PM%20(9).jpg"
                                                class="d-block w-100" alt="..." />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="https://jimcorbett.in/storage/uploads/hotels/4/WhatsApp%20Image%202022-04-18%20at%204.38.37%20PM.jpeg"
                                                class="d-block w-100" alt="..." />
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>

                                <div class="imghotelList">
                                    <span class="imghotelCont">
                                        <a href="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                            data-gallery="portfolio-gallery-app" class="glightbox">
                                            <img class="imghotel"
                                                src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                alt="hotel_image_1" />
                                        </a>
                                    </span>
                                    <span class="imghotelCont">
                                        <a href="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                            data-gallery="portfolio-gallery-app" class="glightbox">
                                            <img class="imghotel"
                                                src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                alt="hotel_image_1" />
                                        </a>
                                    </span>
                                    <span class="imghotelCont">
                                        <a href="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                            data-gallery="portfolio-gallery-app" class="glightbox">
                                            <img class="imghotel"
                                                src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                alt="hotel_image_1" />
                                        </a>
                                    </span>
                                    <span class="imghotelCont smokyBg">
                                        <a href="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                            data-gallery="portfolio-gallery-app" class="glightbox">
                                            <img class="imghotel"
                                                src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg" />
                                            <span class="viewAllText">View All</span>
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="title_star mt-2 mb-1">
                                    <h5>Bagheera Bagh Camp </h5>
                                    <div class="review mt-1">
                                        <span class="fas fa-star checked"></span>
                                        <span class="fas fa-star checked"></span>
                                        <span class="fas fa-star checked"></span>
                                        <span class="fas fa-star checked"></span>
                                        <span class="fas fa-star checked"></span>
                                    </div>
                                </div>

                                <p class="hotel_subtitle">
                                    Ramnagar, Dhikuli, Uttarakhand 244715
                                </p>
                                <div class="large-icons">
                                    <i class="fas fa-swimmer m-1 fa-2x"></i>
                                    <i class="fas fa-utensils m-1 fa-2x"></i>
                                    <i class="fas fa-wifi m-1 fa-2x"></i>
                                    <i class="fas fa-car m-1 fa-2x"></i>
                                </div>
                                <p class="hotel-description">
                                    This property is a luxurious stay that offers 5 Royal AC tents & 5 Deluxe AC tents.
                                    These tents are
                                    well-equipped and have attached bathrooms.
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
                                        <p class="rev">
                                            Very Good &nbsp;
                                            <span class="hotel_badge">8.5</span>
                                        </p>
                                    </div>
                                    <div class="">
                                        <h4 class="mb-1">₹ 4,499</h4>
                                        <p class="additions mt-3">+ ₹ 462 taxes & fees Per Night</p>
                                    </div>
                                </div>
                                <div class="rightbuttongroup">
                                    <a href="innerhotel.html" class="btn enquire_now" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Enquire Now</a>

                                    <a href="{{ route('hotel-details') }}" class="btn view_more">View More</a>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row search-card-result">
                                                                                                          <div class="col-md-4 image_carousel">
                                                                                                            <div
                                                                                                              id="carouselExampleControls"
                                                                                                              class="carousel slide first_image"
                                                                                                              data-bs-ride="carousel"
                                                                                                            >
                                                                                                              <div class="carousel-inner">
                                                                                                                <div class="carousel-item active">
                                                                                                                  <img
                                                                                                                    src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                    class="d-block w-100"
                                                                                                                    alt="..."
                                                                                                                  />
                                                                                                                </div>
                                                                                                                <div class="carousel-item">
                                                                                                                  <img
                                                                                                                    src="https://jimcorbett.in/storage/uploads/hotels/2/WhatsApp%20Image%202021-09-01%20at%206.06.29%20PM%20(1).jpeg"
                                                                                                                    class="d-block w-100"
                                                                                                                    alt="..."
                                                                                                                  />
                                                                                                                </div>
                                                                                                                <div class="carousel-item">
                                                                                                                  <img
                                                                                                                    src="https://jimcorbett.in/storage/uploads/hotels/3/WhatsApp%20Image%202021-07-15%20at%203.02.00%20PM%20(9).jpg"
                                                                                                                    class="d-block w-100"
                                                                                                                    alt="..."
                                                                                                                  />
                                                                                                                </div>
                                                                                                                <div class="carousel-item">
                                                                                                                  <img
                                                                                                                    src="https://jimcorbett.in/storage/uploads/hotels/4/WhatsApp%20Image%202022-04-18%20at%204.38.37%20PM.jpeg"
                                                                                                                    class="d-block w-100"
                                                                                                                    alt="..."
                                                                                                                  />
                                                                                                                </div>
                                                                                                              </div>
                                                                                                              <button
                                                                                                                class="carousel-control-prev"
                                                                                                                type="button"
                                                                                                                data-bs-target="#carouselExampleControls"
                                                                                                                data-bs-slide="prev"
                                                                                                              >
                                                                                                                <span
                                                                                                                  class="carousel-control-prev-icon"
                                                                                                                  aria-hidden="true"
                                                                                                                ></span>
                                                                                                                <span class="visually-hidden">Previous</span>
                                                                                                              </button>
                                                                                                              <button
                                                                                                                class="carousel-control-next"
                                                                                                                type="button"
                                                                                                                data-bs-target="#carouselExampleControls"
                                                                                                                data-bs-slide="next"
                                                                                                              >
                                                                                                                <span
                                                                                                                  class="carousel-control-next-icon"
                                                                                                                  aria-hidden="true"
                                                                                                                ></span>
                                                                                                                <span class="visually-hidden">Next</span>
                                                                                                              </button>
                                                                                                            </div> -->

                        <!-- <div class="imghotelList">
                                                                                                              <span class="imghotelCont">
                                                                                                                <a
                                                                                                                  href="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                  data-gallery="portfolio-gallery-app"
                                                                                                                  class="glightbox"
                                                                                                                >
                                                                                                                  <img
                                                                                                                    class="imghotel"
                                                                                                                    src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                    alt="hotel_image_1"
                                                                                                                  />
                                                                                                                </a>
                                                                                                              </span>
                                                                                                              <span class="imghotelCont">
                                                                                                                <a
                                                                                                                  href="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                  data-gallery="portfolio-gallery-app"
                                                                                                                  class="glightbox"
                                                                                                                >
                                                                                                                  <img
                                                                                                                    class="imghotel"
                                                                                                                    src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                    alt="hotel_image_1"
                                                                                                                  />
                                                                                                                </a>
                                                                                                              </span>
                                                                                                              <span class="imghotelCont">
                                                                                                                <a
                                                                                                                  href="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                  data-gallery="portfolio-gallery-app"
                                                                                                                  class="glightbox"
                                                                                                                >
                                                                                                                  <img
                                                                                                                    class="imghotel"
                                                                                                                    src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                    alt="hotel_image_1"
                                                                                                                  />
                                                                                                                </a>
                                                                                                              </span>
                                                                                                              <span class="imghotelCont smokyBg">
                                                                                                                <a
                                                                                                                  href="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                  data-gallery="portfolio-gallery-app"
                                                                                                                  class="glightbox"
                                                                                                                >
                                                                                                                  <img
                                                                                                                    class="imghotel"
                                                                                                                    src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                  />
                                                                                                                  <span class="viewAllText">View All</span>
                                                                                                                </a>
                                                                                                              </span>
                                                                                                            </div>
                                                                                                          </div>
                                                                                                          <div class="col-md-6">
                                                                                                            <div class="title_star">
                                                                                                              <h5>Jawai Empire Resort</h5>
                                                                                                              <div class="review">
                                                                                                                <span class="fas fa-star checked"></span>
                                                                                                                <span class="fas fa-star checked"></span>
                                                                                                                <span class="fas fa-star checked"></span>
                                                                                                                <span class="fas fa-star checked"></span>
                                                                                                                <span class="fas fa-star checked"></span>
                                                                                                              </div>
                                                                                                            </div>

                                                                                                            <p class="hotel_subtitle">
                                                                                                              Ramnagar, Dhikuli, Uttarakhand 244715
                                                                                                            </p>
                                                                                                            <div class="large-icons">
                                                                                                              <i class="fas fa-swimmer m-2 fa-2x"></i>
                                                                                                              <i class="fas fa-utensils m-2 fa-2x"></i>
                                                                                                              <i class="fas fa-wifi m-2 fa-2x"></i>
                                                                                                              <i class="fas fa-car m-2 fa-2x"></i>
                                                                                                            </div>
                                                                                                            <p class="hotel-description">
                                                                                                              This beautiful place is located close to the safari point of Jawai where you can see lots of birds. It offers spacious AC tents with comfortable stay.
                                                                                                            </p>
                                                                                                            <div>
                                                                                                              <img
                                                                                                                src="/assets/img/couple.webp"
                                                                                                                class="small-image"
                                                                                                                alt="couples"
                                                                                                              />Couple Friendly
                                                                                                            </div>
                                                                                                          </div>

                                                                                                          <div class="col-md-2 border-left text-right more-offers">
                                                                                                            <div class="mobile_flex">
                                                                                                              <div class="left_text">
                                                                                                                <p class="rev">
                                                                                                                  Very Good &nbsp;
                                                                                                                  <span class="hotel_badge">8.5</span>
                                                                                                                </p>
                                                                                                              </div>

                                                                                                              <div class="right-text">
                                                                                                                <h4>₹ 4,499</h4>
                                                                                                                <p class="additions">+ ₹ 462 taxes & fees Per Night</p>
                                                                                                              </div>
                                                                                                            </div>

                                                                                                            <div class="rightbuttongroup">
                                                                                                              <a href="innercorbetthotels.html" class="btn enquire_now"
                                                                                                                >Enquire Now</a
                                                                                                              >
                                                                                                              <a href="/innerhotels/innerhotel.html" class="btn view_more"
                                                                                                                >View More</a
                                                                                                              >
                                                                                                            </div>
                                                                                                          </div>
                                                                                                        </div> -->
                        <!--
                                                                                                        <div class="row search-card-result">
                                                                                                          <div class="col-md-4 image_carousel">
                                                                                                            <div
                                                                                                              id="carouselExampleControls"
                                                                                                              class="carousel slide first_image"
                                                                                                              data-bs-ride="carousel"
                                                                                                            >
                                                                                                              <div class="carousel-inner">
                                                                                                                <div class="carousel-item active">
                                                                                                                  <img
                                                                                                                    src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                    class="d-block w-100"
                                                                                                                    alt="..."
                                                                                                                  />
                                                                                                                </div>
                                                                                                                <div class="carousel-item">
                                                                                                                  <img
                                                                                                                    src="https://jimcorbett.in/storage/uploads/hotels/2/WhatsApp%20Image%202021-09-01%20at%206.06.29%20PM%20(1).jpeg"
                                                                                                                    class="d-block w-100"
                                                                                                                    alt="..."
                                                                                                                  />
                                                                                                                </div>
                                                                                                                <div class="carousel-item">
                                                                                                                  <img
                                                                                                                    src="https://jimcorbett.in/storage/uploads/hotels/3/WhatsApp%20Image%202021-07-15%20at%203.02.00%20PM%20(9).jpg"
                                                                                                                    class="d-block w-100"
                                                                                                                    alt="..."
                                                                                                                  />
                                                                                                                </div>
                                                                                                                <div class="carousel-item">
                                                                                                                  <img
                                                                                                                    src="https://jimcorbett.in/storage/uploads/hotels/4/WhatsApp%20Image%202022-04-18%20at%204.38.37%20PM.jpeg"
                                                                                                                    class="d-block w-100"
                                                                                                                    alt="..."
                                                                                                                  />
                                                                                                                </div>
                                                                                                              </div>
                                                                                                              <button
                                                                                                                class="carousel-control-prev"
                                                                                                                type="button"
                                                                                                                data-bs-target="#carouselExampleControls"
                                                                                                                data-bs-slide="prev"
                                                                                                              >
                                                                                                                <span
                                                                                                                  class="carousel-control-prev-icon"
                                                                                                                  aria-hidden="true"
                                                                                                                ></span>
                                                                                                                <span class="visually-hidden">Previous</span>
                                                                                                              </button>
                                                                                                              <button
                                                                                                                class="carousel-control-next"
                                                                                                                type="button"
                                                                                                                data-bs-target="#carouselExampleControls"
                                                                                                                data-bs-slide="next"
                                                                                                              >
                                                                                                                <span
                                                                                                                  class="carousel-control-next-icon"
                                                                                                                  aria-hidden="true"
                                                                                                                ></span>
                                                                                                                <span class="visually-hidden">Next</span>
                                                                                                              </button>
                                                                                                            </div>

                                                                                                            <div class="imghotelList">
                                                                                                              <span class="imghotelCont">
                                                                                                                <a
                                                                                                                  href="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                  data-gallery="portfolio-gallery-app"
                                                                                                                  class="glightbox"
                                                                                                                >
                                                                                                                  <img
                                                                                                                    class="imghotel"
                                                                                                                    src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                    alt="hotel_image_1"
                                                                                                                  />
                                                                                                                </a>
                                                                                                              </span>
                                                                                                              <span class="imghotelCont">
                                                                                                                <a
                                                                                                                  href="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                  data-gallery="portfolio-gallery-app"
                                                                                                                  class="glightbox"
                                                                                                                >
                                                                                                                  <img
                                                                                                                    class="imghotel"
                                                                                                                    src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                    alt="hotel_image_1"
                                                                                                                  />
                                                                                                                </a>
                                                                                                              </span>
                                                                                                              <span class="imghotelCont">
                                                                                                                <a
                                                                                                                  href="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                  data-gallery="portfolio-gallery-app"
                                                                                                                  class="glightbox"
                                                                                                                >
                                                                                                                  <img
                                                                                                                    class="imghotel"
                                                                                                                    src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                    alt="hotel_image_1"
                                                                                                                  />
                                                                                                                </a>
                                                                                                              </span>
                                                                                                              <span class="imghotelCont smokyBg">
                                                                                                                <a
                                                                                                                  href="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                  data-gallery="portfolio-gallery-app"
                                                                                                                  class="glightbox"
                                                                                                                >
                                                                                                                  <img
                                                                                                                    class="imghotel"
                                                                                                                    src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                  />
                                                                                                                  <span class="viewAllText">View All</span>
                                                                                                                </a>
                                                                                                              </span>
                                                                                                            </div>
                                                                                                          </div>
                                                                                                          <div class="col-md-6">
                                                                                                            <div class="title_star">
                                                                                                              <h5>Jawai Greens</h5>
                                                                                                              <div class="review">
                                                                                                                <span class="fas fa-star checked"></span>
                                                                                                                <span class="fas fa-star checked"></span>
                                                                                                                <span class="fas fa-star checked"></span>
                                                                                                                <span class="fas fa-star checked"></span>
                                                                                                                <span class="fas fa-star checked"></span>
                                                                                                              </div>
                                                                                                            </div>

                                                                                                            <p class="hotel_subtitle">
                                                                                                              Ramnagar, Dhikuli, Uttarakhand 244715
                                                                                                            </p>
                                                                                                            <div class="large-icons">
                                                                                                              <i class="fas fa-swimmer m-2 fa-2x"></i>
                                                                                                              <i class="fas fa-utensils m-2 fa-2x"></i>
                                                                                                              <i class="fas fa-wifi m-2 fa-2x"></i>
                                                                                                              <i class="fas fa-car m-2 fa-2x"></i>
                                                                                                            </div>
                                                                                                            <p class="hotel-description">
                                                                                                              Jawai Green is a Luxurious Boutique Homestay cum Resort in Sena. They have a villa of 2 rooms and 3 Private Luxurious Cottages that are designed beautifully.
                                                                                                            </p>
                                                                                                            <div>
                                                                                                              <img
                                                                                                                src="/assets/img/couple.webp"
                                                                                                                class="small-image"
                                                                                                                alt="couples"
                                                                                                              />Couple Friendly
                                                                                                            </div>
                                                                                                          </div>

                                                                                                          <div class="col-md-2 border-left text-right more-offers">
                                                                                                            <div class="mobile_flex">
                                                                                                              <div class="left_text">
                                                                                                                <p class="rev">
                                                                                                                  Very Good &nbsp;
                                                                                                                  <span class="hotel_badge">8.5</span>
                                                                                                                </p>
                                                                                                              </div>

                                                                                                              <div class="right-text">
                                                                                                                <h4>₹ 4,499</h4>
                                                                                                                <p class="additions">+ ₹ 462 taxes & fees Per Night</p>
                                                                                                              </div>
                                                                                                            </div>
                                                                                                            <div class="rightbuttongroup">
                                                                                                              <a href="innercorbetthotels.html" class="btn enquire_now"
                                                                                                                >Enquire Now</a
                                                                                                              >
                                                                                                              <a href="innercorbetthotels.html" class="btn view_more"
                                                                                                                >View More</a
                                                                                                              >
                                                                                                            </div>
                                                                                                          </div>
                                                                                                        </div> -->

                        <!-- <div class="row search-card-result">
                                                                                                          <div class="col-md-4 image_carousel">
                                                                                                            <div
                                                                                                              id="carouselExampleControls"
                                                                                                              class="carousel slide first_image"
                                                                                                              data-bs-ride="carousel"
                                                                                                            >
                                                                                                              <div class="carousel-inner">
                                                                                                                <div class="carousel-item active">
                                                                                                                  <img
                                                                                                                    src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                    class="d-block w-100"
                                                                                                                    alt="..."
                                                                                                                  />
                                                                                                                </div>
                                                                                                                <div class="carousel-item">
                                                                                                                  <img
                                                                                                                    src="https://jimcorbett.in/storage/uploads/hotels/2/WhatsApp%20Image%202021-09-01%20at%206.06.29%20PM%20(1).jpeg"
                                                                                                                    class="d-block w-100"
                                                                                                                    alt="..."
                                                                                                                  />
                                                                                                                </div>
                                                                                                                <div class="carousel-item">
                                                                                                                  <img
                                                                                                                    src="https://jimcorbett.in/storage/uploads/hotels/3/WhatsApp%20Image%202021-07-15%20at%203.02.00%20PM%20(9).jpg"
                                                                                                                    class="d-block w-100"
                                                                                                                    alt="..."
                                                                                                                  />
                                                                                                                </div>
                                                                                                                <div class="carousel-item">
                                                                                                                  <img
                                                                                                                    src="https://jimcorbett.in/storage/uploads/hotels/4/WhatsApp%20Image%202022-04-18%20at%204.38.37%20PM.jpeg"
                                                                                                                    class="d-block w-100"
                                                                                                                    alt="..."
                                                                                                                  />
                                                                                                                </div>
                                                                                                              </div>
                                                                                                              <button
                                                                                                                class="carousel-control-prev"
                                                                                                                type="button"
                                                                                                                data-bs-target="#carouselExampleControls"
                                                                                                                data-bs-slide="prev"
                                                                                                              >
                                                                                                                <span
                                                                                                                  class="carousel-control-prev-icon"
                                                                                                                  aria-hidden="true"
                                                                                                                ></span>
                                                                                                                <span class="visually-hidden">Previous</span>
                                                                                                              </button>
                                                                                                              <button
                                                                                                                class="carousel-control-next"
                                                                                                                type="button"
                                                                                                                data-bs-target="#carouselExampleControls"
                                                                                                                data-bs-slide="next"
                                                                                                              >
                                                                                                                <span
                                                                                                                  class="carousel-control-next-icon"
                                                                                                                  aria-hidden="true"
                                                                                                                ></span>
                                                                                                                <span class="visually-hidden">Next</span>
                                                                                                              </button>
                                                                                                            </div>

                                                                                                            <div class="imghotelList">
                                                                                                              <span class="imghotelCont">
                                                                                                                <a
                                                                                                                  href="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                  data-gallery="portfolio-gallery-app"
                                                                                                                  class="glightbox"
                                                                                                                >
                                                                                                                  <img
                                                                                                                    class="imghotel"
                                                                                                                    src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                    alt="hotel_image_1"
                                                                                                                  />
                                                                                                                </a>
                                                                                                              </span>
                                                                                                              <span class="imghotelCont">
                                                                                                                <a
                                                                                                                  href="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                  data-gallery="portfolio-gallery-app"
                                                                                                                  class="glightbox"
                                                                                                                >
                                                                                                                  <img
                                                                                                                    class="imghotel"
                                                                                                                    src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                    alt="hotel_image_1"
                                                                                                                  />
                                                                                                                </a>
                                                                                                              </span>
                                                                                                              <span class="imghotelCont">
                                                                                                                <a
                                                                                                                  href="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                  data-gallery="portfolio-gallery-app"
                                                                                                                  class="glightbox"
                                                                                                                >
                                                                                                                  <img
                                                                                                                    class="imghotel"
                                                                                                                    src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                    alt="hotel_image_1"
                                                                                                                  />
                                                                                                                </a>
                                                                                                              </span>
                                                                                                              <span class="imghotelCont smokyBg">
                                                                                                                <a
                                                                                                                  href="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                  data-gallery="portfolio-gallery-app"
                                                                                                                  class="glightbox"
                                                                                                                >
                                                                                                                  <img
                                                                                                                    class="imghotel"
                                                                                                                    src="https://jimcorbett.in/storage/uploads/hotels/1/3.jpeg"
                                                                                                                  />
                                                                                                                  <span class="viewAllText">View All</span>
                                                                                                                </a>
                                                                                                              </span>
                                                                                                            </div>
                                                                                                          </div>
                                                                                                          <div class="col-md-6">
                                                                                                            <div class="title_star">
                                                                                                              <h5>Jawai Jewels Safari Camps</h5>
                                                                                                              <div class="review">
                                                                                                                <span class="fas fa-star checked"></span>
                                                                                                                <span class="fas fa-star checked"></span>
                                                                                                                <span class="fas fa-star checked"></span>
                                                                                                                <span class="fas fa-star checked"></span>
                                                                                                                <span class="fas fa-star checked"></span>
                                                                                                              </div>
                                                                                                            </div>

                                                                                                            <p class="hotel_subtitle">
                                                                                                              Ramnagar, Dhikuli, Uttarakhand 244715
                                                                                                            </p>
                                                                                                            <div class="large-icons">
                                                                                                              <i class="fas fa-swimmer m-2 fa-2x"></i>
                                                                                                              <i class="fas fa-utensils m-2 fa-2x"></i>
                                                                                                              <i class="fas fa-wifi m-2 fa-2x"></i>
                                                                                                              <i class="fas fa-car m-2 fa-2x"></i>
                                                                                                            </div>
                                                                                                            <p class="hotel-description">
                                                                                                              These camps are the perfect blend of luxury and nature. They offer Luxury tents and container cottages that come with all modern amenities like a shower, AC, a balcony, an electric kettle etc.
                                                                                                            </p>
                                                                                                            <div>
                                                                                                              <img
                                                                                                                src="/assets/img/couple.webp"
                                                                                                                class="small-image"
                                                                                                                alt="couples"
                                                                                                              />Couple Friendly
                                                                                                            </div>
                                                                                                          </div>

                                                                                                          <div class="col-md-2 border-left text-right more-offers">
                                                                                                            <div class="mobile_flex">
                                                                                                              <div class="left_text">
                                                                                                                <p class="rev">
                                                                                                                  Very Good &nbsp;
                                                                                                                  <span class="hotel_badge">8.5</span>
                                                                                                                </p>
                                                                                                              </div>

                                                                                                              <div class="right-text">
                                                                                                                <h4>₹ 4,499</h4>
                                                                                                                <p class="additions">+ ₹ 462 taxes & fees Per Night</p>
                                                                                                              </div>
                                                                                                            </div>

                                                                                                            <div class="rightbuttongroup">
                                                                                                              <a href="innercorbetthotels.html" class="btn enquire_now"
                                                                                                                >Enquire Now</a
                                                                                                              >
                                                                                                              <a href="innercorbetthotels.html" class="btn view_more"
                                                                                                                >View More</a
                                                                                                              >
                                                                                                            </div>
                                                                                                          </div>
                                                                                                        </div> -->
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
    <!-- ======testing code=====  -->
@endsection
