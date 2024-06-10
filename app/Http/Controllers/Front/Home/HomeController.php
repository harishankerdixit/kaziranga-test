<?php

namespace App\Http\Controllers\Front\Home;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageCategoryHotel;
use App\Models\PackageForeignerOptions;
use App\Models\PackageIndianOption;
use App\Models\PageManagement;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        try {
            // $homepage = PageManagement::where('type', 'home')->first();
            // $packages = Package::where('status', 1)->get();
            // $latestNews = Setting::where('type', 'news')->first();
            // $latestNews['image'] = "admin/auth/" . $latestNews->image;
            // return view('front.home.index', compact('homepage', 'packages', 'latestNews'));
            return view('front.home.index',);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }


    public function getHotelImages(Request $request)
    {
        $data = PackageCategoryHotel::with(['hotel' => function ($query) {
            return $query->select('package_image', 'id', 'name');
        }])->where('package_id', $request->package_id)->where('category_id', $request->category_id)->get();
        $data = $data ? $data->toArray() :  [];
        return json_encode(['status' => "success", "data" => $data]);
    }

    public function corbettPackageOption(Request $req)
    {
        if ($req->type == "indian") {
            $package  = PackageIndianOption::where('category_id', $req->category_id)->where('package_id', $req->package_id)->get();
        } else {
            $package  = PackageForeignerOptions::where('category_id', $req->category_id)->where('package_id', $req->package_id)->get();
        }
        $package  = $package ? $package->toArray() : [];
        // echo "<pre/>";print_r($package);
        return json_encode(['status' => "success", "data" => $package]);
    }

    public function cancellationPolicy(Request $request)
    {
        $cancellation = PageManagement::Where('type','cancellation')->first();

        return view('front.footer.cancellation-policy',compact('cancellation'));
    }
}