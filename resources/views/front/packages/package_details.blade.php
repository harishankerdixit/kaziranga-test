@extends('front.layouts.main')
{{-- @section('title', $package->title)
@section('meta_title', $package->meta_title)
@section('meta_description', $package->meta_description)
@php
    $fullUrl = request()->fullUrl();
@endphp
@section('links', $fullUrl) --}}
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <main id="main">
        <div class="container" data-aos="fade-up">
            <div class="tour_innerpage">
                <h1 class="ms-lg-5">Gir 1 Night Tour with 1 Jeep Safari</h1>
                <div class="row mt-2">
                    <div class="col-lg-12 col-xs-12">
                        <!-- <div class="package-box mt-3"> -->
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 ps-5" style="width: 100%;">
                                <p class="mt-2">Nothing comes even closer to wildlife tours when it is about the Kaziranga
                                    fun tour,
                                    famous for
                                    its green vegetation, varied wildlife, beautiful scenery
                                    and pleasant weather round the year and Kaziranga National Park is the first choice of
                                    all those who wants
                                    peace and excitement at the same time.
                                    This exclusive fun tour is basically a short duration package and it is fit for those
                                    who want to experience
                                    exotic natural beauty and thrills of wildlife.</p>
                                <ul type="none" class="list">
                                    <li><i class="fa-solid fa-square-check check-box"></i>1 Night stay</li>
                                    <li>
                                        <i class="fa-solid fa-square-check check-box"></i>1 Time Jeep Safari
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-square-check check-box"></i>Breakfast And Dinner
                                    </li>
                                    <li><i class="fa-solid fa-square-check check-box"></i>1 Night stay</li>
                                    <li>
                                        <i class="fa-solid fa-square-check check-box"></i>1 Time Jeep Safari
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-square-check check-box"></i>Breakfast And Dinner
                                    </li>
                                    <li><i class="fa-solid fa-square-check check-box"></i>1 Night stay</li>
                                    <li>
                                        <i class="fa-solid fa-square-check check-box"></i>1 Time Jeep Safari
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-square-check check-box"></i>Breakfast And Dinner
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- <p class="mt-2 ms-lg-5">Nothing comes even closer to wildlife tours when it is about the Kaziranga fun tour,
                                famous for
                                its green vegetation, varied wildlife, beautiful scenery
                                and pleasant weather round the year and Kaziranga National Park is the first choice of all those who wants
                                peace and excitement at the same time.
                                This exclusive fun tour is basically a short duration package and it is fit for those who want to experience
                                exotic natural beauty and thrills of wildlife.</p> -->
            <div class="packbutton">
                <!-- <a href="#form-container" class="btn btn-custom">Book Now</a> -->
            </div>
        </div>
        </div>

        <div class="tab_container">
            <div class="tabs-nav2">
                <div class="list-inline">

                    <span class="first_tab"><a href="#tour_itinerary" class=""> Tour Itinerary</a></span>
                    <span><a href="#terms_condition" class="">Terms & conditions</a></span>
                    <span><a href="#cancellation_policy" class="">Cancellation Details</a></span>
                    <span><a href="#payment_policy" class="">Payment Info</a></span>
                </div>
            </div>
        </div>

        <div class="container" style="width: 80%;">
            <div class="row  inc_ex">
                <div class="col-md-6 check-icon-color-left">
                    <h4 class="fw-semibold mt-3 mb-3">Inclusions</h4>
                    <p><i class="fa-solid fa-check"></i> 1 night accommodation on twin/triple
                        sharing basis.
                    </p>
                    <p><i class="fa-solid fa-check"></i> Breakfast And dinner at resort</p>
                    <p><i class="fa-solid fa-check"></i> Expert guide during the safari</p>
                    <p><i class="fa-solid fa-check"></i> Complimentary use of swimming</p>
                    <p>
                        <i class="fa-solid fa-check"></i> 1 jeep safari inside the Lion
                        Reserve Area
                    </p>
                </div>
                <div class="col-md-6 check-icon-color-right">
                    <h4 class="fw-semibold mt-3 mb-3">Exclusions</h4>
                    <p>
                        <i class="fa-solid fa-check"></i> Any airfare, train fare, transport &
                        sightseeing.
                    </p>
                    <p>
                        <i class="fa-solid fa-check"></i> Any medical or emergency charge.
                    </p>
                    <p><i class="fa-solid fa-check"></i> GST & PG charges</p>
                    <p>
                        <i class="fa-solid fa-check"></i> Personal nature items like
                        softdrink, hard drink, laundry, camera fee etc.
                    </p>

                </div>
            </div>
        </div>

        <!-- -----slider----- -->
        <div class="container safari_package mt-lg-3">
            <div class="container_nation">
                <div class="indian_forg_btn mt-lg-5 pt-lg-3">


                    <label class="container_radio-btn">india
                        <input type="radio" checked="checked" name="radio" id="switchIndia" name="switchPlan">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container_radio-btn">Foreigner
                        <input type="radio" name="radio" id="switchIndia" name="switchPlan">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#Standard"><i
                                    class="fas fa-star mx-2"></i>Standard</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Deluxe"><i
                                    class="fas fa-star-half-alt mx-2"></i> Deluxe</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Premium"><i
                                    class="fas fa-gem mx-2"></i>Premium</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Luxury"><i
                                    class="fas fa-crown mx-2"></i>Luxury</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="Standard" class="tab-pane fade show active">
                            <div class="row">
                                <!-- Testimonials Section -->
                                <section id="testimonials" class="testimonials">
                                    <div class="container">
                                        <div class="slides-3 swiper" data-aos-delay="100">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="testimonial-wrap">
                                                        <div class="testimonial-item">
                                                            <div class="portfolio-item">
                                                                <div class="portfolio-wrap">

                                                                    <img src="{{ asset('front/assets/img/gallery/gallery-1.jpg') }}"
                                                                        class="img-fluid" alt="">

                                                                </div>
                                                                <h4 class="fw-semibold p-2 fs-5"><i>Hotel 1</i></h4>
                                                            </div><!-- End Portfolio Item -->
                                                        </div>
                                                    </div>
                                                </div><!-- End testimonial item -->

                                                <div class="swiper-slide">
                                                    <div class="testimonial-wrap">
                                                        <div class="testimonial-item">
                                                            <div class="portfolio-item">
                                                                <div class="portfolio-wrap">
                                                                    <a href="">
                                                                        <img src="{{ asset('front/assets/img/gallery/gallery-2.jpg') }}"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4 class="fw-semibold p-2 fs-5"><i>Hotel 1</i></h4>

                                                            </div><!-- End Portfolio Item -->
                                                        </div>
                                                    </div>
                                                </div><!-- End testimonial item -->

                                                <div class="swiper-slide">
                                                    <div class="testimonial-wrap">
                                                        <div class="testimonial-item">
                                                            <div class="portfolio-item">
                                                                <div class="portfolio-wrap">
                                                                    <a href="assets/img/2020-11-07.webp"
                                                                        data-gallery="portfolio-gallery-app"
                                                                        class="glightbox">
                                                                        <img src="assets/img/gallery/gallery-3.jpg"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4 class="fw-semibold p-2 fs-5"><i>Hotel 1</i></h4>

                                                            </div><!-- End Portfolio Item -->
                                                        </div>
                                                    </div>
                                                </div><!-- End testimonial item -->

                                                <div class="swiper-slide">
                                                    <div class="testimonial-wrap">
                                                        <div class="testimonial-item">
                                                            <div class="portfolio-item">
                                                                <div class="portfolio-wrap">
                                                                    <a href="assets/img/2020-11-07.webp"
                                                                        data-gallery="portfolio-gallery-app"
                                                                        class="glightbox">
                                                                        <img src="assets/img/gallery/gallery-4.jpg"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4 class="fw-semibold p-2 fs-5"><i>Hotel 1</i></h4>

                                                            </div><!-- End Portfolio Item -->
                                                        </div>
                                                    </div>
                                                </div><!-- End testimonial item -->

                                                <div class="swiper-slide">
                                                    <div class="testimonial-wrap">
                                                        <div class="testimonial-item">
                                                            <div class="portfolio-item">
                                                                <div class="portfolio-wrap">
                                                                    <a href="assets/img/2020-11-07.webp"
                                                                        data-gallery="portfolio-gallery-app"
                                                                        class="glightbox">
                                                                        <img src="assets/img/gallery/gallery-5.jpg"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4 class="fw-semibold p-2 fs-5"><i>Hotel 1</i></h4>

                                                            </div><!-- End Portfolio Item -->
                                                        </div>
                                                    </div>
                                                </div><!-- End testimonial item -->

                                                <div class="swiper-slide">
                                                    <div class="testimonial-wrap">
                                                        <div class="testimonial-item">
                                                            <div class="portfolio-item">
                                                                <div class="portfolio-wrap">
                                                                    <a href="assets/img/2020-11-07.webp"
                                                                        data-gallery="portfolio-gallery-app"
                                                                        class="glightbox">
                                                                        <img src="assets/img/gallery/gallery-6.jpg"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4 class="fw-semibold p-2 fs-5"><i>Hotel 1</i></h4>

                                                            </div><!-- End Portfolio Item -->
                                                        </div>
                                                    </div>
                                                </div><!-- End testimonial item -->

                                                <!-- Add more swiper-slide items similarly -->

                                            </div>
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                        </div>
                                </section><!-- End Testimonials Section -->
                            </div>
                        </div>

                        <div id="Deluxe" class="tab-pane fade">
                            <div class="row">
                                <!-- Testimonials Section -->
                                <section id="testimonials" class="testimonials">
                                    <div class="container">
                                        <div class="slides-3 swiper" data-aos-delay="100">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="testimonial-wrap">
                                                        <div class="testimonial-item">
                                                            <div class="portfolio-item">
                                                                <div class="portfolio-wrap">
                                                                    <a href="">
                                                                        <img src="assets/img/2020-11-07.webp"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4 class="fw-semibold p-2 fs-5"><i>Hotel 1</i></h4>
                                                            </div><!-- End Portfolio Item -->
                                                        </div>
                                                    </div>
                                                </div><!-- End testimonial item -->

                                                <div class="swiper-slide">
                                                    <div class="testimonial-wrap">
                                                        <div class="testimonial-item">
                                                            <div class="portfolio-item">
                                                                <div class="portfolio-wrap">
                                                                    <a href="">
                                                                        <img src="assets/img/nearby/Devalia.jpeg"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4 class="fw-semibold p-2 fs-5"><i>Hotel 1</i></h4>
                                                            </div><!-- End Portfolio Item -->
                                                        </div>
                                                    </div>
                                                </div><!-- End testimonial item -->

                                                <div class="swiper-slide">
                                                    <div class="testimonial-wrap">
                                                        <div class="testimonial-item">
                                                            <div class="portfolio-item">
                                                                <div class="portfolio-wrap">
                                                                    <a href="assets/img/2020-11-07.webp"
                                                                        data-gallery="portfolio-gallery-app"
                                                                        class="glightbox">
                                                                        <img src="assets/img/2020-11-07.webp"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4 class="fw-semibold p-2 fs-5"><i>Hotel 1</i></h4>

                                                            </div><!-- End Portfolio Item -->
                                                        </div>
                                                    </div>
                                                </div><!-- End testimonial item -->

                                                <div class="swiper-slide">
                                                    <div class="testimonial-wrap">
                                                        <div class="testimonial-item">
                                                            <div class="portfolio-item">
                                                                <div class="portfolio-wrap">
                                                                    <a href="assets/img/2020-11-07.webp"
                                                                        data-gallery="portfolio-gallery-app"
                                                                        class="glightbox">
                                                                        <img src="assets/img/2020-11-07.webp"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4 class="fw-semibold p-2 fs-5"><i>Hotel 1</i></h4>

                                                            </div><!-- End Portfolio Item -->
                                                        </div>
                                                    </div>
                                                </div><!-- End testimonial item -->

                                                <div class="swiper-slide">
                                                    <div class="testimonial-wrap">
                                                        <div class="testimonial-item">
                                                            <div class="portfolio-item">
                                                                <div class="portfolio-wrap">
                                                                    <a href="assets/img/2020-11-07.webp"
                                                                        data-gallery="portfolio-gallery-app"
                                                                        class="glightbox">
                                                                        <img src="assets/img/2020-11-07.webp"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4 class="fw-semibold p-2 fs-5"><i>Hotel 1</i></h4>

                                                            </div><!-- End Portfolio Item -->
                                                        </div>
                                                    </div>
                                                </div><!-- End testimonial item -->

                                                <div class="swiper-slide">
                                                    <div class="testimonial-wrap">
                                                        <div class="testimonial-item">
                                                            <div class="portfolio-item">
                                                                <div class="portfolio-wrap">
                                                                    <a href="assets/img/2020-11-07.webp"
                                                                        data-gallery="portfolio-gallery-app"
                                                                        class="glightbox">
                                                                        <img src="assets/img/2020-11-07.webp"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4 class="fw-semibold p-2 fs-5"><i>Hotel 1</i></h4>

                                                            </div><!-- End Portfolio Item -->
                                                        </div>
                                                    </div>
                                                </div><!-- End testimonial item -->

                                                <!-- Add more swiper-slide items similarly -->

                                            </div>
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                        </div>
                                </section><!-- End Testimonials Section -->
                            </div>
                        </div>

                        <div id="Premium" class="tab-pane fade">
                            <div class="row">
                                <!-- Testimonials Section -->
                                <section id="testimonials" class="testimonials">
                                    <div class="container">
                                        <div class="slides-3 swiper" data-aos-delay="100">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="testimonial-wrap">
                                                        <div class="testimonial-item">
                                                            <div class="portfolio-item">
                                                                <div class="portfolio-wrap">
                                                                    <a href="assets/img/2020-11-07.webp"
                                                                        data-gallery="portfolio-gallery-app"
                                                                        class="glightbox">
                                                                        <img src="assets/img/2020-11-07.webp"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4 class="fw-semibold p-2 fs-5"><i>Hotel 1</i></h4>

                                                            </div><!-- End Portfolio Item -->
                                                        </div>
                                                    </div>
                                                </div><!-- End testimonial item -->

                                                <div class="swiper-slide">
                                                    <div class="testimonial-wrap">
                                                        <div class="testimonial-item">
                                                            <div class="portfolio-item">
                                                                <div class="portfolio-wrap">
                                                                    <a href="assets/img/2020-11-07.webp"
                                                                        data-gallery="portfolio-gallery-app"
                                                                        class="glightbox">
                                                                        <img src="assets/img/2020-11-07.webp"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4 class="fw-semibold p-2 fs-5"><i>Hotel 1</i></h4>

                                                            </div><!-- End Portfolio Item -->
                                                        </div>
                                                    </div>
                                                </div><!-- End testimonial item -->

                                                <div class="swiper-slide">
                                                    <div class="testimonial-wrap">
                                                        <div class="testimonial-item">
                                                            <div class="portfolio-item">
                                                                <div class="portfolio-wrap">
                                                                    <a href="assets/img/2020-11-07.webp"
                                                                        data-gallery="portfolio-gallery-app"
                                                                        class="glightbox">
                                                                        <img src="assets/img/2020-11-07.webp"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4 class="fw-semibold p-2 fs-5"><i>Hotel 1</i></h4>

                                                            </div><!-- End Portfolio Item -->
                                                        </div>
                                                    </div>
                                                </div><!-- End testimonial item -->

                                                <div class="swiper-slide">
                                                    <div class="testimonial-wrap">
                                                        <div class="testimonial-item">
                                                            <div class="portfolio-item">
                                                                <div class="portfolio-wrap">
                                                                    <a href="assets/img/2020-11-07.webp"
                                                                        data-gallery="portfolio-gallery-app"
                                                                        class="glightbox">
                                                                        <img src="assets/img/2020-11-07.webp"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4 class="fw-semibold p-2 fs-5"><i>Hotel 1</i></h4>

                                                            </div><!-- End Portfolio Item -->
                                                        </div>
                                                    </div>
                                                </div><!-- End testimonial item -->

                                                <div class="swiper-slide">
                                                    <div class="testimonial-wrap">
                                                        <div class="testimonial-item">
                                                            <div class="portfolio-item">
                                                                <div class="portfolio-wrap">
                                                                    <a href="assets/img/2020-11-07.webp"
                                                                        data-gallery="portfolio-gallery-app"
                                                                        class="glightbox">
                                                                        <img src="assets/img/2020-11-07.webp"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4 class="fw-semibold p-2 fs-5"><i>Hotel 1</i></h4>

                                                            </div><!-- End Portfolio Item -->
                                                        </div>
                                                    </div>
                                                </div><!-- End testimonial item -->

                                                <div class="swiper-slide">
                                                    <div class="testimonial-wrap">
                                                        <div class="testimonial-item">
                                                            <div class="portfolio-item">
                                                                <div class="portfolio-wrap">
                                                                    <a href="assets/img/2020-11-07.webp"
                                                                        data-gallery="portfolio-gallery-app"
                                                                        class="glightbox">
                                                                        <img src="assets/img/2020-11-07.webp"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4 class="fw-semibold p-2 fs-5"><i>Hotel 1</i></h4>

                                                            </div><!-- End Portfolio Item -->
                                                        </div>
                                                    </div>
                                                </div><!-- End testimonial item -->

                                                <!-- Add more swiper-slide items similarly -->

                                            </div>
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                        </div>
                                    </div>
                                </section><!-- End Testimonials Section -->
                            </div>
                        </div>

                        <div id="Luxury" class="tab-pane fade">
                            <div class="row">
                                <!-- Testimonials Section -->
                                <section id="testimonials" class="testimonials">
                                    <div class="container">
                                        <div class="slides-3 swiper" data-aos-delay="100">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="testimonial-wrap">
                                                        <div class="testimonial-item">
                                                            <div class="portfolio-item">
                                                                <div class="portfolio-wrap">
                                                                    <a href="assets/img/2020-11-07.webp"
                                                                        data-gallery="portfolio-gallery-app"
                                                                        class="glightbox">
                                                                        <img src="assets/img/2020-11-07.webp"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4 class="fw-semibold p-2 fs-5"><i>Hotel 1</i></h4>

                                                            </div><!-- End Portfolio Item -->
                                                        </div>
                                                    </div>
                                                </div><!-- End testimonial item -->

                                                <div class="swiper-slide">
                                                    <div class="testimonial-wrap">
                                                        <div class="testimonial-item">
                                                            <div class="portfolio-item">
                                                                <div class="portfolio-wrap">
                                                                    <a href="assets/img/2020-11-07.webp"
                                                                        data-gallery="portfolio-gallery-app"
                                                                        class="glightbox">
                                                                        <img src="assets/img/2020-11-07.webp"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4 class="fw-semibold p-2 fs-5"><i>Hotel 1</i></h4>

                                                            </div><!-- End Portfolio Item -->
                                                        </div>
                                                    </div>
                                                </div><!-- End testimonial item -->

                                                <div class="swiper-slide">
                                                    <div class="testimonial-wrap">
                                                        <div class="testimonial-item">
                                                            <div class="portfolio-item">
                                                                <div class="portfolio-wrap">
                                                                    <a href="assets/img/2020-11-07.webp"
                                                                        data-gallery="portfolio-gallery-app"
                                                                        class="glightbox">
                                                                        <img src="assets/img/2020-11-07.webp"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4>Hotel1</h4>
                                                            </div><!-- End Portfolio Item -->
                                                        </div>
                                                    </div>
                                                </div><!-- End testimonial item -->

                                                <div class="swiper-slide">
                                                    <div class="testimonial-wrap">
                                                        <div class="testimonial-item">
                                                            <div class="portfolio-item">
                                                                <div class="portfolio-wrap">
                                                                    <a href="assets/img/2020-11-07.webp"
                                                                        data-gallery="portfolio-gallery-app"
                                                                        class="glightbox">
                                                                        <img src="assets/img/2020-11-07.webp"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4 class="fw-semibold p-2 fs-5"><i>Hotel 1</i></h4>

                                                            </div><!-- End Portfolio Item -->
                                                        </div>
                                                    </div>
                                                </div><!-- End testimonial item -->

                                                <div class="swiper-slide">
                                                    <div class="testimonial-wrap">
                                                        <div class="testimonial-item">
                                                            <div class="portfolio-item">
                                                                <div class="portfolio-wrap">
                                                                    <a href="assets/img/2020-11-07.webp"
                                                                        data-gallery="portfolio-gallery-app"
                                                                        class="glightbox">
                                                                        <img src="assets/img/2020-11-07.webp"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4>Hotel1</h4>
                                                            </div><!-- End Portfolio Item -->
                                                        </div>
                                                    </div>
                                                </div><!-- End testimonial item -->

                                                <div class="swiper-slide">
                                                    <div class="testimonial-wrap">
                                                        <div class="testimonial-item">
                                                            <div class="portfolio-item">
                                                                <div class="portfolio-wrap">
                                                                    <a href="assets/img/2020-11-07.webp"
                                                                        data-gallery="portfolio-gallery-app"
                                                                        class="glightbox">
                                                                        <img src="assets/img/2020-11-07.webp"
                                                                            class="img-fluid" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4 class="fw-semibold p-2 fs-5"><i>Hotel 1</i></h4>

                                                            </div><!-- End Portfolio Item -->
                                                        </div>
                                                    </div>
                                                </div><!-- End testimonial item -->

                                                <!-- Add more swiper-slide items similarly -->

                                            </div>
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                        </div>
                                </section><!-- End Testimonials Section -->
                            </div>
                        </div>


                    </div>
                    <div class="form-container" id="form-container">
                        <h3 class="second_head-text">Proceed with your information</h3>
                        <div class="row">
                            <div class="col lg-12">
                                <div class="booking-forms ms-lg-5">
                                    <div class="booking-forms_1 ms-lg-5">
                                        <table>
                                            <thead>

                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div>Date & Time</div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <input type="date" class="form-control1"
                                                                name="travel_date" min="2023-10-19" />
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Adult</td>
                                                    <td>
                                                        <div class="counter">
                                                            <div class="right">
                                                                <i class="fas fa-minus" onclick="decrement()"></i>
                                                            </div>
                                                            <div><input id="counterInput" value="0" /></div>
                                                            <div class="left">
                                                                <i class="fas fa-plus" onclick="increment()"></i>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kids</td>
                                                    <td>
                                                        <div class="counter">
                                                            <div class="right">
                                                                <i class="fas fa-minus" onclick="decrement1()"></i>
                                                            </div>
                                                            <div><input class="text-center" id="counterInput1"
                                                                    value="0" /></div>
                                                            <div class="left">
                                                                <i class="fas fa-plus" onclick="increment1()"></i>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>No. of Rooms</td>
                                                    <td>
                                                        <div class="counter">
                                                            <div class="right">
                                                                <i class="fas fa-minus" onclick="decrement2()"></i>
                                                            </div>
                                                            <div><input class="text-center" id="counterInput2"
                                                                    value="0" /></div>
                                                            <div class="left">
                                                                <i class="fas fa-plus" onclick="increment2()"></i>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>Safari Price</div>
                                                    </td>
                                                    <td>
                                                        <div>3000</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div>Total Price</div>
                                                    </td>
                                                    <td>
                                                        <div>13002</div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="booking-forms_2">
                                    <!-- <div> -->
                                    <form action="" class="form_dsg">
                                        <input type="text" placeholder="Name" />
                                        <input type="number" placeholder="Phone No" />
                                        <input type="text" placeholder="Email" />
                                        <input type="text" placeholder="Country" />
                                        <div>
                                            <!-- <button  class="submit_btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Submit</button> -->
                                            <button type="button" class="submit_btn" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop">
                                                submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ===proceed details=====  -->
                    <!-- Button trigger modal -->


                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog-1 modal-dialog modal-dialog-centered">
                            <div class="modal-content modal-content-pkg" style="background-color: rgb(250, 248, 244);">
                                <div class="modal-header">
                                    <h5 class="modal-title heading-pkg fw-semibold" id="staticBackdropLabel">Booking
                                        Overview</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div class="container row">
                                        <div class="col-lg-6">
                                            <table class="table table-bordered w-60 table-modal-package">
                                                <tbody>
                                                    <tr>
                                                        <th colspan="2" class="text-center">Traveller Details</th>
                                                    </tr>
                                                    <tr class="">
                                                        <td>travel Date :</td>
                                                        <td>2024-06-23</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Name :</td>
                                                        <td>testing</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile :</td>
                                                        <td>9999999999</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email ID :</td>
                                                        <td>abc@gmail.com</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Packages :</td>
                                                        <td>A Tour In Jawai</td>
                                                    </tr>

                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="col-lg-6">
                                            <table class="table table-bordered w-100 table-modal-package">
                                                <tbody>
                                                    <tr>
                                                        <th colspan="2" class="text-center">Package Details</th>
                                                    </tr>
                                                    <tr class="">
                                                        <td>Packages :</td>
                                                        <td>Standard</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Adults :</td>
                                                        <td>1</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kids :</td>
                                                        <td>0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>No of Rooms :</td>
                                                        <td>1</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Safari Members :</td>
                                                        <td>1</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Price :</td>
                                                        <td>9200</td>
                                                    </tr>
                                                    <tr>
                                                        <td>GST :</td>
                                                        <td>460</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Payable Amount:</td>
                                                        <td>9660</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="row ">
                                            <div class="col text-center">
                                                <button class="btn btn-modelpck fw-semibold  mt-1 ms-1">Pay 50% (INR
                                                    4830)</button>
                                                <button class="btn btn-modelpck1 fw-semibold mt-1 ms-1">Pay Full (INR
                                                    9660)</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer ">
                                        <button type="button" class="btn btn-success my-4 btn-hotelform">Pay Now</button>
                                        <button type="button" class="btn btn-secondary my-4 btn-form-reset"
                                            data-bs-dismiss="modal">Go
                                            Back</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End Contact Form -->
                </div>
            </div>
        </div>

        <section>
            <div class="container-fluid" id="tour_itinerary">
                <div class="itinerary">
                    <div class="section-title">
                        <h2>Tour Itinerary</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-12 ">
                            <div class="tour-details__plan-single">
                                <div class="tour-details__plan-count" style="margin: auto;">
                                    <img src="{{ asset('front/assets/img/package/day1.jpg') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 mt-2">
                            <div class="tour-details__plan-content">
                                <h3>Day 1: Arrive Guwahati & Transfer to Kaziranga</h3>
                                <p>
                                    On arrival, proceed to your pre-booked resort in Kaziranga. The Kaziranga National Park
                                    is the first
                                    stop on your Kaziranga tour. You can explore the park and participate in a few
                                    activities such as
                                    visiting the Orchid garden where you can enjoy an evening cultural program. Finally,
                                    it's time to rest
                                    your body for an overnight stay in the pre-booked resort.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="tour-details__plan-single">
                                <div class="tour-details__plan-count" style="margin: auto;">
                                    <img src="{{ asset('front/assets/img/package/day1.jpg') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-12 mt-2">
                            <div class="tour-details__plan-content">
                                <h3>Day 2: Jeep Safari & Transfer to Guwahati</h3>
                                <p>
                                    Your day starts with a knock on your door and a hot cup of tea to warm you up before the
                                    morning
                                    safari drive. Get ready for the open jeep safari, which is pre-booked for you. We enter
                                    the jungle
                                    area of Kaziranga National Park in search of Assam's remarkable wildlife, including
                                    Royal Bengal
                                    tigers and Rhinoceros. Later, we will be taken to Guwahati for your departure.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <!-- Accommodation Section -->
        <div class="container-fluid" id="terms_condition">
            <div class="row">
                <div class="col-12">
                    <div class="section-title ">
                        <h2>Terms & Conditions </h2>
                    </div>
                    <ul class="list-unstyled payment_policy">
                        <div class="icon-ppr-plan">
                            <span><i class="fa-solid fa-paper-plane"></i></span>
                            <p>Lorem, ipsum dolor sit amet
                                molestiae totam qui blanditiis quisquam!
                            </p>
                        </div>
                        <div class="icon-ppr-plan">
                            <span><i class="fa-solid fa-paper-plane"></i></span>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum saepe voluptas facere nihil
                                quos
                                nostrum
                                modi repudiandae tempore distinctio tenetur?
                            </p>
                        </div>
                        <div class="icon-ppr-plan">
                            <span><i class="fa-solid fa-paper-plane"></i></span>
                            <p>Lorem, ipsum dolor sit amet
                                molestiae totam qui blanditiis quisquam!
                            </p>
                        </div>
                        <div class="icon-ppr-plan">
                            <span><i class="fa-solid fa-paper-plane"></i></span>
                            <p>Lorem, ipsum dolor sit amet
                                molestiae totam qui blanditiis quisquam!
                            </p>
                        </div>
                        <div class="icon-ppr-plan">
                            <span><i class="fa-solid fa-paper-plane"></i></span>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum saepe voluptas facere nihil
                                quos
                                nostrum
                                modi repudiandae tempore distinctio tenetur?
                            </p>
                        </div>
                        <div class="icon-ppr-plan">
                            <span><i class="fa-solid fa-paper-plane"></i></span>
                            <p>Lorem, ipsum dolor sit amet
                                molestiae totam qui blanditiis quisquam!
                            </p>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        </div>

        <section class="container-fluid" id="cancellation_policy">
            <div class="section-title ">
                <h2>Policy Regarding Cancellation/ No Show / Early Departure</h2>
            </div>
            <div class="payment_policy">

                <div class="icon-ppr-plan">
                    <span><i class="fa-solid fa-paper-plane"></i></span>
                    <p>Lorem, ipsum dolor sit amet
                        molestiae totam qui blanditiis quisquam!
                    </p>
                </div>
                <div class="icon-ppr-plan">
                    <span><i class="fa-solid fa-paper-plane"></i></span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum saepe voluptas facere nihil quos
                        nostrum
                        modi repudiandae tempore distinctio tenetur?
                    </p>
                </div>
                <div class="icon-ppr-plan">
                    <span><i class="fa-solid fa-paper-plane"></i></span>
                    <p>Lorem, ipsum dolor sit amet
                        molestiae totam qui blanditiis quisquam!
                    </p>
                </div>
                <div class="icon-ppr-plan">
                    <span><i class="fa-solid fa-paper-plane"></i></span>
                    <p>Lorem, ipsum dolor sit amet
                        molestiae totam qui blanditiis quisquam!
                    </p>
                </div>
                <div class="icon-ppr-plan">
                    <span><i class="fa-solid fa-paper-plane"></i></span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum saepe voluptas facere nihil quos
                        nostrum
                        modi repudiandae tempore distinctio tenetur?
                    </p>
                </div>
                <div class="icon-ppr-plan">
                    <span><i class="fa-solid fa-paper-plane"></i></span>
                    <p>Lorem, ipsum dolor sit amet
                        molestiae totam qui blanditiis quisquam!
                    </p>
                </div>
            </div>
            </div>
            </div>
        </section>

        <div class="container-fluid" id="payment_policy">
            <div class="row">
                <div class="section-title">
                    <h2>Payment Policy</h2>
                </div>
                <div class="itinerary-info payment_policy ">
                    <div class="icon-ppr-plan">
                        <span><i class="fa-solid fa-paper-plane"></i></span>
                        <p>Lorem, ipsum dolor sit amet
                            molestiae totam qui blanditiis quisquam!
                        </p>
                    </div>
                    <div class="icon-ppr-plan">
                        <span><i class="fa-solid fa-paper-plane"></i></span>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum saepe voluptas facere nihil quos
                            nostrum
                            modi repudiandae tempore distinctio tenetur?
                        </p>
                    </div>
                    <div class="icon-ppr-plan">
                        <span><i class="fa-solid fa-paper-plane"></i></span>
                        <p>Lorem, ipsum dolor sit amet
                            molestiae totam qui blanditiis quisquam!
                        </p>
                    </div>
                    <div class="icon-ppr-plan">
                        <span><i class="fa-solid fa-paper-plane"></i></span>
                        <p>Lorem, ipsum dolor sit amet
                            molestiae totam qui blanditiis quisquam!
                        </p>
                    </div>
                    <div class="icon-ppr-plan">
                        <span><i class="fa-solid fa-paper-plane"></i></span>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum saepe voluptas facere nihil quos
                            nostrum
                            modi repudiandae tempore distinctio tenetur?
                        </p>
                    </div>
                    <div class="icon-ppr-plan">
                        <span><i class="fa-solid fa-paper-plane"></i></span>
                        <p>Lorem, ipsum dolor sit amet
                            molestiae totam qui blanditiis quisquam!
                        </p>
                    </div>

                </div>
            </div>
        </div>
        </div>

    </main><!-- End #main -->
@endsection
