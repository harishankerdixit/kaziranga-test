@extends('front.layouts.main')
@section('title', $term->title)
@section('meta_title', $term->meta_title)
@section('meta_description', $term->meta_description)
{{-- @section('links', 'https://kazirangabooking.com/terms') --}}
@section('content')
    <main id="main">

        {!! $term->section_1 !!}
        {{-- <section class="contact terms">
            <div class="container">
                <div class="section-title">
                    <h2>Terms & Conditions</h2>
                </div>
                <div class="row  d-flex justify-content-center">
                    <div class="col-lg-10 col-md-12 col-xs-12 term-conditions">
                        <div class="itinerary-info mt-3">
                            <ul class="mt-4">
                                <span class="d-flex"><i class="fa-solid fa-square-check check-box-1"></i>
                                    <li>Jungle Safari India accepts Credit Card, Debit Card, Paypal, and Direct Deposit as
                                        payment methods.</li>
                                </span>
                                <span class="d-flex"><i class="fa-solid fa-square-check check-box-1"></i>
                                    <li>Please make payments only to the company's accounts.</li>
                                </span>
                                <span class="d-flex"><i class="fa-solid fa-square-check check-box-1"></i>
                                    <li>Travelers can secure their booking by paying a 50% advance, with the remaining 50%
                                        settled upon arrival or at the start of the tour.</li>
                                </span>
                                <span class="d-flex"><i class="fa-solid fa-square-check check-box-1"></i>
                                    <li>Alternatively, travelers can enjoy additional discount benefits by paying the full
                                        100% amount to confirm the booking.</li>
                                </span>
                                <span class="d-flex"><i class="fa-solid fa-square-check check-box-1"></i>
                                    <li>Travelers are responsible for paying all statutory taxes, surcharges, and fees as
                                        applicable.</li>
                                </span>
                                <span class="d-flex"><i class="fa-solid fa-square-check check-box-1"></i>
                                    <li>Base category rooms will be provided in all hotels.</li>
                                </span>
                                <span class="d-flex"><i class="fa-solid fa-square-check check-box-1"></i>
                                    <li>Upgrading to a higher room category will cost extra, payable directly to the hotel.
                                    </li>
                                </span>
                                <span class="d-flex"><i class="fa-solid fa-square-check check-box-1"></i>
                                    <li>Check-in time is at 12:00 noon and check-out is at 11:00 AM.</li>
                                </span>
                                <span class="d-flex"><i class="fa-solid fa-square-check check-box-1"></i>
                                    <li>Please ensure the correct ages of passengers are provided at the time of booking to
                                        avoid penalties during travel.</li>
                                </span>
                                <span class="d-flex"><i class="fa-solid fa-square-check check-box-1"></i>
                                    <li>If rooms are unavailable in the specified hotel, a similar standard hotel will be
                                        provided.</li>
                                </span>
                                <span class="d-flex"><i class="fa-solid fa-square-check check-box-1"></i>
                                    <li>For bookings with 3 persons, 1 room with an extra mattress will be provided.</li>
                                </span>
                                <span class="d-flex"><i class="fa-solid fa-square-check check-box-1"></i>
                                    <li>Any changes in government taxes, hotel charges, safari fees, etc., will be
                                        communicated via email or phone before the travel date.</li>
                                </span>
                                <span class="d-flex"><i class="fa-solid fa-square-check check-box-1"></i>
                                    <li>The company is not liable for accidents, loss/theft, or damage to luggage.</li>
                                </span>
                                <span class="d-flex"><i class="fa-solid fa-square-check check-box-1"></i>
                                    <li>We reserve the right to adjust the itinerary and safari plans as required by
                                        operational or other circumstances.</li>
                                </span>
                                <span class="d-flex"><i class="fa-solid fa-square-check check-box-1"></i>
                                    <li>These rates are not valid for long weekend festivals like New Year, and Christmas,
                                        etc. </li>
                                </span>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
    </main><!-- End #main -->
@endsection
