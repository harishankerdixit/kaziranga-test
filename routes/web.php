<?php

use App\Http\Controllers\Front\About\AboutController;
use App\Http\Controllers\Front\Booking\BookingController;
use App\Http\Controllers\Front\Cancellation\CancellationController;
use App\Http\Controllers\Front\Contact\ContactController;
use App\Http\Controllers\Front\DoDont\DoDontController;
use App\Http\Controllers\Front\Enquiry\EnquiryController;
use App\Http\Controllers\Front\Faq\FaqController;
use App\Http\Controllers\Front\Attractions\AttractionController;
use App\Http\Controllers\Front\BestTime\BesttimeController;
use App\Http\Controllers\Front\BookingProcess\BookingprocessController;
use App\Http\Controllers\Front\LocalFood\LocalFoodController;
use App\Http\Controllers\Front\LocalShopping\LocalshoppingController;
use App\Http\Controllers\Front\Waterfalls\WaterfallController;
use App\Http\Controllers\Front\Pricingtable\PricingController;
use App\Http\Controllers\Front\Home\HomeController;
use App\Http\Controllers\Front\HotalsAndResort\HotalResortController;
use App\Http\Controllers\Front\HowToReach\HowToReachController;
use App\Http\Controllers\Front\Info\InfoController;
use App\Http\Controllers\Front\KazirangaSafari\KazirangaSafariController;
use App\Http\Controllers\Front\News\NewsController;
use App\Http\Controllers\Front\Package\PackageController;
use App\Http\Controllers\Front\Privacy\PrivacyController;
use App\Http\Controllers\Front\TermAndConditions\TermAndConditionsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/cc', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Cache Cleared.";
});
Route::get('/', [HomeController::class, 'index'])->name('/');

//General,Package,Hotel Enquiry store
Route::post('enquiry', [EnquiryController::class, 'enquiry'])->name('enquiry');
//Enquiry send to crm
Route::post('save-enquiry', [EnquiryController::class, 'saveEnquiry'])->name('save-enquiry');

//safari booking page
Route::get('safari', [KazirangaSafariController::class, 'index'])->name('safari');
//submit safari page form
Route::post('check-availibility', [BookingController::class, 'checkAvailibility'])->name('check-availibility');
//show stored safari booking details on safari booking overview page
Route::get('create-safari-booking/{id}', [BookingController::class, 'createBooking'])->name('create.safari.booking');
//save safari traveller details with razor pay payment id
Route::put('save-safari-booking/{id}', [BookingController::class, 'saveSafariBooking'])->name('save.safari.booking');
//show success page
Route::get('payment-success', [BookingController::class, 'paymentSuccess'])->name('payment-success');


//show all hotels
Route::get('hotels', [HotalResortController::class, 'index'])->name('hotels');
//show particular hotel details
Route::get('Kaziranga-hotels-booking/{slug}', [HotalResortController::class, 'hotelDetails'])->name('hotel-details');
//show hotel Booking Overview
Route::get('/hotel-room-booking-payment/{roomid}/{hotelid}/{mealType}', [HotalResortController::class, 'hotelRoomBooking'])->name('hotel.room.booking.payment');
//Save hotel Booking payment details
Route::post('kazi-hotel-booking-save-final', [HotalResortController::class, 'saveHotelBookingData'])->name('hotel-booking-save-final');


//show all packages
Route::get('packages', [PackageController::class, 'index'])->name('packages');
//get package details
Route::get('tour-packages', [PackageController::class, 'packageDetails'])->name('package-details');
//get hotels images package category
Route::post('getHotelImages', [PackageController::class, 'getHotelImages'])->name('getHotelImages');
//get indian and foreigner price for hotel category
Route::post('kaziranga-tour-packages-option', [PackageController::class, 'kazirangaPackageOption'])->name('kazirangaPackageOption');
Route::post('check-festival-date', [PackageController::class, 'checkPackageFestivalDate'])->name('check.package.festival.date');
//create package enquiry, store customer details, store package booking details
Route::post('kazi-package-booking-save-final', [PackageController::class, 'savePackageBookingData'])->name('package-booking-save-final');
//save package booking details and redirect to success page
Route::post('package-payment-success', [BookingController::class, 'packagePaymentSuccess'])->name('package-payment-success');

Route::get('contact', [ContactController::class, 'index'])->name('contact');

//Footer first columns pages
Route::get('faq', [FaqController::class, 'index'])->name('faq');
Route::get('do-dont', [DoDontController::class, 'index'])->name('do_dont');
Route::get('info', [InfoController::class, 'index'])->name('info');

//Footer second columns pages
Route::get('best-time-to-visit-Jawai', [BesttimeController::class, 'index'])->name('besttime');
Route::get('how-to-reach', [HowToReachController::class, 'index'])->name('how_to_reach');
Route::get('terms', [TermAndConditionsController::class, 'index'])->name('terms');
Route::get('privacy-policy', [PrivacyController::class, 'index'])->name('privacy-policy');
Route::get('cancellation-policy', [CancellationController::class, 'index'])->name('cancellation-policy');
Route::get('about', [AboutController::class, 'index'])->name('about');
Route::get('news', [NewsController::class, 'index'])->name('news');

//Footer third columns pages
Route::get('things-to-do', [AttractionController::class, 'index'])->name('attractions');
Route::get('local-shopping', [LocalshoppingController::class, 'index'])->name('localshopping');
Route::get('waterfalls', [WaterfallController::class, 'index'])->name('waterfalls');
Route::get('booking-process', [BookingprocessController::class, 'index'])->name('bookingprocess');
Route::get('local-food', [LocalFoodController::class, 'index'])->name('localfood');


Route::get('pricing', [PricingController::class, 'index'])->name('pricingtable');
