<?php

namespace App\Http\Controllers\backend;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
        $order = Order::findorFail($order_id)->update(['status'=> 'Confirmed' , 'confirmed_date' => now()->format('d F Y')]);
        return redirect()->route('pending.orders')->with('Order Changed to Confirmed Successfully');
    }//end function confirmOrder

    public function processOrder($order_id){
        $order = Order::findorFail($order_id)->update(['status'=> 'Processing' , 'processing_date' => now()->format('d F Y')]);
        return redirect()->route('confirmed.orders')->with('Order Changed to Processing Successfully');
    }//end function processOrder

    public function pickOrder($order_id){
        $order = Order::findorFail($order_id)->update(['status'=> 'Picked' , 'picked_date' => now()->format('d F Y')]);
        return redirect()->route('processing.orders')->with('Order Changed to Picked Successfully');
    }//end function pickOrder

    public function shipOrder($order_id){
        $order = Order::findorFail($order_id)->update(['status'=> 'Shipped' , 'shipped_date' => now()->format('d F Y')]);
        return redirect()->route('picked.orders')->with('Order Changed to Shipped Successfully');
    }//end function shipOrder

    public function deliverOrder($order_id){

        //Remove the Qty From Item Stock After Delivred
        $product = OrderItem::where('order_id' , $order_id)->get();
        foreach($product as $item){
            Product::where('id' , $item->product_id)
            ->update(['product_qty' => DB::raw('product_qty-'.$item->qty)]);
        }
        $order = Order::findorFail($order_id)->update(['status'=> 'Delivered' , 'delivered_date' => now()->format('d F Y')]);
        return redirect()->route('shipped.orders')->with('Order Changed to Delivered Successfully');
    }//end function deliverOrder

    public function cancelOrder($order_id){
        $order = Order::findorFail($order_id)->update(['status'=> 'Canceled' , 'Cancel_date' => now()->format('d F Y')]);
        return redirect()->route('delivered.orders')->with('Order Changed to Canceled Successfully');
    }//end function cancelOrder

    public function adminOrderDownload($order_id){
        $order = Order::with('country','city','user')->where('id',$order_id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('backend.order.order_invoice' , compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }//end function userOrderDownload

    public function unapprovedRequest(){
    	$orders = Order::where('return_order',1)->orderBy('id','DESC')->get();
    	return view('backend.order.unapproved_orders',compact('orders'));
    }//end function unapprovedRequest

    public function approvedRequest(){
        $orders = Order::where('return_order',2)->orderBy('id','DESC')->get();
        return view('backend.order.approved_orders',compact('orders'));
    }//end function unapprovedRequest

    public function approveReturnRequest($order_id){
        $order = Order::where('id' , $order_id)->update(['return_order'=>2,'updated_at'=>now()]);
        return redirect()->back()->with('success' , 'Order Returned Approved');
    }//end function approveReturnRequest

}
