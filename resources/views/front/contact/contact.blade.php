@extends('front.layouts.main')
{{-- @section('title', $contact->title)
@section('meta_title', $contact->meta_title)
@section('meta_description', $contact->meta_description)
@section('links', 'https://kazirangabooking.com/contact') --}}
@section('content')
    <main id="main">


        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">


            <div class="container">

                <div class="row">
                    <div class="section-title-contact">
                        <h2>Contact Info.</h2>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="row  justify-content-center mb-3 ">
                            <div class="card w-75  contact-info-1 p-2">
                                <div class="card-body contact-info-card">
                                    <h5 class="card-title">Support</h5>
                                    <p class="card-text"><i
                                            class="fa-solid fa-envelope p-2 contact-info-icon"></i><span>abc@gmail.com</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row  justify-content-center mb-3">
                            <div class="card w-75 contact-info-1 p-2">
                                <div class="card-body contact-info-card">
                                    <h5 class="card-title">Let's Talk</h5>
                                    <p class="card-text"><i class="fa-solid fa-phone p-2 contact-info-icon"></i><span>+91-
                                            995 368 6128 |
                                            +91- 982 179 8148 </span> </p>
                                    <!-- <a href="#" class="btn btn-primary">Button</a> -->
                                </div>
                            </div>
                        </div>
                        <div class="row  justify-content-center mb-3">
                            <div class="card w-75 contact-info-1 p-2">
                                <div class="card-body contact-info-card">
                                    <h5 class="card-title">Address</h5>
                                    <p class="card-text"><i
                                            class="fa-solid fa-location-dot p-2 contact-info-icon"></i><span>Jungle Safari
                                            India, Delhi 110009</span></p>
                                    <!-- <a href="#" class="btn btn-primary">Button</a> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="col-xl-10 col-md-12 pb-3" style="margin: auto;">
                            <!-- <aside class="ml-50 lg:ml-0"> -->
                            <div class="border-light rounded-4 shadow-4">
                                <form class="py-3 enquiry-form mt-2 contact-enquiryform" id="enquiryForm">
                                    <h4 class="fw-semibold">Get In Touch With Us</h4>

                                    <!-- Name -->

                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name"
                                            required />
                                    </div>

                                    <!-- Mobile Number -->
                                    <div class="mb-2">
                                        <input type="tel" class="form-control" id="mobile"
                                            placeholder="Your Mobile Number" required />
                                    </div>


                                    <!-- Email Address -->
                                    <div class="mb-3">
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Your Email Address" required />
                                    </div>

                                    <!-- Message -->
                                    <div class="mb-3">
                                        <textarea class="form-control" name="message" rows="3" placeholder="Message" required></textarea>
                                    </div>

                                    <div class="text-center mt-4 mb-2">
                                        <a class="button-29" type="submit"> Book Now </a>
                                    </div>
                                </form>
                            </div>
                            </aside>
                        </div>
                    </div>

                </div>
            </div>


            </div>
            <div class="row mt-5">
                <div style="width: 100%; height: 500px;"><iframe width="100%" height="100%" frameborder="0"
                        scrolling="no" marginheight="0" marginwidth="0"
                        src="https://maps.google.com/maps?width=100%25&amp;height=100%25&amp;hl=en&amp;q=jawai%20national%20park+(jawai%20national%20park%5C)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a
                            href="https://www.gps.ie/">gps devices</a></iframe></div>
            </div>
        </section>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
