<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Branch;
use App\Models\Role;
use App\Models\Parcel;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\PasswordReset;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Mail;

class AuthController extends Controller {


    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if ($validator->fails()) { 
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // $user = User::with('branch')->where("email", "=", $request->email)->first();
        $user = User::where("email", "=", $request->email)->first();
        if (isset($user)) {

            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect()->route('dashboard');
            } 
            else {
                return redirect()->back()->withErrors("Password or Email is incorrect")->withInput();
            }
        } 
        else {
            return redirect()->back()->withErrors("Password or Email is incorrect")->withInput();
        }

    }




























    

    public function register(Request $request) {
        $request->validate([
            'fullname' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        



        $path = 'images/ProfileImages/';
        $fontPath = public_path('assets/fonts/Oliciy.ttf');
        $char = strtoupper($request->fullname[0]);
        $newAvatarName = rand(12,34353).time().'_avatar.png';
        $dest = $path.$newAvatarName;

        $createAvatar = makeAvatar($fontPath,$dest,$char);
        $picture = $createAvatar == true ? $newAvatarName : '';

        $user = new User();
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->role_id = 1;
        $user->branch_id = 2;
        $user->picture = $picture;
        $user->password = \Hash::make($request->password);

        if( $user->save() ){
            return redirect()->route('LoginView')
            ->withSuccess('You have successfully registered! Please Login!');
        }else{
            return redirect()->back()->with('error','Failed to register');
        }

    }




















    

















    function UpdateInfo(Request $request){
           
        $validator = \Validator::make($request->all(),[
            'fullname'=>'required',
            'email'=> 'required|email|unique:users,email,'.Auth::user()->id,
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }
        else{
            $query = User::find(Auth::user()->id)->update([
                'fullname'=>$request->fullname,
                'email'=>$request->email,
            ]);

            if(!$query){
                return response()->json(['status'=>0,'message'=>'Something went wrong.']);
            }else{
                return response()->json(['status'=>1,'message'=>'Your profile info has been updated successfully.']);
            }
        }
    }






































    function UpdatePicture(Request $request){

        $path = 'images/ProfileImages';
        $file = $request->file('AdminImage');
        $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';

        //Upload new image
        $upload = $file->move(public_path($path), $new_name);
        
        if( !$upload ){
            return response()->json(['status'=>0,'msg'=>'Something went wrong, upload new picture failed.']);
        }
        else {
            $oldPicture = User::find(Auth::user()->id)->picture;

            if( $oldPicture != '' ){
                if( \File::exists(public_path($path.$oldPicture))){
                    \File::delete(public_path($path.$oldPicture));
                }
            }

            //Update DB
            $update = User::find(Auth::user()->id)->update(['picture'=>$new_name]);

            if( !$upload ){
                return response()->json(['status'=>0,'msg'=>'Something went wrong, updating picture in db failed.']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Your profile picture has been updated successfully']);
            }
        }
    }


























    function UpdatePassword(Request $request){
        
        $validator = \Validator::make($request->all(),[
            'oldpassword'=>[
                'required', function($attribute, $value, $fail){
                    if( !\Hash::check($value, Auth::user()->password) ){
                        return $fail(__('The current password is incorrect'));
                    }
                },
                'min:8',
                'max:30'
            ],
            'newpassword'=>'required|min:8|max:30',
            'cnewpassword'=>'required|same:newpassword'
        ],[
            'oldpassword.required'=>'Enter your current password',
            'oldpassword.min'=>'Old password must have atleast 8 characters',
            'oldpassword.max'=>'Old password must not be greater than 30 characters',
            'newpassword.required'=>'Enter new password',
            'newpassword.min'=>'New password must have at least 8 characters',
            'newpassword.max'=>'New password must not be greater than 30 characters',
            'cnewpassword.required'=>'ReEnter your new password',
            'cnewpassword.same'=>'New password and Confirm new password must match'
        ]);

        if( !$validator->passes() ){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }
        else {
            
            $update = User::find(Auth::user()->id)->update(['password'=>\Hash::make($request->newpassword)]);

            if ( !$update ){
                return response()->json(['status'=>0,'msg'=>'Something went wrong, Failed to update password in db']);
            }
            else {
                return response()->json(['status'=>1,'msg'=>'Your password has been changed successfully']);
            }
        }
    }


























    public function EmailPassword (Request $request){
   
        $user = User::where('email', $request->email)->get();
        
        if(count($user) > 0){
            $token = Str::random(50);
            $domain = URL::to('/');
            $url = $domain.'/reset-password?token='.$token; 

            $data['url'] = $url;
            $data['email'] = $request->email;
            $data['title'] = 'Reset Password';
            $data['body'] = 'Please Click Below Link to Reset Your Password';
            
            Mail::send('admin/passwords/forgetpwdpage', ['data'=>$data, ],function($message) use ($data){
                $message->to($data['email'])->subject($data['title']);
            });

            $DateTime = Carbon::now()->format('Y-m-d H:i:s');
            PasswordReset::updateOrCreate(
                [ 'email'=> $request->email ],
                [
                    'email' => $request->email,
                    'token' => $token,
                    'created_at' => $DateTime,
                ]
            );

            return back()->with('status', 'Please Check Your Mail To Reset Password');
        }
        else{
            return back()->with('error', 'Email not found');
        }
        

   }


































    public function resetpassword(Request $request){
        $validator = \Validator::make($request->all(),[
            'newpassword'=>'required|min:6|max:100',
            'cnewpassword'=>'required|same:newpassword'
         ],[
            'newpassword.required'=>'Enter new password',
            'newpassword.min'=>'New password must have atleast 6 characters',
            'newpassword.max'=>'New password must not be greater than 100 characters',
            'cnewpassword.required'=>'Re-Enter your new password',
            'cnewpassword.same'=>'New password and Confirm new password must match'
        ]);

        if( !$validator->passes() ){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }
    
        $user = User::find($request->userid);
        $user->password = Hash::make($request->newpassword);
        $update = $user->save();

        PasswordReset::where('email', $user->email)->delete();

        if( !$update ){
            return response()->json(['status'=>0,'msg'=>'Something went wrong, Failed to update password']);
        }else{
            return response()->json(['status'=>1,'msg'=>'Your password has been reset successfully! Please Login']);
        }
        
    }











    




















    
    
    
    
    

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('LoginView')
            ->withSuccess('You have logged out successfully!');;
    }    
}
