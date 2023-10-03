<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartPageController extends Controller
{
    public function viewCartPage(){
        
        return view('frontend.CartPage.view_cartPage'); 
       
    }//end viewCartPage Function

    public function CartIncrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        return response()->json('increment');

    } // end method CartIncrement

    public function CartDecrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);

        return response()->json('decrement');

    } // end method CartDecrement

    public function RemoveCartProduct($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Successfully Remove From Cart']);
    }// end method RemoveCartProduct
}
