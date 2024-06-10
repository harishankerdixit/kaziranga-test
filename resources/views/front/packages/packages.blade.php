@extends('front.layouts.main')
{{-- @section('title', $packages_meta->title)
@section('meta_title', $packages_meta->meta_title)
@section('meta_description', $packages_meta->meta_description)
@section('links', 'https://kazirangabooking.com/tour-packages') --}}
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center">
            <div class="container">

                <div class="section-title">
                    <h2>Jawai Packages</h2>

                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->

        <div id="jawai_pack" class="jawai_pack">
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-5">
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col mt-4">
                                <h2 class="fs-4 fw-semibold">Filter Section</h2>

                            </div>
                            <!-- <div class="col">
                                                                        <button class="filter-btn ms-5">Apply</button>

                                                                      </div> -->
                        </div>
                        <div class="filter-section">

                            <div class="filtercategory px-2">
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
                            <div class="filtercategory px-2">
                                <h3>Filter Package By Duration</h3>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="star" value="four-star" />
                                        <span class="data-span">(1-4 days) </span>
                                    </label>

                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="star" value="four-star" />
                                        <span class="data-span">(1-4 days) </span>
                                    </label>

                                </div>

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="star" value="four-star" />
                                        <span class="data-span">(1-4 days) </span>
                                    </label>

                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="star" value="four-star" />
                                        <span class="data-span">(1-4 days) </span>
                                    </label>
                                </div>
                            </div>
                            <div class="filtercategory px-2">
                                <h3>Filter Package By Destination</h3>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="star" value="four-star" />
                                        <span class="data-span">(1-4 days) </span>
                                    </label>

                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="star" value="four-star" />
                                        <span class="data-span">(1-4 days) </span>
                                    </label>

                                </div>

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="star" value="four-star" />
                                        <span class="data-span">(1-4 days) </span>
                                    </label>

                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="star" value="four-star" />
                                        <span class="data-span">(1-4 days) </span>
                                    </label>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <button class="btn filter-btn-apply">Apply filter</button>
                                </div>
                                <div class="col-6">
                                    <button class="btn filter-btn-clear ms-5">Clear Filter</button>
                                </div>
                            </div>


                        </div>
                        <!-- End Blog Sidebar -->
                    </div>

                    <div class="col-lg-8">
                        <div class="jawai_pack_details">
                            <h2 class="fs-4 my-lg-3 p-2">Top Picks at Unbeatable Prices</h2>
                            <div class="col-md-12 left-packages">
                                <!-- ======newcard======= -->

                                <div class="row package-margin innerpackages">
                                    <div class="col-md-4 col-xs-12 package-image">
                                        <img src="https://jimcorbett.in/storage/uploads/packages/239305063_4329635547098274_8523985961886900651_n.jpeg"
                                            alt="Corbett Fun Tour With 1 Jeep Safari">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="packages-listing">
                                            <h5 class="fw-bold fs-5 package-name mt-2">
                                                Gir lion Tour with Jeep and Elephant
                                                Safari
                                            </h5>
                                            <div class="rating">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                            </div>
                                            <p class="small mt-1 text-justify">
                                                To experience the wonder and thrill of a natural
                                                wildlife tour, plan a trip to Kaziranga National
                                                Park.
                                            </p>
                                            <div class="package-box mt-2">
                                                <div class="row">
                                                    <div class="col-lg-3 col-6">
                                                        <div class="text-center">
                                                            <i class="fas fa-utensils fa-lg package-icon-1"></i>
                                                            <div class="text-13 package-icons">
                                                                Breakfast and Dinner
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-6">
                                                        <div class="text-center">
                                                            <i class="fas fa-fire fa-lg package-icon-1"></i>
                                                            <div class="text-13 package-icons">Bonfire</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-6">
                                                        <div class="text-center">
                                                            <i class="fas fa-glass-cheers fa-lg package-icon-1"></i>
                                                            <div class="text-13 package-icons">Welcome drink</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-6">
                                                        <div class="text-center">
                                                            <i class="fas fa-bed fa-lg package-icon-1"></i>
                                                            <div class="text-13 package-icons">
                                                                Nightstay at wildlife resort
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col">
                                                    <div class="flex-container mt-1">
                                                        <div class="flex-item">
                                                            <div class="">
                                                                <a href="innerpackages.html"
                                                                    class="btn btn-custom enquiry-now-btn"
                                                                    class="btn enquire_now" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModal1"
                                                                    data-bs-whatever="@getbootstrap">Enquiry Now</a>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <h4 class="fs-5 p-2 mt-1 "><a href=""><i
                                                                        class="fa-solid fa-location-dot"></i></a>
                                                                <span class="package-location">location</span>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 border-left text-right pkage-items-2">
                                        <div class="text-center">
                                            <h4 class="price-text mt-lg-4 fs-2 " style="color:rgb(233, 101, 6)">Price</h4>
                                            <div class="text-13">
                                                <h4 class=" fw-bold  packge-border package-text-rupees"
                                                    itemprop="priceSpecification">
                                                    <span>&#8377;</span>24000
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="rightbuttongroup">
                                            <div class="text-center">
                                                <div class="text-13  packge-border">
                                                    <i class="fa-regular fa-clock icon-pckg py-2 fs-3 mt-lg-2"></i>
                                                    <div class="text-13 fw-semibold">
                                                        12days
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="booknow-now-btn mb-sm-4 mt-lg-4">
                                                <a href="{{ route('package-details') }}"
                                                    class="btn btn-custom text-light">Book Now<i
                                                        class="fa-solid fa-arrow-right ps-1 mt-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ====== end newcard======= -->

                                <div class="row package-margin innerpackages">
                                    <div class="col-md-4 col-xs-12 package-image">
                                        <img src="https://jimcorbett.in/storage/uploads/packages/239305063_4329635547098274_8523985961886900651_n.jpeg"
                                            alt="Corbett Fun Tour With 1 Jeep Safari">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="packages-listing">
                                            <h5 class="fw-bold fs-5 package-name mt-2">
                                                Gir lion Tour with Jeep and Elephant
                                                Safari
                                            </h5>
                                            <div class="rating">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                            </div>
                                            <p class="small mt-1 text-justify">
                                                To experience the wonder and thrill of a natural
                                                wildlife tour, plan a trip to Kaziranga National
                                                Park.
                                            </p>
                                            <div class="package-box mt-4">
                                                <div class="row">
                                                    <div class="col-lg-3 col-6">
                                                        <div class="text-center">
                                                            <i class="fas fa-utensils fa-lg package-icon-1"></i>
                                                            <div class="text-13 package-icons">
                                                                Breakfast and Dinner
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-6">
                                                        <div class="text-center">
                                                            <i class="fas fa-fire fa-lg package-icon-1"></i>
                                                            <div class="text-13 package-icons">Bonfire</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-6">
                                                        <div class="text-center">
                                                            <i class="fas fa-glass-cheers fa-lg package-icon-1"></i>
                                                            <div class="text-13 package-icons">Welcome drink</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-6">
                                                        <div class="text-center">
                                                            <i class="fas fa-bed fa-lg package-icon-1"></i>
                                                            <div class="text-13 package-icons">
                                                                Nightstay at wildlife resort
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="flex-container mt-1">
                                                        <div class="flex-item">
                                                            <div class="">
                                                                <a href="innerpackages.html"
                                                                    class="btn btn-custom enquiry-now-btn"
                                                                    class="btn enquire_now" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModal1"
                                                                    data-bs-whatever="@getbootstrap">Enquiry Now</a>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <h4 class="fs-5 p-2 mt-1"><a href=""><i
                                                                        class="fa-solid fa-location-dot"></i></a>
                                                                <span class="package-location">location</span>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 border-left text-right pkage-items-2">
                                        <div class="text-center">
                                            <h4 class="price-text mt-lg-4 fs-2" style="color:rgb(233, 101, 6)">Price</h4>
                                            <div class="text-13">
                                                <h4 class=" fw-bold  packge-border package-text-rupees"
                                                    itemprop="priceSpecification">
                                                    <span>&#8377;</span>24000
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="rightbuttongroup">
                                            <div class="text-center">
                                                <div class="text-13  packge-border">
                                                    <i class="fa-regular fa-clock icon-pckg py-2 fs-3 mt-lg-2"></i>
                                                    <div class="text-13 fw-semibold">
                                                        12days
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="booknow-now-btn mb-sm-4 mt-lg-4">
                                                <a href="{{ route('package-details') }}"
                                                    class="btn btn-custom text-light">Book Now<i
                                                        class="fa-solid fa-arrow-right ps-1 mt-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ======newcard======= -->
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <section class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
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
            </div>
        </section>

    </main>
    <!-- ======testing code=====  -->
    <div class="modal fade mt-5" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content hotel-enquire-form">
                <div class="modal-header">
                    <h5 class="modal-title fw-semibold justify-content-center" id="exampleModalLabel">Enquiry Now</h5>
                    <button type="button" class="btn-close  btn-close-white fw-bold px-4" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="">
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
