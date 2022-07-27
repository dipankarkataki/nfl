<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $request){
        if ($request->isMethod('get')) {
            if (Auth::check()){
                return redirect()->route('admin.dashboard');
            }
            return view('admin.pages.auth.login');
        } else {
            $credentials  = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ],[
                'email.required => Please enter your email address',
                'email.email => Please enter valid email address',
                'password.required => Please enter your password',
            ]);

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 1])) {
                $request->session()->regenerate();     
                return redirect()->route('admin.dashboard');
            }
     
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        } 
    }


    // Logout
    public function logout(Request $request){
        Auth::logout(); 
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('site.home');
    }
}
