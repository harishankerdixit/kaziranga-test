<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Image;

class settingsController extends Controller
{
    public function razorpaySettingView(Request $request)
    {
        $razorpay = Setting::where('type', 'razorpay')->get()->toArray();
        $razorpay_key = $razorpay[0]['value']['razorpay_key'];
        $razorpay_secret_key = $razorpay[0]['value']['razorpay_secret_key'];

        return view('admin.settings.razorpay', compact('razorpay_key', 'razorpay_secret_key'));
    }

    public function razorpaySettingStore(Request $request)
    {
        Setting::where('type', 'razorpay')->delete();

        Setting::create([
            'type' => 'razorpay',
            'value' => [
                'razorpay_key' => $request->razorpay_key,
                'razorpay_secret_key' => $request->razorpay_secret_key,
            ],
        ]);

        session()->flash('success', 'Razorpay Credentials Updated successfully..');

        return redirect()->back();
    }

    public function contactSettingView(Request $request)
    {
        $razorpay = Setting::where('type', 'contact')->get()->toArray();
        $phone = $razorpay[0]['value']['phone'];
        $alt_phone = $razorpay[0]['value']['alt_phone'];
        $second_alt_phone = $razorpay[0]['value']['second_alt_phone'];
        $email = $razorpay[0]['value']['email'];
        $address = $razorpay[0]['value']['address'];

        return view('admin.settings.contact', compact('phone', 'alt_phone', 'second_alt_phone', 'email', 'address'));
    }

    public function contactSettingStore(Request $request)
    {
        Setting::where('type', 'contact')->delete();

        Setting::create([
            'type' => 'contact',
            'value' => [
                'phone' => $request->phone,
                'alt_phone' => $request->alt_phone,
                'second_alt_phone' => $request->second_alt_phone,
                'email' => $request->email,
                'address' => $request->address,
            ],
        ]);

        session()->flash('success', 'Contact Details Updated successfully..');

        return redirect()->back();
    }

    public function newsSettingView(Request $request)
    {
        $razorpay = Setting::where('type', 'news')->get()->toArray();
        $news = $razorpay[0]['value']['news'];
        $status = $razorpay[0]['value']['status'];
        $image = $razorpay[0]['image'];

        return view('admin.settings.news', compact('news', 'status', 'image'));
    }

    public function newsSettingStore(Request $request)
    {
        Setting::where('type', 'news')->delete();

        $setting = new Setting();
        $setting->type = 'news';
        $setting->value = [
            'news' => $request->news,
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalName = $image->getClientOriginalName();
            $filename = 'news_' . $originalName;
            $path = public_path('admin/auth/' . $filename);
            $removePath = public_path('admin/auth/');

            $files = File::files($removePath);
            foreach ($files as $file) {
                $fileInfo = pathinfo($file);
                $fileBaseName = $fileInfo['filename'];

                if (Str::startsWith($fileBaseName, 'news' . '_')) {
                    File::delete($file);
                }
            }

            Image::make($image->getRealPath())->save($path);

            $setting->image = $filename;
        }

        $setting->save();

        session()->flash('success', 'News Details Updated successfully.');

        return redirect()->back();
    }

    public function accountSettingView(Request $request)
    {
        $userId = auth()->user()->id;
        $razorpay = User::where('id', $userId)->get()->toArray();
        $name = $razorpay[0]['name'];
        $email = $razorpay[0]['email'];
        $image = $razorpay[0]['avatar'];

        return view('admin.settings.account', compact('name', 'email', 'image', 'userId'));
    }

    public function accountSettingStore(Request $request)
    {
        $userId = auth()->user()->id;

        $setting = User::find($userId);
        $setting->name = $request->name;
        $setting->email = $request->email;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalName = $image->getClientOriginalName();
            $filename = 'account_' . $userId . '_' . $originalName;
            $path = public_path('admin/auth/' . $filename);
            $removePath = public_path('admin/auth/');

            $files = File::files($removePath);
            foreach ($files as $file) {
                $fileInfo = pathinfo($file);
                $fileBaseName = $fileInfo['filename'];

                if (Str::startsWith($fileBaseName, 'account_' . $userId . '_')) {
                    File::delete($file);
                }
            }

            Image::make($image->getRealPath())->resize(200, 200)->save($path);

            $setting->avatar = $filename;
        }

        $setting->save();

        session()->flash('success', 'Account Details Updated successfully.');

        return redirect()->back();
    }

    public function passwordSettingView(Request $request)
    {
        return view('admin.settings.password');
    }

    public function passwordSettingStore(Request $request)
    {
        if ($request->current_password == '') {
            session()->flash('error', 'Enter the current password....');
            return redirect()->back();
        }

        if ($request->new_password != $request->new_password_confirmation) {
            session()->flash('error', 'The provided current password does not match your actual password.');
            return redirect()->back();
        }
        $user = Auth::user();

        // Update the user's password
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);
        session()->flash('success', 'Password updated successfully.');

        return redirect()->back();
    }
}
