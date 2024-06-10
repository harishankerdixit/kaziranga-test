<?php

namespace App\Http\Controllers\Admin\PageManagement;

use App\Http\Controllers\Controller;
use App\Models\LongWeekend;
use App\Models\PageBuilders;
use App\Models\PageManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Image;

class PageManagementController extends Controller
{
    public function homeIndex(Request $request)
    {
        $home_page = PageManagement::where('type', 'home')->first();
        $home_page->path = isset($home_page->image) ? asset('/admin/page-management/' . $home_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.home', compact('home_page'));
    }

    public function homeStore(Request $request)
    {
        $home_page_exists = PageManagement::where('type', 'home')->exists();
        if ($home_page_exists) {
            PageManagement::where('type', 'home')->update([
                'title' => $request->title,
                'banner_image_alt' => $request->banner_image_alt,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'section_1' => $request->section_1,
                'section_2' => $request->section_2,
                'section_3' => $request->section_3,
                'section_4' => $request->section_4,
                'section_5' => $request->section_5,
                'section_6' => $request->section_6,
                'section_7' => $request->section_7,
                'section_8' => $request->section_8,
                'section_9' => $request->section_9,
                'section_10' => $request->section_10,
            ]);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'home' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'home' . '_')) {
                        File::delete($file);
                    }
                }

                Image::make($image->getRealPath())->save($path);

                PageManagement::where('type', 'home')->update(['image' => $filename]);
            }
        } else {
            $home_page = new PageManagement();
            $home_page->type = 'home';
            $home_page->title = $request->title;
            $home_page->banner_image_alt = $request->banner_image_alt;
            $home_page->meta_title = $request->meta_title;
            $home_page->meta_description = $request->meta_description;
            $home_page->section_1 = $request->section_1;
            $home_page->section_2 = $request->section_2;
            $home_page->section_3 = $request->section_3;
            $home_page->section_4 = $request->section_4;
            $home_page->section_5 = $request->section_5;
            $home_page->section_6 = $request->section_6;
            $home_page->section_7 = $request->section_7;
            $home_page->section_8 = $request->section_8;
            $home_page->section_9 = $request->section_9;
            $home_page->section_10 = $request->section_10;

            $home_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'home' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $home_page->image = $filename;
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $home_page->save();
            }
        }
        return redirect()->route('page.mangement.home.index')->with('success', 'Home Page updated successfully');
    }

    public function jungleIndex(Request $request)
    {
        $jungle_page = PageManagement::where('type', 'jungle')->first();
        $jungle_page->path = isset($jungle_page->image) ? asset('/admin/page-management/' . $jungle_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.jungle', compact('jungle_page'));
    }

    public function jungleStore(Request $request)
    {
        $jungle_page_exists = PageManagement::where('type', 'jungle')->exists();
        if ($jungle_page_exists) {
            PageManagement::where('type', 'jungle')->update([
                'title' => $request->title,
                'banner_image_alt' => $request->banner_image_alt,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'section_1' => $request->section_1,
                'section_2' => $request->section_2,
                'section_3' => $request->section_3,
                'section_4' => $request->section_4,
                'section_5' => $request->section_5,
                'section_6' => $request->section_6,
                'section_7' => $request->section_7,
                'section_8' => $request->section_8,
                'section_9' => $request->section_9,
                'section_10' => $request->section_10,
            ]);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'jungle' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'jungle' . '_')) {
                        File::delete($file);
                    }
                }

                Image::make($image->getRealPath())->save($path);

                PageManagement::where('type', 'jungle')->update(['image' => $filename]);
            }
        } else {
            $jungle_page = new PageManagement();
            $jungle_page->type = 'jungle';
            $jungle_page->title = $request->title;
            $jungle_page->banner_image_alt = $request->banner_image_alt;
            $jungle_page->meta_title = $request->meta_title;
            $jungle_page->meta_description = $request->meta_description;
            $jungle_page->section_1 = $request->section_1;
            $jungle_page->section_2 = $request->section_2;
            $jungle_page->section_3 = $request->section_3;
            $jungle_page->section_4 = $request->section_4;
            $jungle_page->section_5 = $request->section_5;
            $jungle_page->section_6 = $request->section_6;
            $jungle_page->section_7 = $request->section_7;
            $jungle_page->section_8 = $request->section_8;
            $jungle_page->section_9 = $request->section_9;
            $jungle_page->section_10 = $request->section_10;

            $jungle_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'jungle' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $jungle_page->image = $filename;
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $jungle_page->save();
            }
            $jungle_page->save();
        }
        return redirect()->route('page.mangement.jungle.index')->with('success', 'Jungle Page updated successfully');
    }

    public function devaliaIndex(Request $request)
    {
        $devalia_page = PageManagement::where('type', 'devalia')->first();
        $devalia_page->path = isset($devalia_page->image) ? asset('/admin/page-management/' . $devalia_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.devalia', compact('devalia_page'));
    }

    public function devaliaStore(Request $request)
    {
        $devalia_page_exists = PageManagement::where('type', 'devalia')->exists();
        if ($devalia_page_exists) {
            PageManagement::where('type', 'devalia')->update([
                'title' => $request->title,
                'banner_image_alt' => $request->banner_image_alt,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'section_1' => $request->section_1,
                'section_2' => $request->section_2,
                'section_3' => $request->section_3,
                'section_4' => $request->section_4,
                'section_5' => $request->section_5,
                'section_6' => $request->section_6,
                'section_7' => $request->section_7,
                'section_8' => $request->section_8,
                'section_9' => $request->section_9,
                'section_10' => $request->section_10,
            ]);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'devalia' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'devalia' . '_')) {
                        File::delete($file);
                    }
                }

                Image::make($image->getRealPath())->resize(200, 200)->save($path);

                PageManagement::where('type', 'devalia')->update(['image' => $filename]);
            }
        } else {
            $devalia_page = new PageManagement();
            $devalia_page->type = 'devalia';
            $devalia_page->title = $request->title;
            $devalia_page->banner_image_alt = $request->banner_image_alt;
            $devalia_page->meta_title = $request->meta_title;
            $devalia_page->meta_description = $request->meta_description;
            $devalia_page->section_1 = $request->section_1;
            $devalia_page->section_2 = $request->section_2;
            $devalia_page->section_3 = $request->section_3;
            $devalia_page->section_4 = $request->section_4;
            $devalia_page->section_5 = $request->section_5;
            $devalia_page->section_6 = $request->section_6;
            $devalia_page->section_7 = $request->section_7;
            $devalia_page->section_8 = $request->section_8;
            $devalia_page->section_9 = $request->section_9;
            $devalia_page->section_10 = $request->section_10;

            $devalia_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'devalia' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $devalia_page->image = $filename;
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $devalia_page->save();
            }
            $devalia_page->save();
        }
        return redirect()->route('page.mangement.devalia.index')->with('success', 'Devalia Page updated successfully');
    }

    public function kankaiIndex(Request $request)
    {
        $kankai_page = PageManagement::where('type', 'kankai')->first();
        $kankai_page->path = isset($kankai_page->image) ? asset('/admin/page-management/' . $kankai_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.kankai', compact('kankai_page'));
    }

    public function kankaiStore(Request $request)
    {
        $kankai_page_exists = PageManagement::where('type', 'kankai')->exists();
        if ($kankai_page_exists) {
            PageManagement::where('type', 'kankai')->update([
                'title' => $request->title,
                'banner_image_alt' => $request->banner_image_alt,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'section_1' => $request->section_1,
                'section_2' => $request->section_2,
                'section_3' => $request->section_3,
                'section_4' => $request->section_4,
                'section_5' => $request->section_5,
                'section_6' => $request->section_6,
                'section_7' => $request->section_7,
                'section_8' => $request->section_8,
                'section_9' => $request->section_9,
                'section_10' => $request->section_10,
            ]);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'kankai' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'kankai' . '_')) {
                        File::delete($file);
                    }
                }

                Image::make($image->getRealPath())->resize(200, 200)->save($path);

                PageManagement::where('type', 'kankai')->update(['image' => $filename]);
            }
        } else {
            $kankai_page = new PageManagement();
            $kankai_page->type = 'kankai';
            $kankai_page->title = $request->title;
            $kankai_page->banner_image_alt = $request->banner_image_alt;
            $kankai_page->meta_title = $request->meta_title;
            $kankai_page->meta_description = $request->meta_description;
            $kankai_page->section_1 = $request->section_1;
            $kankai_page->section_2 = $request->section_2;
            $kankai_page->section_3 = $request->section_3;
            $kankai_page->section_4 = $request->section_4;
            $kankai_page->section_5 = $request->section_5;
            $kankai_page->section_6 = $request->section_6;
            $kankai_page->section_7 = $request->section_7;
            $kankai_page->section_8 = $request->section_8;
            $kankai_page->section_9 = $request->section_9;
            $kankai_page->section_10 = $request->section_10;

            $kankai_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'kankai' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $kankai_page->image = $filename;
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $kankai_page->save();
            }
            $kankai_page->save();
        }
        return redirect()->route('page.mangement.kankai.index')->with('success', 'Kankai Page updated successfully');
    }

    public function girnarIndex(Request $request)
    {
        $girnar_page = PageManagement::where('type', 'girnar')->first();
        $girnar_page->path = isset($girnar_page->image) ? asset('/admin/page-management/' . $girnar_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.girnar', compact('girnar_page'));
    }

    public function girnarStore(Request $request)
    {
        $girnar_page_exists = PageManagement::where('type', 'girnar')->exists();
        if ($girnar_page_exists) {
            PageManagement::where('type', 'girnar')->update([
                'title' => $request->title,
                'banner_image_alt' => $request->banner_image_alt,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'section_1' => $request->section_1,
                'section_2' => $request->section_2,
                'section_3' => $request->section_3,
                'section_4' => $request->section_4,
                'section_5' => $request->section_5,
                'section_6' => $request->section_6,
                'section_7' => $request->section_7,
                'section_8' => $request->section_8,
                'section_9' => $request->section_9,
                'section_10' => $request->section_10,
            ]);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'girnar' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'girnar' . '_')) {
                        File::delete($file);
                    }
                }

                Image::make($image->getRealPath())->resize(200, 200)->save($path);

                PageManagement::where('type', 'girnar')->update(['image' => $filename]);
            }
        } else {
            $girnar_page = new PageManagement();
            $girnar_page->type = 'girnar';
            $girnar_page->title = $request->title;
            $girnar_page->banner_image_alt = $request->banner_image_alt;
            $girnar_page->meta_title = $request->meta_title;
            $girnar_page->meta_description = $request->meta_description;
            $girnar_page->section_1 = $request->section_1;
            $girnar_page->section_2 = $request->section_2;
            $girnar_page->section_3 = $request->section_3;
            $girnar_page->section_4 = $request->section_4;
            $girnar_page->section_5 = $request->section_5;
            $girnar_page->section_6 = $request->section_6;
            $girnar_page->section_7 = $request->section_7;
            $girnar_page->section_8 = $request->section_8;
            $girnar_page->section_9 = $request->section_9;
            $girnar_page->section_10 = $request->section_10;

            $girnar_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'girnar' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $girnar_page->image = $filename;
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $girnar_page->save();
            }
            $girnar_page->save();
        }
        return redirect()->route('page.mangement.girnar.index')->with('success', 'Girnar Page updated successfully');
    }

    public function hotelIndex(Request $request)
    {
        $hotel_page = PageManagement::where('type', 'hotel')->first();
        $hotel_page->path = isset($hotel_page->image) ? asset('/admin/page-management/' . $hotel_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.hotel', compact('hotel_page'));
    }

    public function hotelStore(Request $request)
    {
        $hotel_page_exists = PageManagement::where('type', 'hotel')->exists();
        if ($hotel_page_exists) {
            PageManagement::where('type', 'hotel')->update([
                'title' => $request->title,
                'banner_image_alt' => $request->banner_image_alt,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'section_1' => $request->heading,
            ]);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'hotel' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'hotel' . '_')) {
                        File::delete($file);
                    }
                }

                Image::make($image->getRealPath())->resize(200, 200)->save($path);

                PageManagement::where('type', 'hotel')->update(['image' => $filename]);
            }
        } else {
            $hotel_page = new PageManagement();
            $hotel_page->type = 'hotel';
            $hotel_page->title = $request->title;
            $hotel_page->banner_image_alt = $request->banner_image_alt;
            $hotel_page->meta_title = $request->meta_title;
            $hotel_page->meta_description = $request->meta_description;
            $hotel_page->section_1 = $request->heading;

            $hotel_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'hotel' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $hotel_page->image = $filename;
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $hotel_page->save();
            }
            $hotel_page->save();
        }
        return redirect()->route('page.mangement.hotel.index')->with('success', 'Hotel Page updated successfully');
    }

    public function packageIndex(Request $request)
    {
        $package_page = PageManagement::where('type', 'package')->first();
        $package_page->path = isset($package_page->image) ? asset('/admin/page-management/' . $package_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.package', compact('package_page'));
    }

    public function packageStore(Request $request)
    {
        $package_page_exists = PageManagement::where('type', 'package')->exists();
        if ($package_page_exists) {
            PageManagement::where('type', 'package')->update([
                'title' => $request->title,
                'banner_image_alt' => $request->banner_image_alt,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'section_1' => $request->section_1,
                'section_2' => $request->section_2,
                'section_3' => $request->section_3,
                'section_4' => $request->section_4,
                'section_5' => $request->section_5,
                'section_6' => $request->section_6,
                'section_7' => $request->section_7,
                'section_8' => $request->section_8,
                'section_9' => $request->section_9,
                'section_10' => $request->section_10,
            ]);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'package' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'package' . '_')) {
                        File::delete($file);
                    }
                }

                Image::make($image->getRealPath())->resize(200, 200)->save($path);

                PageManagement::where('type', 'package')->update(['image' => $filename]);
            }
        } else {
            $package_page = new PageManagement();
            $package_page->type = 'package';
            $package_page->title = $request->title;
            $package_page->banner_image_alt = $request->banner_image_alt;
            $package_page->meta_title = $request->meta_title;
            $package_page->meta_description = $request->meta_description;
            $package_page->section_1 = $request->section_1;
            $package_page->section_2 = $request->section_2;
            $package_page->section_3 = $request->section_3;
            $package_page->section_4 = $request->section_4;
            $package_page->section_5 = $request->section_5;
            $package_page->section_6 = $request->section_6;
            $package_page->section_7 = $request->section_7;
            $package_page->section_8 = $request->section_8;
            $package_page->section_9 = $request->section_9;
            $package_page->section_10 = $request->section_10;

            $package_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'package' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $package_page->image = $filename;
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $package_page->save();
            }
            $package_page->save();
        }
        return redirect()->route('page.mangement.package.index')->with('success', 'Package Page updated successfully');
    }

    public function contactIndex(Request $request)
    {
        $contact_page = PageManagement::where('type', 'contact')->first();
        $contact_page->path = isset($contact_page->image) ? asset('/admin/page-management/' . $contact_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.contact', compact('contact_page'));
    }

    public function contactStore(Request $request)
    {
        $contact_page_exists = PageManagement::where('type', 'contact')->exists();
        if ($contact_page_exists) {
            PageManagement::where('type', 'contact')->update([
                'title' => $request->title,
                'banner_image_alt' => $request->banner_image_alt,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'section_1' => $request->section_1,
            ]);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'contact' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'contact' . '_')) {
                        File::delete($file);
                    }
                }

                Image::make($image->getRealPath())->resize(200, 200)->save($path);

                PageManagement::where('type', 'contact')->update(['image' => $filename]);
            }
        } else {
            $contact_page = new PageManagement();
            $contact_page->type = 'contact';
            $contact_page->title = $request->title;
            $contact_page->banner_image_alt = $request->banner_image_alt;
            $contact_page->meta_title = $request->meta_title;
            $contact_page->meta_description = $request->meta_description;
            $contact_page->section_1 = $request->section_1;

            $contact_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'contact' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $contact_page->image = $filename;
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $contact_page->save();
            }
            $contact_page->save();
        }
        return redirect()->route('page.mangement.contact.index')->with('success', 'Contact Page updated successfully');
    }


    // -----------new pages-----------

    public function attractionsIndex(Request $request)
    {
        $attractions_page = PageManagement::where('type', 'attractions')->first();
        $attractions_page->path = isset($attractions_page->image) ? asset('/admin/page-management/' . $attractions_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.attractions', compact('attractions_page'));
    }

    public function attractionsStore(Request $request)
    {
        $attractions_page_exists = PageManagement::where('type', 'attractions')->exists();
        if ($attractions_page_exists) {
            PageManagement::where('type', 'attractions')->update([
                'title' => $request->title,
                'banner_image_alt' => $request->banner_image_alt,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'section_1' => $request->section_1,
                'section_2' => $request->section_2,
                'section_3' => $request->section_3,
                'section_4' => $request->section_4,
                'section_5' => $request->section_5,

            ]);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'attractions' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'attractions' . '_')) {
                        File::delete($file);
                    }
                }

                Image::make($image->getRealPath())->resize(200, 200)->save($path);

                PageManagement::where('type', 'attractions')->update(['image' => $filename]);
            }
        } else {
            $attractions_page = new PageManagement();
            $attractions_page->type = 'attractions';
            $attractions_page->title = $request->title;
            $attractions_page->banner_image_alt = $request->banner_image_alt;
            $attractions_page->meta_title = $request->meta_title;
            $attractions_page->meta_description = $request->meta_description;
            $attractions_page->section_1 = $request->section_1;
            $attractions_page->section_2 = $request->section_2;
            $attractions_page->section_3 = $request->section_3;
            $attractions_page->section_4 = $request->section_4;
            $attractions_page->section_5 = $request->section_5;

            $attractions_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'attractions' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $attractions_page->image = $filename;
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $attractions_page->save();
            }
            $attractions_page->save();
        }
        return redirect()->route('page.mangement.attractions.index')->with('success', 'attractions Page updated successfully');
    }

    public function besttimeIndex(Request $request)
    {
        $besttime_page = PageManagement::where('type', 'besttime')->first();
        $besttime_page->path = isset($besttime_page->image) ? asset('/admin/page-management/' . $besttime_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.besttime', compact('besttime_page'));
    }

    public function besttimeStore(Request $request)
    {
        $besttime_page_exists = PageManagement::where('type', 'besttime')->exists();
        if ($besttime_page_exists) {
            PageManagement::where('type', 'besttime')->update([
                'title' => $request->title,
                'banner_image_alt' => $request->banner_image_alt,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'section_1' => $request->section_1,
                'section_2' => $request->section_2,
                'section_3' => $request->section_3,
            ]);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'besttime' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'besttime' . '_')) {
                        File::delete($file);
                    }
                }

                Image::make($image->getRealPath())->resize(200, 200)->save($path);

                PageManagement::where('type', 'besttime')->update(['image' => $filename]);
            }
        } else {
            $besttime_page = new PageManagement();
            $besttime_page->type = 'besttime';
            $besttime_page->title = $request->title;
            $besttime_page->banner_image_alt = $request->banner_image_alt;
            $besttime_page->meta_title = $request->meta_title;
            $besttime_page->meta_description = $request->meta_description;
            $besttime_page->section_1 = $request->section_1;
            $besttime_page->section_2 = $request->section_2;
            $besttime_page->section_3 = $request->section_3;

            $besttime_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'besttime' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $besttime_page->image = $filename;
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $besttime_page->save();
            }
            $besttime_page->save();
        }
        return redirect()->route('page.mangement.besttime.index')->with('success', 'Best time Page updated successfully');
    }

    public function bookingprocessIndex(Request $request)
    {
        $bookingprocess_page = PageManagement::where('type', 'bookingprocess')->first();
        $bookingprocess_page->path = isset($bookingprocess_page->image) ? asset('/admin/page-management/' . $bookingprocess_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.bookingprocess', compact('bookingprocess_page'));
    }

    public function bookingprocessStore(Request $request)
    {
        $bookingprocess_page_exists = PageManagement::where('type', 'bookingprocess')->exists();
        if ($bookingprocess_page_exists) {
            PageManagement::where('type', 'bookingprocess')->update([
                'title' => $request->title,
                'banner_image_alt' => $request->banner_image_alt,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'section_1' => $request->section_1,
            ]);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'bookingprocess' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'bookingprocess' . '_')) {
                        File::delete($file);
                    }
                }

                Image::make($image->getRealPath())->resize(200, 200)->save($path);

                PageManagement::where('type', 'bookingprocess')->update(['image' => $filename]);
            }
        } else {
            $bookingprocess_page = new PageManagement();
            $bookingprocess_page->type = 'bookingprocess';
            $bookingprocess_page->title = $request->title;
            $bookingprocess_page->banner_image_alt = $request->banner_image_alt;
            $bookingprocess_page->meta_title = $request->meta_title;
            $bookingprocess_page->meta_description = $request->meta_description;
            $bookingprocess_page->section_1 = $request->section_1;

            $bookingprocess_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'bookingprocess' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $bookingprocess_page->image = $filename;
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $bookingprocess_page->save();
            }
            $bookingprocess_page->save();
        }
        return redirect()->route('page.mangement.bookingprocess.index')->with('success', 'Booking Process Page updated successfully');
    }

    public function localfoodIndex(Request $request)
    {
        $localfood_page = PageManagement::where('type', 'localfood')->first();
        $localfood_page->path = isset($localfood_page->image) ? asset('/admin/page-management/' . $localfood_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.localfood', compact('localfood_page'));
    }

    public function localfoodStore(Request $request)
    {
        $localfood_page_exists = PageManagement::where('type', 'localfood')->exists();
        if ($localfood_page_exists) {
            PageManagement::where('type', 'localfood')->update([
                'title' => $request->title,
                'banner_image_alt' => $request->banner_image_alt,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'section_1' => $request->section_1,
                'section_2' => $request->section_2,
                'section_3' => $request->section_3,
                'section_4' => $request->section_4,
                'section_5' => $request->section_5,
                'section_6' => $request->section_6,
                'section_7' => $request->section_7,
            ]);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'localfood' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'localfood' . '_')) {
                        File::delete($file);
                    }
                }

                Image::make($image->getRealPath())->resize(200, 200)->save($path);

                PageManagement::where('type', 'localfood')->update(['image' => $filename]);
            }
        } else {
            $localfood_page = new PageManagement();
            $localfood_page->type = 'localfood';
            $localfood_page->title = $request->title;
            $localfood_page->banner_image_alt = $request->banner_image_alt;
            $localfood_page->meta_title = $request->meta_title;
            $localfood_page->meta_description = $request->meta_description;
            $localfood_page->section_1 = $request->section_1;
            $localfood_page->section_2 = $request->section_2;
            $localfood_page->section_3 = $request->section_3;
            $localfood_page->section_4 = $request->section_4;
            $localfood_page->section_5 = $request->section_5;
            $localfood_page->section_6 = $request->section_6;
            $localfood_page->section_7 = $request->section_7;


            $localfood_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'localfood' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $localfood_page->image = $filename;
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $localfood_page->save();
            }
            $localfood_page->save();
        }
        return redirect()->route('page.mangement.localfood.index')->with('success', 'Local food Page updated successfully');
    }

    public function localshoppingIndex(Request $request)
    {
        $localshopping_page = PageManagement::where('type', 'localshopping')->first();
        $localshopping_page->path = isset($localshopping_page->image) ? asset('/admin/page-management/' . $localshopping_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.localshopping', compact('localshopping_page'));
    }

    public function localshoppingStore(Request $request)
    {
        $localshopping_page_exists = PageManagement::where('type', 'localshopping')->exists();
        if ($localshopping_page_exists) {
            PageManagement::where('type', 'localshopping')->update([
                'title' => $request->title,
                'banner_image_alt' => $request->banner_image_alt,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'section_1' => $request->section_1,
                'section_2' => $request->section_2,
                'section_3' => $request->section_3,
                'section_4' => $request->section_4,
                'section_5' => $request->section_5,
                'section_6' => $request->section_6,
            ]);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'localshopping' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'localshopping' . '_')) {
                        File::delete($file);
                    }
                }

                Image::make($image->getRealPath())->resize(200, 200)->save($path);

                PageManagement::where('type', 'localshopping')->update(['image' => $filename]);
            }
        } else {
            $localshopping_page = new PageManagement();
            $localshopping_page->type = 'localshopping';
            $localshopping_page->title = $request->title;
            $localshopping_page->banner_image_alt = $request->banner_image_alt;
            $localshopping_page->meta_title = $request->meta_title;
            $localshopping_page->meta_description = $request->meta_description;
            $localshopping_page->section_1 = $request->section_1;
            $localshopping_page->section_2 = $request->section_2;
            $localshopping_page->section_3 = $request->section_3;
            $localshopping_page->section_4 = $request->section_4;
            $localshopping_page->section_5 = $request->section_5;
            $localshopping_page->section_6 = $request->section_6;

            $localshopping_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'localshopping' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $localshopping_page->image = $filename;
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $localshopping_page->save();
            }
            $localshopping_page->save();
        }
        return redirect()->route('page.mangement.localshopping.index')->with('success', 'Local Shopping Page updated successfully');
    }

    public function pricingtableIndex(Request $request)
    {
        $pricingtable_page = PageManagement::where('type', 'pricingtable')->first();
        $pricingtable_page->path = isset($pricingtable_page->image) ? asset('/admin/page-management/' . $pricingtable_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.pricingtable', compact('pricingtable_page'));
    }

    public function pricingtableStore(Request $request)
    {
        $pricingtable_page_exists = PageManagement::where('type', 'pricingtable')->exists();
        if ($pricingtable_page_exists) {
            PageManagement::where('type', 'pricingtable')->update([
                'title' => $request->title,
                'banner_image_alt' => $request->banner_image_alt,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'section_1' => $request->section_1,
                'section_2' => $request->section_2,
            ]);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'pricingtable' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'pricingtable' . '_')) {
                        File::delete($file);
                    }
                }

                Image::make($image->getRealPath())->resize(200, 200)->save($path);

                PageManagement::where('type', 'pricingtable')->update(['image' => $filename]);
            }
        } else {
            $pricingtable_page = new PageManagement();
            $pricingtable_page->type = 'pricingtable';
            $pricingtable_page->title = $request->title;
            $pricingtable_page->banner_image_alt = $request->banner_image_alt;
            $pricingtable_page->meta_title = $request->meta_title;
            $pricingtable_page->meta_description = $request->meta_description;
            $pricingtable_page->section_1 = $request->section_1;
            $pricingtable_page->section_2 = $request->section_2;

            $pricingtable_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'pricingtable' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $pricingtable_page->image = $filename;
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $pricingtable_page->save();
            }
            $pricingtable_page->save();
        }
        return redirect()->route('page.mangement.pricingtable.index')->with('success', 'pricingtable Page updated successfully');
    }

    public function waterfallsIndex(Request $request)
    {
        $waterfalls_page = PageManagement::where('type', 'waterfalls')->first();
        $waterfalls_page->path = isset($waterfalls_page->image) ? asset('/admin/page-management/' . $waterfalls_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.waterfalls', compact('waterfalls_page'));
    }

    public function waterfallsStore(Request $request)
    {
        $waterfalls_page_exists = PageManagement::where('type', 'waterfalls')->exists();
        if ($waterfalls_page_exists) {
            PageManagement::where('type', 'waterfalls')->update([
                'title' => $request->title,
                'banner_image_alt' => $request->banner_image_alt,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'section_1' => $request->section_1,
                'section_2' => $request->section_2,
                'section_3' => $request->section_3,

            ]);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'waterfalls' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'waterfalls' . '_')) {
                        File::delete($file);
                    }
                }

                Image::make($image->getRealPath())->resize(200, 200)->save($path);

                PageManagement::where('type', 'waterfalls')->update(['image' => $filename]);
            }
        } else {
            $waterfalls_page = new PageManagement();
            $waterfalls_page->type = 'waterfalls';
            $waterfalls_page->title = $request->title;
            $waterfalls_page->banner_image_alt = $request->banner_image_alt;
            $waterfalls_page->meta_title = $request->meta_title;
            $waterfalls_page->meta_description = $request->meta_description;
            $waterfalls_page->section_1 = $request->section_1;
            $waterfalls_page->section_2 = $request->section_2;
            $waterfalls_page->section_3 = $request->section_3;

            $waterfalls_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'waterfalls' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $waterfalls_page->image = $filename;
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $waterfalls_page->save();
            }
            $waterfalls_page->save();
        }
        return redirect()->route('page.mangement.waterfalls.index')->with('success', 'Waterfalls Page updated successfully');
    }

    // ---------till here -----------

    public function faqIndex(Request $request)
    {
        $faq_page = PageManagement::where('type', 'faq')->first();
        $faq_page->path = isset($faq_page->image) ? asset('/admin/page-management/' . $faq_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.faq', compact('faq_page'));
    }

    public function faqStore(Request $request)
    {
        $faq_page_exists = PageManagement::where('type', 'faq')->exists();
        if ($faq_page_exists) {
            PageManagement::where('type', 'faq')->update([
                'title' => $request->title,
                'banner_image_alt' => $request->banner_image_alt,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'section_1' => $request->section_1,
            ]);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'faq' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'faq' . '_')) {
                        File::delete($file);
                    }
                }

                Image::make($image->getRealPath())->resize(200, 200)->save($path);

                PageManagement::where('type', 'faq')->update(['image' => $filename]);
            }
        } else {
            $faq_page = new PageManagement();
            $faq_page->type = 'faq';
            $faq_page->title = $request->title;
            $faq_page->banner_image_alt = $request->banner_image_alt;
            $faq_page->meta_title = $request->meta_title;
            $faq_page->meta_description = $request->meta_description;
            $faq_page->section_1 = $request->section_1;

            $faq_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'faq' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $faq_page->image = $filename;
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $faq_page->save();
            }
            $faq_page->save();
        }
        return redirect()->route('page.mangement.faq.index')->with('success', 'Faq Page updated successfully');
    }

    public function doDoNotIndex(Request $request)
    {
        $DoDoNot_page = PageManagement::where('type', 'do-and-dont')->first();
        $DoDoNot_page->path = isset($DoDoNot_page->image) ? asset('/admin/page-management/' . $DoDoNot_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.doDoNot', compact('DoDoNot_page'));
    }

    public function doDoNotStore(Request $request)
    {
        $DoDoNot_page_exists = PageManagement::where('type', 'do-and-dont')->exists();
        if ($DoDoNot_page_exists) {
            PageManagement::where('type', 'do-and-dont')->update([
                'title' => $request->title,
                'banner_image_alt' => $request->banner_image_alt,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'section_1' => $request->section_1,
            ]);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'do-and-dont' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'do-and-dont' . '_')) {
                        File::delete($file);
                    }
                }

                Image::make($image->getRealPath())->resize(200, 200)->save($path);

                PageManagement::where('type', 'do-and-dont')->update(['image' => $filename]);
            }
        } else {
            $DoDoNot_page = new PageManagement();
            $DoDoNot_page->type = 'do-and-dont';
            $DoDoNot_page->title = $request->title;
            $DoDoNot_page->banner_image_alt = $request->banner_image_alt;
            $DoDoNot_page->meta_title = $request->meta_title;
            $DoDoNot_page->meta_description = $request->meta_description;
            $DoDoNot_page->section_1 = $request->section_1;

            $DoDoNot_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'do-and-dont' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $DoDoNot_page->image = $filename;
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $DoDoNot_page->save();
            }
            $DoDoNot_page->save();
        }
        return redirect()->route('page.mangement.doDoNot.index')->with('success', 'Do & Do Not Page updated successfully');
    }

    public function historyIndex(Request $request)
    {
        $history_page = PageManagement::where('type', 'history')->first();
        $history_page->path = isset($history_page->image) ? asset('/admin/page-management/' . $history_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.history', compact('history_page'));
    }

    public function historyStore(Request $request)
    {
        $history_page_exists = PageManagement::where('type', 'history')->exists();
        if ($history_page_exists) {
            PageManagement::where('type', 'history')->update([
                'title' => $request->title,
                'banner_image_alt' => $request->banner_image_alt,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'section_1' => $request->section_1,
            ]);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'history' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'history' . '_')) {
                        File::delete($file);
                    }
                }

                Image::make($image->getRealPath())->resize(200, 200)->save($path);

                PageManagement::where('type', 'history')->update(['image' => $filename]);
            }
        } else {
            $history_page = new PageManagement();
            $history_page->type = 'history';
            $history_page->title = $request->title;
            $history_page->banner_image_alt = $request->banner_image_alt;
            $history_page->meta_title = $request->meta_title;
            $history_page->meta_description = $request->meta_description;
            $history_page->section_1 = $request->section_1;

            $history_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'history' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $history_page->image = $filename;
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $history_page->save();
            }
            $history_page->save();
        }
        return redirect()->route('page.mangement.history.index')->with('success', 'History Page updated successfully');
    }

    public function permitIndex(Request $request)
    {
        $permit_page = PageManagement::where('type', 'permit')->first();
        $permit_page->path = isset($permit_page->image) ? asset('/admin/page-management/' . $permit_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.permit', compact('permit_page'));
    }

    public function permitStore(Request $request)
    {
        $permit_page_exists = PageManagement::where('type', 'permit')->exists();
        if ($permit_page_exists) {
            PageManagement::where('type', 'permit')->update([
                'title' => $request->title,
                'banner_image_alt' => $request->banner_image_alt,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'section_1' => $request->section_1,
            ]);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'permit' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'permit' . '_')) {
                        File::delete($file);
                    }
                }

                Image::make($image->getRealPath())->resize(200, 200)->save($path);

                PageManagement::where('type', 'permit')->update(['image' => $filename]);
            }
        } else {
            $permit_page = new PageManagement();
            $permit_page->type = 'permit';
            $permit_page->title = $request->title;
            $permit_page->banner_image_alt = $request->banner_image_alt;
            $permit_page->meta_title = $request->meta_title;
            $permit_page->meta_description = $request->meta_description;
            $permit_page->section_1 = $request->section_1;

            $permit_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'permit' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $permit_page->image = $filename;
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $permit_page->save();
            }
            $permit_page->save();
        }
        return redirect()->route('page.mangement.permit.index')->with('success', 'Permit Page updated successfully');
    }

    public function termIndex(Request $request)
    {
        $term_page = PageManagement::where('type', 'term')->first();
        $term_page->path = isset($term_page->image) ? asset('/admin/page-management/' . $term_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.term', compact('term_page'));
    }

    public function termStore(Request $request)
    {
        $term_page_exists = PageManagement::where('type', 'term')->exists();
        if ($term_page_exists) {
            PageManagement::where('type', 'term')->update([
                'title' => $request->title,
                'banner_image_alt' => $request->banner_image_alt,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'section_1' => $request->section_1,
            ]);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'term' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'term' . '_')) {
                        File::delete($file);
                    }
                }

                Image::make($image->getRealPath())->resize(200, 200)->save($path);

                PageManagement::where('type', 'term')->update(['image' => $filename]);
            }
        } else {
            $term_page = new PageManagement();
            $term_page->type = 'term';
            $term_page->title = $request->title;
            $term_page->banner_image_alt = $request->banner_image_alt;
            $term_page->meta_title = $request->meta_title;
            $term_page->meta_description = $request->meta_description;
            $term_page->section_1 = $request->section_1;

            $term_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'term' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $term_page->image = $filename;
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $term_page->save();
            }
            $term_page->save();
        }
        return redirect()->route('page.mangement.term.index')->with('success', 'Term & Condtion Page updated successfully');
    }

    public function privacyIndex(Request $request)
    {
        $privacy_page = PageManagement::where('type', 'privacy')->first();
        $privacy_page->path = isset($privacy_page->image) ? asset('/admin/page-management/' . $privacy_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.privacy', compact('privacy_page'));
    }

    public function privacyStore(Request $request)
    {
        $privacy_page_exists = PageManagement::where('type', 'privacy')->exists();
        if ($privacy_page_exists) {
            PageManagement::where('type', 'privacy')->update([
                'title' => $request->title,
                'banner_image_alt' => $request->banner_image_alt,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'section_1' => $request->section_1,
            ]);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'privacy' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'privacy' . '_')) {
                        File::delete($file);
                    }
                }

                Image::make($image->getRealPath())->resize(200, 200)->save($path);

                PageManagement::where('type', 'privacy')->update(['image' => $filename]);
            }
        } else {
            $privacy_page = new PageManagement();
            $privacy_page->type = 'privacy';
            $privacy_page->title = $request->title;
            $privacy_page->banner_image_alt = $request->banner_image_alt;
            $privacy_page->meta_title = $request->meta_title;
            $privacy_page->meta_description = $request->meta_description;
            $privacy_page->section_1 = $request->section_1;

            $privacy_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'privacy' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $privacy_page->image = $filename;
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $privacy_page->save();
            }
            $privacy_page->save();
        }
        return redirect()->route('page.mangement.privacy.index')->with('success', 'Privacy Policy Page updated successfully');
    }


    public function aboutIndex(Request $request)
    {
        $about_page = PageManagement::where('type', 'about')->first();
        // $about_page->path = isset($about_page->image) ? asset('/admin/page-management/'.$about_page->image) : 'https://via.placeholder.com/150';
        $about_page->path = 'https://via.placeholder.com/150';
        return view('admin.page-management.about', compact('about_page'));
    }

    public function aboutStore(Request $request)
    {

        $about_page_exists = PageManagement::where('type', 'about')->exists();
        if ($about_page_exists) {

            PageManagement::where('type', 'about')->update(
                [
                    'title' => $request->title,
                    'banner_image_alt' => $request->banner_image_alt,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'section_1' => $request->section_1,
                    'section_2' => $request->section_2,
                    'section_3' => $request->section_3,
                ]
            );

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'about' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'about' . '_')) {
                        File::delete($file);
                    }
                }

                // Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $image->move($removePath, $filename);

                PageManagement::where('type', 'about')->update(['image' => $filename]);
            }
        } else {
            $about_page                   = new PageManagement();
            $about_page->type             = 'about';
            $about_page->title            = $request->title;
            $about_page->banner_image_alt = $request->banner_image_alt;
            $about_page->meta_title       = $request->meta_title;
            $about_page->meta_description = $request->meta_description;
            $about_page->section_1        = $request->section_1;
            $about_page->section_2        = $request->section_2;
            $about_page->section_3        = $request->section_3;

            $about_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'about' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $about_page->image = $filename;
                // Save the image file without resizing
                $image->move(public_path('admin/page-management/'), $filename);
                $about_page->save();
            }
            $about_page->save();
        }
        return redirect()->route('page.mangement.about.index')->with('success', 'About Page updated successfully');
    }


    public function reachIndex(Request $request)
    {
        $reach_page = PageManagement::where('type', 'reach')->first();
        $reach_page->path = isset($reach_page->image) ? asset('/admin/page-management/' . $reach_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.reach', compact('reach_page'));
    }

    public function reachStore(Request $request)
    {

        $reach_page_exists = PageManagement::where('type', 'reach')->exists();
        if ($reach_page_exists) {

            PageManagement::where('type', 'reach')->update(
                [
                    'title' => $request->title,
                    'banner_image_alt' => $request->banner_image_alt,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'section_1' => $request->section_1,
                ]
            );

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'reach' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'reach' . '_')) {
                        File::delete($file);
                    }
                }

                // Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $image->move($removePath, $filename);

                PageManagement::where('type', 'reach')->update(['image' => $filename]);
            }
        } else {
            $reach_page                   = new PageManagement();
            $reach_page->type             = 'reach';
            $reach_page->title            = $request->title;
            $reach_page->banner_image_alt = $request->banner_image_alt;
            $reach_page->meta_title       = $request->meta_title;
            $reach_page->meta_description = $request->meta_description;
            $reach_page->section_1        = $request->section_1;

            $reach_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'reach' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $reach_page->image = $filename;
                // Save the image file without resizing
                $image->move(public_path('admin/page-management/'), $filename);
                $reach_page->save();
            }
            $reach_page->save();
        }
        return redirect()->route('page.mangement.reach.index')->with('success', 'How To Reach Page updated successfully');
    }

    public function cancellationIndex(Request $request)
    {
        $cancellation_page = PageManagement::where('type', 'cancellation')->first();
        $cancellation_page->path = isset($cancellation_page->image) ? asset('/admin/page-management/' . $cancellation_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.cancellation', compact('cancellation_page'));
    }

    public function cancellationStore(Request $request)
    {
        $cancellation_page_exists = PageManagement::where('type', 'cancellation')->exists();
        if ($cancellation_page_exists) {
            PageManagement::where('type', 'cancellation')->update([
                'title' => $request->title,
                'banner_image_alt' => $request->banner_image_alt,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'section_1' => $request->section_1,
            ]);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'cancellation' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'cancellation' . '_')) {
                        File::delete($file);
                    }
                }

                Image::make($image->getRealPath())->resize(200, 200)->save($path);

                PageManagement::where('type', 'cancellation')->update(['image' => $filename]);
            }
        } else {
            $cancellation_page = new PageManagement();
            $cancellation_page->type = 'cancellation';
            $cancellation_page->title = $request->title;
            $cancellation_page->banner_image_alt = $request->banner_image_alt;
            $cancellation_page->meta_title = $request->meta_title;
            $cancellation_page->meta_description = $request->meta_description;
            $cancellation_page->section_1 = $request->section_1;

            $cancellation_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'cancellation' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $cancellation_page->image = $filename;
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $cancellation_page->save();
            }
            $cancellation_page->save();
        }
        return redirect()->route('page.mangement.cancellation.index')->with('success', 'Cancellation Policy Page updated successfully');
    }

    public function festivalIndex(Request $request)
    {
        $festival_page = PageManagement::where('type', 'festival')->first();
        $festival_page->path = isset($festival_page->image) ? asset('/admin/page-management/' . $festival_page->image) : 'https://via.placeholder.com/150';
        return view('admin.page-management.festival', compact('festival_page'));
    }

    public function festivalStore(Request $request)
    {
        $festival_page_exists = PageManagement::where('type', 'festival')->exists();
        if ($festival_page_exists) {
            PageManagement::where('type', 'festival')->update([
                'title' => $request->title,
                'banner_image_alt' => $request->banner_image_alt,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
            ]);

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'festival' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'festival' . '_')) {
                        File::delete($file);
                    }
                }

                Image::make($image->getRealPath())->resize(200, 200)->save($path);

                PageManagement::where('type', 'festival')->update(['image' => $filename]);
            }
        } else {
            $festival_page = new PageManagement();
            $festival_page->type = 'festival';
            $festival_page->title = $request->title;
            $festival_page->banner_image_alt = $request->banner_image_alt;
            $festival_page->meta_title = $request->meta_title;
            $festival_page->meta_description = $request->meta_description;

            $festival_page->save();

            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'festival' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                if (!File::exists(public_path('admin/page-management/'))) {
                    File::makeDirectory(public_path('admin/page-management/'), 0755, true);
                }
                $festival_page->image = $filename;
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
                $festival_page->save();
            }
            $festival_page->save();
        }
        return redirect()->route('page.mangement.festival.index')->with('success', 'Festival Page updated successfully');
    }

    // public function weekendIndex(Request $request)
    // {
    //     $weekend_page = PageManagement::where('type','weekend')->first();
    //     $weekend_page->path = isset($weekend_page->image) ? asset('/admin/page-management/'.$weekend_page->image) : 'https://via.placeholder.com/150';
    //     return view('admin.page-management.weekend',compact('weekend_page'));
    // }

    public function weekendIndex()
    {
        $weekend_page = PageManagement::where('type', 'weekend')->first();
        $weekend_attr = LongWeekend::get();
        $weekend_attr = $weekend_attr ? $weekend_attr->toArray() : [];
        if (isset($weekend_page)) {
            $weekend_page->path = isset($weekend_page->image) ? asset('/admin/page-management/' . $weekend_page->image) : 'https://via.placeholder.com/150';
        }
        return view('admin.page-management.weekend', compact('weekend_page', 'weekend_attr'));
    }

    public function weekendStore(Request $request)
    {
        $weekend_page_exists = PageBuilders::where('type', 'weekend')->exists();

        if ($weekend_page_exists) {
            if ($request->hasfile('image')) {
                $image = $request->file('image');
                $originalName = $image->getClientOriginalName();
                $filename = 'weekend' . '_' . $originalName;
                $path = public_path('admin/page-management/' . $filename);
                $removePath = public_path('admin/page-management/');

                $files = File::files($removePath);
                foreach ($files as $file) {
                    $fileInfo = pathinfo($file);
                    $fileBaseName = $fileInfo['filename'];

                    if (Str::startsWith($fileBaseName, 'weekend' . '_')) {
                        File::delete($file);
                    }
                }

                Image::make($image->getRealPath())->resize(200, 200)->save($path);

                PageManagement::where('type', 'weekend')->update(['image' => $filename]);
            }
            $data = [
                'title' => $request->title,
                'heading' => $request->heading,
                'subheading' => $request->subheading,
                'section_10' => $request->offer_status,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
            ];
            PageManagement::where('type', 'weekend')->update($data);

            $weekend_attr_exists = longWeekend::exists();
            if ($weekend_attr_exists) {
                if (isset($_POST['u_data'])) {
                    $editRow = count($_POST['u_data']);
                    // echo '<pre/>'; print_r($_POST['u_data']);die;
                    $imageArray = [];
                    $imgArray = [];
                    for ($i = 0; $i < $editRow; $i++) {
                        $existImage = longWeekend::where('id', $_POST['weekend_id'][$i])->first();

                        $hotel_title = $_POST['u_data'][$i]['hotel']['hotel_title'];
                        $leftArray = $_POST['u_data'][$i]['hotel']['left_offer'];
                        $leftList = implode('~', $leftArray);
                        $rightArray = $_POST['u_data'][$i]['hotel']['right_offer'];
                        $rightList = implode('~', $rightArray);

                        $hotel_images = !empty($request->u_data[$i]['hotel']['hotel_images']) ? $request->u_data[$i]['hotel']['hotel_images'] : '';

                        if (!empty($hotel_images)) {
                            // echo '<pre/>'; print_r($hotel_images);//die;
                            foreach ($hotel_images as $image3) :
                                $var = date_create();
                                $time = date_format($var, 'YmdHis');
                                $hotelImageName = $time . '_' . $image3->getClientOriginalName();
                                $image3->storeAs('uploads/pages/weekend/', $hotelImageName, 'public');
                                $imgArray[] = $hotelImageName;
                            endforeach;
                            $hotel_images = implode(',', $imgArray);
                            // echo $hotel_images = $hotel_images .','.$existImage['images'];
                            $imgArray = [];
                        } else {
                            $hotel_images = $_POST['old_hotel_images'][$i];
                        }
                        // echo $hotel_images;
                        $attrData = [
                            'title' => $hotel_title,
                            'images' => $hotel_images ?? null,
                            'left_list' => $leftList ?? null,
                            'right_list' => $rightList ?? null,
                        ];
                        longWeekend::where('id', $_POST['weekend_id'][$i])->update($attrData);
                    }
                    // die;
                }
                if (isset($_POST['data'])) {
                    $newRow = count($_POST['data']);
                    // echo '<pre/>'; print_r($_POST['data']);die;
                    $imageArray = [];
                    $imgArray = [];
                    for ($i = 0; $i < $newRow; $i++) {
                        if (empty($_POST['data'][$i])) {
                            $i++;
                        }
                        $hotel_title = $_POST['data'][$i]['hotel']['hotel_title'];
                        $leftArray = $_POST['data'][$i]['hotel']['left_offer'];
                        $leftList = implode('~', $leftArray);
                        $rightArray = $_POST['data'][$i]['hotel']['right_offer'];
                        $rightList = implode('~', $rightArray);

                        $hotel_images = !empty($request->data[$i]['hotel']['hotel_images']) ? $request->data[$i]['hotel']['hotel_images'] : '';

                        if (!empty($hotel_images)) {
                            // echo '<pre/>'; print_r($hotel_images);//die;
                            foreach ($hotel_images as $image3) :
                                $var = date_create();
                                $time = date_format($var, 'YmdHis');
                                $hotelImageName = $time . '_' . $image3->getClientOriginalName();
                                $image3->storeAs('uploads/pages/weekend/', $hotelImageName, 'public');
                                $imgArray[] = $hotelImageName;
                            endforeach;
                            echo $hotel_images = implode(',', $imgArray);
                            // echo $hotel_images = $hotel_images .','.$existImage['images'];
                            $imgArray = [];
                        } else {
                            $hotel_images = $_POST['old_hotel_images'][$i];
                        }
                        // echo $hotel_images;
                        $newRowData = [
                            'title' => $hotel_title,
                            'images' => $hotel_images ?? null,
                            'left_list' => $leftList ?? null,
                            'right_list' => $rightList ?? null,
                        ];
                        echo '<pre/>';
                        print_r($newRowData);
                        longWeekend::insert($newRowData);
                    }
                }
                // die;
            } else {
                $imageArray = [];
                $imgArray = [];
                $visitorData = count($_POST['data']);
                for ($i = 0; $i < $visitorData; $i++) {
                    $hotel_title = $_POST['data'][$i]['hotel']['hotel_title'];
                    $leftArray = $_POST['data'][$i]['hotel']['left_offer'];
                    $leftList = implode('~', $leftArray);
                    $rightArray = $_POST['data'][$i]['hotel']['right_offer'];
                    $rightList = implode('~', $rightArray);

                    $hotel_images = !empty($request->data[$i]['hotel']['hotel_images']) ? $request->data[$i]['hotel']['hotel_images'] : '';

                    if (!empty($hotel_images)) {
                        // echo '<pre/>'; print_r($hotel_images);//die;
                        foreach ($hotel_images as $image3) :
                            $var = date_create();
                            $time = date_format($var, 'YmdHis');
                            $hotelImageName = $time . '_' . $image3->getClientOriginalName();
                            $image3->storeAs('uploads/pages/weekend/', $hotelImageName, 'public');
                            $imgArray[] = $hotelImageName;
                        endforeach;
                        $hotel_images = implode(',', $imgArray);
                        $imgArray = [];
                    } else {
                        $hotel_images = $_POST['old_hotel_images'][$i];
                    }
                    // echo $hotel_images;
                    $attrData = [
                        'title' => $hotel_title,
                        'images' => $hotel_images ?? null,
                        'left_list' => $leftList ?? null,
                        'right_list' => $rightList ?? null,
                    ];
                    longWeekend::insert($attrData);
                }
                // die;
            }
        } else {
            // $section1Image = $request->file('section_1');
            // if ($request->hasFile('section_1')) :
            //     foreach ($section1Image as $image):
            //         $var = date_create();
            //         $time = date_format($var, 'YmdHis');
            //         $names = $time . '-' . $image->getClientOriginalName();
            //         $image->storeAs('uploads/pages/weekend/', $names, 'public');
            //         $arr[] = $names;
            //     endforeach;
            //     $section_1Images = implode(",", $arr);
            // else:
            //         $section_1Images = NULL;
            // endif;

            if ($request->hasfile('banner_image')) {
                $image = $request->file('banner_image');
                $imgName = $image->getClientOriginalName();
                $image->storeAs('uploads/pages/weekend/', $imgName, 'public');
            }

            $weekend_page = new PageBuilders();
            $weekend_page->type = 'weekend';
            $weekend_page->title = $request->title;
            $weekend_page->heading = $request->heading;
            $weekend_page->subheading = $request->subheading;
            $weekend_page->section_10 = $request->offer_status;
            $weekend_page->meta_title = $request->meta_title;
            $weekend_page->meta_description = $request->meta_description;
            $weekend_page->image = $imgName ?? null;

            $do = $weekend_page->save();
            if ($do) {
                // echo '<pre/>';print_r($_FILES);
                $visitorData = count($_POST['data']);

                $imageArray = [];
                $imgArray = [];
                for ($i = 0; $i < $visitorData; $i++) {
                    // Start Left
                    $hotel_title = $_POST['data'][$i]['hotel']['hotel_title'];
                    $leftArray = $_POST['data'][$i]['hotel']['left_offer'];
                    $leftList = implode('~', $leftArray);
                    $rightArray = $_POST['data'][$i]['hotel']['right_offer'];
                    $rightList = implode('~', $rightArray);

                    $hotel_images = !empty($request->data[$i]['hotel']['hotel_images']) ? $request->data[$i]['hotel']['hotel_images'] : '';
                    // echo '<pre/>';print_r($hotel_images);
                    if (!empty($hotel_images)) {
                        foreach ($hotel_images as $image3) :
                            // echo '<pre/>';print_r($image3);
                            $var = date_create();
                            $time = date_format($var, 'YmdHis');
                            $hotelImageName = $time . '_' . $image3->getClientOriginalName();
                            $image3->storeAs('uploads/pages/weekend/', $hotelImageName, 'public');
                            $imgArray[] = $hotelImageName;
                        endforeach;
                        $hotel_images = implode(',', $imgArray);
                        $imgArray = [];
                    } else {
                        $hotel_images = null;
                    }
                    $data[] = [
                        'title' => $hotel_title,
                        'images' => $hotel_images ?? null,
                        'left_list' => $leftList ?? null,
                        'right_list' => $rightList ?? null,
                    ];
                }

                longWeekend::insert($data);
            }
            die();
        }
        return redirect()->route('superadmin.page-weekend.index')->with('success', 'Weekend Page updated successfully');
    }

    public function removeHotel(Request $request, $id)
    {
        $do = longWeekend::where('id', $request->id)->delete();
        if ($do) {
            return json_encode(['status' => 'success', 'message' => 'Hotel removed successfully.']);
        }
    }

    public function destroy($id)
    {
        //$info =   longWeekend::find($id);
        $do = longWeekend::where('id', $id)->delete();
        if ($do) {
            return json_encode(['status' => 'success', 'message' => 'Hotel removed successfully.']);
        }
    }

    public function managerIndex(Request $request)
    {
        $files = Storage::disk('public')->files('/');
        $directories = Storage::disk('public')->directories('/');

        return view('admin.page-management.manager', compact('files', 'directories'));
    }

    public function viewDirectory($directory)
    {
        $files = Storage::disk('public')->files($directory);
        $directories = Storage::disk('public')->directories($directory);

        return view('admin.page-management.manager', compact('files', 'directories'));
    }

    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,pdf,docx|max:2048',
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();

        Storage::disk('public')->put($fileName, File::get($file));

        return redirect()->route('page.management.manager.index')->with('success', 'File uploaded successfully.');
    }

    public function deleteFile($file)
    {
        Storage::disk('public')->delete($file);

        return redirect()->route('page.management.manager.index')->with('success', 'File deleted successfully.');
    }
}
