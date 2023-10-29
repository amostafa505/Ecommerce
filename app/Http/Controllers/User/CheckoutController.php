<?php

namespace App\Http\Controllers\User;

use App\Models\Checkout;
use App\Models\ShipCountry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function checkoutView(){
        if(Auth::user()){
            if(Cart::total() > 0){
                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::subtotal($decimals = 0);
                $countries = ShipCountry::orderBy('country_name', 'ASC')->get();
                return view('frontend.checkout.CheckoutView', compact('carts', 'cartQty' , 'cartTotal', 'countries'));

            }else{
                return redirect('/')->with('error' , 'You have to add least one item to view this page');
            }
        }else{
            return redirect('login')->with('error' , 'You have to Login First');
        }
    }//end function


    public function checkoutStore(Request $request){
        $request->validate([
            'shipping_name' => 'required',
            'shipping_email' => 'required|email',
            'shipping_phone' => 'required|Numeric:min_digits:12',
            'postal_code' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'shipping_address' => 'required|string:min:3',
            'payment_method' => 'required',
        ]);
        $Checkout = new Checkout;
        $Checkout->shipping_name = $request->shipping_name;
        $Checkout->shipping_email = $request->shipping_email;
        $Checkout->shipping_phone = $request->shipping_phone;
        $Checkout->postal_code = $request->postal_code;
        $Checkout->country_id = $request->country_id;
        $Checkout->city_id = $request->city_id;
        $Checkout->shipping_address = $request->shipping_address;
        $Checkout->notes = $request->notes;
        $Checkout->save();
        $cartTotal = Cart::subtotal($decimals = 0);
        if ($request->payment_method == 'stripe') {
    		return view('frontend.payment.stripe',compact('Checkout','cartTotal'));
    	}elseif ($request->payment_method == 'card') {
    		return 'card';
    	}else{
            return 'cash';
    	}
    }//end function checkout store
}
