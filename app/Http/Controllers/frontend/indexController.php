<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class indexController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        $sliders = Slider::where('status' , 1)->orderBy('id' , 'DESC')->limit(3)->get();
        return view('home.index' , compact('categories' , 'sliders'));
    }//end index

    public function userLogout(){
        Auth::logout();
        return redirect()->route('login');
    }//end userLogout

    public function userProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('dashboard' , compact('user'));
    }//end userProfile

    public function editProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('home.profile.edit_profile' , compact('user'));
    }//end EditProfile

    public function updateProfile(Request $request){
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->hasFile('profile_photo_path')){
            //checking the old image it there one
            if(!file_exists(public_path('uploads/user_images/'.$user->profile_photo_path))){
                //if there is an image this will delete the old image to decrease the space
                unlink(public_path() .  'uploads/user_images/'.$user->profile_photo_path);
            }else{
                $file = $request->file('profile_photo_path');
                $exten = $file->getClientOriginalExtension();
                $newname = uniqid(). '.' .$exten;
                $destenationpath = 'uploads/user_images/';
                // $newname = Storage::disk('s3')->put($destenationpath , $file);
                $file->move($destenationpath , $newname);
                $user->profile_photo_path = $newname;
            }
        }
        $user->save();
        toastr()->success('Profile Updated Successfully');
        return view('dashboard' , compact('user'));
    }//end updateProfile

    public function userEditPassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('home.profile.edit_password' , compact('user'));
    }//end userPassword

    public function userUpdatePassword(Request $request){

        $validate = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);
        $user = User::find(Auth::user()->id);
        $hashedpassword = $user->password;
        if(Hash::check($request->oldpassword , $hashedpassword)){
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        }else{
            return redirect()->back();
        }

    }//end update password function


}
