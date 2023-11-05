<?php

namespace App\Http\Controllers\backend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function pendingOrders(){
       $orders = Order::where('status' , 'Pending')->orderBy('id' , 'DESC')->get();
       return view('backend.Order.pendingOrders' , compact('orders'));
    }//end function pendingOrders

    public function confirmedOrders(){
        $orders = Order::where('status' , 'Confirmed')->orderBy('id' , 'DESC')->get();
        return view('backend.Order.confirmedOrders' , compact('orders'));
     }//end function pendingOrders

     public function processingOrders(){
        $orders = Order::where('status' , 'Processing')->orderBy('id' , 'DESC')->get();
        return view('backend.Order.processingOrders' , compact('orders'));
     }//end function pendingOrders

     public function pickedOrders(){
        $orders = Order::where('status' , 'Picked')->orderBy('id' , 'DESC')->get();
        return view('backend.Order.pickedOrders' , compact('orders'));
     }//end function pendingOrders

     public function shippedOrders(){
        $orders = Order::where('status' , 'Shipped')->orderBy('id' , 'DESC')->get();
        return view('backend.Order.shippedOrders' , compact('orders'));
     }//end function pendingOrders

     public function deliveredOrders(){
        $orders = Order::where('status' , 'Delivered')->orderBy('id' , 'DESC')->get();
        return view('backend.Order.deliveredOrders' , compact('orders'));
     }//end function pendingOrders

     public function canceledOrders(){
        $orders = Order::where('status' , 'Canceled')->orderBy('id' , 'DESC')->get();
        return view('backend.Order.canceledOrders' , compact('orders'));
     }//end function pendingOrders


    public function OrderDetails($order_id){
        $order = Order::with('country' , 'city' , 'user')->where('id' , $order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id' , $order_id)->orderBy('id' , 'DESC')->get();

        return view('backend.Order.orderDetails' , compact('order' , 'orderItem'));
    }//end function pendingOrderDetails


    public function confirmOrder($order_id){
        $order = Order::findorFail($order_id)->update(['status'=> 'Confirmed' , 'confirmed_date' => Carbon::now()]);
        return redirect()->route('pending.orders')->with('Order Changed to Confirmed Successfully');
    }//end function confirmOrder

    public function processOrder($order_id){
        $order = Order::findorFail($order_id)->update(['status'=> 'Processing' , 'processing_date' => Carbon::now()]);
        return redirect()->route('confirmed.orders')->with('Order Changed to Processing Successfully');
    }//end function processOrder

    public function pickOrder($order_id){
        $order = Order::findorFail($order_id)->update(['status'=> 'Picked' , 'picked_date' => Carbon::now()]);
        return redirect()->route('processing.orders')->with('Order Changed to Picked Successfully');
    }//end function pickOrder

    public function shipOrder($order_id){
        $order = Order::findorFail($order_id)->update(['status'=> 'Shipped' , 'shipped_date' => Carbon::now()]);
        return redirect()->route('picked.orders')->with('Order Changed to Shipped Successfully');
    }//end function shipOrder

    public function deliverOrder($order_id){
        $order = Order::findorFail($order_id)->update(['status'=> 'Delivered' , 'delivered_date' => Carbon::now()]);
        return redirect()->route('shipped.orders')->with('Order Changed to Delivered Successfully');
    }//end function deliverOrder

    public function cancelOrder($order_id){
        $order = Order::findorFail($order_id)->update(['status'=> 'Canceled' , 'Cancel_date' => Carbon::now()]);
        return redirect()->route('delivered.orders')->with('Order Changed to Canceled Successfully');
    }//end function cancelOrder

}
