@extends('front.layouts.main')
@section('title', $bestTime->title)
@section('meta_title', $bestTime->meta_title)
@section('meta_description', $bestTime->meta_description)
{{-- @section('links', 'https://kazirangabooking.com/best-time-to-visit-kaziranga') --}}
@section('content')
    <main id="main">
        {{-- @php
            dump($bestTime->toArray());
        @endphp --}}
        {!! $bestTime->section_1 !!}
        {{-- <section class="contact terms">
            <div class="container">
                <div class="section-title">
                    <h2>Best Time To Visit</h2>
                </div>
                <div class="row  d-flex justify-content-center">
                    <div class="col-lg-10 text-justify">
                        <p><span class="fs-5 fw-semibold" style="color:#af2f00"><i>Jawai</i></span> Leopard Safari Park
                            is a thrilling place to
                            experience jeep safari. This area is famous for sightings of Leopards. It’s located in the
                            Pali district of Rajasthan and you can reach here very easily. Along with Leopards, you can
                            spot sloth bears, hyenas, bears, Wolves, Chinkara, Jackals, etc. The sightings of leopards
                            are common here as they roam freely in the granite hill area and you can see them at any
                            time of the year. However, the best season to enjoy a jeep safari ride in this region is in
                            the winter season from <span class="fs-5"><i>November to February</i></span>, let’s know the
                            reason behind it.
                        </p>
                    </div>

                    <div class="col-lg-10 text-justify privcy-page-cnt">
                        <div class="row mt-2">
                            <div class="col-lg-2 text-center">
                                <img src="front/assets/img/gallery/summer.png" height="80px" width="80px">
                            </div>
                            <div class="col-lg-10">
                                <h4 class="bttv-heading ">Summer</h4>

                                <p class="">During this season the weather in Rajasthan becomes hot and humid. People
                                    who cannot bear the heat should not visit during the summer, as you can fall sick
                                    and dehydrated. However, if you can bear the heat then this time is best for
                                    sightings as you can easily see leopards drinking water from Jawai Bandh.

                                </p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-2 text-center">
                                <img src="front/assets/img/gallery/monsoon.png" height="80px" width="80px">
                            </div>
                            <div class="col-lg-10">
                                <h4 class="bttv-heading ">Monsoon</h4>

                                <p class=""> Because of rain, the roads can be sloppy, and there are chances of
                                    accidents so the leopard safari rides remain closed during this time.

                                </p>
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-2 text-center mt-2">
                                <img src="front/assets/img/gallery/winter.png" height="80px" width="80px">
                            </div>
                            <div class="col-lg-10">
                                <h4 class="bttv-heading ">Winter </h4>

                                <p class="">This season is considered best for safaris because the weather remains
                                    pleasant and you can also visit nearby attractions without worrying about the heat.
                                    A lot of migratory birds can also be spotted during this time.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
    </main><!-- End #main -->
@endsection
