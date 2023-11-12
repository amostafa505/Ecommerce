<?php

namespace App\Http\Controllers\backend;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function viewBlogCategory(){
        $blogcategories = BlogCategory::latest()->get();
        return view('backend.blog.category.view' , compact('blogcategories'));
    }//end function viewBlogCategory


    public function blogStore(Request $request){
        $validate = $request->validate([
            'blog_category_name_en' => 'required|string',
            'blog_category_name_ar' => 'required|string',
        ]);
        BlogCategory::Create([
            'blog_category_name_en' =>$request->blog_category_name_en,
            'blog_category_name_ar' =>$request->blog_category_name_ar,
            'blog_category_slug_en' =>strtolower((str_replace(' ' , '-' ,$request->blog_category_name_en))),
            'blog_category_slug_ar' =>(str_replace(' ' , '-' ,$request->blog_category_name_ar)),
        ]);
            return redirect()->route('all.blog.categories')->with('success' , 'Blog Category Added Successfully');

    }//end store blogStore

    public function editBlogCategory($id){
        $blogCategory = BlogCategory::find($id);
        return view('backend.blog.category.edit_category' , compact('blogCategory'));
    }//end edit Category

    public function updateBlogCategory(Request $request){
        $validate = $request->validate([
            'blog_category_name_en' => 'required|string',
            'blog_category_name_ar' => 'required|string',
        ]);
        $blogCategory = BlogCategory::find($request->id);
        $blogCategory->blog_category_name_en = $request->blog_category_name_en;
        $blogCategory->blog_category_name_ar = $request->blog_category_name_ar;
        $blogCategory->blog_category_slug_en =strtolower((str_replace(' ' , '-' ,$request->blog_category_name_en)));
        $blogCategory->blog_category_slug_ar =(str_replace(' ' , '-' ,$request->blog_category_name_ar));
        $blogCategory->save();
        return redirect()->route('all.blog.categories')->with('success' , 'Blog Category Updated Successfully');
    }//end update editBlogCategory

    public function deleteBlogCategory($id){
        $blogCategory = BlogCategory::findOrFail($id);
        $blogCategory->delete();
        return redirect()->back()->with('success' , 'Blog Category Deleted Successfully');
    }//end update deleteBlogCategory

    public function viewposts(){
        $blogCategory = BlogCategory::latest()->get();
        $blogposts = BlogPost::latest()->get();
        return view('backend.blog.post.view' , compact('blogposts','blogCategory'));
    }//end function viewposts

    public function blogAdd(){
        $blogCategory = BlogCategory::latest()->get();
        return view('backend.blog.post.addPost',compact('blogCategory'));
    }// end function blogAdd

    public function postStore(Request $request){
        $request->validate([
            'post_title_en'=> 'required|string',
            'post_title_ar'=> 'required|string',
        ]);

        $file = $request->file('post_image');
        $exten = $file->getClientOriginalExtension();
        $newname = uniqid() . '.' . $exten;
        //save file in the local drive & resize it
        Image::make($file)->resize(917,1000)->save('uploads/posts/'.$newname);
        $image_url = 'uploads/posts/'.$newname;
        $blogPost = new BlogPost;
        $blogPost->category_id = $request->category_id;
        $blogPost->post_title_en = $request->post_title_en;
        $blogPost->post_title_ar = $request->post_title_ar;
        $blogPost->post_slug_en = strtolower((str_replace(' ' , '-' ,$request->post_slug_en)));
        $blogPost->post_slug_ar = (str_replace(' ' , '-' ,$request->post_slug_ar));
        $blogPost->post_details_en = $request->post_details_en;
        $blogPost->post_details_ar = $request->post_details_ar;
        $blogPost->post_image = $image_url;
        $blogPost->save();

        return redirect()->route('all.blog.posts')->with('success' , 'Blog Post Added Successfully');

    }// end function postStore

    public function editPost($id){
        $blogPost = BlogPost::findOrfail($id);
        $blogCategory = BlogCategory::latest()->get();
        return view('backend.blog.post.edit_post',compact('blogCategory', 'blogPost'));
    }// end function blogAdd

    public function updatePost(Request $request){
        $blogPost = BlogPost::findorFail($request->id);
        if($request->file('post_image')){
            if(!file_exists(public_path($blogPost->blog_image))){
                //if there is an image this will delete the old image to decrease the space
                unlink(public_path() .  $blogPost->blog_image);
            }else{
                $file = $request->file('post_image');
                $exten = $file->getClientOriginalExtension();
                $newname = uniqid() . '.' . $exten;
                //save file in the local drive & resize it
                Image::make($file)->resize(917,1000)->save('uploads/posts/'.$newname);
                $image_url = 'uploads/posts/'.$newname;
                $blogPost->category_id = $request->category_id;
                $blogPost->post_title_en = $request->post_title_en;
                $blogPost->post_title_ar = $request->post_title_ar;
                $blogPost->post_slug_en = strtolower((str_replace(' ' , '-' ,$request->post_slug_en)));
                $blogPost->post_slug_ar = (str_replace(' ' , '-' ,$request->post_slug_ar));
                $blogPost->post_details_en = $request->post_details_en;
                $blogPost->post_details_ar = $request->post_details_ar;
                $blogPost->post_image = $image_url;
                $blogPost->save();

                return redirect()->route('all.blog.posts')->with('success' , 'Blog Post Updates Successfully with Image');

            }
        }else{
            $blogPost->category_id = $request->category_id;
            $blogPost->post_title_en = $request->post_title_en;
            $blogPost->post_title_ar = $request->post_title_ar;
            $blogPost->post_slug_en = strtolower((str_replace(' ' , '-' ,$request->post_slug_en)));
            $blogPost->post_slug_ar = (str_replace(' ' , '-' ,$request->post_slug_ar));
            $blogPost->post_details_en = $request->post_details_en;
            $blogPost->post_details_ar = $request->post_details_ar;
            $blogPost->save();
            return redirect()->route('all.blog.posts')->with('success' , 'Blog Post Updates Successfully without Image');
        }
    }// end function updatePost


    public function deletePost($id){
        $blogPost = BlogPost::findOrFail($id);
        if(!file_exists(public_path($blogPost->post_image))){
            unlink(public_path() .$blogPost->post_image);
        }
        $blogPost->delete();
        return redirect()->back()->with('success' , 'Blog Post Deleted Successfully');
    }//end update deleteBrand
}
