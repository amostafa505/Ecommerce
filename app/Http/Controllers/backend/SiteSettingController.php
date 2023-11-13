<?php

namespace App\Http\Controllers\backend;

use App\Models\SiteSeo;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SiteSettingController extends Controller
{
    public function setting(){
        $setting = SiteSetting::findOrFail(1);
        return view('backend.site.settingUpdate',compact('setting'));
    }//end function setting

    public function updateSetting(Request $request){
        $setting = SiteSetting::findOrFail(1);
        if($request->file('logo')){
            if(!file_exists(public_path('uploads/SiteLogo/'.$setting->logo))){
                //if there is an image this will delete the old image to decrease the space
                unlink(public_path() .  'uploads/SiteLogo/'.$setting->logo);
            }else{
                $file = $request->file('logo');
                $exten = $file->getClientOriginalExtension();
                $newname = uniqid() . '.' . $exten;
                //save file in the local drive & resize it
                Image::make($file)->resize(139,36)->save('uploads/SiteLogo/'.$newname);
                $img_url = 'uploads/SiteLogo/'.$newname;
                $setting->phone_one = $request->phone_one;
                $setting->phone_two = $request->phone_two;
                $setting->email = $request->email;
                $setting->company_name = $request->company_name;
                $setting->company_address = $request->company_address;
                $setting->facebook = $request->facebook;
                $setting->twitter = $request->twitter;
                $setting->linkedin = $request->linkedin;
                $setting->youtube = $request->youtube;
                $setting->logo = $img_url;
                $setting->save();
                return redirect()->route('setting')->with('success' , 'Settings Updated Successfully with logo');
            }
        }else{
            $setting->phone_one = $request->phone_one;
            $setting->phone_two = $request->phone_two;
            $setting->email = $request->email;
            $setting->company_name = $request->company_name;
            $setting->company_address = $request->company_address;
            $setting->facebook = $request->facebook;
            $setting->twitter = $request->twitter;
            $setting->linkedin = $request->linkedin;
            $setting->youtube = $request->youtube;
            $setting->save();
            return redirect()->route('setting')->with('success' , 'Settings Updated Successfully without logo');
        }
    }//end function updateSetting

    public function seo(){
        // dd('test');
        $seo = SiteSeo::findOrFail(1);
        return view('backend.site.seoUpdate',compact('seo'));
    }//end function seo

    public function updateSeo(Request $request){
        $seo = SiteSeo::findOrFail(1);
        $seo->meta_title = $request->meta_title;
        $seo->meta_author = $request->meta_author;
        $seo->meta_keyword = $request->meta_keyword;
        $seo->meta_description = $request->meta_description;
        $seo->google_analytics = $request->google_analytics;
        $seo->save();
        return redirect()->route('seo')->with('success' , 'Seo Updated Successfully');

    }//end function updateSeo
}
