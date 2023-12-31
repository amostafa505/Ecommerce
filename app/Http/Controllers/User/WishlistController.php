<?php

namespace App\Http\Controllers\User;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function viewWishlist(){
        $wishlists = Wishlist::with('product')->latest()->get();
        return view('frontend.wishlist.view_wishlist' , compact('wishlists'));
    }//end viewWishlist function

    public function deleteWishlist($id){
        $wishlist = Wishlist::where('user_id' , Auth::id())->where('id' , $id)->delete();
        return response()->json(['success' => 'Done delete Wishlist']);
    }//end viewWishlist function
}
