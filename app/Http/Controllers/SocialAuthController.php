<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;  
use Illuminate\Support\Facades\Auth;
use App\member;

class SocialAuthController extends Controller
{
    public function redirect($service) 
    {
        return Socialite::driver ($service)->redirect ();
    }

    public function callback($service) 
    {
        $user  = Socialite::driver($service)->user();
        //Check if user with same email address exist
        $userlogin = member::where('email', $user->getEmail())->first();

        //Create user if dont'exist
        if (!$userlogin) {
            $userlogin      = member::create([
                'name'      => $user->getName(),
                'email'     => $user->getEmail(),
                'type'      => $service,
            ]);
        }
        Auth::login($userlogin);
        return redirect()->to('/');
    }
}
