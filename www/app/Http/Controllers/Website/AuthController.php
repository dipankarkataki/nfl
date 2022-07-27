<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\GameLevel;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Twilio\Rest\Client;

class AuthController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('get')){
            return view('web.pages.auth.login');
        }else{
            $validator = Validator::make($request->all(),[
                'email' => 'required',
                'password' => 'required'
            ]);

            if($validator->fails()){
                return response()->json(['message' => $validator->errors()->first(), 'status' => 0]);
            }else{
                try{
                    $check_if_payment_done = Payment::where('user_id', Auth::id())->exists();
                    if( Auth::attempt(['email' => $request->email, 'password' => $request->password]) ){
                        if($check_if_payment_done == 0){
                            return response()->json(['message' => 'Login Successfull', 'url' => route('site.select.level'), 'status' => 1]); 
                        }else{
                            return response()->json(['message' => 'Login Successfull', 'url' => route('user.dashboard'), 'status' => 1]); 
                        }
                    }else if( Auth::attempt(['phone_no' => $request->email, 'password' => $request->password]) ){
                        if($check_if_payment_done == 0){
                            return response()->json(['message' => 'Login Successfull', 'url' => route('site.select.level'), 'status' => 1]); 
                        }else{
                            return response()->json(['message' => 'Login Successfull', 'url' => route('user.dashboard'), 'status' => 1]); 
                        }
                    }else{
                        return response()->json(['message' => 'Whoops! Login Failed. Wrong Email/Cell no or Password', 'status' => 0]); 
                    }
                }catch(\Exception $e){
                    return response()->json(['message' => 'Whoops! Something went wrong. Please try after sometime.', 'status' => 0]); 
                }
                
            }
        }
    }

    public function logout(Request $request){
        Auth::logout(); 
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('site.home');
    }

    public function register(Request $request){
        if ($request->isMethod('get')) {
            return view('web.pages.auth.register');
        } else {
            $validator = Validator::make($request->all(),[
                'fname' => 'required',
                'lname' => 'required',
                'email' => 'required',
                'phone' => 'required | numeric | digits:10',
                'password' => 'required',
                'cpassword' => 'required'
            ]);
    
            if($validator->fails()){
                return response()->json(['message' => $validator->errors()->first(), 'status' => 0]);
            }else{
    
                try{
    
                    $user_details = User::where('email', $request->email)->where('role', 0)->first();
    
                    //Configs For Sending SMS Using Twilio
    
                    $account_sid = env('TWILIO_SID');
                    $account_token = env('TWILIO_TOKEN');
                    $account_msg_from = env('TWILIO_MSG_FROM');
    
                    if($request->password != $request->cpassword){
                        return response()->json(['message' => 'Password not matched', 'status' => 0]);
                    }else if( ($user_details != null) && ($user_details->phone_verified_at == null) ){
    
                        $update = User::where('email',$request->email)->update([
                            'first_name' => $request->fname,
                            'last_name' => $request->lname,
                            'email' => $request->email,
                            'phone_no' => $request->countryCode.$request->phone,
                            'password' => Hash::make($request->password),
                            'role' => 0
                        ]);
            
                        if($update){
                            $otp = rand(100000, 999999);
                            Cache::put('otp', $otp, now()->addMinutes(5));
    
                            $request->session()->put('email' , $request->email);
                            $request->session()->put('phone' ,  $request->countryCode.$request->phone);
    
                            //For Sending SMS Using Twilio
                            try{
                                $client = new Client($account_sid, $account_token);
                                $client->messages->create(
    
                                    // the number you'd like to send the message to
                                    '+'.$request->countryCode.$request->phone,
                                    [
                                        'from' => $account_msg_from,
    
                                        // the body of the text message you'd like to send
                                        'body' => 'Hello! Your OTP for registering into 4TeamFantasy is '.$otp.'. This OTP is only valid for 5 minutes.'
                                    ]
                                );
                                return response()->json(['message' => 'OTP sent successfully', 'status' => 1]);
                            }catch(\Exception $e){
                                return response()->json(['message' => 'Failed to sent OTP', 'status' => 0]);
                            }
    
                        }else{
                            return response()->json(['message' => 'Whoops! Something went wrong.', 'status' => 0]);
                        }
    
                    }else if( ($user_details != null) && ($user_details->phone_verified_at != null) ){
                        return response()->json(['message' => 'Whoops! User is already registered. Please login.', 'status' => 0]);
                    }else{
    
                        $create = User::create([
                            'first_name' => $request->fname,
                            'last_name' => $request->lname,
                            'email' => $request->email,
                            'phone_no' => $request->countryCode.$request->phone,
                            'password' => Hash::make($request->password),
                            'role' => 0
                        ]);
            
                        if($create){
                            $otp = rand(100000, 999999);
                            Cache::put('otp', $otp, now()->addMinutes(5));
    
                            $request->session()->put('email' , $request->email);
                            $request->session()->put('phone' ,  $request->countryCode.$request->phone);

                            try{
                                $client = new Client($account_sid, $account_token);
                                $client->messages->create(
    
                                    // the number you'd like to send the message to
                                    '+'.$request->countryCode.$request->phone,
                                    [
                                        'from' => $account_msg_from,
    
                                        // the body of the text message you'd like to send
                                        'body' => 'Hello! Your OTP for registering into 4TeamFantasy is '.$otp.'. This OTP is only valid for 5 minutes.'
                                    ]
                                );
                                return response()->json(['message' => 'OTP sent successfully', 'status' => 1]);
                            }catch(\Exception $e){
                                return response()->json(['message' => 'Failed to sent OTP', 'status' => 0]);
                            }
                        }else{
                            return response()->json(['message' => 'Whoops! Something went wrong.', 'status' => 0]);
                        }
                    }
                    
                }catch(\Exception $e){
                    return response()->json(['message' => 'Server Error. Please Contact Admin.', 'status' => 0]);
                }
            }
        }
    }

    public function selectLevel(){
        $level_details = GameLevel::get(); 
        return view('web.pages.select_level')->with(['level_details' => $level_details]);
    }

    public function paymentAfterRegistration(Request $request){
        $level_id = Crypt::decrypt($request->level_id);
        try{
            $user_details = User::where('email', $request->session()->get('email'))->first();
            $game_details = GameLevel::where('id', $level_id)->first();

            $create = Payment::create([
                'game_level' => $game_details->level_name,
                'amount' => $game_details->amount,
                'payment_status' => 1,
                'user_id' => $user_details->id
            ]);

            if($create){
                return response()->json(['message' => 'Payment success.', 'status' => 1]);
            }else{
                return response()->json(['message' => 'Whoops! Payment Failed. You can login now', 'status' => 0]);
            }
        }catch(\Exception $e){
            return response()->json(['message' => 'Server Error. Contact Admin', 'status' => 0]);
        }
       
    }

    public function resendOTP(Request $request){

        $account_sid = env('TWILIO_SID');
        $account_token = env('TWILIO_TOKEN');
        $account_msg_from = env('TWILIO_MSG_FROM');

        $otp = rand(100000, 999999);
        Cache::put('otp', $otp, now()->addMinutes(5));

        try{
            $client = new Client($account_sid, $account_token);
            $client->messages->create(

                // the number you'd like to send the message to
                '+'.$request->session()->get('phone'),
                [
                    'from' => $account_msg_from,

                    // the body of the text message you'd like to send
                    'body' => 'Hello! Your OTP for registering into 4TeamFantasy is '.$otp.'. This OTP is only valid for 5 minutes.'
                ]
            );
            return response()->json(['message' => 'OTP sent successfully', 'status' => 1]);
        }catch(\Exception $e){
            return response()->json(['message' => 'Failed to sent OTP', 'status' => 0]);
        }
    }

    public function verifyOtp(Request $request){
        if ($request->isMethod('get')) {
            return view('web.pages.auth.otp_validate');
        } else {
            $validator = Validator::make($request->all(),[
                'otp_digit_1' => 'required | numeric | digits:1',
                'otp_digit_2' => 'required | numeric | digits:1',
                'otp_digit_3' => 'required | numeric | digits:1',
                'otp_digit_4' => 'required | numeric | digits:1',
                'otp_digit_5' => 'required | numeric | digits:1',
                'otp_digit_6' => 'required | numeric | digits:1'
            ]);
    
            if($validator->fails()){
                return response()->json(['message' => $validator->errors()->first(), 'status' => 0]);
            }else{
                $otp = $request->otp_digit_1.$request->otp_digit_2.$request->otp_digit_3.$request->otp_digit_4.$request->otp_digit_5.$request->otp_digit_6 ;
                if(Cache::get('otp') != $otp){
                    return response()->json(['message' => 'Whoops! Failed to verify OTP.', 'status' => 0 ]);
                }else{
                    User::where('email', $request->session()->get('email'))->update([
                        'phone_otp' => $otp,
                        'phone_verified_at' => date('Y-m-d H:i:s')
                    ]);
                    Cache::forget('otp');
                    return response()->json(['message' => 'OTP verified successfully.', 'status' => 1 ]);
                }
            }
        }
    }

    public function forgotPassword(){
        return view('web.pages.auth.forgot_password');
    }
}
