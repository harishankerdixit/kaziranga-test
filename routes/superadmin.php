<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DateManagement\DateManagementController;
use App\Http\Controllers\Admin\BookingManagement\BookingManagementController;
use App\Http\Controllers\Admin\PriceManagement\PriceManagementController;
use App\Http\Controllers\Admin\HotelManagement\HotelsManagementController;
use App\Http\Controllers\Admin\PackageManagement\PackagesManagementController;
use App\Http\Controllers\Admin\Enquiry\EnquiryController;
use App\Http\Controllers\Admin\NewsManagement\NewsManagementController;
use App\Http\Controllers\Admin\Setting\settingsController;
use App\Http\Controllers\Admin\SEO\SEOManagerController;
use App\Http\Controllers\Admin\PageManagement\PageManagementController;

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

Route::middleware('guest')->group(function () {
    Route::get('admin/login', [AuthController::class, 'login_view'])->name('viewAdminLogin');
    Route::post('admin/login', [AuthController::class, 'postLogin'])->name('adminLogin');
    Route::post('admin/login/with/otp', [AuthController::class, 'adminLoginWithOtp'])->name('adminLoginWithOtp');
    Route::post('verify/admin/login/with/otp', [AuthController::class, 'verifyAdminLoginWithOtp'])->name('verifyAdminLoginWithOtp');
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [AuthController::class, 'viewDashboard'])->name('dashboard');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/dashboard/enquiry/delete/', [AuthController::class, 'deleteCustomer'])->name('deleteCustomer');

    //Safari Dates
    Route::get('/manage-safari-date/jungle-trail', [DateManagementController::class, 'index'])->name('getJungleTrail');
    Route::get('date/jungle/trail/create', [DateManagementController::class, 'showCreateEvent'])->name('date.jungle.trail.create');
    Route::post('date/jungle/trail/created', [DateManagementController::class, 'store'])->name('date.jungle.trail.created');
    Route::get('date/jungle/trail/edit/{id}', [DateManagementController::class, 'edit'])->name('date.jungle.trail.edit');
    Route::put('date/jungle/trail/update/{id}', [DateManagementController::class, 'update'])->name('date.jungle.trail.update');
    Route::get('date/jungle/trail/delete/{id}', [DateManagementController::class, 'destroy'])->name('date.jungle.trail.delete');
    Route::post('date/jungle/trail/updateAvailability', [DateManagementController::class, 'status'])->name('date.jungle.trail.updateAvailability');
    Route::post('admin/import-dates', [DateManagementController::class, 'import'])->name('date.jungle.trail.importcsv');
    Route::get('/export-csv', [DateManagementController::class, 'exportCsv'])->name('export-csv');
    Route::get('/manage-safari-date/delete-all-date', [DateManagementController::class, 'deleteAllDates'])->name('deleteAllDates');

    //Safari Block Dates
    // Route::get('manage-safari-date/blockdates', [BlockDateManagementController::class, 'blockdates'])->name('blockdates.list.view');
    // Route::get('manage-safari-date/blockdates/item/Add/item', [BlockDateManagementController::class, 'blockdatesAddView'])->name('blockdates.add.view.index');
    // Route::post('manage-safari-date/blockdates/item/add', [BlockDateManagementController::class, 'blockdatesAdd'])->name('blockdates.add');
    // Route::get('manage-safari-date/blockdates/item/edit/item/{id}', [BlockDateManagementController::class, 'blockdatesEditView'])->name('blockdates.edit.view');
    // Route::post('manage-safari-date/blockdates/item/edit/{id}', [BlockDateManagementController::class, 'blockdatesEdit'])->name('blockdates.edit');
    // Route::delete('manage-safari-date/blockdates/item/delete/{id}', [BlockDateManagementController::class, 'blockdatesDelete'])->name('blockdates.delete');

    //######################################### Price Management start ############################//
    Route::get('/price-management-price/{type}', [PriceManagementController::class, 'index'])->name('price');
    //create
    Route::get('/price-management-price-create/{type}', [PriceManagementController::class, 'create'])->name('price-create');
    //store
    Route::post('/price-management-price-store', [PriceManagementController::class, 'store'])->name('price-store');
    //edit
    Route::get('/price-management-price-edit/{id}', [PriceManagementController::class, 'edit'])->name('price-edit');
    //update
    Route::post('/price-management-price-store/{id}', [PriceManagementController::class, 'update'])->name('price-update');

    //########################################### Booking management start #########################//
    // customer list routes //
    Route::get('/booking-management-customers-list', [BookingManagementController::class, 'Customers'])->name('customers-list');
    Route::delete('/booking-management-customers-delete/{id}', [BookingManagementController::class, 'destroy'])->name('customer.delete');
    // safari booking and package booking routes //
    Route::get('/booking-management-safari-booking/{type}', [BookingManagementController::class, 'safariBooking'])->name('safari-booking');
    Route::get('/booking-management-safari-booking-delete/{id}', [BookingManagementController::class, 'safariBookingDestroy'])->name('safari-booking.delete');
    Route::get('/booking-management-safari-booking-edit/{id}', [BookingManagementController::class, 'safariBookingEdit'])->name('safari-booking-edit');

    //########################################### Hotel management start #########################//
    Route::get('hotel-management-hotel-list', [HotelsManagementController::class, 'index'])->name('hotel-list');
    //create
    Route::get('hotel-management-hotel-list-add-item', [HotelsManagementController::class, 'addHotel'])->name('hotel.list.item.add.index');
    //store
    Route::post('hotel-management/add-hotel', [HotelsManagementController::class, 'store'])->name('hotel.list.item.add');
    //edit
    Route::get('hotel-management/edit-hotel/{id}', [HotelsManagementController::class, 'edit'])->name('hotel-list.item.edit');
    //hotel image delete
    Route::delete('hotel-management/delete-hotel-image/{hotelId}/{imageId}', [HotelsManagementController::class, 'deleteHotelImage'])->name('hotel.list.item.image.delete');
    //update
    Route::post('hotel-management/update-hotel/{id}', [HotelsManagementController::class, 'update'])->name('hotel.list.item.update');
    //delete
    Route::delete('hotel-management/delete/{id}', [HotelsManagementController::class, 'destroy'])->name('hotel-list.item.delete');
    //status update
    Route::post('hotel-management/updateAvailability', [HotelsManagementController::class, 'show'])->name('hotel-list.item.updateAvailability');
    //hotel amenities list
    Route::get('hotel-management/hotel-list-item-amenities/{id}', [HotelsManagementController::class, 'hotelAmenities'])->name('hotel-list.item.amenities');

    //all amenities list
    Route::get('/hotel-management-amenities-list', [HotelsManagementController::class, 'amenities'])->name('amenities-list');
    //amenities create
    Route::get('/hotel-management/add-amenities-index', [HotelsManagementController::class, 'amenitiesCreate'])->name('amenities.add.view.index');
    //amenities create
    Route::post('hotel-management/add-amenities', [HotelsManagementController::class, 'amenitiesStore'])->name('add-amenities-add-item');
    //amenities edit
    Route::get('hotel-management/edit-amenities/{id}', [HotelsManagementController::class, 'amenitiesEdit'])->name('amenities.item.edit.view');
    //amenities update
    Route::post('hotel-management/edit-amenities/{id}', [HotelsManagementController::class, 'amenitiesUpdate'])->name('amenities.item.edit');
    //amenities delete
    Route::get('hotel-management/amenities/delete/{id}', [HotelsManagementController::class, 'amenitiesDelete'])->name('amenities.delete');
    //amenities status update
    Route::post('hotel-list/item/amenities/updateAvailability', [HotelsManagementController::class, 'amenityAvailable'])->name('hotel-list.item.amenities.updateAvailability');
    //return time for festival date-range
    Route::post('/price-management/get-date-range-timings', [HotelsManagementController::class, 'getTimingsData'])->name('date.range.get.timings');

    //room-facilities list
    Route::get('/hotel-management-room-facility-list', [HotelsManagementController::class, 'roomFacility'])->name('room.facility-list');
    //create room-facilities
    Route::get('/hotel-management/add-room-facility', [HotelsManagementController::class, 'createRoomFacility'])->name('facility.add.view.index');
    //store room-facilities
    Route::post('hotel-management/add-room-facility', [HotelsManagementController::class, 'storeRoomFacility'])->name('add-facility-add-item');
    //edit room-facilities
    Route::get('hotel-management/edit-room-facility/{id}', [HotelsManagementController::class, 'editRoomFacility'])->name('facility.item.edit.view');
    //update room-facilities
    Route::post('hotel-management/edit-room-facility/{id}', [HotelsManagementController::class, 'updateRoomFacility'])->name('facility.item.edit');
    //delete room-facilities
    Route::get('hotel-management/room-facility/delete/{id}', [HotelsManagementController::class, 'deleteRoomFacility'])->name('facility.delete');

    //room-benefits list
    Route::get('/hotel-management-room-benefit-list', [HotelsManagementController::class, 'roomBenefit'])->name('room.benefit-list');
    //create room-benefit
    Route::get('/hotel-management/add-room-benefit', [HotelsManagementController::class, 'createRoomBenefit'])->name('benefit.add.view.index');
    //store room-benefit
    Route::post('hotel-management/add-room-benefit', [HotelsManagementController::class, 'storeRoomBenefit'])->name('add-benefit-add-item');
    //edit room-benefit
    Route::get('hotel-management/room-benefit/delete/{id}', [HotelsManagementController::class, 'deleteRoomBenefit'])->name('benefit.delete');
    //update room-benefit
    Route::get('hotel-management/edit-room-benefit/{id}', [HotelsManagementController::class, 'editRoomBenefit'])->name('benefit.item.edit.view');
    //delete room-benefit
    Route::post('hotel-management/edit-room-benefit/{id}', [HotelsManagementController::class, 'updateRoomBenefit'])->name('benefit.item.edit');

    //hotel room list
    Route::get('hotel-management/hotel-list-item-rooms/{id}', [HotelsManagementController::class, 'hotelRooms'])->name('hotel-list.item.rooms');
    //add room in hotel
    Route::get('hotel-management/hotel/room/add/{hotel_id}', [HotelsManagementController::class, 'hotelRoomAdd'])->name('hotel.add.room.index');
    //store room in hotel
    Route::post('hotel/add/hotel/room/item/{hotel_id}', [HotelsManagementController::class, 'hotelRoomstore'])->name('add-hotel-room-item');
    //edit room in hotel
    Route::get('hotel-management/hotel/room/edit/{hotel_id}/{room_id}', [HotelsManagementController::class, 'hotelRoomEdit'])->name('hotel.room.edit');
    //update room in hotel
    Route::post('hotel/edit/hotel/room/item/{hotel_id}/{room_id}', [HotelsManagementController::class, 'hotelRoomUpdate'])->name('edit-hotel-room-item');
    //delete room from hotel
    Route::get('hotel-management/room/delete/{hotel_id}/{room_id}', [HotelsManagementController::class, 'hotelRoomDelete'])->name('hotel.room.delete');
    //room status update in hotel
    Route::post('hotel-management/room/updateAvailability', [HotelsManagementController::class, 'roomUpdateAvailability'])->name('hotel-list.item.room.updateAvailability');


    //add price and date of hotel room
    Route::get('hotel-management/hotel/room/available/{hotel_id}/{room_id}', [HotelsManagementController::class, 'hotelRoomAvailable'])->name('hotel.room.available');
    //store price and date of hotel room
    Route::post('hotel-management/available/hotel/room/store', [HotelsManagementController::class, 'availableHotelRoomStore'])->name('available.hotel.room.store');
    //delete price and date of hotel room
    Route::get('hotel-management/available/hotel/room/delete/{room_available_id}', [HotelsManagementController::class, 'hotelRoomAvailableDelete'])->name('available.hotel.room.delete');
    //status update of hotel room price and date
    Route::post('hotel-management/room/available', [HotelsManagementController::class, 'roomUpdateAvailable'])->name('hotel-list.room.available');

    //store hotel room block date
    Route::post('hotel/block/hotel/room/item', [HotelsManagementController::class, 'blockHotelRoomStore'])->name('block-hotel-room-item');
    //delete hotel room block date
    Route::delete('hotel-management/room/block/delete/{room_block_id}', [HotelsManagementController::class, 'hotelRoomBlockDelete'])->name('hotel.room.block.delete');


    Route::post('separate-hotel/item/amenities/availability', [HotelsManagementController::class, 'separateAmenityAvailable'])->name('separate-hotel.item.amenities.availability');
    //########################################### Package management start #########################//
    Route::get('/package-management-package-list', [PackagesManagementController::class, 'index'])->name('package-list');
    Route::get('/package-management-package-list-add-item', [PackagesManagementController::class, 'createPackage'])->name('package.list.item.add.index');
    Route::post('package-management/add-package', [PackagesManagementController::class, 'storePackage'])->name('package.list.item.add');
    Route::get('package-management/edit-package/{id}', [PackagesManagementController::class, 'editPackage'])->name('package-list.item.edit');
    Route::post('package-management/update-package/{id}', [PackagesManagementController::class, 'updatePackage'])->name('package.list.item.update');
    Route::post('package-management/updateAvailability', [PackagesManagementController::class, 'updatePackageStatus'])->name('package-list.item.updateAvailability');
    Route::delete('package-management/delete/{id}', [PackagesManagementController::class, 'deletePackage'])->name('package-list.item.delete');

    //Package Features
    Route::get('package-management/package-list-item-feature/{id}', [PackagesManagementController::class, 'packageFeaturesList'])->name('package-list.item.features');
    //Package Inclusion
    Route::get('package-management/package-list-item-inclusion/{id}', [PackagesManagementController::class, 'packageInclusionList'])->name('package-list.item.inclusion');
    //Package Exclusion
    Route::get('package-management/package-list-item-exclusion/{id}', [PackagesManagementController::class, 'packageExclusionList'])->name('package-list.item.exclusion');
    //Package Iternary
    Route::get('package-management/package-list-item-iternary/{id}', [PackagesManagementController::class, 'packageIternaryList'])->name('package-list.item.iternary');
    Route::post('package-management/add-iternary/{package_id}', [PackagesManagementController::class, 'packageIternaryStore'])->name('add-iternary-add-item');
    //Package Category
    Route::get('package-management/package-list-item-category/{id}', [PackagesManagementController::class, 'packageCategoryList'])->name('package-list.item.category');
    Route::get('package-management/package-category/add/{id}', [PackagesManagementController::class, 'createPackageCategory'])->name('package.category.add.view');
    Route::post('package-management/package-category/add-store/{package_id}', [PackagesManagementController::class, 'storePackageCategory'])->name('package.category.store');
    Route::get('package-management/package-category/edit/{id}', [PackagesManagementController::class, 'editPackageCategory'])->name('package.category.edit');
    Route::post('package-management/package-category/edit-store/{category_id}', [PackagesManagementController::class, 'updatePackageCategory'])->name('package.category.update');
    Route::get('package-management/package-category/delete/{id}', [PackagesManagementController::class, 'deletePackageCategory'])->name('package.category.delete');

    //Features
    Route::get('package-management/feature/list', [PackagesManagementController::class, 'featuresList'])->name('feature.list.view');
    Route::get('/package-management/add-feature-index', [PackagesManagementController::class, 'createFeatures'])->name('feature.add.view.index');
    Route::post('package-management/add-amenities', [PackagesManagementController::class, 'storeFeatures'])->name('add-feature-add-item');
    Route::get('package-management/feature/item/edit/item/{id}', [PackagesManagementController::class, 'editFeatures'])->name('features.edit.view');
    Route::post('package-management/feature/item/edit/{id}', [PackagesManagementController::class, 'updateFeatures'])->name('features.edit');
    Route::get('package-management/feature/item/delete/{id}', [PackagesManagementController::class, 'deleteFeatures'])->name('features.delete');

    //Inclusion
    Route::get('package-management/inclusion/list', [PackagesManagementController::class, 'inclusionList'])->name('inclusion.list.view');
    Route::get('/package-management/add-inclusion-index', [PackagesManagementController::class, 'createInclusion'])->name('inclusion.add.view.index');
    Route::post('package-management/add-inclusion', [PackagesManagementController::class, 'storeInclusion'])->name('add-inclusion-add-item');
    Route::get('package-management/inclusion/item/edit/item/{id}', [PackagesManagementController::class, 'editInclusion'])->name('inclusion.edit.view');
    Route::post('package-management/inclusion/item/edit/{id}', [PackagesManagementController::class, 'updateInclusion'])->name('inclusion.edit');
    Route::get('package-management/inclusion/item/delete/{id}', [PackagesManagementController::class, 'deleteInclusion'])->name('inclusion.delete');

    //Exclusion
    Route::get('package-management/exclusion/list', [PackagesManagementController::class, 'exclusionList'])->name('exclusion.list.view');
    Route::get('/package-management/add-exclusion-index', [PackagesManagementController::class, 'createExclusion'])->name('exclusion.add.view.index');
    Route::post('package-management/add-exclusion', [PackagesManagementController::class, 'storeExclusion'])->name('add-exclusion-add-item');
    Route::get('package-management/exclusion/item/edit/item/{id}', [PackagesManagementController::class, 'editExclusion'])->name('exclusion.edit.view');
    Route::post('package-management/exclusion/item/edit/{id}', [PackagesManagementController::class, 'updateExclusion'])->name('exclusion.edit');
    Route::get('package-management/exclusion/item/delete/{id}', [PackagesManagementController::class, 'deleteExclusion'])->name('exclusion.delete');

    //Package-terms
    Route::get('package-management/package-terms', [PackagesManagementController::class, 'termsList'])->name('terms.list.view');
    Route::get('package-management/terms/item/Add/item', [PackagesManagementController::class, 'createTerms'])->name('terms.add.view.index');
    Route::post('package-management/terms/item/add', [PackagesManagementController::class, 'storeTerms'])->name('terms.add');
    Route::get('package-management/terms/item/edit/item/{id}', [PackagesManagementController::class, 'editTerms'])->name('terms.edit.view');
    Route::post('package-management/terms/item/edit/{id}', [PackagesManagementController::class, 'updateTerms'])->name('terms.edit');
    Route::get('package-management/terms/item/delete/{id}', [PackagesManagementController::class, 'deleteTerms'])->name('terms.delete');

    //Payment-policy
    Route::get('package-management/package-paymentpolicy', [PackagesManagementController::class, 'paymentPolicyList'])->name('paymentpolicy.list.view');
    Route::get('package-management/paymentpolicy/item/Add/item', [PackagesManagementController::class, 'createPaymentPolicy'])->name('paymentpolicy.add.view.index');
    Route::post('package-management/paymentpolicy/item/add', [PackagesManagementController::class, 'storePaymentPolicy'])->name('paymentpolicy.add');
    Route::get('package-management/paymentpolicy/item/edit/item/{id}', [PackagesManagementController::class, 'editPaymentPolicy'])->name('paymentpolicy.edit.view');
    Route::post('package-management/paymentpolicy/item/edit/{id}', [PackagesManagementController::class, 'updatePaymentPolicy'])->name('paymentpolicy.edit');
    Route::get('package-management/paymentpolicy/item/delete/{id}', [PackagesManagementController::class, 'deletePaymentPolicy'])->name('paymentpolicy.delete');

    //Package Cancellation Policy
    Route::get('package-management/package-cancellationpolicy', [PackagesManagementController::class, 'cancellationPolicyList'])->name('cancellationpolicy.list.view');
    Route::get('package-management/cancellationpolicy/item/Add/item', [PackagesManagementController::class, 'createCancellationPolicy'])->name('cancellationpolicy.add.view.index');
    Route::post('package-management/cancellationpolicy/item/add', [PackagesManagementController::class, 'storeCancellationPolicy'])->name('cancellationpolicy.add');
    Route::get('package-management/cancellationpolicy/item/edit/item/{id}', [PackagesManagementController::class, 'editCancellationPolicy'])->name('cancellationpolicy.edit.view');
    Route::post('package-management/cancellationpolicy/item/edit/{id}', [PackagesManagementController::class, 'updateCancellationPolicy'])->name('cancellationpolicy.edit');
    Route::get('package-management/cancellationpolicy/item/delete/{id}', [PackagesManagementController::class, 'deleteCancellationPolicy'])->name('cancellationpolicy.delete');

    //Package Festival Date
    Route::get('package-management/package-packagefestivaldates', [PackagesManagementController::class, 'packageFestivalDatesList'])->name('packagefestivaldates.list.view');
    Route::get('package-management/packagefestivaldates/item/Add/item', [PackagesManagementController::class, 'createPackageFestivalDates'])->name('packagefestivaldates.add.view.index');
    Route::post('package-management/packagefestivaldates/item/add', [PackagesManagementController::class, 'storePackageFestivalDates'])->name('packagefestivaldates.add');
    Route::get('package-management/packagefestivaldates/item/edit/item/{id}', [PackagesManagementController::class, 'editPackageFestivalDates'])->name('packagefestivaldates.edit.view');
    Route::post('package-management/packagefestivaldates/item/edit/{id}', [PackagesManagementController::class, 'updatePackageFestivalDates'])->name('packagefestivaldates.edit');
    Route::get('package-management/packagefestivaldates/item/delete/{id}', [PackagesManagementController::class, 'deletePackageFestivalDates'])->name('packagefestivaldates.delete');

    //Package Block Date
    Route::get('package-management/package-packageblockdates', [PackagesManagementController::class, 'packageBlockDatesList'])->name('packageblockdates.list.view');
    Route::get('package-management/packageblockdates/item/Add/item', [PackagesManagementController::class, 'createPackageBlockDates'])->name('packageblockdates.add.view.index');
    Route::post('package-management/packageblockdates/item/add', [PackagesManagementController::class, 'storePackageBlockDates'])->name('packageblockdates.add');
    Route::get('package-management/packageblockdates/item/edit/item/{id}', [PackagesManagementController::class, 'editPackageBlockDates'])->name('packageblockdates.edit.view');
    Route::post('package-management/packageblockdates/item/edit/{id}', [PackagesManagementController::class, 'updatePackageBlockDates'])->name('packageblockdates.edit');
    Route::get('package-management/packageblockdates/item/delete/{id}', [PackagesManagementController::class, 'deletePackageBlockDates'])->name('packageblockdates.delete');


    Route::post('package-management/package-category/updateAvailability', [PackagesManagementController::class, 'packageCategoryAvailable'])->name('package-category-list.item.updateAvailability');
    Route::post('separate-package/item/category/availability', [PackagesManagementController::class, 'separateCategoryAvailable'])->name('separate-package.item.category.availability');

    Route::post('package-list/item/feature/updateAvailability', [PackagesManagementController::class, 'featureAvailable'])->name('package-list.item.feature.updateAvailability');
    Route::post('separate-package/item/feature/availability', [PackagesManagementController::class, 'separateFeatureAvailable'])->name('separate-package.item.feature.availability');

    Route::post('package-list/item/inclusion/updateAvailability', [PackagesManagementController::class, 'inclusionAvailable'])->name('package-list.item.inclusion.updateAvailability');
    Route::post('separate-package/item/inclusion/availability', [PackagesManagementController::class, 'separateinclusionAvailable'])->name('separate-package.item.inclusion.availability');

    Route::post('package-list/item/exclusion/updateAvailability', [PackagesManagementController::class, 'exclusionAvailable'])->name('package-list.item.exclusion.updateAvailability');
    Route::post('separate-package/item/exclusion/availability', [PackagesManagementController::class, 'separateexclusionAvailable'])->name('separate-package.item.exclusion.availability');


    //########################################### Package Enquiries start #########################//
    Route::get('/package-enquiries-list', [EnquiryController::class, 'packageEnquiry'])->name('package-enquiry-list');
    Route::delete('/package-enquiries-delete/{id}', [EnquiryController::class, 'packageEnquiryDelete'])->name('package.enquiry.delete');


    //########################################### Hotel Enquiries start #########################//
    Route::get('/hotel-enquiries-list', [EnquiryController::class, 'hotelEnquiry'])->name('hotel-enquiry-list');
    Route::delete('/hotel-enquiries-delete/{id}', [EnquiryController::class, 'hotelEnquiryDelete'])->name('hotel.enquiry.delete');


    //########################################### General Enquiries start #########################//
    Route::get('/general-enquiries-list', [EnquiryController::class, 'generalEnquiry'])->name('general-enquiry-list');
    Route::delete('/general-enquiries-delete/{id}', [EnquiryController::class, 'generalEnquiryDelete'])->name('general.enquiry.delete');


    //########################################### SEO Manager start #########################//
    Route::get('/seo-manager-index', [SEOManagerController::class, 'seoManagerView'])->name('seo-manager-view');
    Route::get('/seo-manager-add-index', [SEOManagerController::class, 'createSeoManager'])->name('add-seo-manager-view');
    Route::post('/seo-manager-store', [SEOManagerController::class, 'storeSeoManager'])->name('seo.manager.store');
    Route::get('/seo-manager-edit-index/{id}', [SEOManagerController::class, 'editSeoManager'])->name('edit-seo-manager-view');
    Route::post('/seo-manager-update/{id}', [SEOManagerController::class, 'updateSeoManager'])->name('seo.manager.update');
    Route::get('/seo-manager-delete/{id}', [SEOManagerController::class, 'deleteSeoManager'])->name('seo.manager.delete');




    //########################################### Page Management start #########################//
    Route::get('/superadmin/page-management/home/index', [PageManagementController::class, 'homeIndex'])->name('page.mangement.home.index');
    Route::post('/superadmin/page-management/home/store', [PageManagementController::class, 'homeStore'])->name('page.mangement.home.store');

    Route::get('/superadmin/page-management/jungle/index', [PageManagementController::class, 'jungleIndex'])->name('page.mangement.jungle.index');
    Route::post('/superadmin/page-management/jungle/store', [PageManagementController::class, 'jungleStore'])->name('page.mangement.jungle.store');

    Route::get('/superadmin/page-management/devalia/index', [PageManagementController::class, 'devaliaIndex'])->name('page.mangement.devalia.index');
    Route::post('/superadmin/page-management/devalia/store', [PageManagementController::class, 'devaliaStore'])->name('page.mangement.devalia.store');

    Route::get('/superadmin/page-management/kankai/index', [PageManagementController::class, 'kankaiIndex'])->name('page.mangement.kankai.index');
    Route::post('/superadmin/page-management/kankai/store', [PageManagementController::class, 'kankaiStore'])->name('page.mangement.kankai.store');

    Route::get('/superadmin/page-management/girnar/index', [PageManagementController::class, 'girnarIndex'])->name('page.mangement.girnar.index');
    Route::post('/superadmin/page-management/girnar/store', [PageManagementController::class, 'girnarStore'])->name('page.mangement.girnar.store');

    Route::get('/superadmin/page-management/hotel/index', [PageManagementController::class, 'hotelIndex'])->name('page.mangement.hotel.index');
    Route::post('/superadmin/page-management/hotel/store', [PageManagementController::class, 'hotelStore'])->name('page.mangement.hotel.store');

    Route::get('/superadmin/page-management/package/index', [PageManagementController::class, 'packageIndex'])->name('page.mangement.package.index');
    Route::post('/superadmin/page-management/package/store', [PageManagementController::class, 'packageStore'])->name('page.mangement.package.store');

    Route::get('/superadmin/page-management/contact/index', [PageManagementController::class, 'contactIndex'])->name('page.mangement.contact.index');
    Route::post('/superadmin/page-management/contact/store', [PageManagementController::class, 'contactStore'])->name('page.mangement.contact.store');

    Route::get('/superadmin/page-management/faq/index', [PageManagementController::class, 'faqIndex'])->name('page.mangement.faq.index');
    Route::post('/superadmin/page-management/faq/store', [PageManagementController::class, 'faqStore'])->name('page.mangement.faq.store');

    Route::get('/superadmin/page-management/doDoNot/index', [PageManagementController::class, 'doDoNotIndex'])->name('page.mangement.doDoNot.index');
    Route::post('/superadmin/page-management/doDoNot/store', [PageManagementController::class, 'doDoNotStore'])->name('page.mangement.doDoNot.store');

    Route::get('/superadmin/page-management/history/index', [PageManagementController::class, 'historyIndex'])->name('page.mangement.history.index');
    Route::post('/superadmin/page-management/history/store', [PageManagementController::class, 'historyStore'])->name('page.mangement.history.store');

    Route::get('/superadmin/page-management/permit/index', [PageManagementController::class, 'permitIndex'])->name('page.mangement.permit.index');
    Route::post('/superadmin/page-management/permit/store', [PageManagementController::class, 'permitStore'])->name('page.mangement.permit.store');

    Route::get('/superadmin/page-management/term/index', [PageManagementController::class, 'termIndex'])->name('page.mangement.term.index');
    Route::post('/superadmin/page-management/term/store', [PageManagementController::class, 'termStore'])->name('page.mangement.term.store');

    Route::get('/superadmin/page-management/privacy/index', [PageManagementController::class, 'privacyIndex'])->name('page.mangement.privacy.index');
    Route::post('/superadmin/page-management/privacy/store', [PageManagementController::class, 'privacyStore'])->name('page.mangement.privacy.store');

    Route::get('/superadmin/page-management/about/index', [PageManagementController::class, 'aboutIndex'])->name('page.mangement.about.index');
    Route::post('/superadmin/page-management/about/store', [PageManagementController::class, 'aboutStore'])->name('page.mangement.about.store');

    Route::get('/superadmin/page-management/reach/index', [PageManagementController::class, 'reachIndex'])->name('page.mangement.reach.index');
    Route::post('/superadmin/page-management/reach/store', [PageManagementController::class, 'reachStore'])->name('page.mangement.reach.store');

    Route::get('/superadmin/page-management/cancellation/index', [PageManagementController::class, 'cancellationIndex'])->name('page.mangement.cancellation.index');
    Route::post('/superadmin/page-management/cancellation/store', [PageManagementController::class, 'cancellationStore'])->name('page.mangement.cancellation.store');

    Route::get('/superadmin/page-management/festival/index', [PageManagementController::class, 'festivalIndex'])->name('page.mangement.festival.index');
    Route::post('/superadmin/page-management/festival/store', [PageManagementController::class, 'festivalStore'])->name('page.mangement.festival.store');

    Route::get('/superadmin/page-management/manager/index', [PageManagementController::class, 'managerIndex'])->name('page.management.manager.index');
    Route::get('/superadmin/page-management/manager/directory/{directory}', [PageManagementController::class, 'viewDirectory'])->name('page.management.manager.directory');
    Route::post('/superadmin/page-management/manager/upload', [PageManagementController::class, 'uploadFile'])->name('page.management.manager.upload');
    Route::delete('/superadmin/page-management/manager/delete/{file}', [PageManagementController::class, 'deleteFile'])->name('page.management.manager.delete');

    Route::get('/superadmin/page-management/weekend/index', [PageManagementController::class, 'weekendIndex'])->name('page.mangement.weekend.index');
    Route::post('/superadmin/page-management/weekend/store', [PageManagementController::class, 'weekendStore'])->name('page.mangement.weekend.store');

//  --new routes---

    Route::get('/superadmin/page-management/attractions/index', [PageManagementController::class, 'attractionsIndex'])->name('page.mangement.attractions.index');
    Route::post('/superadmin/page-management/attractions/store', [PageManagementController::class, 'attractionsStore'])->name('page.mangement.attractions.store');


















    Route::get('/superadmin/page-management/besttime/index', [PageManagementController::class, 'besttimeIndex'])->name('page.mangement.besttime.index');
    Route::post('/superadmin/page-management/besttime/store', [PageManagementController::class, 'besttimeStore'])->name('page.mangement.besttime.store');

    Route::get('/superadmin/page-management/bookingprocess/index', [PageManagementController::class, 'bookingprocessIndex'])->name('page.mangement.bookingprocess.index');
    Route::post('/superadmin/page-management/bookingprocess/store', [PageManagementController::class, 'bookingprocessStore'])->name('page.mangement.bookingprocess.store');

    Route::get('/superadmin/page-management/localfood/index', [PageManagementController::class, 'localfoodIndex'])->name('page.mangement.localfood.index');
    Route::post('/superadmin/page-management/localfood/store', [PageManagementController::class, 'localfoodStore'])->name('page.mangement.localfood.store');

    Route::get('/superadmin/page-management/localshopping/index', [PageManagementController::class, 'localshoppingIndex'])->name('page.mangement.localshopping.index');
    Route::post('/superadmin/page-management/localshopping/store', [PageManagementController::class, 'localshoppingStore'])->name('page.mangement.localshopping.store');

    Route::get('/superadmin/page-management/pricingtable/index', [PageManagementController::class, 'pricingtableIndex'])->name('page.mangement.pricingtable.index');
    Route::post('/superadmin/page-management/pricingtable/store', [PageManagementController::class, 'pricingtableStore'])->name('page.mangement.pricingtable.store');

    Route::get('/superadmin/page-management/waterfalls/index', [PageManagementController::class, 'waterfallsIndex'])->name('page.mangement.waterfalls.index');
    Route::post('/superadmin/page-management/waterfalls/store', [PageManagementController::class, 'waterfallsStore'])->name('page.mangement.waterfalls.store');

    //########################################### News #########################//
    Route::get('/news-list', [NewsManagementController::class, 'index'])->name('news-list');
    Route::get('/news-list-add-item', [NewsManagementController::class, 'createNews'])->name('news.list.item.add.index');
    Route::post('news-management/add-news', [NewsManagementController::class, 'storeNews'])->name('news.list.item.add');
    Route::get('news-management/edit-news/{id}', [NewsManagementController::class, 'editNews'])->name('news-list.item.edit');
    Route::post('news-management/update-news/{id}', [NewsManagementController::class, 'updateNews'])->name('news.list.item.update');
    Route::post('news-management/updateAvailability', [NewsManagementController::class, 'updateNewsStatus'])->name('news-list.item.updateAvailability');
    Route::get('news-management/delete/{id}', [NewsManagementController::class, 'deleteNews'])->name('news-list.item.delete');

    //########################################### Razorpay Setting start #########################//
    Route::get('/razorpay-setting-index', [settingsController::class, 'razorpaySettingView'])->name('razorpay-setting-view');
    Route::post('/razorpay-setting-store', [settingsController::class, 'razorpaySettingStore'])->name('razorpay.settings.store');

    //########################################### Contact Setting start #########################//
    Route::get('/contact-setting-index', [settingsController::class, 'contactSettingView'])->name('contact-setting-view');
    Route::post('/contact-setting-store', [settingsController::class, 'contactSettingStore'])->name('contact.settings.store');

    //########################################### Latest News start #########################//
    Route::get('/news-setting-index', [settingsController::class, 'newsSettingView'])->name('news-setting-view');
    Route::post('/news-setting-store', [settingsController::class, 'newsSettingStore'])->name('news.settings.store');

    //########################################### My Account start #########################//
    Route::get('/account-setting-index', [settingsController::class, 'accountSettingView'])->name('account-setting-view');
    Route::post('/account-setting-store', [settingsController::class, 'accountSettingStore'])->name('account.settings.store');

    //########################################### Change Password start #########################//
    Route::get('/password-setting-index', [settingsController::class, 'passwordSettingView'])->name('password-setting-view');
    Route::post('/password-setting-store', [settingsController::class, 'passwordSettingStore'])->name('password.settings.store');
});
