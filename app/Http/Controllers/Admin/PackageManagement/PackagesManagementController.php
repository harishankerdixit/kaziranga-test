<?php

namespace App\Http\Controllers\Admin\PackageManagement;

use App\Http\Controllers\Controller;
use App\Models\Exclusion;
use App\Models\Feature;
use App\Models\Hotel;
use App\Models\Inclusion;
use App\Models\Package;
use App\Models\PackageCancellationPolicy;
use App\Models\PackageCategory;
use App\Models\PackageCategoryHotel;
use App\Models\PackageExclusion;
use App\Models\PackageFeature;
use App\Models\PackageFestivalDates;
use App\Models\PackageForeignerOptions;
use App\Models\PackageInclusion;
use App\Models\PackageIndianOption;
use App\Models\PackageItineraries;
use App\Models\PackagePaymentPolicy;
use App\Models\PackageTerms;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as Image;

class PackagesManagementController extends Controller
{
    public function index(Request $request)
    {
        $query = Package::where('status', true)->with('features', 'inclusions', 'exclusions', 'categories', 'available_categories', 'iternaries', 'bookingPackages');

        $package_name = $request->input('package_name');
        $package_rating = $request->input('package_rating');
        $availability = $request->input('availability');

        if ($request->filled('package_name')) {
            $query->where('name', 'like', '%' . $request->input('package_name') . '%');
        }
        if ($request->filled('package_rating')) {
            $query->where('rating', $request->input('package_rating'));
        }
        if ($request->filled('availability')) {
            $query->where('status', $request->input('availability'));
        }

        $packages = $query->orderBy('id', 'desc')->paginate(5);

        return view('admin.package.package', compact('packages', 'package_name', 'package_rating', 'availability'));
    }

    public function createPackage(Request $request)
    {
        return view('admin.package.add-package');
    }

    public function storePackage(Request $request)
    {
        $rules = [
            'name' => 'required',
            'price' => 'required',
            'rating' => 'required',
            'description' => 'required',
            'availability' => 'required',
        ];

        $messages = [
            'name.required' => 'Please enter Package Name',
            'price.required' => 'Please enter Price',
            'rating.required' => 'Please Select Rating',
            'description.required' => 'Please write 2-3 lines about Package',
            'availability.required' => 'Please Select Availability',
        ];

        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $package = new Package();
        $package->name = $request->name;
        $package->price = $request->price;
        $package->rating = $request->rating;
        $package->description = $request->description;
        $package->meta_title = $request->meta_title;
        $package->meta_description = $request->meta_description;
        $package->homepage = $request->homepage;
        $package->status = $request->availability;
        $package->slug = Str::slug($request->name);
        if ($request->hasFile('image')) {
            $directory = 'admin/uploads/packages/' . $package['slug'] . '/';
            $package['image'] = parent::uploadImage($directory, $request->file('image'));
        }
        $package->save();

        return redirect()->back()->with('success', 'Package Created Successfully..');
    }

    public function editPackage($id)
    {
        $package = Package::find($id);
        return view('admin.package.edit-package', compact('package'));
    }

    public function updatePackage(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'price' => 'required',
            'rating' => 'required',
            'description' => 'required',
            'availability' => 'required',
        ];

        $messages = [
            'name.required' => 'Please enter Package Name',
            'price.required' => 'Please enter Price',
            'rating.required' => 'Please Select Rating',
            'description.required' => 'Please write 2-3 lines about Package',
            'availability.required' => 'Please Select Availability',
        ];

        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $package = Package::find($id);
        $package->name = $request->name;
        $package->price = $request->price;
        $package->rating = $request->rating;
        $package->description = $request->description;
        $package->meta_title = $request->meta_title;
        $package->meta_description = $request->meta_description;
        $package->homepage = $request->homepage;
        $package->status = $request->availability;
        $package->slug = Str::slug($request->name);

        if ($request->hasFile('image')) {
            if (File::exists(public_path($package->image))) {
                $fileDeleted = File::delete(public_path($package->image));
                // if ($fileDeleted) {
                    $directory = 'admin/uploads/packages/' . $package['slug'] . '/';
                    $package['image'] = parent::uploadImage($directory, $request->file('image'));
                // }
            }
        }
        $package->save();

        return redirect()->route('package-list')->with('success', 'Package Updated Successfully..');
    }

    public function updatePackageStatus(Request $request)
    {
        if ($request->id && isset($request->newAvailability)) {
            try {
                $date = Package::findOrFail($request->id);
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

    public function deletePackage($id)
    {
        $date = Package::find($id);

        if ($date) {
            $date->delete();

            session()->flash('success', 'Package deleted successfully');
        } else {
            session()->flash('error', 'Package not found');
        }

        return redirect()->back();
    }

    //Package Features
    public function packageFeaturesList(Request $request, $id)
    {
        $package_id = $id;
        $features = PackageFeature::with('feature')->where('package_id', $id)->paginate(10);
        $getFeaturesId = $features->pluck('feature_id')->toArray();
        $UpdateFeature = Feature::get()->toArray();
        return view('admin.package.package-features.package-feature', compact('features', 'package_id', 'UpdateFeature', 'getFeaturesId'));
    }

    //Package Inclusions
    public function packageInclusionList(Request $request, $id)
    {
        $package_id = $id;
        $inclusions = PackageInclusion::with('inclusion')->where('package_id', $id)->paginate(10);
        $getinclusionsId = $inclusions->pluck('inclusion_id')->toArray();
        $UpdateInclusion = Inclusion::get()->toArray();
        return view('admin.package.package-inclusions.package-inclusion', compact('inclusions', 'package_id', 'UpdateInclusion', 'getinclusionsId'));
    }

    //Package Exclusions
    public function packageExclusionList(Request $request, $id)
    {
        $package_id = $id;
        $exclusions = PackageExclusion::with('exclusion')->where('package_id', $id)->paginate(10);
        $getexclusionsId = $exclusions->pluck('exclusion_id')->toArray();
        $UpdateExclusion = Exclusion::get()->toArray();
        return view('admin.package.package-exclusions.package-exclusion', compact('exclusions', 'package_id', 'UpdateExclusion', 'getexclusionsId'));
    }

    //Package Iternary
    public function packageIternaryList(Request $request, $id)
    {
        $package_id = $id;
        $iternaries = PackageItineraries::with('iternary')->where('package_id', $id)->paginate(10);

        return view('admin.package.package-iternary.package-iternary', compact('iternaries', 'package_id'));
    }

    public function packageIternaryStore(Request $request, $package_id)
    {
        try {
            $packageIternaries = $request->input('iternaries');

            PackageItineraries::where('package_id', $package_id)->delete();

            foreach ($packageIternaries as $iternary) {
                PackageItineraries::create([
                    'package_id' => $package_id,
                    'title' => $iternary['title'],
                    'content' => $iternary['content'],
                ]);
            }

            return redirect()->back()->with('success', 'Iternaries saved successfully!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Error saving iternaries. ' . $e->getMessage());
        }
    }

    //Package Category
    public function packageCategoryList(Request $request, $id)
    {
        $package_id = $id;
        $PackageCategory = PackageCategory::where('package_id', $package_id)->paginate(10);
        return view('admin.package.package-category.package-category', compact('PackageCategory', 'package_id'));
    }

    public function createPackageCategory($id)
    {
        $package_id = $id;
        $UpdateFeature = Hotel::select('id', 'name')->get()->toArray();
        return view('admin.package.package-category.package-category-add', compact('UpdateFeature', 'package_id'));
    }

    public function storePackageCategory(Request $request, $package_id)
    {
        $rules = [
            'category' => 'required',
            'hotels' => 'required',
        ];

        $messages = [
            'category.required' => 'Please enter Category',
            'hotels.required' => 'Please select Hotels',
        ];

        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'validation_errors' => $validator->messages(),
            ]);
        }

        $category = new PackageCategory();
        $category->package_id = $package_id;
        $category->category = $request->category;
        $category->save();
        if (is_array($request->hotels) && !empty($request->hotels)) {
            foreach ($request->hotels as $key => $value) {
                $category_hotel = new PackageCategoryHotel();
                $category_hotel->package_id = $package_id;
                $category_hotel->category_id = $category->id;
                $category_hotel->hotel_id = $value;
                $category_hotel->save();
            }
        }
        if (is_array($request->indian) && !empty($request->indian)) {
            foreach ($request->indian as $key => $value) {
                $indian_option = new PackageIndianOption();
                $indian_option->package_id = $package_id;
                $indian_option->category_id = $category->id;
                $indian_option->price = $value['price'];
                $indian_option->extra_bed_ch = $value['extra_bed_ch'];
                $indian_option->extra_beds = $value['extra_beds'];
                $indian_option->fes_ad_price = $value['fes_ad_price'];
                $indian_option->fes_ch_price = $value['fes_ch_price'];
                $indian_option->fes_room_price = $value['fes_room_price'];
                $indian_option->s_de_price = $value['s_de_price'];
                $indian_option->s_fe_price = $value['s_fe_price'];
                $indian_option->s_we_price = $value['s_we_price'];
                $indian_option->save();
            }
        }

        if (is_array($request->foreigner) && !empty($request->foreigner)) {
            foreach ($request->foreigner as $key => $value) {
                $foreigner_option = new PackageForeignerOptions();
                $foreigner_option->package_id = $package_id;
                $foreigner_option->category_id = $category->id;
                $foreigner_option->price = $value['price'];
                $foreigner_option->extra_bed_ch = $value['extra_bed_ch'];
                $foreigner_option->extra_beds = $value['extra_beds'];
                $foreigner_option->fes_ad_price = $value['fes_ad_price'];
                $foreigner_option->fes_ch_price = $value['fes_ch_price'];
                $foreigner_option->fes_room_price = $value['fes_room_price'];
                $foreigner_option->s_de_price = $value['s_de_price'];
                $foreigner_option->s_fe_price = $value['s_fe_price'];
                $foreigner_option->s_we_price = $value['s_we_price'];
                $foreigner_option->save();
            }
        }

        session()->flash('success', 'Package Category added successfully');
        return redirect()->back();
    }

    public function editPackageCategory($id)
    {
        $category_id = $id;
        $categories = PackageCategory::find($category_id);
        $package_id = $categories->package_id;
        $package_indian_option = PackageIndianOption::where('package_id', $package_id)->where('category_id', $category_id)->get()->toArray();
        $package_foreigner_option = PackageForeignerOptions::where('package_id', $package_id)->where('category_id', $category_id)->get()->toArray();
        $hotels = PackageCategoryHotel::where('category_id', $category_id)->where('package_id', $package_id)->paginate(10);
        $getCategoryId = $hotels->pluck('hotel_id')->toArray();
        $UpdateFeature = Hotel::select('id', 'name')->get()->toArray();
        return view('admin.package.package-category.package-category-edit', compact('category_id', 'categories', 'UpdateFeature', 'package_indian_option', 'package_foreigner_option', 'getCategoryId', 'package_id'));
    }

    public function updatePackageCategory(Request $request, $id)
    {
        $rules = [
            'category' => 'required',
            'hotels' => 'required',
        ];

        $messages = [
            'category.required' => 'Please enter Category',
            'hotels.required' => 'Please select Hotels',
        ];

        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'validation_errors' => $validator->messages(),
            ]);
        }

        $category = PackageCategory::find($id);
        $category->package_id = $category->package_id;
        $category->category = $request->category;
        $category->save();

        PackageCategoryHotel::where('category_id', $id)->delete();
        if (is_array($request->hotels) && !empty($request->hotels)) {
            foreach ($request->hotels as $key => $value) {
                $category_hotel = new PackageCategoryHotel();
                $category_hotel->package_id = $category->package_id;
                $category_hotel->category_id = $id;
                $category_hotel->hotel_id = $value;
                $category_hotel->save();
            }
        }
        PackageIndianOption::where('category_id', $id)->delete();
        if (is_array($request->indian) && !empty($request->indian)) {
            foreach ($request->indian as $key => $value) {
                $indian_option = new PackageIndianOption();
                $indian_option->package_id = $category->package_id;
                $indian_option->category_id = $id;
                $indian_option->price = $value['price'];
                $indian_option->extra_bed_ch = $value['extra_bed_ch'];
                $indian_option->extra_beds = $value['extra_beds'];
                $indian_option->fes_ad_price = $value['fes_ad_price'];
                $indian_option->fes_ch_price = $value['fes_ch_price'];
                $indian_option->fes_room_price = $value['fes_room_price'];
                $indian_option->s_de_price = $value['s_de_price'];
                $indian_option->s_fe_price = $value['s_fe_price'];
                $indian_option->s_we_price = $value['s_we_price'];
                $indian_option->save();
            }
        }
        PackageForeignerOptions::where('category_id', $id)->delete();
        if (is_array($request->foreigner) && !empty($request->foreigner)) {
            foreach ($request->foreigner as $key => $value) {
                $foreigner_option = new PackageForeignerOptions();
                $foreigner_option->package_id = $category->package_id;
                $foreigner_option->category_id = $id;
                $foreigner_option->price = $value['price'];
                $foreigner_option->extra_bed_ch = $value['extra_bed_ch'];
                $foreigner_option->extra_beds = $value['extra_beds'];
                $foreigner_option->fes_ad_price = $value['fes_ad_price'];
                $foreigner_option->fes_ch_price = $value['fes_ch_price'];
                $foreigner_option->fes_room_price = $value['fes_room_price'];
                $foreigner_option->s_de_price = $value['s_de_price'];
                $foreigner_option->s_fe_price = $value['s_fe_price'];
                $foreigner_option->s_we_price = $value['s_we_price'];
                $foreigner_option->save();
            }
        }

        // return response()->json([
        //     'status' => 200,
        //     'category' => $category,
        // ]);
        session()->flash('success', 'Package Category Updated Successfully');
        return redirect()->back();
    }

    public function deletePackageCategory($id)
    {
        $date = PackageCategory::find($id);

        if ($date) {
            $date->delete();

            session()->flash('success', 'Package Category deleted successfully');
        } else {
            session()->flash('error', 'Package Category not found');
        }

        return redirect()->back();
    }


    //Features
    public function featuresList(Request $request)
    {
        $features = Feature::paginate(10);

        return view('admin.package.features.features', compact('features'));
    }

    public function createFeatures(Request $request)
    {
        return view('admin.package.features.add-feature');
    }

    public function storeFeatures(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];

        $messages = [
            'name.required' => 'Please enter feature name',
        ];

        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            session()->flash('error', 'All fields are required!!');
            return redirect()->back();
        }

        $feature = new Feature();
        $feature->name = $request->name;
        if ($request->hasFile('image')) {
            $feature->image = parent::uploadImage('admin/uploads/package-feature/', $request->file('image'));
        }
        $feature->save();

        return redirect()->back()->with('success', 'Feature Created Successfully..');
    }

    public function editFeatures(Request $request, $id)
    {
        $date = Feature::find($id);
        $feature = $date->name;
        $image = $date->image;

        return view('admin.package.features.feature-edit', compact('feature', 'id', 'image'));
    }

    public function updateFeatures(Request $request, $id)
    {
        $feature = Feature::find($id);
        $feature->name = $request->name;
        if ($request->hasFile('image')) {
            if (File::exists(public_path($feature->image))) {
                $fileDeleted = File::delete(public_path($feature->image));
                // if ($fileDeleted) {
                    $feature->image = parent::uploadImage('admin/uploads/package-feature/', $request->file('image'));
                // }
            }
        }
        $feature->save();

        session()->flash('success', 'Feature updated successfully..');

        return redirect()->route('feature.list.view');
    }

    public function deleteFeatures($id)
    {
        $date = Feature::find($id);

        if ($date) {
            $date->delete();

            session()->flash('success', 'Feature deleted successfully');
        } else {
            session()->flash('error', 'Feature not found');
        }

        return redirect()->back();
    }

    //Inclusion
    public function inclusionList(Request $request)
    {
        $features = Inclusion::paginate(10);

        return view('admin.package.inclusions.inclusion', compact('features'));
    }

    public function createInclusion(Request $request)
    {
        return view('admin.package.inclusions.add-inclusion');
    }

    public function storeInclusion(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];

        $messages = [
            'name.required' => 'Please enter inclusion name',
        ];

        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            session()->flash('error', 'All fields are required!!');
            return redirect()->back();
        }

        $feature = new Inclusion();
        $feature->description = $request->name;

        $feature->save();

        return redirect()->back()->with('success', 'Inclusion Created Successfully..');
    }

    public function editInclusion(Request $request, $id)
    {
        $date = Inclusion::find($id);
        $feature = $date->description;

        return view('admin.package.inclusions.inclusion-edit', compact('feature', 'id'));
    }

    public function updateInclusion(Request $request, $id)
    {
        $date = Inclusion::find($id);
        $date->description = $request->description;
        $date->save();

        session()->flash('success', 'Inclusion updated successfully..');

        return redirect()->route('inclusion.list.view');
    }

    public function deleteInclusion($id)
    {
        $date = Inclusion::find($id);

        if ($date) {
            $date->delete();

            session()->flash('success', 'Inclusion deleted successfully');
        } else {
            session()->flash('error', 'Inclusion not found');
        }

        return redirect()->back();
    }

    //Exclusions
    public function exclusionList(Request $request)
    {
        $features = Exclusion::paginate(10);

        return view('admin.package.exclusions.exclusion', compact('features'));
    }

    public function createExclusion(Request $request)
    {
        return view('admin.package.exclusions.add-exclusion');
    }

    public function storeExclusion(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];

        $messages = [
            'name.required' => 'Please enter exclusion name',
        ];

        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            session()->flash('error', 'All fields are required!!');
            return redirect()->back();
        }

        $feature = new Exclusion();
        $feature->description = $request->name;

        $feature->save();

        return redirect()->back()->with('success', 'Exclusion Created Successfully..');
    }

    public function editExclusion(Request $request, $id)
    {
        $date = Exclusion::find($id);
        $feature = $date->description;

        return view('admin.package.exclusions.exclusion-edit', compact('feature', 'id'));
    }

    public function updateExclusion(Request $request, $id)
    {
        $date = Exclusion::find($id);
        $date->description = $request->description;
        $date->save();

        session()->flash('success', 'Exclusion updated successfully..');

        return redirect()->route('exclusion.list.view');
    }

    public function deleteExclusion($id)
    {
        $date = Exclusion::find($id);

        if ($date) {
            $date->delete();

            session()->flash('success', 'Exclusion deleted successfully');
        } else {
            session()->flash('error', 'Exclusion not found');
        }

        return redirect()->back();
    }


    //package-terms
    public function termsList(Request $request)
    {
        $features = PackageTerms::paginate(10);
        return view('admin.package.package-terms.terms', compact('features'));
    }

    public function createTerms(Request $request)
    {
        return view('admin.package.package-terms.terms-add');
    }

    public function storeTerms(Request $request)
    {
        $date = new PackageTerms();
        $date->description = $request->description;
        $date->save();

        session()->flash('success', 'Terms Added successfully..');

        return redirect()->back();
    }

    public function editTerms(Request $request, $id)
    {
        $date = PackageTerms::find($id);
        $feature = $date->description;
        return view('admin.package.package-terms.terms-edit', compact('feature', 'id'));
    }

    public function updateTerms(Request $request, $id)
    {
        $date = PackageTerms::find($id);
        $date->description = $request->description;
        $date->save();

        session()->flash('success', 'Terms updated successfully..');

        return redirect()->route('terms.list.view');
    }

    public function deleteTerms($id)
    {
        $date = PackageTerms::find($id);

        if ($date) {
            $date->delete();

            session()->flash('success', 'Terms deleted successfully');
        } else {
            session()->flash('error', 'Terms not found');
        }

        return redirect()->back();
    }


    //payment-policy
    public function paymentPolicyList(Request $request)
    {
        $features = PackagePaymentPolicy::paginate(10);

        return view('admin.package.payment-policy.payment-policy', compact('features'));
    }

    public function createPaymentPolicy(Request $request)
    {
        return view('admin.package.payment-policy.payment-policy-add');
    }

    public function storePaymentPolicy(Request $request)
    {
        $date = new PackagePaymentPolicy();
        $date->description = $request->description;
        $date->save();

        session()->flash('success', 'Payment Policy Added successfully..');

        return redirect()->back();
    }

    public function editPaymentPolicy(Request $request, $id)
    {
        $date = PackagePaymentPolicy::find($id);
        $feature = $date->description;

        return view('admin.package.payment-policy.payment-policy-edit', compact('feature', 'id'));
    }

    public function updatePaymentPolicy(Request $request, $id)
    {
        $date = PackagePaymentPolicy::find($id);
        $date->description = $request->description;
        $date->save();

        session()->flash('success', 'Payment Policy updated successfully..');

        return redirect()->route('paymentpolicy.list.view');
    }

    public function deletePaymentPolicy($id)
    {
        $date = PackagePaymentPolicy::find($id);

        if ($date) {
            $date->delete();

            session()->flash('success', 'Payment Policy deleted successfully');
        } else {
            session()->flash('error', 'Payment Policy not found');
        }

        return redirect()->back();
    }


    //Package Cancellation Policy
    public function cancellationPolicyList(Request $request)
    {
        $features = PackageCancellationPolicy::paginate(10);

        return view('admin.package.cancellation-policy.cancellation-policy', compact('features'));
    }

    public function createCancellationPolicy(Request $request)
    {
        return view('admin.package.cancellation-policy.cancellation-policy-add');
    }

    public function storeCancellationPolicy(Request $request)
    {
        $date = new PackageCancellationPolicy();
        $date->description = $request->description;
        $date->save();

        session()->flash('success', 'Cancellation Policy Added successfully..');

        return redirect()->back();
    }

    public function editCancellationPolicy(Request $request, $id)
    {
        $date = PackageCancellationPolicy::find($id);
        $feature = $date->description;

        return view('admin.package.cancellation-policy.cancellation-policy-edit', compact('feature', 'id'));
    }

    public function updateCancellationPolicy(Request $request, $id)
    {
        $date = PackageCancellationPolicy::find($id);
        $date->description = $request->description;
        $date->save();

        session()->flash('success', 'Cancellation Policy updated successfully..');

        return redirect()->route('cancellationpolicy.list.view');
    }

    public function deleteCancellationPolicy($id)
    {
        $date = PackageCancellationPolicy::find($id);

        if ($date) {
            $date->delete();

            session()->flash('success', 'Cancellation Policy deleted successfully');
        } else {
            session()->flash('error', 'Cancellation Policy not found');
        }

        return redirect()->back();
    }


    //Package Festival Date
    public function packageFestivalDatesList(Request $request)
    {
        $features = PackageFestivalDates::where('type', 'festival')->paginate(10);

        return view('admin.package.package-festival-dates.package-festival-dates', compact('features'));
    }

    public function createPackageFestivalDates(Request $request)
    {
        return view('admin.package.package-festival-dates.package-festival-dates-add');
    }

    public function storePackageFestivalDates(Request $request)
    {
        $date = new PackageFestivalDates();
        $date->type = 'festival';
        $date->start = $request->start;
        $date->end = $request->end;
        $date->save();

        session()->flash('success', 'Package Festival Date Added successfully..');

        return redirect()->back();
    }

    public function editPackageFestivalDates(Request $request, $id)
    {
        $date = PackageFestivalDates::where('type', 'festival')->where('id', $id)->get()->toArray();
        $start = $date[0]['start'];
        $end = $date[0]['end'];

        return view('admin.package.package-festival-dates.package-festival-dates-edit', compact('start', 'end', 'id'));
    }

    public function updatePackageFestivalDates(Request $request, $id)
    {
        $date = PackageFestivalDates::where('type', 'festival')->find($id);
        $date->start = $request->start;
        $date->end = $request->end;
        $date->save();

        session()->flash('success', 'Package Festival Date updated successfully..');

        return redirect()->route('packagefestivaldates.list.view');
    }

    public function deletePackageFestivalDates($id)
    {
        $date = PackageFestivalDates::where('type', 'festival')->where('id', $id);

        if ($date) {
            $date->delete();

            session()->flash('success', 'Package Festival Date deleted successfully');
        } else {
            session()->flash('error', 'Package Festival Date not found');
        }

        return redirect()->back();
    }


    //Package Block Dates
    public function packageBlockDatesList(Request $request)
    {
        $features = PackageFestivalDates::where('type', 'blocked')->paginate(10);

        return view('admin.package.package-block-dates.package-block-dates', compact('features'));
    }

    public function createPackageBlockDates(Request $request)
    {
        return view('admin.package.package-block-dates.package-block-dates-add');
    }

    public function storePackageBlockDates(Request $request)
    {
        $date = new PackageFestivalDates();
        $date->type = 'blocked';
        $date->start = $request->start;
        $date->end = $request->end;
        $date->save();

        session()->flash('success', 'Package Block Dates Added successfully..');

        return redirect()->back();
    }

    public function editPackageBlockDates(Request $request, $id)
    {
        $date = PackageFestivalDates::where('type', 'blocked')->where('id', $id)->get()->toArray();
        $start = $date[0]['start'];
        $end = $date[0]['end'];

        return view('admin.package.package-block-dates.package-block-dates-edit', compact('start', 'end', 'id'));
    }

    public function updatePackageBlockDates(Request $request, $id)
    {
        $date = PackageFestivalDates::where('type', 'blocked')->find($id);
        $date->start = $request->start;
        $date->end = $request->end;
        $date->save();

        session()->flash('success', 'Package Block Dates updated successfully..');

        return redirect()->route('packageblockdates.list.view');
    }

    public function deletePackageBlockDates($id)
    {
        $date = PackageFestivalDates::where('type', 'blocked')->where('id', $id);

        if ($date) {
            $date->delete();

            session()->flash('success', 'Package Block Dates deleted successfully');
        } else {
            session()->flash('error', 'Package Block Dates not found');
        }

        return redirect()->back();
    }














    public function featureAvailable(Request $request)
    {
        if ($request->id && isset($request->newAvailability)) {
            try {
                $date = PackageFeature::where('feature_id', $request->id)->where('package_id', $request->package_id);
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

    public function separateFeatureAvailable(Request $request)
    {
        if ($request->package_id && isset($request->feature_id) && isset($request->available) && $request->available == '1') {
            $getDescription = Feature::select('name')
                ->where('id', $request->feature_id)
                ->get()
                ->toArray();
            $datas = new PackageFeature();
            $datas->package_id = $request->package_id;
            $datas->feature_id = $request->feature_id;
            $datas->description = $getDescription[0]['name'];
            $datas->status = $request->available;
            $datas->save();

            return [
                'status' => 'success',
                'msg' => 'Package feature Updated Successfully....',
            ];
        } else {
            $datasDelete = PackageFeature::where('package_id', $request->package_id)
                ->where('feature_id', $request->feature_id)
                ->where('status', '1')
                ->first();
            if ($datasDelete) {
                $datasDelete->delete();
                return [
                    'status' => 'success',
                    'msg' => 'Package Feature Removed Successfully....',
                ];
            } else {
                return [
                    'status' => 'success',
                    'msg' => 'Package Feature Not Found..',
                ];
            }
        }
    }

    public function inclusionAvailable(Request $request)
    {
        if ($request->id && isset($request->newAvailability)) {
            try {
                $date = PackageInclusion::where('inclusion_id', $request->id)->where('package_id', $request->package_id);
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

    public function separateinclusionAvailable(Request $request)
    {
        if ($request->package_id && isset($request->inclusion_id) && isset($request->available) && $request->available == '1') {
            $getDescription = Inclusion::select('description')
                ->where('id', $request->inclusion_id)
                ->get()
                ->toArray();
            $datas = new PackageInclusion();
            $datas->package_id = $request->package_id;
            $datas->inclusion_id = $request->inclusion_id;
            $datas->description = $getDescription[0]['description'];
            $datas->status = $request->available;
            $datas->save();

            return [
                'status' => 'success',
                'msg' => 'Package Inclusion Updated Successfully....',
            ];
        } else {
            $datasDelete = PackageInclusion::where('package_id', $request->package_id)
                ->where('inclusion_id', $request->inclusion_id)
                ->where('status', '1')
                ->first();
            if ($datasDelete) {
                $datasDelete->delete();
                return [
                    'status' => 'success',
                    'msg' => 'Package Inclusion Removed Successfully....',
                ];
            } else {
                return [
                    'status' => 'success',
                    'msg' => 'Package Inclusion Not Found..',
                ];
            }
        }
    }

    public function exclusionAvailable(Request $request)
    {
        if ($request->id && isset($request->newAvailability)) {
            try {
                $date = PackageExclusion::where('exclusion_id', $request->id)->where('package_id', $request->package_id);
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

    public function separateexclusionAvailable(Request $request)
    {
        if ($request->package_id && isset($request->exclusion_id) && isset($request->available) && $request->available == '1') {
            $getDescription = Exclusion::select('description')
                ->where('id', $request->exclusion_id)
                ->get()
                ->toArray();
            $datas = new PackageExclusion();
            $datas->package_id = $request->package_id;
            $datas->exclusion_id = $request->exclusion_id;
            $datas->description = $getDescription[0]['description'];
            $datas->status = $request->available;
            $datas->save();

            return [
                'status' => 'success',
                'msg' => 'Package Exclusion Updated Successfully....',
            ];
        } else {
            $datasDelete = PackageExclusion::where('package_id', $request->package_id)
                ->where('exclusion_id', $request->exclusion_id)
                ->where('status', '1')
                ->first();
            if ($datasDelete) {
                $datasDelete->delete();
                return [
                    'status' => 'success',
                    'msg' => 'Package Exclusion Removed Successfully....',
                ];
            } else {
                return [
                    'status' => 'success',
                    'msg' => 'Package Exclusion Not Found..',
                ];
            }
        }
    }

    public function packageCategoryAvailable(Request $request)
    {
        if ($request->id && isset($request->newAvailability)) {
            try {
                $date = PackageCategory::findOrFail($request->id);
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


    public function separateCategoryAvailable(Request $request)
    {
        if ($request->package_id && isset($request->hotel_id) && isset($request->category_id) && isset($request->available) && $request->available == '1') {
            $datas = new PackageCategoryHotel();
            $datas->package_id = $request->package_id;
            $datas->hotel_id = $request->hotel_id;
            $datas->category_id = $request->category_id;
            $datas->save();

            return [
                'status' => 'success',
                'msg' => 'Package category Updated Successfully....',
            ];
        } else {
            // $datasDelete = PackageCategoryHotel::where('package_id',$request->package_id)->where('category_id',$request->category_id)->where('hotel_id',$request->hotel_id)->first();
            // PackageCategoryHotel::destroy([$request->package_id, $request->category_id, $request->hotel_id]);
            // if ($datasDelete) {
            //     $datasDelete->delete();
            PackageCategoryHotel::where('category_id', $request->category_id)->delete();
            PackageIndianOption::where('category_id', $request->category_id)->delete();
            PackageForeignerOptions::where('category_id', $request->category_id)->delete();
            PackageCategory::find($request->category_id)->delete();
            return [
                'status' => 'success',
                'msg' => 'Package category Removed Successfully....',
                'package_id' => $request->package_id,
                'type' => 'Delete',
            ];
            // }
            //  else {
            //     return array(
            //         'status' => 'success',
            //         'msg' => 'Package category Not Found..'
            //     );
            // }
        }
    }
}
