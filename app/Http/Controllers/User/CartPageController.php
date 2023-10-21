<?php

namespace App\Http\Controllers\User;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartPageController extends Controller
{
    public function viewCartPage(){
        
        return view('frontend.CartPage.view_cartPage'); 
       
    }//end viewCartPage Function

    public function CartIncrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);
        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

            $total = (int)str_replace(',','',Cart::subtotal($decimals = 0));
			Session::put('coupon',[
			'coupon_name' => $coupon->coupon_name,
			'coupon_discount' => $coupon->coupon_discount,
			'discount_amount' => round($total * $coupon->coupon_discount/100),
			'total_amount' => round($total - $total * $coupon->coupon_discount/100)
			]);
        }
        return response()->json('increment');

    } // end method CartIncrement

    public function CartDecrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);
        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

            $total = (int)str_replace(',','',Cart::subtotal($decimals = 0));
			Session::put('coupon',[
			'coupon_name' => $coupon->coupon_name,
			'coupon_discount' => $coupon->coupon_discount,
			'discount_amount' => round($total * $coupon->coupon_discount/100),
			'total_amount' => round($total - $total * $coupon->coupon_discount/100)
			]);
        }
        return response()->json('decrement');

    } // end method CartDecrement

    public function RemoveCartProduct($rowId){
        Cart::remove($rowId);
        if (Session::has('coupon')) {
            Session::forget('coupon');
         }
        return response()->json(['success' => 'Successfully Remove From Cart']);
    }// end method RemoveCartProduct
}
