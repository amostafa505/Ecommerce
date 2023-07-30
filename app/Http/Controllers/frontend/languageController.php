<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class languageController extends Controller
{
    public function arabicLanguage(){
        session()->get('language');
        session()->forget('language');
        session()->put('language','arabic');
        return redirect()->back();
    }//end Arabic language Method

    public function englishLanguage(){
        session()->get('language');
        session()->forget('language');
        session()->put('language','english');
        return redirect()->back();
    }//end english language Method
}
