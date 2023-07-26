<?php

namespace App\Http\Controllers\backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function viewSlider(){
        $sliders = Slider::latest()->get();
        return view('backend.Slider.all_sliders' , compact('sliders'));
    }//end viewSlider method

    public function store(Request $request){
        $validate = $request->validate([
            'descreption' => 'required|string',
            'slider_img' => 'required',
        ]);
            $file = $request->file('slider_img');
            $exten = $file->getClientOriginalExtension();
            $newname = uniqid() . '.' . $exten;
            //save file in the local drive & resize it
            Image::make($file)->resize(870,370)->save('uploads/slider_images/'.$newname);
            Slider::insert([
                'title' =>$request->title,
                'descreption' =>$request->descreption,
                'slider_img' => $newname,
            ]);
            return redirect()->route('all.sliders')->with('success' , 'Slider Added Successfully');

    }//end store method

    public function editSlider($id){
        $slider = Slider::find($id);
        return view('backend.slider.edit_Slider' , compact('slider'));
    }//end edit Slider

    public function updateSlider(Request $request){
        $validate = $request->validate([
            'descreption' => 'required|string',
            'slider_img' => 'required',
        ]);
        $slider = Slider::find($request->id);
        if($request->file('slider_img')){
            if(!file_exists(public_path('uploads/slider_images/'.$slider->slider_img))){
                //if there is an image this will delete the old image to decrease the space
                unlink(public_path() .  'uploads/slider_images/'.$slider->slider_img);
            }else{
                $file = $request->file('slider_img');
                $exten = $file->getClientOriginalExtension();
                $newname = uniqid() . '.' . $exten;
                //save file in the local drive & resize it
                Image::make($file)->resize(870,370)->save('uploads/slider_images/'.$newname);
                $slider->title = $request->title;
                $slider->descreption = $request->descreption;
                $slider->slider_img = $newname;
                $slider->save();
                return redirect()->route('all.sliders')->with('success' , 'Slider Updated Successfully');
            }
        }else{
            $slider->title = $request->title;
            $slider->descreption = $request->descreption;
            $slider->slider_img = $request->oldImage;
            $slider->save();
            return redirect()->route('all.sliders')->with('success' , 'Slider Updated Successfully');
        }
    }//end update brand

    public function deleteSlider($id){
        $slider = Slider::findOrFail($id);
        if(!file_exists(public_path() .  '/uploads/slider_images/'.$slider->slider_img)){
            unlink(public_path() .  '/uploads/slider_images/'.$slider->slider_img);
        }
        $slider->delete();
        return redirect()->back()->with('success' , 'Slider Deleted Successfully');
    }





    public function inActiveSlider($id){

        Slider::findOrFail($id)->update(['status' => 0]);
        return redirect()->back()->with('danger' , 'Slider deactivated Successfully');

    }//end inActiveProduct method

    public function activeSlider($id){

        Slider::findOrFail($id)->update(['status' => 1]);
        return redirect()->back()->with('success' , 'Slider Activated Successfully');

    }//end ActiveProduct method
}
