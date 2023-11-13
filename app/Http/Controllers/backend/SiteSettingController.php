<?php

namespace App\Http\Controllers\backend;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteSettingController extends Controller
{
    public function setting(){
        $setting = SiteSetting::findOrFail(1);
        return view('backend.site.settingUpdate',compact('setting'));
    }//end function setting

    public function updateSetting(Request $request){

    }//end function updateSetting
}
