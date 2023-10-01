<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class cartController extends Controller
{

    public function addToCart(Request $request, $id){

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
}
