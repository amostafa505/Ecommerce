<?php

namespace App\Http\Controllers\backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function viewBrand(){
        $brands = Brand::latest()->get();

        return view('backend.Brand.all_brands' , compact('brands'));
    }//end view brand

    public function store(Request $request){
        $validate = $request->validate([
            'brand_name_en' => 'required|string',
            'brand_name_ar' => 'required|string',
            'brand_image' => 'required',
        ]);
            $file = $request->file('brand_image');
            $exten = $file->getClientOriginalExtension();
            $newname = uniqid() . '.' . $exten;
            //save file in the local drive & resize it
            Image::make($file)->resize(300,300)->save('uploads/brand_images/'.$newname);
            Brand::insert([
                'brand_name_en' =>$request->brand_name_en,
                'brand_name_ar' =>$request->brand_name_ar,
                'brand_slug_en' =>strtolower((str_replace(' ' , '-' ,$request->brand_name_en))),
                'brand_slug_ar' =>(str_replace(' ' , '-' ,$request->brand_name_ar)),
                'brand_image' => $newname,
            ]);
            return redirect()->route('all.brands')->with('success' , 'Brand Added Successfully');

    }//end store brand

    public function editBrand($id){
        $brand = Brand::find($id);
        return view('backend.brand.edit_Brand' , compact('brand'));
    }//end edit brand

    public function updateBrand(Request $request){
        $validate = $request->validate([
            'brand_name_en' => 'required|string',
            'brand_name_ar' => 'required|string',
        ]);
        $brand = Brand::find($request->id);
        if($request->file('brand_image')){
            if(!file_exists(public_path('uploads/brand_images/'.$brand->brand_image))){
                //if there is an image this will delete the old image to decrease the space
                unlink(public_path() .  'uploads/brand_images/'.$brand->brand_image);
            }else{
                $file = $request->file('brand_image');
                $exten = $file->getClientOriginalExtension();
                $newname = uniqid() . '.' . $exten;
                //save file in the local drive & resize it
                Image::make($file)->resize(300,300)->save('uploads/brand_images/'.$newname);
                $brand->brand_name_en = $request->brand_name_en;
                $brand->brand_name_ar = $request->brand_name_ar;
                $brand->brand_slug_en =strtolower((str_replace(' ' , '-' ,$request->brand_name_en)));
                $brand->brand_slug_ar =(str_replace(' ' , '-' ,$request->brand_name_ar));
                $brand->brand_image = $newname;
                $brand->save();
                return redirect()->route('all.brands')->with('success' , 'Brand Updated Successfully');
            }
        }else{
            $brand->brand_name_en = $request->brand_name_en;
            $brand->brand_name_ar = $request->brand_name_ar;
            $brand->brand_slug_en =strtolower((str_replace(' ' , '-' ,$request->brand_name_en)));
            $brand->brand_slug_ar =(str_replace(' ' , '-' ,$request->brand_name_ar));
            $brand->brand_image = $request->oldImage;
            $brand->save();
            return redirect()->route('all.brands')->with('success' , 'Brand Updated Successfully');
        }
    }//end update brand

    public function deleteBrand($id){
        $brand = Brand::findOrFail($id);
        if(!file_exists(public_path('/uploads/brand_images/'.$brand->brand_image))){
            unlink(public_path() .'/uploads/brand_images/'.$brand->brand_image);
        }
        $brand->delete();
        return redirect()->back()->with('success' , 'Brand Deleted Successfully');
    }
}

