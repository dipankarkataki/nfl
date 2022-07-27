<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FantasyGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CreateGroupController extends Controller
{
    public function createGroup(Request $request){
        $validator = Validator::make($request->all(), [
            'group_name' => 'required',
            'group_type' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['message' => $validator->errors()->first(), 'status' => 0]);
        }else{
            try{
                
                $document = $request->group_logo;

                // Upload file to folder
                $new_name = date('d-m-Y-H-i-s') . '_' . $document->getClientOriginalName();
                $document->move(public_path('fantasy-groups/logos/'), $new_name);
                $file = 'fantasy-groups/logos/' . $new_name;


                $create = FantasyGroup::create([
                    'group_name' => $request->group_name,
                    'group_type' => $request->group_type,
                    'group_intro' => $request->group_intro,
                    'group_logo' => $file,
                    'user_id' => Auth::user()->id
                ]);

                if($create){
                    return response()->json(['message' => 'Group created successfully.', 'status' => 1]);
                }else{
                    return response()->json(['message' => 'Whoops! Failed to create group.', 'status' => 0]);
                }
            }catch(\Exception $e){
                return response()->json(['message' => 'Server Error. Contact Admin', 'status' => 0]);
            }
        }
    }
}
