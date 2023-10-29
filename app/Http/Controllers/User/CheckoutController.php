<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function checkoutView(){
        if(Auth::user()){
            if(Cart::content()>1){

            }else{
                return redirect('/')->with('error' , 'You have to add least one item to view this page');
            }
        }else{
            return redirect('login')->with('error' , 'You have to Login First');
        }
        return view('frontend.checkout.CheckoutView');
    }//end function
}
