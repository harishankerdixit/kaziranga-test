@extends('front.layouts.main')
@section('title', $cancellation->title)
@section('meta_title', $cancellation->meta_title)
@section('meta_description', $cancellation->meta_description)
@section('links', 'https://kazirangabooking.com/kaziranga-cancellation-policy')
@section('content')
    <main id="main">
        <style>
            .note-refund {
                font-size: 16px !important;
                background-color: rgba(240, 147, 47, 0.4);
                padding: 15px;
                border-radius: 5px;
                border: 1px solid lightgray;
            }
        </style>

        {!! $cancellation->section_1 !!}
        {{-- <section class="contact terms">
            <div class="container">
                <div class="section-title">
                    <h2>Cancellation & Refund Policy</h2>
                </div>
                <div class="row  d-flex justify-content-center">
                    <div class="col-lg-10 text-justify">
                        <p>Please inform us in writing if you need to cancel or postpone your tour/travel for
                            unavoidable reasons. Please note that cancellation charges will apply when we receive your
                            written notification. The following cancellation policy will be enforced:
                        </p>
                    </div>
                    <div class="col-lg-10 refund-policy">
                        <ul class="mt-3">
                            <span class="d-flex "><i class="fa-solid fa-circle refund-icon"></i>
                                <li>30 days prior to arrival: 10% of the tour cost.</li>
                            </span>
                            <span class="d-flex "><i class="fa-solid fa-circle refund-icon"></i>
                                <li>15 to 29 days prior to arrival: 30% of the tour cost.</li>
                            </span>
                            <span class="d-flex "><i class="fa-solid fa-circle refund-icon"></i>
                                <li>7 to 14 days prior to arrival: 40% of the tour cost.</li>
                            </span>
                            <span class="d-flex "><i class="fa-solid fa-circle refund-icon"></i>
                                <li> 2 to 6 days prior to arrival: 50% of the tour cost.</li>
                            </span>
                            <span class="d-flex "><i class="fa-solid fa-circle refund-icon"></i>
                                <li> Less than 48 hours or no show: No refund. </li>
                            </span>
                            <span class="d-flex "><i class="fa-solid fa-circle refund-icon"></i>
                                <li>For bookings with 3 persons, 1 room with 1 extra mattress will be provided.</li>
                            </span>
                            <span class="d-flex "><i class="fa-solid fa-circle refund-icon"></i>
                                <li> Customers have to wait a minimum of 24 hours for booking confirmation and vouchers.
                                    Booking vouchers will be sent to you by email, WhatsApp, SMS, or hard copy.</li>
                            </span>
                            <span class="d-flex "><i class="fa-solid fa-circle refund-icon"></i>
                                <li>Any changes in government taxes, hotel charges, safari fees, etc., will be communicated
                                    via email or phone before the travel date.</li>
                            </span>
                            <span class="d-flex ">
                                <article class="note-refund"><b><u>Note: </u></b>&nbsp; If your safari is not booked due to
                                    a technical error or unavailability of seats, we will refund the full amount to your
                                    bank account.</article>
                            </span>
                            <span class="d-flex "><i class="fa-solid fa-circle refund-icon"></i>
                                <li>Peak season bookings (Holi, Diwali, Christmas & New Year) have separate cancellation
                                    policies, which will be communicated as needed.</li>
                            </span>
                            <span class="d-flex "><i class="fa-solid fa-circle refund-icon"></i>
                                <li>Hotels and other camps have separate cancellation policies which will be communicated
                                    when needed.</li>
                            </span>
                            <span class="d-flex "><i class="fa-solid fa-circle refund-icon"></i>
                                <li>Our Liabilities and Limitations: Any increases in permit fees, taxes, fuel costs, or
                                    others by the Government of India will be charged separately.</li>
                            </span>
                            <span class="d-flex "><i class="fa-solid fa-circle refund-icon"></i>
                                <li> Force Majeure events, strikes, festivals, weather conditions, overbooking of hotels, or
                                    entry restrictions at visitation sites may occur. While we will try to arrange suitable
                                    alternatives, we are not liable for refunds or compensation claims arising from these
                                    situations.</li>
                            </span>
                            <span class="d-flex "><i class="fa-solid fa-circle refund-icon"></i>
                                <li> Disputes, if any, shall be subject to the exclusive jurisdiction of the courts in New
                                    Delhi.</li>
                            </span>
                        </ul>
                    </div>
                </div>
            </div>
        </section> --}}
    </main>
@endsection
