<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        if (Auth::attempt(['login_id'=>$data['loginId'],'password'=>$data['password'],'login_status'=>1, 'user_role'=>'USER'])) {
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

    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
 
        $data = $request->input();
        if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'login_status'=>1, 'user_role'=>'ADMIN'])) {
            $request->session()->regenerate();
 
            User::updateUser(Auth::user()->id, ["login_ip_address" => $request->ip(), "last_login_datetime" => date('Y-m-d h:m:s')]);
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
