<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function viewCategory(){
        $categories = Category::latest()->get();

        return view('backend.Category.all_categories' , compact('categories'));
    }//end view brand

    public function store(Request $request){
        $validate = $request->validate([
            'category_name_en' => 'required|string',
            'category_name_ar' => 'required|string',
            'category_icon' => 'required|string',
        ]);
        Category::Create([
            'category_name_en' =>$request->category_name_en,
            'category_name_ar' =>$request->category_name_ar,
            'category_slug_en' =>strtolower((str_replace(' ' , '-' ,$request->category_name_en))),
            'category_slug_ar' =>(str_replace(' ' , '-' ,$request->category_name_ar)),
            'category_icon' => $request->category_icon,
        ]);
            return redirect()->route('all.categories')->with('success' , 'Category Added Successfully');

    }//end store Category

    public function editCategory($id){
        $category = Category::find($id);
        return view('backend.Category.edit_category' , compact('category'));
    }//end edit Category

    public function updateCategory(Request $request){
        $validate = $request->validate([
            'category_name_en' => 'required|string',
            'category_name_ar' => 'required|string',
            'category_icon' => 'required|string',
        ]);
        $category = Category::find($request->id);
        $category->category_name_en = $request->category_name_en;
        $category->category_name_ar = $request->category_name_ar;
        $category->category_slug_en =strtolower((str_replace(' ' , '-' ,$request->category_name_en)));
        $category->category_slug_ar =(str_replace(' ' , '-' ,$request->category_name_ar));
        $category->category_icon = $request->category_icon;
        $category->save();
        return redirect()->route('all.categories')->with('success' , 'Category Updated Successfully');
    }//end update Category

    public function deleteCategory($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success' , 'Category Deleted Successfully');
    }
}
