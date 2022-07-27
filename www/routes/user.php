<?php

use App\Http\Controllers\User\CreateGroupController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\Website\AuthController;
use Illuminate\Support\Facades\Route;

// User Routes

Route::prefix("user")->group(function(){
   Route::group(['middleware' => 'auth'], function () {
      Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('user.dashboard');
      Route::get('groups', [DashboardController::class, 'viewAllGroups'])->name('user.view.groups');
      Route::post('group-details', [DashboardController::class, 'viewGroupDetails'])->name('user.view.group.details');

      Route::get('logout', [AuthController::class, 'logout'])->name('user.logout');

      Route::post('create-group', [CreateGroupController::class, 'createGroup'])->name('user.create.group');
   });
});
