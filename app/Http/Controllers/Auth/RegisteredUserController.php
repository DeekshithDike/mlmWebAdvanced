<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Mail;
use App\Models\BinaryTreeLeft;
use App\Models\BinaryTreeRight;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.customer-register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:75'],
            'email' => ['required', 'string', 'email', 'max:75'],
            'mobileNumber' => ['required','numeric','digits_between:4,20'],
            'country'=>['required', 'max:50'],
            'sponsorId'=>'required',
            'position'=>'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'iAgreeWithPolicy'=>'required',
        ]);

        
        $sponsorIdExist = User::checkExist(['login_id' => $request->sponsorId]);

        if (!$sponsorIdExist) {
            return back()->withErrors([
                'sponsorId' => 'The provided Sponsor ID do not match our records.',
            ]);
        } else if ($request->position != "Left" && $request->position != "Right") {
            return back()->withErrors([
                'position' => 'The provided position do not match our records.',
            ]);
        } else {
            try {
                $loginId = $this->generateRandomLoginId();
                $user = User::create([
                    'login_id' => $loginId,
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'mobile_no' => $request->mobileNumber,
                    'country' => $request->country,
                    'sponsor_id'=> $request->sponsorId,
                    'position'=> $request->position,
                    'reg_ip_address'=> $request->ip(),
                ]);

                event(new Registered($user));

                $userDet = User::getUsersDetails(["login_id" => $request->sponsorId]);
                if ($request->position == "Left") {
                    $leftorRightMostId = BinaryTreeLeft::getLeftMostId([
                        "users_id" => $userDet->id,
                    ]);
                } else {
                    $leftorRightMostId = BinaryTreeRight::getRightMostId([
                        "users_id" => $userDet->id,
                    ]);
                }

                if ($leftorRightMostId) {
                    $parent_id = $leftorRightMostId->child_id;
                } else {
                    $parent_id = $userDet->id;
                }
                
                $sendPayload = [
                    'users_id' => $user->id,
                    'sponsor_id' => $userDet->id,
                    'parent_id' => $parent_id,
                    'child_position' => $request->position,
                    'name' => $request->name,
                    'email' => $request->email,
                    'mobile_no' => $request->mobileNumber
                ];
                
                // call API to send credentials and add user to the tree
                $client = new \GuzzleHttp\Client();
                $url = config('services.nodeapi.endpoint')."/api/v1/user/calculation";
                $promise = $client->postAsync($url, ['json' => $sendPayload], ['Content-Type' => 'application/json']);            
                $promise->wait();

                // Auth::login($user);
                // return redirect(RouteServiceProvider::HOME);
                
                $mailData = array('name' => $request->name, 'userId' => $loginId, 'password' => $request->password, 'email' => $request->email);

                Mail::send('mail.newuser', $mailData, function ($message) use ($mailData) {
                    $message->to($mailData['email'], $mailData['name'])->subject('New User Login Details');
                    $message->from(config('mail.from.address'), config('mail.from.name'));
                });

                return view('auth.user_credentials')->with(["userId" => $loginId, "password" => $request->password]);
                // return redirect()->back()->with('success', 'Registration successful, Your login details sent to '.$request->email);
            } catch (\Throwable $th) {
                User::where('id', $user->id)->delete();
                return back()->withErrors([
                    'name' => 'Registration failed, try after sometime.'.$th->getMessage(),
                ]);
            }
        }
    }

    public function generateRandomLoginId() {
        $random = str_shuffle('1234567890');
        $loginId = date("s")."".substr($random, 0, 5);
        $loginIdExist = User::checkExist(['login_id' => $loginId]);

        if (!$loginIdExist) {
            return "KM".$loginId;
        } else {
            return $this->generateRandomLoginId();
        }
    }

    public function registerDirect(Request $request)
    {
        if (($request->query('position') == 'Left' || $request->query('position') == 'Right') && ($request->query('userID') != null)) {
            return view('auth.customer-register-direct')->with(['position' => $request->query('position'), 'userID' => $request->query('userID')]);
        } else {
            return abort(404);
        }
    }
}
