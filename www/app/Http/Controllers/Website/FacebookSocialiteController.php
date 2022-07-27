<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookSocialiteController extends Controller
{
    //
    public function redirectToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function handleCallback(){
        try {     
            $user = Socialite::driver('facebook')->user();      
            $finduser = User::where('social_id', $user->id)->first();      
            if($finduser){      
                Auth::login($finduser);     
                return redirect()->route('site.home');      
            }else{
                $data = [
                    'first_name' => $user->user['first_name'],
                    'last_name' => $user->user['last_name'],
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social_type' => 'facebook'
                ];
                // dd($data);
                return view('web.pages.auth.register')->with($data);
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
