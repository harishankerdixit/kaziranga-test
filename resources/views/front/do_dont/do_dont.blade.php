@extends('front.layouts.main')
{{-- @section('title', $do_dont->title)
@section('meta_title', $do_dont->meta_title)
@section('meta_description', $do_dont->meta_description)
@section('links', 'https://kazirangabooking.com/do-dont') --}}
@section('content')
    <style>
        .dogreen div>.fa-circle-check {
            color: rgb(0, 128, 0, 0.7) !important;
            font-weight: bold;
        }

        .dored div>.fa-circle-check {
            color: rgb(255, 0, 0, 0.7) !important;
            font-weight: bold;
        }

        .do-heading {
            color: #654321;
            font-weight: bold;
        }
    </style>
    <main id="main">
        {!! $do_dont->section_1 !!}
        {{-- <section id="faq" class="faq">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Do's and Don'ts</h2>
                </div>

                <div class="row text-justify d-flex justify-content-center">
                    <div class="col-md-10">

                        <div class="info-box-1">
                            <h3 class="do-heading text-start px-4">Do's</h3>
                            <ul type="none" class="dogreen">
                                <div class="col d-flex pb-1">
                                    <i class="fa-regular fa-circle-check pt-1 px-2"></i>
                                    <li>Try to carry proper camera bags etc to protect the equipment from sudden showers,
                                        dust,
                                        etc.
                                    </li>
                                </div>
                                <div class="col d-flex pb-1">
                                    <i class="fa-regular fa-circle-check pt-1 px-2"></i>
                                    <li>When going on a safari, wear light colors like green, beige, and brown.</li>
                                </div>
                                <div class="col d-flex pb-1">
                                    <i class="fa-regular fa-circle-check pt-1 px-2"></i>
                                    <li>Keep a safe distance from wild animals. </li>
                                </div>
                                <div class="col d-flex pb-1">
                                    <i class="fa-regular fa-circle-check pt-1 px-2"></i>
                                    <li>Carry your permits when going on a safari. </li>
                                </div>
                                <div class="col d-flex pb-1">
                                    <i class="fa-regular fa-circle-check pt-1 px-2"></i>
                                    <li>Keep a mask or scarf to cover your mouth if you have a problem with dust.</li>
                                </div>
                                <div class="col d-flex pb-1">
                                    <i class="fa-regular fa-circle-check pt-1 px-2"></i>
                                    <li>Safaris are not covered so carrying sunscreen or a hat would be a good option when
                                        going
                                        for a safari. </li>
                                </div>
                                <div class="col d-flex pb-1">
                                    <i class="fa-regular fa-circle-check pt-1 px-2"></i>
                                    <li>Have a water bottle with you when going for a safari inside the park.</li>
                                </div>
                                <div class="col d-flex pb-1">
                                    <i class="fa-regular fa-circle-check pt-1 px-2"></i>
                                    <li>Be cautious of your personal belongings, do not leave them behind when you get down
                                        from
                                        the safari.
                                    </li>
                                </div>
                            </ul>
                        </div>

                        <div class="info-box-1 mt-4">
                            <h3 class="do-heading text-start px-4">Don'ts</h3>
                            <ul type="none" class="dored">
                                <div class="col d-flex pb-1">
                                    <i class="fa-regular fa-circle-check pt-1 px-2"></i>

                                    <li>Try to carry proper camera bags etc to protect the equipment from sudden showers,
                                        dust, etc.</li>
                                </div>
                                <div class="col d-flex pb-1">
                                    <i class="fa-regular fa-circle-check pt-1 px-2"></i>

                                    <li>When going on a safari, wear light colors like green, beige, and brown.</li>
                                </div>
                                <div class="col d-flex pb-1">
                                    <i class="fa-regular fa-circle-check pt-1 px-2"></i>

                                    <li>Keep a safe distance from wild animals. </li>
                                </div>
                                <div class="col d-flex pb-1">
                                    <i class="fa-regular fa-circle-check pt-1 px-2"></i>

                                    <li>Carry your permits when going on a safari. </li>
                                </div>
                                <div class="col d-flex pb-1">
                                    <i class="fa-regular fa-circle-check pt-1 px-2"></i>

                                    <li>Keep a mask or scarf to cover your mouth if you have a problem with dust.</li>
                                </div>
                                <div class="col d-flex pb-1">
                                    <i class="fa-regular fa-circle-check pt-1 px-2"></i>

                                    <li>Safaris are not covered so carrying sunscreen or a hat would be a good option when
                                        going
                                        for a safari.
                                    </li>
                                </div>
                                <div class="col d-flex pb-1">
                                    <i class="fa-regular fa-circle-check pt-1 px-2"></i>


                                    <li>Have a water bottle with you when going for a safari inside the park.</li>
                                </div>
                                <div class="col d-flex pb-1">
                                    <i class="fa-regular fa-circle-check pt-1 px-2"></i>


                                    <li>Be cautious of your personal belongings, do not leave them behind when you get down
                                        from
                                        the safari.
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
    </main>
@endsection
