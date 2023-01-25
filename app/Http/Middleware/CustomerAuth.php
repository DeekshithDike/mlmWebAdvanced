<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->user_role != 'USER') {
            return abort(401);
        }

        // $currentDay = date('Y-m-d');
        // if ($currentDay > auth()->user()->expiry_date) {     
        //     Auth::logout();
        //     return redirect('customer/login')->withErrors([
        //         'loginId' => 'User id is expired.',
        //     ]);
        // }

        return $next($request);
    }
}
