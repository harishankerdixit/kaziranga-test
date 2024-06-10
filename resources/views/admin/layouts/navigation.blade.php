<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse sidebar-rows">
    <div class="position-sticky sidebar-sticky">
        <ul class="nav flex-column mb-auto">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('dashboard') }}">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="dropdown ">
                <a href="#" class="collapsed nav-link" data-bs-toggle="collapse" data-bs-target="#collapseD"
                    aria-expanded="false" aria-controls="collapseD">
                    <span data-feather="calendar"></span>
                    <span>Safari Dates Management</span><i class="bi bi-chevron-right rotate-icon"></i>
                </a>
                <div id="collapseD" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <ul>
                            <li>
                                <a href="{{ route('getJungleTrail') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Safari Dates</a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('getdevaliaTrail') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Kaziranga Devalia
                                    Safari</a>
                            </li> --}}
                            {{-- <li>
                                <a href="{{ route('getkankaiTrail') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Kankai Temple
                                    Safari</a>
                            </li> --}}
                            {{-- <li>
                                <a href="{{ route('getgirnarHills') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Girnar Hills</a>
                            </li> --}}
                            {{-- <li>
                                <a href="{{ route('blockdates.list.view') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Safari Block Dates</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="collapsed nav-link link-dark" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><span>
                        <span data-feather="bar-chart-2"></span><span> Price Management</span></span><i
                        class="bi bi-chevron-right rotate-icon"></i> </a>
                <div id="collapseOne" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <ul>
                            <li>
                                <a href="{{ route('price', ['type' => 'default']) }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Default Price</a>
                            </li>
                            <li>
                                <a href="{{ route('price', ['type' => 'weekend']) }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Weekend Price</a>
                            </li>
                            <li>
                                <a href="{{ route('price', ['type' => 'date-range']) }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Festival Price</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="collapsed nav-link link-dark" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <span data-feather="file"></span><span> Booking Management</span><i
                        class="bi bi-chevron-right rotate-icon"></i>
                </a>
                <div id="collapseTwo" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <ul>
                            <li>
                                <a href="{{ route('customers-list') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Customer Booking</a>
                            </li>
                            <li>
                                <a href="{{ route('safari-booking', ['type' => 'safari']) }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Safari Booking</a>
                            </li>
                            <li>
                                <a href="{{ route('safari-booking', ['type' => 'package']) }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Package Booking</a>
                            </li>
                            <li>
                                <a href="{{ route('safari-booking', ['type' => 'hotel']) }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Hotel Booking</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="collapsed nav-link link-dark" data-bs-toggle="collapse"
                    data-bs-target="#collapseH" aria-expanded="false" aria-controls="collapseH">
                    <span data-feather="briefcase"></span><span> Hotel Management</span>
                    <i class="bi bi-chevron-right rotate-icon"></i>
                </a>
                <div id="collapseH" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <ul>
                            <li>
                                <a href="{{ route('hotel-list') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Hotels</a>
                            </li>
                            <li>
                                <a href="{{ route('amenities-list') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Amenities</a>
                            </li>
                            <li>
                                <a href="{{ route('room.facility-list') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Room Facilities</a>
                            </li>
                            <li>
                                <a href="{{ route('room.benefit-list') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Room Benefits</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="collapsed nav-link link-dark" data-bs-toggle="collapse"
                    data-bs-target="#collapseP" aria-expanded="false" aria-controls="collapseP"><span
                        data-feather="box"></span><span> Packages</span><i class="bi bi-chevron-right rotate-icon"></i>
                </a>
                <div id="collapseP" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <ul>
                            <li>
                                <a href="{{ route('package-list') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Packages</a>
                            </li>
                            <li>
                                <a href="{{ route('feature.list.view') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Features</a>
                            </li>
                            <li>
                                <a href="{{ route('inclusion.list.view') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Inclusion</a>
                            </li>
                            <li>
                                <a href="{{ route('exclusion.list.view') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Exclusion</a>
                            </li>
                            <li>
                                <a href="{{ route('terms.list.view') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Terms</a>
                            </li>
                            <li>
                                <a href="{{ route('paymentpolicy.list.view') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Payment Policy</a>
                            </li>
                            <li>
                                <a href="{{ route('cancellationpolicy.list.view') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Cancellation
                                    Policy</a>
                            </li>
                            <li>
                                <a href="{{ route('packagefestivaldates.list.view') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Festival Dates</a>
                            </li>
                            <li>
                                <a href="{{ route('packageblockdates.list.view') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Block Dates</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="collapsed nav-link link-dark" data-bs-toggle="collapse"
                    data-bs-target="#collapseEnq" aria-expanded="false" aria-controls="collapseEnq"><span
                        data-feather="message-square"></span><span> Enquiries</span><i
                        class="bi bi-chevron-right rotate-icon"></i>
                </a>
                <div id="collapseEnq" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <ul>
                            <li>
                                <a href="{{ route('package-enquiry-list') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Package Enquiries</a>
                            </li>
                            <li>
                                <a href="{{ route('hotel-enquiry-list') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Hotel Enquiries</a>
                            </li>
                            <li>
                                <a href="{{ route('general-enquiry-list') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Contact Enquiries</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            {{-- <li>
                <a href="{{ route('seo-manager-view') }}" class="nav-link link-dark"><span
                        data-feather="layers"></span><span> Seo Manager</span></a>
            </li> --}}
            <li class="dropdown">
                <a href="#" class="collapsed nav-link link-dark" data-bs-toggle="collapse"
                    data-bs-target="#collapsePage" aria-expanded="false" aria-controls="collapsePage"> <span
                        data-feather="layers"></span>
                    <span>Page Management</span><i class="bi bi-chevron-right rotate-icon"></i>
                </a>
                <div id="collapsePage" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <ul>
                            <li>
                                <a href="{{ route('page.mangement.home.index') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('page.mangement.jungle.index') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Kaziranga Jungle
                                    Safari</a>
                            </li>

                            {{-- <li>
                                <a href="{{ route('page.mangement.devalia.index') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Devalia Safari</a>
                            </li> --}}

                            {{-- <li>
                                <a href="{{ route('page.mangement.kankai.index') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Kankai Safari</a>
                            </li> --}}

                            {{-- <li>
                                <a href="{{ route('page.mangement.girnar.index') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Girnar Safari</a>
                            </li> --}}

                            <li>
                                <a href="{{ route('page.mangement.hotel.index') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Hotel Page</a>
                            </li>

                            <li>
                                <a href="{{ route('page.mangement.package.index') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Package Page</a>
                            </li>

                            <li>
                                <a href="{{ route('page.mangement.contact.index') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Contact Page</a>
                            </li>

                            <li>
                                <a href="{{ route('page.mangement.faq.index') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">FAQ Page</a>
                            </li>

                            <li>
                                <a href="{{ route('page.mangement.doDoNot.index') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Do & Don't Page</a>
                            </li>

                            <li>
                                <a href="{{ route('page.mangement.history.index') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">History Page</a>
                            </li>

                            {{-- <li>
                                <a href="{{ route('page.mangement.permit.index') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Permit Page</a>
                            </li> --}}

                            <li>
                                <a href="{{ route('page.mangement.permit.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">
                                    Best Time To Visit
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('page.mangement.reach.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">
                                    How To Reach
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('page.mangement.term.index') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Terms & Conditions
                                    Page</a>
                            </li>

                            <li>
                                <a href="{{ route('page.mangement.privacy.index') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Privacy Policy
                                    Page</a>
                            </li>

                            <li>
                                <a href="{{ route('page.mangement.cancellation.index') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Cancellation Policy
                                    Page</a>
                            </li>

                            {{-- <li>
                                <a href="{{ route('page.mangement.festival.index') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Festival Page</a>
                            </li> --}}

                            {{-- <li>
                                <a href="{{ route('page.management.manager.index') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">File Manager</a>
                            </li> --}}

                            {{-- <li>
                                <a href="{{ route('page.mangement.weekend.index') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Weekend Page</a>
                            </li> --}}
                            <li>
                                <a href="{{ route('page.mangement.about.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">About Page</a>
                            </li>
                            <li>
                                <a href="{{ route('page.mangement.attractions.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Attractions Page</a>
                            </li>

                            <li>
                                <a href="{{ route('page.mangement.besttime.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Best Time Page</a>
                            </li>

                            <li>
                                <a href="{{ route('page.mangement.pricingtable.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Pricing Page</a>
                            </li>
                            <li>
                                <a href="{{ route('page.mangement.bookingprocess.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Booking Process
                                    Page</a>
                            </li>
                            <li>
                                <a href="{{ route('page.mangement.localshopping.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Local Shopping
                                    Page</a>
                            </li>
                            <li>
                                <a href="{{ route('page.mangement.localfood.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Local Food Page</a>
                            </li>
                            <li>
                                <a href="{{ route('page.mangement.waterfalls.index') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">Waterfalls Page</a>
                            </li>
                            <li>
                                <a href="{{ route('news-list') }}"
                                    class="link-light d-inline-flex text-decoration-none rounded">News Page</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="collapsed nav-link link-dark" data-bs-toggle="collapse"
                    data-bs-target="#collapseSet" aria-expanded="false" aria-controls="collapseSet"> <span
                        data-feather="settings"></span>
                    <span>Settings</span><i class="bi bi-chevron-right rotate-icon"></i>
                </a>
                <div id="collapseSet" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <ul>
                            <li>
                                <a href="{{ route('razorpay-setting-view') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">razor Pay</a>
                            </li>
                            <li>
                                <a href="{{ route('contact-setting-view') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Contact Details</a>
                            </li>
                            <li>
                                <a href="{{ route('news-setting-view') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">Latest News</a>
                            </li>
                            <li>
                                <a href="{{ route('account-setting-view') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">My Account</a>
                            </li>
                            <li>
                                <a href="{{ route('password-setting-view') }}"
                                    class="link-dark d-inline-flex text-decoration-none rounded">change Password</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <a href="{{ route('logout') }}" class="nav-link link-dark"><span data-feather="log-out"></span>
                    Logout </a>
            </li>
        </ul>
    </div>
</nav>
