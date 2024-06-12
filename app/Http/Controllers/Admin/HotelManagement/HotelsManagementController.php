<?php

namespace App\Http\Controllers\Admin\HotelManagement;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\DateManagement;
use App\Models\Hotel;
use App\Models\HotelAmenities;
use App\Models\HotelImages;
use App\Models\HotelRoom;
use App\Models\HotelRoomAvailable;
use App\Models\HotelRoomBenefit;
use App\Models\HotelRoomBlock;
use App\Models\HotelRoomFacilities;
use App\Models\PageBuilders;
use App\Models\RoomBenefit;
use App\Models\RoomFacilities;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HotelsManagementController extends Controller
{
    //hotel list
    public function index(Request $request)
    {
        $query = Hotel::where('status', true)->with('amenities');
        $hotel_name = $request->input('hotel_name');
        $hotel_rating = $request->input('hotel_rating');
        $availability = $request->input('availability');

        if ($request->filled('hotel_name')) {
            $query->where('name', 'like', '%' . $request->input('hotel_name') . '%');
        }
        if ($request->filled('hotel_rating')) {
            $query->where('rating', $request->input('hotel_rating'));
        }
        if ($request->filled('availability')) {
            $query->where('status', $request->input('availability'));
        }

        $hotels = $query->paginate(5);
        $details = PageBuilders::where('type', 'hotel_page')->first(['meta_title', 'meta_description']);
        foreach ($hotels as $hotel) {
            $hotel->image_path = isset($hotel->image) ? asset('storage/uploads/hotels/' . $hotel->id . '/' . $hotel->image) : '/image/hotel-placeholder.jpeg';
            foreach ($hotel->amenities as $amenity) {
                $amenity_data = Amenities::find($amenity->amenity_id);
                $amenity->name = $amenity_data->amenity;
                $amenity->image = isset($amenity_data->image) ? asset('storage/uploads/amenities/' . $amenity_data->image) : '/image/hotel-placeholder.jpeg';
            }
        }

        return view('admin.hotel.hotels', compact('hotels', 'details', 'hotel_name', 'hotel_rating', 'availability'));
    }

    //create hotel
    public function addHotel(Request $request)
    {
        $states = State::get()->toArray();
        return view('admin.hotel.add-hotel', compact('states'));
    }

    //store hotel
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'rating' => 'required',
            'city' => 'required',
            'state' => 'required',
            'address' => 'required',
            'status' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $inputs = $request->all();
            $inputs['slug'] = Str::slug($inputs['name']);
            $directory = 'admin/uploads/hotels/' . $inputs['slug'] . '/';

            if ($request->hasFile('image')) {
                $image = $inputs['image'];
                $imageName =  uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path($directory), $imageName);
                $inputs['image'] = $directory . $imageName;
            }
            if ($request->hasFile('package_image')) {
                $package_image = $inputs['package_image'];
                $packageImageName =  uniqid() . '.' . $package_image->getClientOriginalExtension();
                $package_image->move(public_path($directory), $packageImageName);
                $inputs['package_image'] = $directory . $packageImageName;
            }
            $hotel = Hotel::create($inputs);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $singleImageName =  uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path($directory), $singleImageName);
                    $imageUrl = $directory . $singleImageName;
                    $hotel->images()->create(['image' => $imageUrl]);
                }
            }
            $hotel->save();

            $amenities = Amenities::pluck('id');
            foreach ($amenities as $amenityId) {
                HotelAmenities::create([
                    'hotel_id' => $hotel->id,
                    'amenity_id' => $amenityId
                ]);
            }

            DB::commit();
            return redirect()->route('hotel-list')->with('success', 'Hotel Created Successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error occurred while creating hotel: ' . $e->getMessage());
            return redirect()->route('hotel-list')->with('error', 'Something went wrong. Please try again.');
        }
    }

    //edit hotel
    public function edit($id)
    {
        $states = State::get()->toArray();
        $hotel = Hotel::find($id);
        $hotel->load('images');
        return view('admin.hotel.edit-hotel', compact('hotel', 'states'));
    }

    //hotel images delete
    public function deleteHotelImage($hotelId, $imageId)
    {
        $hotelImage = HotelImages::where('id', $imageId)->where('hotel_id', $hotelId)->first();
        if (!$hotelImage) {
            return response()->json([
                'success' => false,
                'message' => 'Hotel image not found.'
            ]);
        }

        $hotelImageDeleted = $hotelImage->delete();
        if ($hotelImageDeleted) {
            if (File::exists(public_path($hotelImage->image))) {
                $fileDeleted = File::delete(public_path($hotelImage->image));
                if ($fileDeleted) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Image deleted successfully.'
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Failed to delete image file.'
                    ]);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Image file not found.'
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete hotel image.'
            ]);
        }
    }

    //update hotel
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'rating' => 'required',
            'city' => 'required',
            'state' => 'required',
            'address' => 'required',
            'status' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $inputs = $request->all();
            $hotel = Hotel::findOrFail($id);
            $inputs['slug'] = Str::slug($inputs['name']);
            $hotel->update($inputs);

            $directory = 'admin/uploads/hotels/' . $inputs['slug'] . '/';

            if ($request->hasFile('image')) {
                if (File::exists(public_path($hotel->image))) {
                    $fileDeleted = File::delete(public_path($hotel->image));
                    // if ($fileDeleted) {
                    $image = $request->file('image');
                    $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path($directory), $imageName);
                    $imageUrl = $directory . $imageName;
                    $inputs['image'] = $imageUrl;
                    // }
                }
            }

            if ($request->hasFile('package_image')) {
                if (File::exists(public_path($hotel->package_image))) {
                    $fileDeleted = File::delete(public_path($hotel->package_image));
                    // if ($fileDeleted) {
                    $package_image = $request->file('package_image');
                    $imageName = uniqid() . '.' . $package_image->getClientOriginalExtension();
                    $package_image->move(public_path($directory), $imageName);
                    $packageImageUrl = $directory . $imageName;
                    $inputs['package_image'] = $packageImageUrl;
                    // }
                }
            }

            $hotel->update($inputs);

            if ($request->hasfile('images')) {
                foreach ($request->file('images') as $image) {
                    $singleImageName = uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path($directory), $singleImageName);
                    $singleImageUrl = $directory . $singleImageName;
                    $hotel->images()->create(['image' => $singleImageUrl]);
                }
            }
            $affected = $hotel->save();
            DB::commit();
            if ($affected) {
                return redirect()->route('hotel-list')->with('success', 'Hotel Updated Successfully.');
            } else {
                return redirect()->route('hotel-list')->with('error', 'Hotel Updation Failed.');
            }
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error occurred while updating hotel: ' . $e->getMessage());
            return redirect()->route('hotel-list')->with('error', 'Something went wrong. Please try again.');
        }
    }

    //delete hotel
    public function destroy($id)
    {
        $date = Hotel::find($id);

        if ($date) {
            $date->delete();

            session()->flash('success', 'Hotel deleted successfully');
        } else {
            session()->flash('error', 'Hotel not found');
        }

        return redirect()->back();
    }

    //hotel status update
    public function show(Request $request)
    {
        if ($request->id && isset($request->newAvailability)) {
            try {
                $date = Hotel::findOrFail($request->id);
                $date->update(['status' => $request->newAvailability]);

                return [
                    'status' => 'success',
                    'msg' => 'Record Updated successfully.',
                ];
            } catch (\Exception $e) {
                return [
                    'status' => 'failed',
                    'msg' => 'Error updating record: ' . $e->getMessage(),
                ];
            }
        } else {
            return [
                'status' => 'failed',
                'msg' => 'Invalid or missing data for update.',
            ];
        }
    }


    //hotel rooms list
    public function hotelRooms(Request $request, $id)
    {
        $hotelRoom = HotelRoom::where('hotel_id', $id)->paginate(10);
        return view('admin.hotel.room.hotel-rooms', compact('hotelRoom', 'id'));
    }

    //create room
    public function hotelRoomAdd(Request $request, $hotel_id)
    {
        return view('admin.hotel.room.add-hotel-room', compact('hotel_id'));
    }

    //store room
    public function hotelRoomstore(Request $request, $hotel_id)
    {
        $rules = [
            'name'                              => 'required',
            'availability'                      => 'required',
            'only_room'                         => 'required',
            'room_with_breakfast'               => 'required',
            'room_with_breakfast_dinner'        => 'required',
            'room_with_breakfast_lunch_dinner'  => 'required',
        ];
        if ($request->has('custom_amount_status')) {
            $rules['adult_custom_amount'] = 'required|numeric|max:100';
            $rules['child_custom_amount'] = 'required|numeric|max:100';
        }


        $messages = [
            'name.required'                                     => 'Please enter Amenities Name',
            'availability.required'                             => 'Please Select Availability',
            'only_room.required'                                => 'Please enter Only Room Price',
            'room_with_breakfast.required'                      => 'Please enter Room With Breakfast Price',
            'room_with_breakfast_dinner.required'               => 'Please enter Room With Breakfast Dinner Price',
            'room_with_breakfast_lunch_dinner.required'         => 'Please enter Room With Breakfast Lunch Dinner Price',
            'adult_custom_amount.required'                      => 'Please enter custom percentage for adult',
            'adult_custom_amount.numeric'                       => 'Adult custom amount must be a number',
            'adult_custom_amount.max'                           => 'Adult custom amount must not exceed 100',
            'child_custom_amount.required'                      => 'Please enter custom percentage for child',
            'child_custom_amount.numeric'                       => 'Child custom amount must be a number',
            'child_custom_amount.max'                           => 'Child custom amount must not exceed 100',

        ];

        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            session()->flash('error', 'All fields are required!!');
            return redirect()->back();
        }

        $only_room = intval($request->only_room * 2 / 100);
        $room_with_breakfast = intval($request->room_with_breakfast * 2 / 100);
        $room_with_breakfast_dinner = intval($request->room_with_breakfast_dinner * 2 / 100);
        $room_with_breakfast_lunch_dinner = intval($request->room_with_breakfast_lunch_dinner * 2 / 100);

        $only_room = $only_room + intval($request->only_room);
        $room_with_breakfast = $room_with_breakfast + intval($request->room_with_breakfast);
        $room_with_breakfast_dinner = $room_with_breakfast_dinner + intval($request->room_with_breakfast_dinner);
        $room_with_breakfast_lunch_dinner = $room_with_breakfast_lunch_dinner + intval($request->room_with_breakfast_lunch_dinner);

        $hotelRoom                      = new HotelRoom();
        $hotelRoom->hotel_id            = $hotel_id;
        $hotelRoom->room                = $request->name;
        $hotelRoom->status              = $request->availability;
        $hotelRoom->only_room                           = $only_room;
        $hotelRoom->room_with_breakfast                 = $room_with_breakfast;
        $hotelRoom->room_with_breakfast_dinner          = $room_with_breakfast_dinner;
        $hotelRoom->room_with_breakfast_lunch_dinner    = $room_with_breakfast_lunch_dinner;

        if ($request->has('custom_amount_status')) {
            $hotelRoom->custom_amount_status = true;
            $hotelRoom->adult_custom_amount = $request->adult_custom_amount;
            $hotelRoom->child_custom_amount = $request->child_custom_amount;
        } else {
            $hotelRoom->custom_amount_status = false;
        }


        $hotelRoom->save();

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $originalName = $image->getClientOriginalName();
            $filename = $hotelRoom->id . '_' . $originalName;
            $path = public_path('admin/uploads/rooms/' . $filename);
            if (!File::exists(public_path('admin/uploads/rooms/'))) {
                File::makeDirectory(public_path('admin/uploads/rooms/'), 0755, true);
            }
            Image::make($image->getRealPath())->resize(200, 200)->save($path);
            $hotelRoom->image = $filename;
            $hotelRoom->save();
        }

        if ($request->has('room_facility')) {
            foreach ($request->room_facility as $facility) {
                $hotelRoomFacility = new HotelRoomFacilities();
                $hotelRoomFacility->hotel_id = $hotel_id;
                $hotelRoomFacility->room_id = $hotelRoom->id;
                $hotelRoomFacility->facility = $facility;
                $hotelRoomFacility->save();
            }
        }

        if ($request->has('room_benefit')) {
            foreach ($request->room_benefit as $benefit) {
                $hotelRoomBenefit = new HotelRoomBenefit();
                $hotelRoomBenefit->hotel_id = $hotel_id;
                $hotelRoomBenefit->room_id = $hotelRoom->id;
                $hotelRoomBenefit->benefit = $benefit;
                $hotelRoomBenefit->save();
            }
        }

        return redirect()->back()->with('success', 'Hotel Room Created Successfully..');
    }

    //edit room
    public function hotelRoomEdit(Request $request, $hotel_id, $room_id)
    {
        $hotelRoomData = HotelRoom::where('hotel_id', $hotel_id)->where('id', $room_id)->get()->toArray();
        $hotelRoomFacility = HotelRoomFacilities::where('hotel_id', $hotel_id)->where('room_id', $room_id)->get()->toArray();
        $hotelRoomBenefit = HotelRoomBenefit::where('hotel_id', $hotel_id)->where('room_id', $room_id)->get()->toArray();
        return view('admin.hotel.room.edit-hotel-room', compact('hotel_id', 'room_id', 'hotelRoomData', 'hotelRoomFacility', 'hotelRoomBenefit'));
    }

    //update room
    public function hotelRoomUpdate(Request $request, $hotel_id, $room_id)
    {
        $rules = [
            'name'                              => 'required',
            'availability'                      => 'required',
            'only_room'                         => 'required',
            'room_with_breakfast'               => 'required',
            'room_with_breakfast_dinner'        => 'required',
            'room_with_breakfast_lunch_dinner'  => 'required',
        ];
        if ($request->has('custom_amount_status')) {
            $rules['adult_custom_amount'] = 'required|numeric|max:100';
            $rules['child_custom_amount'] = 'required|numeric|max:100';
        }


        $messages = [
            'name.required'                                     => 'Please enter Amenities Name',
            'availability.required'                             => 'Please Select Availability',
            'only_room.required'                                => 'Please enter Only Room Price',
            'room_with_breakfast.required'                      => 'Please enter Room With Breakfast Price',
            'room_with_breakfast_dinner.required'               => 'Please enter Room With Breakfast Dinner Price',
            'room_with_breakfast_lunch_dinner.required'         => 'Please enter Room With Breakfast Lunch Dinner Price',
            'adult_custom_amount.required'                      => 'Please enter custom percentage for adult',
            'adult_custom_amount.numeric'                       => 'Adult custom amount must be a number',
            'adult_custom_amount.max'                           => 'Adult custom amount must not exceed 100',
            'child_custom_amount.required'                      => 'Please enter custom percentage for child',
            'child_custom_amount.numeric'                       => 'Child custom amount must be a number',
            'child_custom_amount.max'                           => 'Child custom amount must not exceed 100',
        ];

        $validator = $this->getValidationFactory()
            ->make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            session()->flash('error', 'All fields are required!!');
            return redirect()->back();
        }

        $only_room = intval($request->only_room * 2 / 100);
        $room_with_breakfast = intval($request->room_with_breakfast * 2 / 100);
        $room_with_breakfast_dinner = intval($request->room_with_breakfast_dinner * 2 / 100);
        $room_with_breakfast_lunch_dinner = intval($request->room_with_breakfast_lunch_dinner * 2 / 100);

        $only_room = $only_room + intval($request->only_room);
        $room_with_breakfast = $room_with_breakfast + intval($request->room_with_breakfast);
        $room_with_breakfast_dinner = $room_with_breakfast_dinner + intval($request->room_with_breakfast_dinner);
        $room_with_breakfast_lunch_dinner = $room_with_breakfast_lunch_dinner + intval($request->room_with_breakfast_lunch_dinner);

        $hotelRoom = HotelRoom::where('hotel_id', $hotel_id)->where('id', $room_id)->first();
        $hotelRoom->hotel_id                            = $hotel_id;
        $hotelRoom->room                                = $request->name;
        $hotelRoom->status                              = $request->availability;
        $hotelRoom->only_room                           = $only_room;
        $hotelRoom->room_with_breakfast                 = $room_with_breakfast;
        $hotelRoom->room_with_breakfast_dinner          = $room_with_breakfast_dinner;
        $hotelRoom->room_with_breakfast_lunch_dinner    = $room_with_breakfast_lunch_dinner;
        if ($request->has('custom_amount_status')) {
            $hotelRoom->custom_amount_status = true;
            $hotelRoom->adult_custom_amount = $request->adult_custom_amount;
            $hotelRoom->child_custom_amount = $request->child_custom_amount;
        }

        $hotelRoom->save();

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $originalName = $image->getClientOriginalName();
            $filename = $hotelRoom->id . '_' . $originalName;
            $path = public_path('admin/uploads/rooms/' . $filename);
            $removePath = public_path('admin/uploads/rooms/');

            $files = File::files($removePath);
            foreach ($files as $file) {
                $fileInfo = pathinfo($file);
                $fileBaseName = $fileInfo['filename'];

                if (Str::startsWith($fileBaseName, $hotelRoom->id . '_')) {
                    File::delete($file);
                }
            }
            Image::make($image->getRealPath())->resize(200, 200)->save($path);
            $hotelRoom->image = $filename;
            $hotelRoom->save();
        }

        $deleteRoomFacility = HotelRoomFacilities::where('hotel_id', $hotel_id)->where('room_id', $room_id)->delete();

        if ($request->has('room_facility')) {
            foreach ($request->room_facility as $facility) {
                $hotelRoomFacility = new HotelRoomFacilities();
                $hotelRoomFacility->hotel_id = $hotel_id;
                $hotelRoomFacility->room_id = $room_id;
                $hotelRoomFacility->facility = $facility;
                $hotelRoomFacility->save();
            }
        }

        $deleteRoomBenefit = HotelRoomBenefit::where('hotel_id', $hotel_id)->where('room_id', $room_id)->delete();

        if ($request->has('room_benefit')) {
            foreach ($request->room_benefit as $benefit) {
                $hotelRoomBenefit = new HotelRoomBenefit();
                $hotelRoomBenefit->hotel_id = $hotel_id;
                $hotelRoomBenefit->room_id = $room_id;
                $hotelRoomBenefit->benefit = $benefit;
                $hotelRoomBenefit->save();
            }
        }

        // return redirect()->back()->with('success', 'Hotel Room Updated Successfully..');
        return redirect()->route('hotel-list.item.rooms', ['id' => $hotel_id])->with('success', 'Hotel Room Updated Successfully..');
    }

    //delete room
    public function hotelRoomDelete($hotel_id, $room_id)
    {
        $room = HotelRoom::where('hotel_id', $hotel_id)->where('id', $room_id);
        if ($room) {
            $room->delete();
            session()->flash('success', 'Hotel Room Deleted successfully..');
        } else {
            session()->flash('error', 'Hotel Room not found!!');
        }
        return redirect()->back();
    }

    //room status update
    public function roomUpdateAvailability(Request $request)
    {
        if ($request->id && isset($request->newAvailability)) {
            try {
                $date = HotelRoom::findOrFail($request->id);
                $date->update(['status' => $request->newAvailability]);

                return [
                    'status' => 'success',
                    'msg' => 'Record Updated successfully.',
                ];
            } catch (\Exception $e) {
                return [
                    'status' => 'failed',
                    'msg' => 'Error updating record: ' . $e->getMessage(),
                ];
            }
        } else {
            return [
                'status' => 'failed',
                'msg' => 'Invalid or missing data for update.',
            ];
        }
    }



    //add price and date in hotel room
    public function hotelRoomAvailable(Request $request, $hotel_id, $room_id)
    {
        $hotelRoomAvailable = HotelRoomAvailable::where('hotel_id', $hotel_id)->where('room_id', $room_id)->paginate(200);
        $hotelRoomBlock = HotelRoomBlock::where('hotel_id', $hotel_id)->where('room_id', $room_id)->paginate(200);
        $getHotelRoomName1 = HotelRoom::where('hotel_id', $hotel_id)->where('id', $room_id)->get()->toArray();
        $getHotelRoomName = $getHotelRoomName1[0]['room'];
        return view('admin.hotel.room-price-and-date.available-hotel-room', compact('hotel_id', 'room_id', 'hotelRoomAvailable', 'hotelRoomBlock', 'getHotelRoomName'));
    }

    //store price and date in hotel room
    public function availableHotelRoomStore(Request $request)
    {
        $rules = [
            'availability'                      => 'required',
            'only_room'                         => 'required',
            'room_with_breakfast'               => 'required',
            'room_with_breakfast_dinner'        => 'required',
            'room_with_breakfast_lunch_dinner'  => 'required',
        ];
        if ($request->has('custom_amount_status')) {
            $rules['adult_custom_amount'] = 'required|numeric|max:100';
            $rules['child_custom_amount'] = 'required|numeric|max:100';
        }


        $messages = [
            'availability.required'                             => 'Please Select Availability',
            'only_room.required'                                => 'Please enter Only Room Price',
            'room_with_breakfast.required'                      => 'Please enter Room With Breakfast Price',
            'room_with_breakfast_dinner.required'               => 'Please enter Room With Breakfast Dinner Price',
            'room_with_breakfast_lunch_dinner.required'         => 'Please enter Room With Breakfast Lunch Dinner Price',
            'adult_custom_amount.required'                      => 'Please enter custom percentage for adult',
            'adult_custom_amount.numeric'                       => 'Adult custom amount must be a number',
            'adult_custom_amount.max'                           => 'Adult custom amount must not exceed 100',
            'child_custom_amount.required'                      => 'Please enter custom percentage for child',
            'child_custom_amount.numeric'                       => 'Child custom amount must be a number',
            'child_custom_amount.max'                           => 'Child custom amount must not exceed 100',

        ];

        $validator = $this->getValidationFactory()
            ->make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            session()->flash('error', 'All fields are required!!');
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $only_room = intval($request->only_room * 2 / 100);
        $room_with_breakfast = intval($request->room_with_breakfast * 2 / 100);
        $room_with_breakfast_dinner = intval($request->room_with_breakfast_dinner * 2 / 100);
        $room_with_breakfast_lunch_dinner = intval($request->room_with_breakfast_lunch_dinner * 2 / 100);

        $only_room = $only_room + intval($request->only_room);
        $room_with_breakfast = $room_with_breakfast + intval($request->room_with_breakfast);
        $room_with_breakfast_dinner = $room_with_breakfast_dinner + intval($request->room_with_breakfast_dinner);
        $room_with_breakfast_lunch_dinner = $room_with_breakfast_lunch_dinner + intval($request->room_with_breakfast_lunch_dinner);
        $available = new HotelRoomAvailable();
        $available->hotel_id = $request->hotel_id;
        $available->room_id = $request->room_id;
        $available->room_check_in = $request->room_check_in;
        $available->room_check_out = $request->room_check_out;
        $available->only_room = $only_room;
        $available->room_with_breakfast = $room_with_breakfast;
        $available->room_with_breakfast_dinner = $room_with_breakfast_dinner;
        $available->room_with_breakfast_lunch_dinner = $room_with_breakfast_lunch_dinner;
        $available->status = $request->availability;
        $available->note = $request->note;
        if ($request->has('custom_amount_status')) {
            $available->custom_amount_status = true;
            $available->adult_custom_amount = $request->adult_custom_amount;
            $available->child_custom_amount = $request->child_custom_amount;
        } else {
            $available->custom_amount_status = false;
        }

        $available->save();

        return redirect()->back()->with('success', 'Hotel Room Price Set Successfully..');
    }

    //delete price and date from hotel room
    public function hotelRoomAvailableDelete($room_available_id)
    {
        $room = HotelRoomAvailable::where('id', $room_available_id);

        if ($room) {
            $room->delete();

            session()->flash('success', 'Hotel Room Availability Deleted successfully..');
        } else {
            session()->flash('error', 'Hotel Room Availability not found!!');
        }

        return redirect()->back();
    }

    //status update of price and date in hotel room
    public function roomUpdateAvailable(Request $request)
    {
        if ($request->id && isset($request->newAvailability)) {
            try {
                $date = HotelRoomAvailable::findOrFail($request->id);
                $date->update(['status' => $request->newAvailability]);

                return [
                    'status' => 'success',
                    'msg' => 'Record Updated successfully.',
                ];
            } catch (\Exception $e) {
                return [
                    'status' => 'failed',
                    'msg' => 'Error updating record: ' . $e->getMessage(),
                ];
            }
        } else {
            return [
                'status' => 'failed',
                'msg' => 'Invalid or missing data for update.',
            ];
        }
    }



    //store block date of hotel room
    public function blockHotelRoomStore(Request $request)
    {
        $rules = [
            'block_room_check_in'             => 'required',
            // 'block_room_check_out'            => 'required',
        ];

        $messages = [
            'block_room_check_in.required'            => 'Please Select Check In Date',
            // 'block_room_check_out.required'           => 'Please Select Check Out Date',
        ];

        $validator = $this->getValidationFactory()
            ->make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            session()->flash('error', 'All fields are required!!');
            return redirect()->back();
        }

        $available = new HotelRoomBlock();
        $available->hotel_id = $request->block_hotel_id;
        $available->room_id = $request->block_room_id;
        $available->room_check_in = $request->block_room_check_in;
        // $available->room_check_out = $request->block_room_check_out;

        $available->save();

        return redirect()->back()->with('success', 'Hotel Room Date Block Successfully..');
    }

    //delete block date of hotel room
    public function hotelRoomBlockDelete($room_block_id)
    {
        $room = HotelRoomBlock::where('id', $room_block_id);
        if ($room) {
            $room->delete();
            session()->flash('success', 'Hotel Room Block Date Deleted successfully..');
        } else {
            session()->flash('error', 'Hotel Room Block Date not found!!');
        }
        return redirect()->back();
    }


    //hotel amenities List
    public function hotelAmenities(Request $request, $id)
    {
        $hotel_id = $id;
        $amenities = HotelAmenities::with('amenity')->where('hotel_id', $id)->paginate(10);
        $getAmenityId = $amenities->pluck('amenity_id')->toArray();
        $UpdateAmenities = Amenities::get()->toArray();
        return view('admin.hotel.amenities.hotel-amenities', compact('amenities', 'hotel_id', 'UpdateAmenities', 'getAmenityId'));
    }

    // amenities list
    public function amenities(Request $request)
    {
        $amenities = Amenities::paginate(10);
        return view('admin.hotel.amenities.amenities', compact('amenities'));
    }

    //create amenities
    public function amenitiesCreate(Request $request)
    {
        return view('admin.hotel.amenities.add-amenities');
    }

    //store amenities
    public function amenitiesStore(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'amenity' => 'required',
            'status' => 'required',
        ]);

        DB::beginTransaction();
        try {
            if ($request->hasFile('image')) {
                $validatedData['image'] = parent::uploadImage('admin/uploads/amenity/', $request->file('image'));
            }

            Amenities::create($validatedData);
            DB::commit();

            return redirect()->back()->with('success', 'Amenity Created Successfully..');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error occurred while creating amenity: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    //edit amenities
    public function amenitiesEdit(Request $request, $id)
    {
        $amenities = Amenities::find($id);
        return view('admin.hotel.amenities.edit-amenities', compact('amenities'));
    }

    //update amenities
    public function amenitiesUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'amenity' => 'required',
            'status' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $amenity = Amenities::find($id);
            if ($request->hasFile('image')) {
                if (File::exists(public_path($amenity->image))) {
                    $fileDeleted = File::delete(public_path($amenity->image));
                    // if ($fileDeleted) {
                    $validatedData['image'] = parent::uploadImage('admin/uploads/amenity/', $request->file('image'));
                    // }
                }
            }
            $amenity->update($validatedData);
            DB::commit();

            return redirect()->route('amenities-list')->with('success', 'Amenity Updated Successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error occurred while updating amenity: ' . $e->getMessage());
            return redirect()->route('amenities-list')->with('error', 'Something went wrong. Please try again.');
        }
    }

    //delete amenities
    public function amenitiesDelete($id)
    {
        DB::beginTransaction();
        try {
            $amenity = Amenities::find($id);
            if (!$amenity) {
                return redirect()->route('amenities-list')->with('error', 'Amenity not found.');
            }

            if (File::exists(public_path($amenity->image))) {
                $fileDeleted = File::delete(public_path($amenity->image));
                if ($fileDeleted) {
                    if (!$fileDeleted) {
                        throw new \Exception('Failed to delete image file.');
                    }
                }
            }

            $amenity->delete();
            DB::commit();

            return redirect()->route('amenities-list')->with('success', 'Amenity Deleted Successfully..');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error occurred while deleting amenity: ' . $e->getMessage());
            return redirect()->route('amenities-list')->with('error', 'Something went wrong. Please try again.');
        }
    }

    //status update amenities
    public function amenityAvailable(Request $request)
    {
        if ($request->id && isset($request->newAvailability)) {
            try {
                $date = HotelAmenities::where('amenity_id', $request->id)->where('hotel_id', $request->hotel_id);
                $date->update(['status' => $request->newAvailability]);

                return [
                    'status' => 'success',
                    'msg' => 'Record Updated successfully.',
                ];
            } catch (\Exception $e) {
                return [
                    'status' => 'failed',
                    'msg' => 'Error updating record: ' . $e->getMessage(),
                ];
            }
        } else {
            return [
                'status' => 'failed',
                'msg' => 'Invalid or missing data for update.',
            ];
        }
    }

    //room-facilities list
    public function roomFacility(Request $request)
    {
        $facilities = RoomFacilities::paginate(10);
        return view('admin.hotel.roomFacility.room-facility', compact('facilities'));
    }

    //create room-facilities
    public function createRoomFacility(Request $request)
    {
        return view('admin.hotel.roomFacility.add-room-facility');
    }

    //store room-facilities
    public function storeRoomFacility(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];

        $messages = [
            'name.required' => 'Please enter room facility',
        ];

        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            session()->flash('error', 'Please enter room facility!!');
            return redirect()->back();
        }

        $facility = new RoomFacilities();
        $facility->facility = $request->name;
        $facility->save();

        session()->flash('success', 'Room Facility Add Successfully...');
        return redirect()->back();
    }

    //edit room-facilities
    public function editRoomFacility(Request $request, $id)
    {
        $facility = RoomFacilities::find($id);

        return view('admin.hotel.RoomFacility.edit-room-facility', compact('facility'));
    }

    //update room-facilities
    public function updateRoomFacility(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
        ];

        $messages = [
            'name.required' => 'Please enter room facility',
        ];

        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            session()->flash('error', 'Please enter room facility!!');
            return redirect()->back();
        }

        $facility = RoomFacilities::find($id);
        $facility->facility = $request->name;
        $facility->save();

        session()->flash('success', 'Room Facility Updated Successfully...');
        return redirect()->route('room.facility-list');
    }

    //delete room-facilities
    public function deleteRoomFacility($id)
    {
        $facility = RoomFacilities::find($id);

        if ($facility) {
            $facility->delete();

            session()->flash('success', 'Room Facility deleted successfully');
        } else {
            session()->flash('error', 'Room Facility not found');
        }

        return redirect()->back();
    }




    public function roomBenefit(Request $request)
    {
        $benefits = RoomBenefit::paginate(10);
        return view('admin.hotel.roomBenefits.room-benefits', compact('benefits'));
    }

    public function createRoomBenefit(Request $request)
    {
        return view('admin.hotel.roomBenefits.add-room-benefit');
    }

    public function storeRoomBenefit(Request $request)
    {
        $rules = [
            'name'          => 'required',
        ];

        $messages = [
            'name.required'         => 'Please enter room benefit',
        ];

        $validator = $this->getValidationFactory()
            ->make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            session()->flash('error', 'Please enter room benefit!!');
            return redirect()->back();
        }

        $facility                    = new RoomBenefit();
        $facility->benefit           = $request->name;
        $facility->save();

        session()->flash('success', 'Room Banefit Add Successfully...');
        return redirect()->back();
    }

    public function editRoomBenefit(Request $request, $id)
    {
        $benefit = RoomBenefit::find($id);
        return view('admin.hotel.roomBenefits.edit-room-benefit', compact('benefit'));
    }

    public function updateRoomBenefit(Request $request, $id)
    {
        $rules = [
            'name'          => 'required',
        ];

        $messages = [
            'name.required'         => 'Please enter room benefit',
        ];

        $validator = $this->getValidationFactory()
            ->make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            session()->flash('error', 'Please enter room benefit!!');
            return redirect()->back();
        }
        $facility                    = RoomBenefit::find($id);
        $facility->benefit          = $request->name;
        $facility->save();

        session()->flash('success', 'Room Benefit Updated Successfully...');
        return redirect()->route('room.benefit-list');
    }

    public function deleteRoomBenefit($id)
    {
        $facility = RoomBenefit::find($id);

        if ($facility) {
            $facility->delete();

            session()->flash('success', 'Room Benefit deleted successfully');
        } else {
            session()->flash('error', 'Room Benefit not found');
        }

        return redirect()->back();
    }

    public function getTimingsData(Request $request)
    {
        if ($request->start == '') {
            return [
                'status' => 'start_failed',
                'mesg' => 'Select Start Date!!',
            ];
        }
        if ($request->type == '') {
            return [
                'status' => 'booking_type_failed',
                'mesg' => 'Type not found!!',
            ];
        }

        $timings = DateManagement::whereBetween('date', [$request->start, $request->end])
            ->where('zone', $request->zone)
            ->pluck('time')
            ->unique()
            ->values()
            ->toArray();

        return [
            'status' => 'success',
            'data' => $timings,
        ];
    }

    public function separateAmenityAvailable(Request $request)
    {
        if ($request->hotel_id && isset($request->amenity_id) && isset($request->available) && $request->available == '1') {
            $datas = new HotelAmenities();
            $datas->hotel_id = $request->hotel_id;
            $datas->amenity_id = $request->amenity_id;
            $datas->status = $request->available;
            $datas->save();

            return [
                'status' => 'success',
                'msg' => 'Hotel Amenity Updated Successfully....',
            ];
        } else {
            $datasDelete = HotelAmenities::where('hotel_id', $request->hotel_id)
                ->where('amenity_id', $request->amenity_id)
                ->where('status', '1')
                ->first();
            if ($datasDelete) {
                $datasDelete->delete();
                return [
                    'status' => 'success',
                    'msg' => 'Hotel Amenity Removed Successfully....',
                ];
            } else {
                return [
                    'status' => 'success',
                    'msg' => 'Hotel Amenity Not Found..',
                ];
            }
        }
    }
}
