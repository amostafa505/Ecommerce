<?php

namespace App\Http\Controllers\User;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function storeReview(Request $request){
        $product_id = $request->product_id;
        $request->validate([
    		'summary' => 'required',
    		'review' => 'required',
            'stars' => 'required',
    	]);
        $review = new Review;
        $review->user_id = Auth::user()->id;
        $review->product_id = $product_id;
        $review->stars = $request->stars;
        $review->summary = $request->summary;
        $review->review = $request->review;
        $review->save();

        return redirect()->back()->with('Success' , 'Thanks For Your Review');

    }//end function storeReview

    public function pendingReviews(){
        $pendingReviews = Review::where('status' , 0)->orderBy('id','DESC')->get();
        return view('backend.review.pendingReviews',compact('pendingReviews'));
    }//end function pendingReviews

    public function approveReview($review_id){
        Review::where('id' , $review_id)->update(['status'=>1,'updated_at'=>now()]);
        return redirect()->back()->with('success' , 'Review Returned Approved');
    }//end function approveReview

    public function approvedReviews(){
        $approvedReviews = Review::where('status' , 1)->orderBy('id','DESC')->get();
        return view('backend.review.approvedReviews',compact('approvedReviews'));
    }//end function approvedReviews

    public function deleteReview($review_id){
        Review::findOrFail($review_id)->delete();
        return redirect()->back()->with('Success' , 'Review Deleted Successfully');
    }//end function deleteReview
}
