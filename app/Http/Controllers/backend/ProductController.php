<?php

namespace App\Http\Controllers\backend;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function viewProduct(){
        $products = Product::latest()->get();
        return view('backend.product.all_products' , compact('products'));
    }//end view function

    public function addProduct(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.add_product' , compact('categories' ,'brands'));
    }//end addProduct function

    public function store(Request $request){

        $file = $request->file('product_thambnail');
        $exten = $file->getClientOriginalExtension();
        $newname = uniqid() . '.' . $exten;
        //save file in the local drive & resize it
        Image::make($file)->resize(917,1000)->save('uploads/products/thambnails/'.$newname);

        $product = New Product;

        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subsubcategory_id = $request->subsubcategory_id;
        $product->product_name_en = $request->product_name_en;
        $product->product_name_ar = $request->product_name_ar;
        $product->product_slug_en = strtolower((str_replace(' ' , '-' ,$request->product_name_en)));
        $product->product_slug_ar = str_replace(' ' , '-' ,$request->product_name_ar);
        $product->product_code = $request->product_code;
        $product->product_qty = $request->product_qty;
        $product->product_tags_en = $request->product_tags_en;
        $product->product_tags_ar = $request->product_tags_ar;
        $product->product_size_en = $request->product_size_en;
        $product->product_size_ar = $request->product_size_ar;
        $product->product_color_en = $request->product_color_en;
        $product->product_color_ar = $request->product_color_ar;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->short_desc_en = $request->short_desc_en;
        $product->short_desc_ar = $request->short_desc_ar;
        $product->long_desc_en = $request->long_desc_en;
        $product->long_desc_ar = $request->long_desc_ar;
        $product->product_thambnail = $newname;
        $product->hot_deals = $request->hot_deals;
        $product->featured = $request->featured;
        $product->special_offer = $request->special_offer;
        $product->special_deals = $request->special_deals;
        $product->status = 1;
        $product->save();

        //////////////////////Multi Image
        if($request->File('multi_img')){
            $images = $request->file('multi_img');
            foreach($images as $image){
                $exten = $image->getClientOriginalExtension();
                $imgName = uniqid() . '.' . $exten;
                //save file in the local drive & resize it
                Image::make($image)->resize(917,1000)->save('uploads/products/Multi-Images/'.$imgName);
                $multi_img = New MultiImg;
                $multi_img->product_id = $product->id;
                $multi_img->image_name = $imgName;
                $multi_img->save();
            }
        }

        return redirect()->back()->with('success' , 'Product Added Successfully');

    }//end store function



    public function editProduct($id){
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $brands = Brand::latest()->get();
        $product = Product::find($id);
        $multi_image = MultiImg::where('product_id', $id)->get();
        return view('backend.product.edit_product' , compact('categories', 'subcategories' , 'subsubcategories' , 'brands' , 'product' , 'multi_image'));
    }//end method

    public function updateProduct(Request $request){

        // $file = $request->file('product_thambnail');
        // $exten = $file->getClientOriginalExtension();
        // $newname = uniqid() . '.' . $exten;
        // //save file in the local drive & resize it
        // Image::make($file)->resize(917,1000)->save('uploads/products/thambnails/'.$newname);
        // dd($request);
        $product = Product::find($request->id);

        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subsubcategory_id = $request->subsubcategory_id;
        $product->product_name_en = $request->product_name_en;
        $product->product_name_ar = $request->product_name_ar;
        $product->product_slug_en = strtolower((str_replace(' ' , '-' ,$request->product_name_en)));
        $product->product_slug_ar = str_replace(' ' , '-' ,$request->product_name_ar);
        $product->product_code = $request->product_code;
        $product->product_qty = $request->product_qty;
        $product->product_tags_en = $request->product_tags_en;
        $product->product_tags_ar = $request->product_tags_ar;
        $product->product_size_en = $request->product_size_en;
        $product->product_size_ar = $request->product_size_ar;
        $product->product_color_en = $request->product_color_en;
        $product->product_color_ar = $request->product_color_ar;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->short_desc_en = $request->short_desc_en;
        $product->short_desc_ar = $request->short_desc_ar;
        $product->long_desc_en = $request->long_desc_en;
        $product->long_desc_ar = $request->long_desc_ar;
        // $product->product_thambnail = $newname;
        $product->hot_deals = $request->hot_deals;
        $product->featured = $request->featured;
        $product->special_offer = $request->special_offer;
        $product->special_deals = $request->special_deals;
        $product->status = 1;
        $product->save();

        //////////////////////Multi Image
        // if($request->File('multi_img')){
        //     $images = $request->file('multi_img');
        //     foreach($images as $image){
        //         $exten = $image->getClientOriginalExtension();
        //         $imgName = uniqid() . '.' . $exten;
        //         //save file in the local drive & resize it
        //         Image::make($image)->resize(917,1000)->save('uploads/products/Multi-Images/'.$imgName);
        //         $multi_img = New MultiImg;
        //         $multi_img->product_id = $product->id;
        //         $multi_img->image_name = $imgName;
        //         $multi_img->save();
        //     }
        // }

        return redirect()->back()->with('success' , 'Product Updated Successfully');

    }//end update function

    public function updateMultiImage(REQUEST $request){
        $imgs = $request->multi_img;
        foreach($imgs as $id => $img){
            $imgDel = MultiImg::findOrFail($id);
            // dd($imgDel);
            if (file_exists("'uploads/products/Multi-Images/'.$imgDel->image_name'")){
                unlink('uploads/products/Multi-Images/'.$imgDel->image_name);
            };
            $exten = $img->getClientOriginalExtension();
            $imgName = uniqid() . '.' . $exten;
            //save file in the local drive & resize it
            Image::make($img)->resize(917,1000)->save('uploads/products/Multi-Images/'.$imgName);
            MultiImg::where('id' , $id)->update([
                'product_id'=> $imgDel->product_id,
                'image_name'=> $imgName,
                'updated_at' => Carbon::now(),
            ]);
        }//end foreach

        return redirect()->back()->with('info' , 'Product MultiImage Updated Successfully');

    }//End Update Multi Image Function


    public function multiImagedelete($id){
        $imgDel = MultiImg::findOrFail($id);
        // dd($imgDel);
        if (file_exists("'uploads/products/Multi-Images/'.$imgDel->image_name'")){
            unlink('uploads/products/Multi-Images/'.$imgDel->image_name);
        };
        MultiImg::findOrFail($id)->delete();
        return redirect()->back()->with('success' , 'Product MultiImage Deleted Successfully');
    }

    public function updateProductImage(REQUEST $request){
            $img = $request->product_thambnail;
            $id = $request->id;
            $imgDel = Product::findOrFail($id);
            // dd($imgDel);
            if (file_exists("'uploads/products/thambnails/'.$imgDel->product_thambnail'")){
                unlink('uploads/products/thambnails/'.$imgDel->product_thambnail);
            };
            $file = $request->file('product_thambnail');
            $exten = $file->getClientOriginalExtension();
            $newname = uniqid() . '.' . $exten;
            //save file in the local drive & resize it
            Image::make($file)->resize(917,1000)->save('uploads/products/thambnails/'.$newname);
            Product::where('id' , $id)->update([
                'product_thambnail'=> $newname,
                'updated_at' => Carbon::now(),
            ]);
        //end foreach

        return redirect()->back()->with('info' , 'Product Thambnail Updated Successfully');

    }//End Update thambnail Image Function



    public function deleteProduct($id){

        $product = Product::findOrFail($id);

        if (file_exists("'uploads/products/thambnails/'.$product->product_thambnail'")){
            unlink('uploads/products/thambnails/'.$product->product_thambnail);
        };

        $multiimg = MultiImg::where('product_id' , $id);
        foreach($multiimg as $img){
            if (file_exists("'uploads/products/Multi-Images/'.$img->image_name'")){
                unlink('uploads/products/Multi-Images/'.$img->image_name);
            };
        }
        $multiimg->delete();
        $product->delete();
        return redirect()->back()->with('danger' , 'Product Deleted Successfully');
    }//end deleteProduct Method


    public function inActiveProduct($id){

        Product::findOrFail($id)->update(['status' => 0]);
        return redirect()->back()->with('danger' , 'Product deactivated Successfully');

    }//end inActiveProduct method

    public function activeProduct($id){

        Product::findOrFail($id)->update(['status' => 1]);
        return redirect()->back()->with('success' , 'Product Activated Successfully');

    }//end ActiveProduct method
}
