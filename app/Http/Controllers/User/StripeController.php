<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Order;
use App\Mail\OrderMail;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class StripeController extends Controller
{
    public function StripeOrder(Request $request){


        if(Session::has('coupon')){
            $total_amount = (int)Session::get('coupon')['total_amount'];
        }else{
            $total_amount = (int)Cart::subtotal($decimals = 0);
        }
        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51K1G2XEzV4FHHKsgcfu9d7SBMsyjmCZGyhIejzSxBVMwaGknDfmjocnFrtrmOyuDULamGmX0QBuGcmi2UXn5U01u00A5RYiuTT');

        // Token is created using Stripe Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
        'amount' => $total_amount*100,
        'currency' => 'usd',
        'description' => 'AMI Store',
        'source' => $token,
        'metadata' => ['order_id' => uniqid()],
        ]);
// dd($charge);
        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'postal_code' => $request->postal_code,
            'shipping_address' => $request->shipping_address,
            'notes' => $request->notes,

            'payment_type' => 'Stripe',
            'payment_method' => 'Stripe',
            'payment_type' => $charge->payment_method,
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $total_amount,
            'order_number' => $charge->metadata->order_id,

            'invoice_no' => 'AMI'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'Pending',
            'created_at' => Carbon::now(),

        ]);

        $carts = Cart::content();
        foreach($carts as $cart){
            $order_item = new OrderItem;
            $order_item->order_id = $order_id;
            $order_item->product_id = $cart->id;
            $order_item->color = $cart->options->color;
            $order_item->size = $cart->options->size;
            $order_item->qty = $cart->qty;
            $order_item->price = $cart->price;
            $order_item->save();
        };
        //Order Send Mail
            $invoice = Order::findOrFail($order_id);
            $data = [
                'invoice_no' => $invoice->invoice_no,
                'amount' => $total_amount,
                'name'=>$invoice->name,
                'email' => $invoice->email,
                'address' => $invoice->shipping_address,
            ];
            Mail::to($request->email)->send(new OrderMail($data));
        //End Order Mail
        if(Session::has('coupon')) {
			Session::forget('coupon');
		 }

         Cart::destroy();

         return redirect('dashboard')->with('success' ,'Your Order is Placed Successfully');
    }
}
