<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\RegistrationController;
use Illuminate\Support\Facades\Route;

// Admin Routes
Route::prefix("admin")->group(function(){
   Route::match(['get', 'post'], "login", [AuthController::class, "login"])->name('admin.login');

   Route::middleware(['auth'])->group(function () {
      // Dashboard
      Route::get("dashboard", [DashboardController::class, "dashboard"])->name('admin.dashboard');
      Route::get("registrations/{id?}", [RegistrationController::class, "registrations"])->name('admin.registrations');

      // Logout
      Route::get("logout", [AuthController::class, "logout"])->name('admin.logout');
   });
});
