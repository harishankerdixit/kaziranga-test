@php
    $contact = App\Models\Setting::where('type', 'contact')->select('value')->first();
@endphp
<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row align-items-md-start align-items-center flex-column flex-md-row">
                <div class="col-lg-4 col-md-6 footer-contact">
                    <a href="index.html" class="footlogo me-auto"><img src="{{ asset('front/assets/img/JAWAILogo.png') }}"
                            alt="" /></a>
                    <p>
                        {{ $contact->value['address'] }}
                        <br><br>
                        <br>
                        <strong>Phone:</strong> <a
                            href="tel:{{ $contact->value['phone'] }}">{{ $contact->value['phone'] }}</a><br>
                        <strong>Email:</strong> <a
                            href="mailto:{{ $contact->value['email'] }}">{{ $contact->value['email'] }}</a><br>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a href="{{ route('besttime') }}">Best Time To Visit </a>
                        </li>
                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a href="#">Jawai Information</a>
                        </li>
                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a href="{{ route('do_dont') }}">Do's & Dont's</a>
                        </li>
                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a href="{{ route('how_to_reach') }}">How To Reach</a>
                        </li>
                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a href="{{ route('faq') }}">FAQ</a>
                        </li>

                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a href="#">Blog</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Quick links</h4>
                    <ul>
                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a href="{{ route('/') }}">Home</a>
                        </li>
                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a href="{{ route('packages') }}">Packages</a>
                        </li>
                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a href="{{ route('privacy-policy') }}">Privacy policy</a>
                        </li>
                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a href="{{ route('terms') }}">Terms & conditions</a>
                        </li>
                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a href="{{ route('cancellation-policy') }}">Cancellation & Refund policy</a>
                        </li>

                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a href="{{ route('about') }}">About</a>
                        </li>

                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a href="{{ route('news') }}">News</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Others</h4>
                    <ul>
                        <!-- <li>
                  <i class="bx bx-chevron-right"></i>
                  <a href="hotels.html">Hotels</a>
                </li>
                <li>
                  <i class="bx bx-chevron-right"></i>
                  <a href="#">Hotels</a>
                </li>
                <li>
                  <i class="bx bx-chevron-right"></i>
                  <a href="packages.html">Packages</a>
                </li> -->
                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a href="{{ route('hotels') }}">Hotels</a>
                        </li>
                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a href="#">Safari Pricing</a>
                        </li>
                        <li>
                            <i class="bx bx-chevron-right"></i>
                            <a href="{{ route('contact') }}">Contact us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container d-md-flex justify-content-center py-4">
        <div class="text-center text-md-start">
            <div class="copyright">
                &copy; Copyright <strong><span>Jawai</span></strong>. All Rights Reserved
            </div>
        </div>

        <!-- ======= Footer Social Links Commented for now by Gagandeep ======= -->
        <!-- <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
          </div> -->
    </div>
</footer>
<!-- End Footer -->
