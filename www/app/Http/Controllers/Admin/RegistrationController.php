<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    //
    public function registrations(Request $request, $id = null){
        if(!$id){
            $data['registrations'] = User::where('role', 0)->paginate(10);
            return view('admin.pages.registrations.index')->with($data);
        } else{
            return view('admin.pages.registrations.view_user_details');
        }        
    }
}
