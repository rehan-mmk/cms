<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminStaffController extends Controller {

    public function AddStaff(Request $request) {

        
        $validator = \Validator::make($request->all(),[
            'fullname' => 'required|string|max:30',
            'branchid' => 'required|integer',
            'roleid' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password', 
        ],[
            'fullname.required'=>'Full name field is required',
            'fullname.max'=>'Full name must not be greater than 30 characters',
            'branchid.required'=>'Staff Branch is required',
            'roleid.required'=>'Staff role is required',
            'password.min'=>'Password must have atleast 8 characters',
            'password_confirmation.required'=>'Confirm password field is required',
            'password_confirmation.same'=>'Confirm password must match to password field',
        ]);
         

        if(!$validator->passes()) {
            return back()->withErrors($validator)->withInput();
        }

        // $path = 'images/ProfileImages/';
        // $fontPath = public_path('assets/fonts/Oliciy.ttf');
        // $char = strtoupper($request->fullname[0]);
        // $newAvatarName = rand(12,34353).time().'_avatar.png';
        // $dest = $path.$newAvatarName;

        // $createAvatar = makeAvatar($fontPath,$dest,$char);
        // $picture = $createAvatar == true ? $newAvatarName : '';
        $user = new User();
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->role_id = $request->roleid;
        $user->branch_id = $request->branchid;
        // $user->picture = $picture;
        $user->picture = "dummy.jpg";
        $user->password = \Hash::make($request->password);

        if($user->save()) {
            return back()->with('Success', 'Staff Added Successfully');
        }
        else {
            return back()->with('Fail', 'Something went wrong');
        }

    }








    public function EditStaff(Request $request, $id) {

        $staff = User::find($id);
        $validator = \Validator::make($request->all(),[
            'fullname' => 'required|string|max:30',
            'email'=> 'required|email|unique:users,email,'.$staff->id,
        ],[
            'fullname.required'=>'Fullname field is required',
            'fullname.max'=>'Full name must not be greater than 30 characters',
        ]);
        

        if(!$validator->passes()) {
            return back()->withErrors($validator)->withInput();
        }


        $staff->fullname = $request->fullname;
        $staff->email = $request->email;
        $staff->role_id = $request->roleid;
        $staff->branch_id = $request->branchid;

        if($staff->save()) {
            return back()->with('Success', 'Data has been saved successfully');
        }
        else {
            return back()->with('Fail', 'Something went wrong');
        }

    }





    public function DeleteStaff($id) {

        if($id == Auth::user()->id) {
            return response()->json(['status' => 'Fail', 'message' => 'You cannot delete your own account']);
        } 
        else {
            
            $staff = User::findOrFail($id);
            
            $oldPicture = $staff->picture;
    
            $path = 'images/ProfileImages';
    
            if( $oldPicture != '' ){
                if( \File::exists(public_path($path.$oldPicture))){
                    \File::delete(public_path($path.$oldPicture));
                }
            }
    
            if($staff->delete()) {
                return response()->json(['status' => 'Success', 'message' => 'Record Deleted Successfully']);
            } else {
                return response()->json(['status' => 'Fail', 'message' => 'Failed to delete staff member']);
            }
        }
            

    }
    
    
}
