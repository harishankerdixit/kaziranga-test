<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Enquiry;
use App\Models\Hotel;
use App\Models\Package;
use App\Models\Customer;
use App\Models\MainSiteLead;
use GuzzleHttp\Client;

class AuthController extends Controller
{
    public function login_view()
    {
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->where('is_superadmin', 'superadmin')->first();

            if ($user) {
                $token = $user->createToken($request->email)->plainTextToken;
                $request->session()->put('token', $token);

                return [
                    'status' => 'success',
                    'token' => $token,
                ];
            } else {
                return [
                    'status' => 'failed',
                    'message' => 'User not found or not a superadmin.',
                ];
            }
        }

        return [
            'status' => 'failed',
            'message' => 'Invalid credentials',
        ];
    }

    public function viewDashboard()
    {
        $hotels = Hotel::count();
        $packages = Package::count();
        $enquiries = Enquiry::count();
        $customers = Customer::count();

        $general_enquiries = Enquiry::whereNotIn('type', ['hotel'])
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();
        $hotel_enquiries = Enquiry::whereIn('type', ['hotel'])
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        return view('admin.layouts.dashboard', compact('general_enquiries', 'hotel_enquiries', 'hotels', 'packages', 'enquiries', 'customers'));
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        Session::flush();
        Auth::logout();

        return Redirect('/admin/login');
    }

    public function deleteCustomer(Request $request)
    {
        $id = $request->id;
        $lead = Enquiry::find($id);

        if (!$lead) {
            return [
                'status' => 'failed',
                'msg' => 'Lead Data not found!!',
            ];
        }

        $lead->delete();

        return [
            'status' => 'success',
            'msg' => 'Enquiry Deleted Successfully..',
        ];
    }

    // public function postRegistration(Request $request)
    // {
    //     $request->validate(
    //         [
    //             'name' => 'required',
    //             'phone' => 'required',
    //             'email' => ['required', 'email', Rule::unique('users')],
    //             'password' => 'required',
    //         ],
    //         [
    //             'name.required' => 'The username is required.',
    //             'phone.required' => 'The phone number is required.',
    //             'email.required' => 'The email address is required.',
    //             'email.email' => 'Invalid email format.',
    //             'email.unique' => 'This email address is already registered.',
    //             'password.required' => 'The password is required.',
    //         ],
    //     );
    //     $user = User::create([
    //         'name' => $request->input('name'),
    //         'phone' => $request->input('phone'),
    //         'email' => $request->input('email'),
    //         'password' => Hash::make($request->input('password')),
    //         'is_superadmin' => 'superadmin',
    //     ]);

    //     Auth::login($user);

    //     $token = $user->createToken($request->email)->plainTextToken;
    //     return [
    //         'status' => 'success',
    //     ];
    // }

    // public function showForgetPasswordForm()
    // {
    //     return view('auth.forgot_password');
    // }

    // public function submitForgetPasswordForm(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email|exists:users',
    //     ]);

    //     $token = Str::random(64);

    //     DB::table('password_reset_tokens')->insert([
    //         'email' => $request->email,
    //         'token' => $token,
    //         'created_at' => Carbon::now(),
    //     ]);

    //     Mail::send('auth.forgot', ['token' => $token], function ($message) use ($request) {
    //         $message->to($request->email);
    //         $message->subject('Reset Password');
    //     });

    //     return back()->with('message', 'We have e-mailed your password reset link!');
    // }

    // public function showResetPasswordForm($token)
    // {
    //     return view('auth.forgot_password_link', ['token' => $token]);
    // }

    // public function submitResetPasswordForm(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email|exists:users',
    //         'password' => 'required|string|min:6|confirmed',
    //         'password_confirmation' => 'required',
    //         'token' => 'required',
    //     ]);

    //     $updatePassword = DB::table('password_reset_tokens')
    //         ->where([
    //             'email' => $request->email,
    //             'token' => $request->token,
    //         ])
    //         ->first();

    //     if (!$updatePassword) {
    //         return back()->withInput()->with('error', 'Invalid token!');
    //     }

    //     $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

    //     DB::table('password_reset_tokens')
    //         ->where(['email' => $request->email])
    //         ->delete();
    //     return redirect('/')->with('message', 'Your password has been changed!');
    // }

    // public function getBookingSafariList()
    // {
    //     $users = MainSiteLead::with('booking')->where('status', 'active')->where('type', 'safari')->orderBy('created_at', 'desc')->get()->toArray();

    //     return view('safari_booking.safari_booking', compact('users'));
    // }

    // public function deleteSafariBooking(Request $request)
    // {
    //     $id = $request->id;
    //     $lead = MainSiteLead::find($id);

    //     if (!$lead) {
    //         return [
    //             'status' => 'failed',
    //             'msg' => 'Lead Data not found!!',
    //         ];
    //     }

    //     $lead->delete();

    //     return [
    //         'status' => 'success',
    //         'msg' => 'User Deleted Successfully..',
    //     ];
    // }

    // public function safariBookingFilterList(Request $request)
    // {
    //     $query = MainSiteLead::with('booking')->where('status', 'active')->where('type', 'safari')->orderBy('created_at', 'desc');

    //     if ($request->has('name')) {
    //         $query->where('name', 'like', '%' . $request->input('name') . '%');
    //     }

    //     if ($request->has('phone')) {
    //         $query->where('phone', 'like', '%' . $request->input('phone') . '%');
    //     }

    //     if ($request->has('email')) {
    //         $query->where('email', 'like', '%' . $request->input('email') . '%');
    //     }

    //     $users = $query->get()->toArray();
    //     return $users;
    // }

    // public function getCustomerList()
    // {
    //     $users = MainSiteLead::where('status', 'active')->where('type', 'lead')->orderBy('created_at', 'desc')->get()->toArray();
    //     return view('customers.customers_list', compact('users'));
    // }

    // public function customerFilterList(Request $request)
    // {
    //     $query = MainSiteLead::where('status', 'active')->where('type', 'lead')->orderBy('created_at', 'desc');

    //     if ($request->has('name')) {
    //         $query->where('name', 'like', '%' . $request->input('name') . '%');
    //     }

    //     if ($request->has('phone')) {
    //         $query->where('phone', 'like', '%' . $request->input('phone') . '%');
    //     }

    //     if ($request->has('email')) {
    //         $query->where('email', 'like', '%' . $request->input('email') . '%');
    //     }

    //     $users = $query->get()->toArray();
    //     return $users;
    // }

    // public function changePasswordPost(Request $request)
    // {
    //     $request->validate([
    //         'current_password' => 'required',
    //         'new_password' => 'required|string|min:6|confirmed',
    //     ]);

    //     $user = auth()->user();

    //     if (!Hash::check($request->current_password, $user->password)) {
    //         return redirect()
    //             ->back()
    //             ->withErrors(['current_password' => 'The provided password does not match your current password.']);
    //     }

    //     $user->update([
    //         'password' => Hash::make($request->new_password),
    //     ]);

    //     return redirect()->route('changePassword')->with('success', 'Password changed successfully!');
    // }

    // public function updateProfile()
    // {
    //     $user = Auth::user();
    //     return view('settings.profile', compact('user'));
    // }

    // public function updateProfilePost(Request $request)
    // {
    //     $request->validate([
    //         'full_name' => 'required|string|max:255',
    //         'mobile_number' => 'required|string|max:20',
    //         'email' => 'required|email|max:255',
    //         'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $user = auth()->user();
    //     $user->update([
    //         'name' => $request->input('full_name'),
    //         'phone' => $request->input('mobile_number'),
    //         'email' => $request->input('email'),
    //     ]);

    //     if ($request->hasFile('profile_image')) {
    //         $image = $request->file('profile_image');
    //         $imageName = $user->id . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('profile_images'), $imageName);

    //         $user->update(['avatar' => $imageName]);
    //     }

    //     return [
    //         'status' => 'success',
    //         'msg' => 'Profile Updated Successfully..',
    //     ];
    // }

    // public function changePassword()
    // {
    //     return view('settings.change_password');
    // }

    // public function reset_password()
    // {
    //     return view('welcome');
    // }

    // public function customerLeadData(Request $request)
    // {
    //     $name = $request->name;
    //     $email = $request->email;
    //     $phone = $request->phone;
    //     $destination = $request->destination;
    //     $timing = $request->timing;
    //     $assign_date = $request->assign_date;
    //     $description = $request->description;

    //     $users = MainSiteLead::create([
    //         'name' => $name,
    //         'email' => $email,
    //         'phone' => $phone,
    //         'destination' => $destination,
    //         'timing' => $timing,
    //         'assign_date' => $assign_date,
    //         'custom_data' => $description,
    //         'status' => 'active',
    //         'type' => 'lead',
    //     ]);

    //     return [
    //         'status' => 'Success',
    //         'msg' => 'Data Submitted Successfully..',
    //     ];
    // }

    public function adminLoginWithOtp(Request $request)
    {
        if ($request->number != "9718717115" || $request->number == "") {
            return [
                'status' => 'failed',
                'message' => 'Wrong Number!!',
            ];
        } else {
            Session::put('emailOtp', mt_rand(1111, 9999));
            $otp = Session::get('emailOtp');
            Session::put('mobileNumber', $request->number);

            $client = new Client();
            $response = $client->request('GET', 'http://login.pacttown.com/api/mt/SendSMS', [
                'query' => [
                    'user' => 'N2RTECHNOLOGIES',
                    'password' => '994843',
                    'senderid' => 'JUNGSI',
                    'channel' => 'Trans',
                    'DCS' => 0,
                    'flashsms' => 0,
                    'number' => $request->number,
                    'text' => 'Your one time password to activate your account is Kaziranga Admin ' . $otp . '. Jungle Safari India',
                ]
            ]);

            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                return [
                    'status' => 'success',
                    'message' => 'OTP sent successfully!',
                    'otp' => $otp
                ];
            } else {
                return [
                    'status' => 'failed',
                    'message' => 'Failed to send OTP.'
                ];
            }
        }
    }


    public function verifyAdminLoginWithOtp(Request $request)
    {
        $userOtp = $request->otp;
        $actualOtp = Session::get('emailOtp');

        if ($userOtp != $actualOtp) {
            return [
                'status' => 'failed',
                'message' => 'Invalid OTP!',
            ];
        }

        if (strlen($userOtp) != 4) {
            return [
                'status' => 'failed',
                'message' => 'Invalid OTP length!',
            ];
        }

        $mobileNumber = Session::get('mobileNumber');

        // Find the user by their mobile number
        $user = User::where('phone', $mobileNumber)->first();

        if ($user) {
            // Log in the user
            Auth::login($user);

            return [
                'status' => 'success',
                'message' => 'Login successful!',
            ];
        } else {
            // User not found
            return [
                'status' => 'failed',
                'message' => 'Failed to login user!',
            ];
        }
    }
}
