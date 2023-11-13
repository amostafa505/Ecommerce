<?php

namespace App\Http\Controllers\frontend;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeBlogController extends Controller
{
    public function viewBlogs(){
        $blogCategory = BlogCategory::latest()->orderBy('id','DESC')->get();
        $blogPosts = BlogPost::latest()->orderBy('id','DESC')->get();
        return view('frontend.blog.blogList',compact('blogCategory','blogPosts'));
    }//end function viewBlogs

    public function blogDetails($id){
        $blogCategory = BlogCategory::latest()->orderBy('id','DESC')->get();
        $post = BlogPost::findOrFail($id);
        return view('frontend.blog.blogDetails',compact('blogCategory','post'));
    }//end function blogDetails

    public function getPostsByCategory($category_id){
        $blogCategory = BlogCategory::latest()->orderBy('id','DESC')->get();
        $blogPosts = BlogPost::where('category_id' , $category_id)->orderBy('id','DESC')->get();
        return view('frontend.blog.PostsByCategory',compact('blogCategory' , 'blogPosts'));
    }//end function getPostsByCategory
}
