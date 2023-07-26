<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Http\Controllers\Controller;


class SubSubCategoryController extends Controller
{
    public function viewSubSubCategory(){
        $subsubcategories = SubSubCategory::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $categories = Category::all();
        return view('backend.SubSubCategory.all_subsubcategories' , compact('subsubcategories','subcategories' , 'categories'));
    }//end view viewSubSubCategory

    public function store(Request $request){
        $validate = $request->validate([
            'subsubcategory_name_en' => 'required|string',
            'subsubcategory_name_ar' => 'required|string',
        ]);
        SubSubCategory::Create([
            'subsubcategory_name_en' =>$request->subsubcategory_name_en,
            'subsubcategory_name_ar' =>$request->subsubcategory_name_ar,
            'subsubcategory_slug_en' =>strtolower((str_replace(' ' , '-' ,$request->subsubsategory_name_en))),
            'subsubcategory_slug_ar' =>(str_replace(' ' , '-' ,$request->subsubsategory_name_ar)),
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
        ]);
            return redirect()->route('all.subsubcategories')->with('success' , 'SubSubCategory Added Successfully');

    }//end store SubSubCategory

    public function editSubSubCategory($id){
        $SubSubCategory = SubSubCategory::find($id);
        $subcategories = SubCategory::all();
        $categories = Category::all();
        return view('backend.SubSubCategory.edit_SubSubCategory' , compact('subcategories','SubSubCategory', 'categories'));
    }//end edit SubSubCategory

    public function updateSubSubCategory(Request $request){
        $validate = $request->validate([
            'subsubcategory_name_en' => 'required|string',
            'subsubcategory_name_ar' => 'required|string',
        ]);
        SubSubCategory::find($request->id)->update([
            'subsubcategory_name_en' =>$request->subsubcategory_name_en,
            'subsubcategory_name_ar' =>$request->subsubcategory_name_ar,
            'subsubcategory_slug_en' =>strtolower((str_replace(' ' , '-' ,$request->subsubsategory_name_en))),
            'subsubcategory_slug_ar' =>(str_replace(' ' , '-' ,$request->subsubsategory_name_ar)),
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
        ]);
        // $SubSubCategory->SubSubCategory_name_en = $request->SubSubCategory_name_en;
        // $SubSubCategory->SubSubCategory_name_ar = $request->SubSubCategory_name_ar;
        // $SubSubCategory->SubSubCategory_slug_en =strtolower((str_replace(' ' , '-' ,$request->SubSubCategory_name_en)));
        // $SubSubCategory->SubSubCategory_slug_ar =(str_replace(' ' , '-' ,$request->SubSubCategory_name_ar));
        // $SubSubCategory->category_id = $request->category_id;
        // $SubSubCategory->save();
        return redirect()->route('all.subsubcategories')->with('success' , 'SubSubCategory Updated Successfully');
    }//end update updateSubSubCategory

    public function deleteSubSubCategory($id){
        $SubSubCategory = SubSubCategory::findOrFail($id);
        $SubSubCategory->delete();
        return redirect()->back()->with('success' , 'SubSubCategory Deleted Successfully');
     }//end deleteSubSubCategory function

    public function GetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','Asc')->get();
        return json_encode($subcat);
    }//end Ajax GetSubCategory Function

    public function GetSubSubCategory($subcategory_id){
        $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en','Asc')->get();
        return json_encode($subsubcat);
    }//end Ajax GetSubSubCategory Function
}
