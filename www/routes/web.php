<?php

use App\Http\Controllers\Website\PageController;
use App\Http\Controllers\Website\AuthController;
use App\Http\Controllers\Website\FacebookSocialiteController;
use App\Http\Controllers\Website\ForgotPasswordController;
use App\Http\Controllers\Website\GoogleSocialiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', [PageController::class, 'home'])->name('site.home');

Route::get('home-1', function () {
    return view('web.pages.index1');
});

Route::get('home-2', function () {
    return view('web.pages.index2');
});

Route::get('game-rules', [PageController::class, 'gameRules'])->name('site.game.rules');

Route::match(['get', 'post'], 'login', [AuthController::class, 'login'])->name('site.login');

Route::prefix('register')->group(function(){
    Route::match(['get', 'post'], 'create-account', [AuthController::class, 'register'])->name('site.register');
    Route::match(['get', 'post'], 'verify-otp', [AuthController::class, 'verifyOtp'])->name('site.otp.validate');
    Route::get('select-level', [AuthController::class, 'selectLevel'])->name('site.select.level');
    Route::post('payment', [AuthController::class, 'paymentAfterRegistration'])->name('site.payment');
});
Route::post('resend-otp', [AuthController::class, 'resendOTP'])->name('site.otp.resend');

Route::prefix('forgot-password')->group(function(){
    Route::get('forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('site.forgot.password');
    Route::post('send-reset-link', [ForgotPasswordController::class, 'sendResetLink'])->name('site.forgot.password.send.reset.link');
    Route::match(['get', 'post'], 'validate-otp', [ForgotPasswordController::class, 'validateOtp'])->name('site.forgot.password.validate.otp');
    Route::match(['get','post'],'reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('site.forgot.password.reset');
});


Route::get('privacy-policy', [PageController::class, 'privacyPolicy'])->name('site.privacy.policy');
Route::get('terms-and-condition', [PageController::class, 'termsAndCondition'])->name('site.terms.and.condition');

// Login with google
Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle'])->name('google.login');
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback'])->name('google.handle.login');

// Login with facebook
Route::get('auth/facebook', [FacebookSocialiteController::class, 'redirectToFacebook'])->name('facebook.login');
Route::get('callback/facebook', [FacebookSocialiteController::class, 'handleCallback'])->name('facebook.handle.login');



/********************************  Routes By Dipankar ****************************************** */

