@extends('front.layouts.main')
{{-- @section('title', $faq->title)
@section('meta_title', $faq->meta_title)
@section('meta_description', $faq->meta_description)
@section('links', 'https://kazirangabooking.com/faq') --}}
@section('content')
    <main id="main">


        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Frequently Asked Questions</h2>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-8">

                        <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">

                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-1">
                                        <span class="num">1. </span>
                                        What is Jawai famous for ?

                                    </button>
                                </h3>
                                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Jawai is famous for sightings of leopards. Around 50-60 leopards live in the hills
                                        of Jawai. This place is famous because there is no sign of poaching and there is
                                        complete coexistence between the humans and the leopards in this area.

                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-2">
                                        <span class="num">2. </span>
                                        What is the best time to visit Jawai ?

                                    </button>
                                </h3>
                                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        The best time to visit this area is between November to February. During this time
                                        leopards and other animal sightings are better.
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-3">
                                        <span class="num">3. </span>
                                        Is Jawai safari safe ?

                                    </button>
                                </h3>
                                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Yes, this safari is safe even for families with small kids because the leopards here
                                        are friendly to humans and have never been known to attack any individual in the
                                        region. The leopards here only attack the wild animals to feed themselves, not
                                        humans.
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-4">
                                        <span class="num">4. </span>
                                        How many crocodiles are there in Jawai ?

                                    </button>
                                </h3>
                                <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        According to 2020 reports, this dam has a huge population of Crocodiles. This dam is
                                        home to 377 crocodiles.

                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-5">
                                        <span class="num">5. </span>
                                        How many days are enough for Jawai ?

                                    </button>
                                </h3>
                                <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        For a thrilling experience, 3 days are enough for a leopard safari in Jawai. It will
                                        give you a chance to spot animals in all areas and you can fully enjoy sightings
                                        around Jawai Dam.

                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-6">
                                        <span class="num">6. </span>
                                        Which migratory bird can be seen in Jawai ?

                                    </button>
                                </h3>
                                <div id="faq-content-6" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Brown and black-headed gulls, Bar Headed Geese, Ruddy Shelduck, Greylag Goose,
                                        crane, and Demoiselle Crane are some of the migratory birds that can be seen in
                                        Jawai in large numbers.

                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-7">
                                        <span class="num">7. </span>
                                        Which animals can be seen during the Jawai Leopard Safari ?

                                    </button>
                                </h3>
                                <div id="faq-content-7" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Indian leopards, caracal, chinkara, desert cats, Indian wolves, jackals, jungle
                                        cats, striped hyenas, and blue bulls, etc. are some of the animals that can be
                                        spotted during safaris. Apart from them, crocodiles can be seen in the Jawai River.
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-8">
                                        <span class="num">8. </span>
                                        Are permits required for Jawai Leopard Safari ?
                                    </button>
                                </h3>
                                <div id="faq-content-8" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        No, safaris in this area are conducted by private vehicles, so government permits
                                        are not required. You just have to book your vehicle and after that, you can go for
                                        a safari. However, only 180 safaris are allowed in this area.
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-9">
                                        <span class="num">9. </span>
                                        What are the timings of Safaris in Jawai ?
                                    </button>
                                </h3>
                                <div id="faq-content-9" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        You can enjoy safaris in the morning and evening here. The time for morning safari
                                        starts from 6 am and for evening safaris the time is 3:30 pm to 6:00 pm. However, it
                                        can change according to season.
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-10">
                                        <span class="num">10. </span>
                                        Where is Jawai National Park located ?
                                    </button>
                                </h3>
                                <div id="faq-content-10" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Jawai National Park is a wild place that is located in the Pali district of
                                        Rajasthan.
                                    </div>
                                </div>
                            </div><!-- # Faq item-->
                        </div>

                    </div>
                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->


    </main><!-- End #main -->
@endsection
