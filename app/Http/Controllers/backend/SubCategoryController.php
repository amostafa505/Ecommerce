<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    public function viewSubCategory(){
        $subcategories = SubCategory::latest()->get();
        $categories = Category::all();
        return view('backend.SubCategory.all_subcategories' , compact('subcategories' , 'categories'));
    }//end view brand

    public function store(Request $request){
        $validate = $request->validate([
            'subcategory_name_en' => 'required|string',
            'subcategory_name_ar' => 'required|string',
        ]);
        SubCategory::Create([
            'subcategory_name_en' =>$request->subcategory_name_en,
            'subcategory_name_ar' =>$request->subcategory_name_ar,
            'subcategory_slug_en' =>strtolower((str_replace(' ' , '-' ,$request->subcategory_name_en))),
            'subcategory_slug_ar' =>(str_replace(' ' , '-' ,$request->subcategory_name_ar)),
            'category_id' => $request->category_id,
        ]);
            return redirect()->route('all.subcategories')->with('success' , 'SubCategory Added Successfully');

    }//end store SubCategory

    public function editSubCategory($id){
        $subcategory = SubCategory::find($id);
        $categories = Category::all();
        return view('backend.SubCategory.edit_subcategory' , compact('subcategory', 'categories'));
    }//end edit SubCategory

    public function updateSubCategory(Request $request){
        $validate = $request->validate([
            'subcategory_name_en' => 'required|string',
            'subcategory_name_ar' => 'required|string',
        ]);
        $subcategory = SubCategory::find($request->id);
        $subcategory->subcategory_name_en = $request->subcategory_name_en;
        $subcategory->subcategory_name_ar = $request->subcategory_name_ar;
        $subcategory->subcategory_slug_en =strtolower((str_replace(' ' , '-' ,$request->subcategory_name_en)));
        $subcategory->subcategory_slug_ar =(str_replace(' ' , '-' ,$request->subcategory_name_ar));
        $subcategory->category_id = $request->category_id;
        $subcategory->save();
        return redirect()->route('all.subcategories')->with('success' , 'SubCategory Updated Successfully');
    }//end update Category

    public function deleteSubCategory($id){
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();
        return redirect()->back()->with('success' , 'SubCategory Deleted Successfully');
    }
}
