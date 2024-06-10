@extends('front.layouts.main')
@section('title', $homepage->title)
@section('meta_title', $homepage->meta_title)
@section('meta_description', $homepage->meta_description)
@section('links', 'https://kazirangabooking.com/')
@section('content')
    <section id="hero" class="d-flex align-items-center justify-content-center">
        <video autoplay loop muted playsinline>
            <source src="{{ asset('front/assets/img/gallery/homepage2.mp4') }}">
        </video>
        <div class="container" style="position: absolute">
            <h1 data-aos="zoom-in" class="homepage-heading">Jawai National Park</h1>
            <h2>Experience wildlife like you never did before!</h2>
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
        </div>
    </section>
    <main id="main">
        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content">
                            <h3>Leopard Jungle Safari</h3>
                            <p>
                                Jawai Hills should be on top of the travel bucket list of
                                people going to Rajasthan. You can see a lot of wild animals
                                here, this place is best to observe leopards roaming freely
                                around people. This place is home to several birds and
                                crocodiles that can be seen during safari rides. You can get
                                great views of sunset from black lava hills that will add
                                excitement to your safari.
                            </p>
                            <div class="text-center">
                                <a href="./safari.html" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="fas fa-water"></i>
                                        <h4>Jawai Dam</h4>
                                        <p>
                                            It covers an area of 500 sq km. with a great view of the
                                            Jawai River from here and also you can spot crocodiles
                                            and birds.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="fas fa-place-of-worship"></i>
                                        <h4>Visit Temples</h4>
                                        <p>
                                            There are many Hindu and Jain temples here such as
                                            Devgiri Temple, Kambeshwar Mahadev Temple, and Abhinav
                                            Mahavir Dham.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="fas fa-paw"></i>
                                        <h4>Coexistence: Humans and Leopards</h4>
                                        <p>
                                            The humans and leopards in the area live in great
                                            harmony, they do not feel afraid of each other.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .content-->
                    </div>
                </div>
            </div>
        </section>
        <!-- End Why Us Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container-fluid">
                <div class="row">
                    <div
                        class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
                        <a href=""></a>
                    </div>

                    <div
                        class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                        <h3>Jawai National Park</h3>
                        <p>
                            Jawai National Park is located in the Aravalli Mountains of Pali
                            district of Rajasthan, India. This place is also known as Jawai
                            Bandh, which is named after a dam on the Jawai River. This Jawai
                            Bandh dam was built back in the 1950s to provide water for the
                            nearby villages and farmlands. This place was established as
                            Jawai Bandh Leopard Conservation Reserve in 2008, before that
                            local people used it for grazing their cattle and farming.
                        </p>

                        <div>
                            <h4 class="title">Popularity</h4>
                            <p class="description">
                                Jawai National Park is famous because this place is home to
                                more than 50 leopards along with other animals such as
                                crocodiles, deer, sloth bears, hyenas, bears, Wolves,
                                Chinkara, Jackals, and various bird species including Sarus
                                cranes and flamingos. This park is famous because the leopards
                                here roam freely on granite hills and they do not threaten
                                humans in the area. Jawai Hills are the only place in India
                                that has the highest density of Leopards.
                            </p>
                        </div>

                        <div>
                            <h4 class="title">Land & it's People</h4>
                            <p class="description">
                                Millions of years ago, Jawai Hills were shaped by lava, and
                                now these natural caves and rocks are shelters for leopards
                                and striped hyenas with many more. The people of the Rabari
                                tribe have lived here for a long time, and they see leopards
                                as special guardians of their local god. The people here
                                protect these leopards, creating a peaceful relationship
                                between the tribe and the leopards. Jawai National Park is
                                special because the leopards here behave differently, they do
                                not harm villagers' cows or goats. Leopards here hunt other
                                wild animals at night but leave the villagers' animals alone.
                                And what's even more amazing is that these leopards have never
                                harmed any humans.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="fa-solid fa-cat"></i>
                            <span data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Indian Leopards</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class="fa-solid fa-dog"></i>
                            <span data-purecounter-start="0" data-purecounter-end="23" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Striped Hyenas</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="fa-solid fa-dragon"></i>
                            <span data-purecounter-start="0" data-purecounter-end="377" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Crocodiles</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="fa-solid fa-dove"></i>
                            <span data-purecounter-start="0" data-purecounter-end="100" data-purecounter-duration="1"
                                class="purecounter"></span>

                            <p>Birds</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Counts Section -->

        <section class="area_jawai">
            <div class="container">
                <div class="section-title">
                    <h2>Area of Jawai</h2>
                    <div class="row">
                        <div class="col-md-5 area">
                            <p>
                                Jawai is located in District Pali in the northwestern area of
                                Rajasthan. This place is scattered over 60 km and it covers 16
                                villages and 9 leopard safari points along with a Jwawi Bandh,
                                which is a dam that was built back in 1957 to supply water in
                                the district.
                            </p>
                        </div>
                        <div class="col-md-5 area">
                            <p>
                                When you reach the area where you can see great hills made of
                                lava rocks then just know that you’ve reached Jawai. These
                                granite hills were formed millions of years ago by Lava. You
                                can do trekking on these hills very easily. Many villages and
                                animals can be found on these hills and you can take good
                                pictures of scenic views from here.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="section-title">
                    <h2>Best time to visit</h2>
                    <p>
                        The best time to visit Jawai is between
                        <b>November to February.</b> During this time the weather is cool
                        and nice and this makes the safari experience good. During summer,
                        the weather in Rajasthan becomes hot and humid which makes the
                        safari experience no fun.
                    </p>
                </div>
            </div>
        </section>

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">
                <div class="section-title">
                    <h2>Attractions in Jawai</h2>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="icon-box">
                            <div class="icon"><i class="fas fa-place-of-worship"></i></div>
                            <h4><a href="">Dev Giri Temple </a></h4>
                            <p>
                                The Devgiri Temple is a famous Hindu temple located in Jamai,
                                India. It's a place where people go to worship and pray to
                                Ashapura Mata Ji. This temple is dedicated to her, and locals
                                believe that she protects the entire village from natural
                                calamities. This temple is halfway at one of the surrounding
                                hills and it attracts both humans as well as leopards. While
                                visiting the temple, you might find animals roaming around.
                                The tracks around the temple and even the shrine itself are
                                made of granite, which is a type of hard rock. The shrine is a
                                monolith, which means it's carved from a single piece of
                                stone.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                        <div class="icon-box">
                            <div class="icon"><i class="fas fa-place-of-worship"></i></div>
                            <h4><a href="">Kambeshwar Mahadev Temple</a></h4>
                            <p>
                                This Hindu temple is located in the Sheoganj area of Sumerpur
                                Tehsil. This temple is located between hills and is only 11 km
                                far from Jawai Bandh. This temple is famous among both
                                devotees and thrill seekers because people can reach here
                                through the serpentine roads carved out of hills. During
                                November, the annual fair is organized at this temple and many
                                people visit here from nearby towns like Sirohi, Pali, and
                                Jalor.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                        <div class="icon-box">
                            <div class="icon"><i class="fas fa-landmark"></i></div>
                            <h4><a href="">Abhinav Mahavir Dham</a></h4>
                            <p>
                                Abhinav Mahavir Dham is a captivating shrine that is in the
                                city of Sumerpur between beautiful hills. This place was built
                                to teach Jainism and it's also a Jain Religion and Culture
                                Educational Centre. You can see a vast collection of artefacts
                                and finely crafted murals within its premises which showcase
                                the rich culture of Jainism. You can visit here very
                                conveniently as it is located on National Highway number 14.
                                It’s a great place to meditate and you can find peace here.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="fas fa-paw"></i></div>
                            <h4><a href="">Leopard Safari In Jawai</a></h4>
                            <p>
                                You can enjoy a leopard safari in Jawai National Park of
                                Rajasthan. The park has a rocky landscape and you can spot
                                leopards and other animals such as leopards, Striped Hyena,
                                Indian Fox, Desert Fox, Nilgai, Sloth Bear, etc. during your
                                safaris. It’s going to be a thrilling experience for wildlife
                                and nature lovers. You can also spot bird species during your
                                rides.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="fas fa-water"></i></div>
                            <h4><a href="">Visit to Jawai Dam</a></h4>
                            <p>
                                The region gets its name from the Jawai Dam, which was built
                                on the Jawai River, a small river that joins the Luni River.
                                This dam is quite impressive and offers a stunning view of the
                                Jawai River and the wildlife around it. The construction of
                                this dam started in 1946 and finished in 1957. This is the
                                biggest dam in western Rajasthan. You can see crocodiles and
                                many different kinds of birds near the Dam.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Services Section -->

        <!-- ======= Departments Section ======= -->
        <section id="departments" class="departments">
            <div class="container">
                <div class="section-title">
                    <h2>How to Reach</h2>
                    <p>
                        Jawai National Park is a wild place that is located in the Pali
                        district of Rajasthan. This park is a famous tourist destination
                        and people especially come here to enjoy the Jawai leopard safari.
                        One can easily reach the Jawai by taking roadways, railways, and
                        airways. Let’s see the detailed information to reach Jawai Leopard
                        Park.
                    </p>
                </div>

                <div class="row gy-4">
                    <div class="col-lg-3">
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
                    <div class="col-lg-9">
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
                                        <img src="{{ asset('front/assets/img/attractions/By Flight .jpg') }}"
                                            alt="" class="img-fluid" />
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
                                        <img src="{{ asset('front/assets/img/attractions/by Train.jpg') }}" alt=""
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
                                        <img src="{{ asset('front/assets/img/attractions/By Road .jpg') }}" alt=""
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
                                        <img src="{{ asset('front/assets/img/departments-4.jpg') }}" alt=""
                                            class="img-fluid" />
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
                                        <img src="{{ asset('front/assets/img/departments-5.jpg') }}" alt=""
                                            class="img-fluid" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Departments Section -->

        <section>
            <div class="container">
                <div class="latest-inner">
                    <div class="section-title">
                        <h2>Our Blogs</h2>
                    </div>

                    <div class="row blogs">
                        <div class="latest-outer col-md-4">
                            <div class="latest-left">
                                <a href="">
                                    <img src="{{ asset('front/assets/img/gallery/gallery-1.jpg') }}" height="182"
                                        alt="image" class="img-fluid blog-images " />
                                </a>
                            </div>
                            <div class="latest-right">
                                <p class="mt-1 ps-2">
                                    <i class="fa-solid fa-circle-user blog-icons"></i><span
                                        class="ps-1 fst-italic blog-icons-text">Author</span>
                                    <span class="ps-5">
                                        <i class="fa-solid fa-calendar-days blog-icons py-2"></i>
                                    </span>
                                    <label class="blog-icons-text">04 Apr, 2023</label>
                                </p>

                                <a href="">
                                    <h4 class="blog-heading">
                                        Gaj Utsav 2023 to Take Place in Jawai on April 7,8
                                    </h4>
                                </a>
                                <p class="truncate-text text-justify mt-2">
                                    jawai National Park, the UNESCO World Heritage Site in
                                    rajasthan, which is famous Reiciendis, architecto! for...
                                </p>
                                <a href="" class="btn btn-outline-success1">Read More <i
                                        class="fa-solid fa-arrow-right ps-1 mt-1"></i></a>
                            </div>
                        </div>
                        <div class="latest-outer col-md-4">
                            <div class="latest-left">
                                <a href="">
                                    <img src="{{ asset('front/assets/img/gallery/gallery-3.jpg') }}" height="182 "
                                        alt="image" class="img-fluid" />
                                </a>
                            </div>
                            <div class="latest-right">
                                <p class="mt-1">
                                    <i class="fa-solid fa-circle-user blog-icons"></i><span
                                        class="ps-1 fst-italic blog-icons-text">Author</span>
                                    <span class="ps-5">
                                        <i class="fa-solid fa-calendar-days blog-icons py-2"></i>
                                    </span>
                                    <label class="blog-icons-text">04 Apr, 2023</label>
                                </p>

                                <a href="">
                                    <h4 class="blog-heading">
                                        Viral Video Shows Crocodile Chasing prey in National Park
                                    </h4>
                                </a>
                                <p class="truncate-text text-justify mt-2">
                                    The latest Jawai National Park viral video shows a crocodile
                                    vigorously chasing a safari v...
                                </p>
                                <a href="" class="btn btn-outline-success1">Read More <i
                                        class="fa-solid fa-arrow-right ps-1 mt-1"></i></a>
                            </div>
                        </div>
                        <div class="latest-outer col-md-4">
                            <div class="latest-left">
                                <a href="">
                                    <img src="{{ asset('front/assets/img/gallery/gallery-2.jpg') }}" height="182"
                                        alt="image" class="img-fluid" />
                                </a>
                            </div>
                            <div class="latest-right">
                                <p class="mt-1">
                                    <i class="fa-solid fa-circle-user blog-icons"></i><span
                                        class="ps-1 fst-italic blog-icons-text">Author</span>
                                    <span class="ps-5">
                                        <i class="fa-solid fa-calendar-days blog-icons py-2"></i>
                                    </span>
                                    <label class="blog-icons-text">24 Apr, 2023</label>
                                </p>

                                <a href="">
                                    <h4 class="blog-heading">
                                        No Leopard Poached in Rajasthan in 2022 for The First Time
                                        in 45 Years
                                    </h4>
                                </a>
                                <p class="truncate-text text-justify mt-2 blog-content">
                                    Know the exclusive story of how Rajasthan has achieved the
                                    status of no Leopard poaching for the...
                                </p>
                                <a href="" class="btn btn-outline-success1">Read More <i
                                        class="fa-solid fa-arrow-right ps-1 mt-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery">
            <div class="container">
                <div class="section-title">
                    <h2>Gallery</h2>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row g-0">
                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-1.jpg" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="{{ asset('front/assets/img/gallery/gallery-1.jpg') }}" alt=""
                                    class="img-fluid" />
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-2.jpg" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="{{ asset('front/assets/img/gallery/gallery-2.jpg') }}" alt=""
                                    class="img-fluid" />
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-3.jpg" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="{{ asset('front/assets/img/gallery/gallery-3.jpg') }}" alt=""
                                    class="img-fluid" />
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-4.jpg" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="{{ asset('front/assets/img/gallery/gallery-4.jpg') }}" alt=""
                                    class="img-fluid" />
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-5.jpg" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="{{ asset('front/assets/img/gallery/gallery-5.jpg') }}" alt=""
                                    class="img-fluid" />
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-6.jpg" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="{{ asset('front/assets/img/gallery/gallery-6.jpg') }}" alt=""
                                    class="img-fluid" />
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-7.jpg" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="{{ asset('front/assets/img/gallery/gallery-7.jpg') }}" alt=""
                                    class="img-fluid" />
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="assets/img/gallery/gallery-8.jpg" class="gallery-lightbox" data-gall="gallery-item">
                                <img src="{{ asset('front/assets/img/gallery/gallery-8.jpg') }}" alt=""
                                    class="img-fluid" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Gallery Section -->
    </main>
@endsection
