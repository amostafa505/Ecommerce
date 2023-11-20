<?php

namespace App\Http\Controllers\backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminUserRolesController extends Controller
{
    public function adminsView(){
        $adminUsers = Admin::where('type' , 2)->latest()->get();
        return view('backend.roles.viewAllAdmins' , compact('adminUsers'));
    }//end method adminsView

    public function createAdmin(){
        return view('backend.roles.createAdmin');
    }//end method createAdmin

    public function storeAdmin(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $file = $request->file('profile_photo_path');
        $exten = $file->getClientOriginalExtension();
        $newname = uniqid(). '.' .$exten;
        $destenationpath = 'uploads/admin_images/';
        // $newname = Storage::disk('s3')->put($destenationpath , $file);
        $file->move($destenationpath , $newname);
        $photo_url = 'uploads/admin_images/'.$newname;

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = Hash::make($request->password);
        $admin->profile_photo_path = $photo_url;
        $admin->brand = $request->brand;
        $admin->category = $request->category;
        $admin->product = $request->product;
        $admin->slider = $request->slider;
        $admin->coupon = $request->coupon;
        $admin->shippingarea = $request->shippingarea;
        $admin->blog = $request->blog;
        $admin->site = $request->site;
        $admin->review = $request->review;
        $admin->orders = $request->orders;
        $admin->report = $request->report;
        $admin->allusers = $request->allusers;
        $admin->adminuserrole = $request->adminuserrole;
        $admin->type = 2;
        $admin->save();

        return redirect()->route('admins.view')->with('success' , 'Admin Account Added Successfully');
    }//end method storeAdmin

    public function adminEdit($id){
        $admin = Admin::findOrFail($id);
        return view('backend.roles.editAdmin' , compact('admin'));
    }//end method adminEdit

    public function updateAdmin(Request $request){
        $admin = Admin::find($request->id);
        if($request->file('profile_photo_path')){
            //checking the old image it there one
            if(!file_exists(public_path('uploads/admin_images/'.$request->profile_photo_path))){
                //if there is an image this will delete the old image to decrease the space
                unlink(public_path() .  'uploads/admin_images/'.$request->profile_photo_path);
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
            $admin->phone = $request->phone;
            $admin->brand = $request->brand;
            $admin->category = $request->category;
            $admin->product = $request->product;
            $admin->slider = $request->slider;
            $admin->coupon = $request->coupon;
            $admin->shippingarea = $request->shippingarea;
            $admin->blog = $request->blog;
            $admin->site = $request->site;
            $admin->review = $request->review;
            $admin->orders = $request->orders;
            $admin->report = $request->report;
            $admin->allusers = $request->allusers;
            $admin->adminuserrole = $request->adminuserrole;
            $admin->password = Hash::make($request->password);
            $admin->type = 2;
            $admin->save();

        return redirect()->route('admins.view')->with('success' , 'Admin Account Updated Successfully');

    }//end method updateAdmin

    public function deleteAdmin($id){

        $admin = Admin::findOrFail($id);

        if (file_exists('uploads/admin_images/'.$admin->profile_photo_path)){
            unlink('uploads/admin_images/'.$admin->profile_photo_path);
        };
        $admin->delete();
        return redirect()->back()->with('success' , 'Admin Account Deleted Successfully');
    }//end method updateAdmin
}
