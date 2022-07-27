<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FantasyGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class DashboardController extends Controller
{
    //
    public function dashboard(){
        $my_group = FantasyGroup::where('user_id', Auth::id())->where('is_activate', 1)->latest()->first();
        $other_groups = FantasyGroup::where('user_id', '<>', Auth::id())->where('is_activate', 1)->latest()->get();
        return view('web.user.dashboard')->with(['my_group' => $my_group, 'other_groups' => $other_groups]);
    }

    public function viewGroupDetails(Request $request){
        try{
            $group_id = Crypt::decrypt($request->group_id);
            $group_details = FantasyGroup::where('id', $group_id)->first();
            if($group_details != null){
                return response()->json(['message' => $group_details, 'status' => 1]);
            }else{
                return response()->json(['message' => 'Whoops! Details not found.', 'status' => 0]);
            }
        }catch(\Exception $e){
            return response()->json(['message' => 'Server Error. Contact Admin.', 'status' => 0]);
        }
        
    }

    public function viewAllGroups(){
        return view('web.user.groups.viewAll');
    }
}
