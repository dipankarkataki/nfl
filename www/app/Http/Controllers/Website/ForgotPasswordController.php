<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Mail\UserSendResetMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    public function forgotPassword(){
        
        return view('web.pages.forgot_password.forgotPassword');
        
    }

    public function sendResetLink(Request $request){
        
        $validator = Validator::make($request->all(),[
            'email' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['message' => $validator->errors()->first(), 'status' => 0]);
        }else{
            try{
                $details = User::where('email', $request->email)->first();
                if($details == null){
                    return response()->json(['message' => 'Whoops! User not found.', 'status' => 0]);
                }else{
                    $name = $details->first_name.' '.$details->last_name;
                    $request->session()->put('email', $request->email);

                    $otp = rand(100000, 999999);
                    Cache::put('otp', $otp, now()->addMinutes(5));

                    Mail::to($request->email)->queue(new UserSendResetMail($name, $otp));
                    return response()->json(['message' => 'Reset email sent successfully.', 'status' => 1]);
                }
            }catch(\Exception $e){
                return response()->json(['message' => $e->getMessage(), 'status' => 0]);
            }
        }
        
    }

    public function validateOtp(Request $request){
        if ($request->isMethod('get')) {
            return view('web.pages.forgot_password.otpValidate');
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
                    Cache::forget('otp');
                    return response()->json(['message' => 'OTP verified successfully.', 'status' => 1 ]);
                }
            }
        }
    }

    public function resetPassword(Request $request){

        if($request->isMethod('get')){
            return view('web.pages.forgot_password.resetPassword');
        }else{
            $validator = Validator::make($request->all(), [
                'password' => 'required',
                'confirm_password' => 'required'
            ]);
    
            if($validator->fails()){
                return response()->json(['message' => $validator->errors()->first(), 'status' => 0]);
            }else{
                if($request->password != $request->confirm_password){
                    return response()->json(['message' => 'Password not matched.', 'status' => 0 ]);
                }else{
                    try{
                        User::where('email', $request->session()->get('email'))->update([
                            'password' => Hash::make($request->password)
                        ]);
                        $request->session()->flush();
                        return response()->json(['message' => 'Password Changed Successfully', 'status' => 1 ]);
                    }catch(\Exception $e){
                        return response()->json(['message' => 'Server Error. Contact Admin', 'status' => 0 ]);
                    }
                }
                
            }
        }
        
    }   
}
