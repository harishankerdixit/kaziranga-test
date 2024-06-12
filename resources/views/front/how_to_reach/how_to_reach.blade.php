@extends('front.layouts.main')
@section('title', $reach->title)
@section('meta_title', $reach->meta_title)
@section('meta_description', $reach->meta_description)
{{-- @section('links', 'https://kazirangabooking.com/how-to-reach-kaziranga') --}}
@section('content')
    <main id="main">
        {!! $reach->section_1 !!}
        {{-- <section class="contact terms">
            <div class="container">
                <div class="section-title">
                    <h2>How To Reach</h2>
                </div>
                <div class="row  d-flex justify-content-center">
                    <div class="col-lg-10 text-justify">
                        <p><span class="fs-5 fw-semibold" style="color:#af2f00"><i>Jawai</i></span> National Park is a wild
                            place that is located in the Pali district of Rajasthan. This
                            park is a famous tourist destination and people especially come here to enjoy the Jawai
                            leopard safari. This area is home to more than 50 leopards along with crocodiles, deer,
                            sloth bears, hyenas, bears, Wolves, Chinkara, Jackals, and various bird species. Leopards in
                            this area live happily with humans, they do not attack humans, and humans in this area do
                            not hunt leopards or other animals. Many people come here because it’s a safe place to see
                            wild cats and people can come here with their children also without any worries. One can
                            easily reach the Jawai by taking <b><i> roadways</i></b>,<b><i> railways</i></b>, and<b><i>
                                    airways</i></b>
                        </p>
                        <p class="fw-semibold fs-5 fst-italic mt-3" style="color:#654321"> Let’s see the detailed
                            information to reach Jawai Leopard Park.</p>
                    </div>
                </div>
            </div>
            <!-- ======= Departments Section ======= -->
            <div class="container departments mt-3">
                <div class="row gy-4 d-flex justify-content-center">
                    <div class="col-lg-2">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item text-center">
                                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">By Flight
                                </a>
                            </li>
                            <li class="nav-item text-center">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">By Train
                                </a>
                            </li>
                            <li class="nav-item text-center">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">By Road
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-8">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tab-1">
                                <div class="row gy-4">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>By Flight</h3>
                                        <p class="fst-italic">
                                            The nearest airport to Jawai is <b>Jodhpur</b> which is
                                            at a distance of <b>153 km.</b>
                                        </p>
                                        <p>
                                            Regular flights are connected from this airport to
                                            various cities of India. You can also come to Udaipur
                                            and Ahmedabad Airport. If you’re coming from outside
                                            India then you should come to Jaipur International
                                            Airport. This airport is at a distance of 387 km. After
                                            reaching any of these airports, you can come to the park
                                            by taking a taxi or other local transport like a bus.
                                        </p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="front/assets/img/attractions/By Flight .jpg" alt=""
                                            class="img-fluid" />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-2">
                                <div class="row gy-4">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>By Train</h3>
                                        <p class="fst-italic">
                                            If you’re someone who likes to travel by train then you
                                            should visit the park by booking your train to Mori
                                            Bera.
                                        </p>
                                        <p>
                                            This railway station is closest to Jawai at a distance
                                            of 4 km. Other options are Jawai Bandh Railway Station
                                            or Falna Railway Station. These stations are well
                                            connected to various major cities like Mumbai, Delhi,
                                            Udaipur, Jaipur, and Ahmedabad, etc. After reaching any
                                            of these stations you can easily find a taxi or other
                                            transport to reach Jawai Bandh.
                                        </p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="front/assets/img/attractions/by Train.jpg" alt=""
                                            class="img-fluid" />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-3">
                                <div class="row gy-4">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>By Road</h3>
                                        <p class="fst-italic">
                                            Jawai is located in the Pali district of Rajasthan. This
                                            place has good road connectivity with major cities like
                                            <b>Jodhpur, Udaipur, Jaipur, Kishangarh, Ahmedabad,
                                                etc</b>
                                        </p>
                                        <p>Distance from Major Cities</p>
                                        Jodhpur to Jawai: 148 km | Udaipur to Jawai: 174 km |
                                        Jaipur to Jawai: 381 km | Kishangarh to Jawai: 280 km
                                        Ahmedabad to Jawai: 313 km | Sumerpur to Jawai: 8.5 km |
                                        Kumbhalgarh to Jawai: 90 km
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="front/assets/img/attractions/By Road .jpg" alt=""
                                            class="img-fluid" />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-4">
                                <div class="row gy-4">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>
                                            Fuga dolores inventore laboriosam ut est accusamus
                                            laboriosam dolore
                                        </h3>
                                        <p class="fst-italic">
                                            Totam aperiam accusamus. Repellat consequuntur iure
                                            voluptas iure porro quis delectus
                                        </p>
                                        <p>
                                            Eaque consequuntur consequuntur libero expedita in
                                            voluptas. Nostrum ipsam necessitatibus aliquam fugiat
                                            debitis quis velit. Eum ex maxime error in consequatur
                                            corporis atque. Eligendi asperiores sed qui veritatis
                                            aperiam quia a laborum inventore
                                        </p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="front/assets/img/departments-4.jpg" alt="" class="img-fluid" />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-5">
                                <div class="row gy-4">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>
                                            Est eveniet ipsam sindera pad rone matrelat sando reda
                                        </h3>
                                        <p class="fst-italic">
                                            Omnis blanditiis saepe eos autem qui sunt debitis porro
                                            quia.
                                        </p>
                                        <p>
                                            Exercitationem nostrum omnis. Ut reiciendis repudiandae
                                            minus. Omnis recusandae ut non quam ut quod eius qui.
                                            Ipsum quia odit vero atque qui quibusdam amet. Occaecati
                                            sed est sint aut vitae molestiae voluptate vel
                                        </p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="front/assets/img/departments-5.jpg" alt="" class="img-fluid" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
    </main><!-- End #main -->
@endsection
