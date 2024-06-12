@extends('front.layouts.main')
@section('title', $jungle->title)
@section('meta_title', $jungle->meta_title)
@section('meta_description', $jungle->meta_description)
{{-- @section('links', 'https://kazirangabooking.com/') --}}
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero_safari" class=" justify-content-lg-center p-4  mt-5">
        <div class="row mt-5 mx-5">
            {!! $jungle->section_1 !!}
            {{-- <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                <div class="periyar-safari-online safari-table-page ">
                    <div class="box1">
                        <h3 class="h4 mt-0 fw-semibold text-light">Jawai Safari Timings &amp; Important Info</h3>
                        <table class="table table-bordered ">
                            <tbody>
                                <tr class="safari-table-page-tr">
                                    <td class="safari-table-page-tr1">Jeep Safari Price </td>
                                    <td class="safari-table-page-tr">INR 3500 / Jeep (Maximum 6 Persons are allowed in ONE
                                        Jeep)</td>
                                </tr>

                                <tr class="safari-table-page-tr">
                                    <td class="safari-table-page-tr1">Safari Timing </td>
                                    <td class="safari-table-page-tr">B/W - Morning 06:00 AM to 09:00 AM | B/W - Evening 3:30
                                        PM to 6:30 PM
                                    </td>
                                </tr>
                                <tr class="safari-table-page-tr">
                                    <td class="safari-table-page-tr1">Safari Duratuon </td>
                                    <td class="safari-table-page-tr">2 hours and 30 minitus</td>
                                </tr>
                                <tr class="safari-table-page-tr">
                                    <td class="safari-table-page-tr1">Safari Zones </td>
                                    <td class="safari-table-page-tr">Bera, Sena, Rughnathpura, jeewada and Kothar</td>
                                </tr>

                            </tbody>
                        </table>
                        <article><strong class="heading-safari-table">Points to Remember for Jawai Safari Booking</strong>
                        </article>
                        <article> You have to pay full fees for safari booking in advance.</article>
                        <article> ID proof is a must for each and every visitor.</article>
                        <article> No refund or cancellation is permitted on confirmed bookings.</article>
                        <article> Booking is non-transferable and cannot be exchanged with anyone.</article>
                        <article class="table-content-2"> You must carry the same ID card that you have submitted during the
                            online
                            booking.</article>
                        <article class="table-content-2"> Passport details are mandatory for foreign tourists for making
                            reservations.</article>
                        <article class="table-content-2"> In case of any revision of fees after the booking, visitors will
                            be liable
                            to pay the difference at the time of entry into the park.</article>
                        <article class="table-content-2"> The visitors are required to report at the boarding place 15 min
                            prior to
                            the scheduled departure of the safari.</article>
                        <article class="table-content-2"> We are merely acting as a travel agent in booking your safari at
                            National
                            Park and will not be responsible for any accident, injury, theft and death during the safari
                            excursion.</article>
                    </div>
                </div>
            </div> --}}


            <div class="col-lg-6 col-sm-12 col-sm-12 ">
                <form class="booking-form ssafari" id="bookingForm" data-aos="fade-up" style="margin: auto;">
                    <h3 class="mb-4 text-center enqheader">Book Safari Now!</h3>

                    <div class="row">

                        <!-- Date -->
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control formCust calendar" id="datepicker" placeholder="Select Date"
                                required>

                        </div>

                        <!-- Timing -->
                        <div class="col-md-6 mb-3">
                            <div class="">
                                <select class="form-select formCust" id="safariType" required>
                                    <option value="">Choose Safari Type</option>
                                    <option value="jeep">Jeep</option>
                                    <option value="elephant">Elephant (Buffer Zone)</option>
                                </select>
                            </div>
                            <!-- <select class="form-select formCust" id="timing" required>
                                                                                                                        <option value="" disabled selected>Select TimeSlot</option>
                                                                                                                        <option value="Morning">Morning</option>
                                                                                                                        <option value="Evening">Evening</option>
                                                                                                                      </select> -->
                        </div>
                    </div>
                    <div class="row">

                        <!-- Date -->
                        <div class="col-md-12">
                            <!-- <input type="text" class="form-control formCust" id="datepicker" placeholder="Select Date" required> -->
                            <!-- Safari Type -->
                            <div class="mb-3">
                                <select class="form-select formCust" id="safariType" required>
                                    <option value="">Choose Your Zone</option>
                                    <option value="Bera">Bera</option>
                                    <option value="sena">Sena</option>
                                </select>
                            </div>

                        </div>

                        <!-- Timing -->
                        <div class="col-md-12 ">
                            <div class="mb-3">
                                <select class="form-select formCust" id="timing" required>
                                    <option value="" disabled selected>Select TimeSlot</option>
                                    <option value="Morning">Morning</option>
                                    <option value="Evening">Evening</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <!-- Name -->
                    <div class=" mb-3">
                        <input type="text" class="form-control formCust" id="name" placeholder="Traveller Name"
                            required>
                    </div>


                    <!-- Mobile Number -->
                    <div class=" mb-3">
                        <input type="tel" class="form-control formCust" id="mobile" placeholder="Mobile Number"
                            required>
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3">
                        <input type="email" class="form-control formCust" id="email" placeholder="Email Address"
                            required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn book-safari-btn">Book Now</button>
                    </div>
                </form>
            </div>
        </div>


    </section><!-- End Hero -->

    <main id="main">
        {!! $jungle->section_2 !!}
        {{-- <section class="">
            <div class="container">
                <div class="section-title">
                    <h2>Jawai Leopard Safari
                    </h2>
                </div>
                <p class="text-justify">This is a super easy online safari booking platform for Jawai National Park of
                    Rajasthan. You can see a lot
                    of leopards on the granite hills or near Jawai Dam. Along with leopards, other animals can also be seen
                    here
                    with crocodiles and birds near the River area. You can book your safari for Bera, Sena, Rughnathpura,
                    Jeewada,
                    and Kothar. You just have to fill in some basic details and you can book your away Leopard Safari very
                    easily.
                    Don’t forget that only 180 jeeps are allowed here, so book your safari now.
                </p>
            </div>
        </section> --}}

        {!! $jungle->section_3 !!}
        {{-- <section>
            <div class="container">
                <div class="section-title">
                    <h2>Safari Timing </h2>
                </div>
                <div class="safari_time">
                    <div class="col-md-5 icon-box">
                        <h4>Morning Safari</h4>
                        <p class="text-justify">This safari starts around 6 am and this is a good time to spot leopards.
                            They come out of caves for
                            hunting before sunrise and you can get great views of them. This is also a good time for bird
                            watchers to
                            go on rides as birds are more active in the morning and you can listen to soothing sounds.
                        </p>
                    </div>
                    <div class="col-md-5 icon-box">
                        <h4>Evening Safari</h4>
                        <p class="text-justify">This safari starts around 3 pm to 4 pm and lasts around 6 pm. You can spot
                            many leopards during this time
                            and also it’s a great time to go for a safari as you can see scenic sunset views. You can take
                            some good
                            pictures in beautiful surroundings.
                        </p>
                    </div>
                </div>
            </div>
        </section> --}}

        {!! $jungle->section_4 !!}
        {{-- <section>
            <div class="container">
                <div class="section-title">
                    <h2>Leopard Safari and Zones</h2>
                </div>
                <div class="row">
                    <div class="col-md-6 text-justify">
                        <p>Leopard Safari is a famous activity in Jawai. Jawai is located in the Pali district of Rajasthan
                            and you
                            can see leopards in the area roaming freely. There is no defined border of the park as leopards
                            roam
                            freely in the villages of Jawai. This is a great place to see the coexistence relation between
                            humans and
                            animals. Leopards there, just depend on animal hunting and there is not even an individual case
                            of them
                            harming humans and vice versa. People especially go there to experience this.
                        </p>
                        <p>Talking about safari zones so let me tell you that there are no well-defined safari gates or
                            safari zones
                            in this area. There are safari zones and gates in other national parks, but this one is
                            exceptional. You
                            can book your ride for Bera, Sena, Rughnathpura, Jeewada, and Kothar. Only 6 persons are allowed
                            to go on
                            each jeep and there are no guides here. The drivers of jeep safaris know this area so well that
                            they can
                            almost appropriately anticipate the sighting of leopards. This place is home to around 50 - 60
                            leopards
                            and also other fauna like crocodiles, deer, sloth bears, hyenas, bears, Wolves, Chinkara,
                            Jackals, and
                            various bird species.
                        </p>
                        <p>Leopards are nocturnal animals but in this area, they can be sighted at any time of the day and
                            you can
                            see them by booking a jeep safari ride for morning and evening.</p>
                    </div>
                    <div class="col-md-6">
                        <div class="safari_zone_img">
                            <img src="front\assets\img\package\Leopard safari & Zones Square image.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        {!! $jungle->section_5 !!}
        {{-- <section class="safari_req_list"
            style="background-image: url('front/assets/img/background/Untitled\ design\ \(17\).png'); background-repeat: no-repeat; background-size: cover; background-position: center;">
            <div class="container">
                <div class="section-title">
                    <h2>Requirements of Safari bookings
                    </h2>
                </div>
                <ol class="alternating-colors">
                    <li>The full name, age, and sex of the tourist who is going to be on safari.
                    </li>
                    <li>The nationality of the tourist must be mentioned.

                    </li>
                    <li> You have to provide ID proof like a Driving license, Voter or PAN card, Passport, and Aadhar Card.
                    </li>
                    <li>Don’t forget to keep the original ID proof during your safari.
                    </li>
                    <li>Acceptable ID proofs for foreigners include the original passport.
                    </li>
                    <li>You have to mention the preferred traveling date & Safari timing. </li>
                    <li>There are no permits required in this park but you have to book your safari in Advance.</li>
                </ol>
        </section> --}}

        {!! $jungle->section_6 !!}
        {{-- <section class="olcards">
            <div class="container">
                <div class="section-title">
                    <h2>Safari Rules</h2>
                </div>
                <ol>
                    <li style="--cardColor:#c1782a;">
                        <div class="content">
                            Jeep safaris once booked can not be cancelled or transferred.
                        </div>
                    </li>
                    <li style="--cardColor:#5c3e19;">
                        <div class="content">
                            You have to carry your original IDs during the safari such as your driver's license, passport,
                            PAN card,
                            voter card, etc. If the visitor is a foreigner then they have to carry their passport with them.
                        </div>
                    </li>
                    <li style="--cardColor:#c1782a;">
                        <div class="content">
                            Tourists must have to obey the rules that are informed by drivers for safety reasons.
                        </div>
                    </li>
                    <li style="--cardColor:#5c3e19;">
                        <div class="content">
                            Blowing horn, shouting, or using any tape recorder, transistor, or radio is strictly prohibited.
                        </div>
                    </li>

                </ol>
        </section> --}}

        {!! $jungle->section_7 !!}
        {{-- <section class="safari_imp_list">
            <div class="container">
                <div class="section-title">
                    <h2>Important Information</h2>
                </div>
                <ul>

                    <li><span class="spanicon">✅</span><span>If you want a comfortable ride then book the whole safari for
                            just
                            four</span>
                    </li>
                    <li><span class="spanicon">✅</span><span>You should book your safari in advance because of the rush,
                            on-spot
                            booking can be difficult or not available.</span>
                    </li>
                    <li><span class="spanicon">✅</span><span>After sunset, no jeep rides can be done in the area.</span>
                    </li>
                    <li><span class="spanicon">✅</span><span>Don’t try to get down from the vehicle during your ride, it is
                            strictly prohibited.</span> </li>
                    <li><span class="spanicon">✅</span><span>You cannot carry pets during your ride. </span>
                    </li>
                </ul>
        </section> --}}

        <!-- ======= Gallery Section ======= -->
        {!! $jungle->section_8 !!}
        {{-- <section id="gallery" class="gallery">
            <div class="container">

                <div class="section-title">
                    <h2>Gallery</h2>

                </div>
            </div>

            <div class="container-fluid">
                <div class="row g-0">

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="front/assets/img/gallery/gallery-1.jpg" class="galelry-lightbox">
                                <img src="front/assets/img/gallery/gallery-1.jpg" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="front/assets/img/gallery/gallery-2.jpg" class="galelry-lightbox">
                                <img src="front/assets/img/gallery/gallery-2.jpg" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="front/assets/img/gallery/gallery-3.jpg" class="galelry-lightbox">
                                <img src="front/assets/img/gallery/gallery-3.jpg" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="front/assets/img/gallery/gallery-4.jpg" class="galelry-lightbox">
                                <img src="front/assets/img/gallery/gallery-4.jpg" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="front/assets/img/gallery/gallery-5.jpg" class="galelry-lightbox">
                                <img src="front/assets/img/gallery/gallery-5.jpg" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="front/assets/img/gallery/gallery-6.jpg" class="galelry-lightbox">
                                <img src="front/assets/img/gallery/gallery-6.jpg" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="front/assets/img/gallery/gallery-7.jpg" class="galelry-lightbox">
                                <img src="front/assets/img/gallery/gallery-7.jpg" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="front/assets/img/gallery/gallery-8.jpg" class="galelry-lightbox">
                                <img src="front/assets/img/gallery/gallery-8.jpg" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- End Gallery Section -->
    </main><!-- End #main -->
@endsection
