<?php

namespace App\Http\Controllers\frontend;

use App\Models\Coupon;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class cartController extends Controller
{

    public function addToCart(Request $request, $id){

		if (Session::has('coupon')) {
			Session::forget('coupon');
		 }

    	$product = Product::findOrFail($id);

    	if ($product->discount_price == NULL) {
    		Cart::add([
    			'id' => $id,
    			'name' => $request->product_name,
    			'qty' => $request->quantity,
    			'price' => $product->selling_price,
    			'weight' => 1,
    			'options' => [
    				'image' => $product->product_thambnail,
    				'color' => $request->color,
    				'size' => $request->size,
    			],
    		]);

    		return response()->json(['success' => 'Successfully Added on Your Cart']);

    	}else{

    		Cart::add([
    			'id' => $id,
    			'name' => $request->product_name,
    			'qty' => $request->quantity,
    			'price' => $product->discount_price,
    			'weight' => 1,
    			'options' => [
    				'image' => $product->product_thambnail,
    				'color' => $request->color,
    				'size' => $request->size,
    			],
    		]);
    		return response()->json(['success' => 'Successfully Added on Your Cart']);
    	}
    }//End Add to Cart Function


	public function viewMiniCart(){
		$carts = Cart::content();
		$cartQty = Cart::count();
		$cartTotal = Cart::subtotal($decimals = 0);

		return response()->json(array(
			'carts' => $carts,
			'cartQty' => $cartQty,
			'cartTotal' => $cartTotal,
		));
	}//End Add to viewMiniCart Function


	public function removeMiniCart($id){
		Cart::remove($id);

		return response()->json(['success' => 'Product Removed From Cart']);
	}//End Add to removeMiniCart Function


	public function addToWishlist(Request $request , $id){
		if(Auth::check()){
			$exists = Wishlist::where('user_id' , auth::id())->where('product_id' , $id)->first();
			if(!$exists){
			Wishlist::create([
				'user_id' => auth::id(),
				'product_id' => $id,
			]);
			return response()->json(['success' => 'Successfully Added On Your Wishlist']);
		}else{
			return response()->json(['error'=> 'Product Already Added Befor']);
		}
		}else{
			return response()->json(['error' => 'Please Make Sure to login First']);
		}
	}//end addtowishlist

    public function applyCoupon(Request $request){
		$coupon = Coupon::where('coupon_name', $request->coupon_name)->where('status' , 1)->first();
        if($coupon){
			$total = (int)str_replace(',','',Cart::subtotal($decimals = 0));
			// dd($total * $coupon->coupon_discount/100 );

			Session::put('coupon',[
			'coupon_name' => $coupon->coupon_name,
			'coupon_discount' => $coupon->coupon_discount,
			'discount_amount' => round($total * $coupon->coupon_discount/100),
			'total_amount' => round($total - $total * $coupon->coupon_discount/100)
			]);
			return response()->json(array(
				'success' => 'Coupon Applied Successfully'
            ));
        }else{
            return response()->json(['error' , 'Invalid Coupon']);
        }
    }//end applyCoupon function

	public function couponCalculation(){
		if(Session::has('coupon')){
			return response()->json(array(
				'subtotal' => Cart::subtotal($decimals = 0),
				'coupon_name' => Session::get('coupon')['coupon_name'],
				'coupon_discount' => Session::get('coupon')['coupon_discount'],
				'discount_amount' => Session::get('coupon')['discount_amount'],
				'total_amount' => Session::get('coupon')['total_amount'],
			));
		}else{
			return response()->json(array(
				'total'=> Cart::subtotal($decimals = 0),
			));
		}
	}//end couponCalculation function

	public function couponRemove(){
		Session::forget('coupon');
		return response()->json(['error' => 'Coupon Removed Successfully']);
	}//end coupon Remove function
}
