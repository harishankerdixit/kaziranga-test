@extends('front.layouts.main')
{{-- @section('title', $news->title)
@section('meta_title', $news->meta_title)
@section('meta_description', $news->meta_description) --}}
{{-- @section('links', 'https://kazirangabooking.com/news') --}}
@section('content')

    <main id="main">
        <section id="hero_package" class="d-flex align-items-center">
            <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
                <div class="row d-flex justify-content-center align-items-center">
                    <h1>News</h1>
                </div>
            </div>
        </section>

        <div class="container mb-5">
            <section>
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 mt-4 ">
                        <table class="table table-bordered table-content-news table-dark w-100" border="1">
                            <tr class="table-heading-data" style="background-color: #ff4000 !important;">
                                <th style="background-color: #902502 !important;">News Dates</th>
                                <th style="background-color: #902502 !important;">News Description</th>
                                <th style="background-color: #902502 !important;">Action</th>
                            </tr>
                            @forelse ($newsess??[] as $news)
                                <tr>
                                    <td>{{ $news->date }}</td>
                                    <td>{!! \Str::limit($news->description, 100, '...') !!}</td>
                                    <td>
                                        <a href="{{ $news->url }}" style="cursor: pointer">Read More</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">
                                        <h6>Records Not Found.</h1>
                                    </td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <form action="{{ route('enquiry') }}" method="POST" class="enquiry-form m-0 w-75 mt-4 mx-auto"
                            style="border: 1px solid #e64d1a" id="enquiryForm">
                            @csrf
                            <h4>Enquiry Form</h4>
                            <input type="hidden" name="type" id="type" value="general">
                            <!-- Name -->
                            <div class="mb-2">
                                <input type="text" name="traveller_name" class="form-control" id="name"
                                    placeholder="Your Name" value="{{ old('traveller_name') }}" required>
                                {{-- <span class="text-danger">{{ $errors->first('traveller_name') }}</span> --}}
                            </div>

                            <!-- Mobile Number -->
                            <div class="mb-2">
                                {{-- <input type="number" name="mobile_no" class="form-control" id="mobile"
                                                placeholder="Your Mobile Number" value="{{ old('mobile_no') }}"> --}}

                                <input type="number" name="mobile_no" class="form-control" id="mobile_no"
                                    placeholder="Your Mobile Number" value="{{ old('mobile_no') }}" required minlength="10"
                                    maxlength="10" pattern="[0-9]{10,15}"
                                    title="Please enter a valid phone number (minimum 10 digits)">
                                {{-- <span class="text-danger">{{ $errors->first('mobile_no') }}</span> --}}
                            </div>

                            <!-- Date -->
                            <div class="mb-2">
                                <input type="text" name="booking_date" class="form-control" id="calendar"
                                    placeholder="Select Booking Date" value="{{ old('booking_date') }}" autocomplete="off">
                                {{-- <span class="text-danger">{{ $errors->first('booking_date') }}</span> --}}
                            </div>

                            <!-- Timing -->
                            <div class="mb-2">
                                <select class="form-select" name="time_slot" id="time_slot">
                                    <option value="" disabled selected>Select Time Slot</option>
                                    <option value="Morning" {{ old('time_slot') == 'Morning' ? 'selected' : '' }}>
                                        Morning</option>
                                    <option value="Evening" {{ old('time_slot') == 'Evening' ? 'selected' : '' }}>
                                        Evening</option>
                                </select>
                                {{-- <span class="text-danger">{{ $errors->first('time_slot') }}</span> --}}
                            </div>

                            <!-- Email Address -->
                            <div class="mb-2">
                                <input type="email" name="email_id" class="form-control" id="email"
                                    placeholder="Your Email Address" value="{{ old('email_id') }}">
                                {{-- <span class="text-danger">{{ $errors->first('email_id') }}</span> --}}
                            </div>

                            <!-- Message -->
                            <div class="mb-2">
                                <textarea class="form-control" name="message" rows="3" placeholder="Message">{{ old('message') }}</textarea>
                                {{-- <span class="text-danger">{{ $errors->first('message') }}</span> --}}
                            </div>

                            <div class="text-center">
                                <button type="submit" class="appointment-btn">Book Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
