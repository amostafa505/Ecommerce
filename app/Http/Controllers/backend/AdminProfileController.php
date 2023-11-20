<?php

namespace App\Http\Controllers\backend;

use toastr;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function viewprofile(){
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.admin_profile' , compact('admin'));
    }//end View Function

    public function editprofile(){
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.admin_profile_edit' , compact('admin'));
    }//end Edit Function

    public function updateProfile(Request $request){
        $id = Auth::guard('admin')->user()->id;
        $admin = Admin::find($id);
        // dd($admin->name);
        if($request->hasFile('profile_photo_path')){
            //checking the old image it there one
            if(!file_exists(public_path('uploads/admin_images/'.$admin->profile_photo_path))){
                //if there is an image this will delete the old image to decrease the space
                unlink(public_path() .  'uploads/admin_images/'.$admin->profile_photo_path);
            }else{
                $file = $request->file('profile_photo_path');
                $exten = $file->getClientOriginalExtension();
                $newname = uniqid(). '.' .$exten;
                $destenationpath = 'uploads/admin_images/';
                // $newname = Storage::disk('s3')->put($destenationpath , $file);
                $file->move($destenationpath , $newname);
                $photo_url = 'uploads/admin_images/'.$newname;
                $admin->profile_photo_path = $photo_url;
            }
        }
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();
        toastr()->success('Admin Profile Updated Successfully');
        return redirect()->route('admin.profile');

    }//end update Function

    public function editPassword(){
        return view('admin.profile.admin_change_password');
    }//end Password update function

    public function updatePassword(Request $request){

        $validate = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);
        $id = Auth::guard('admin')->user()->id;
        $admin = Admin::find($id);
        $hashedpassword = $admin->password;
        if(Hash::check($request->oldpassword , $hashedpassword)){
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }else{
            return redirect()->back();
        }

    }//end update password function


    public function viewAllUsers(){
        if(Auth::guard('admin')->user()){
            $users = User::latest()->get();
        }
        return view('backend.users.allUsers',compact('users'));
    }//end viewAllUsers function
}
