<?php

namespace App\Http\Controllers\backend;

use DateTime;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function viewReports(){
        return view('backend.report.report_view');
    }//end function viewReports



   public function ReportByDate(Request $request){
    $date = new DateTime($request->date);
    $formatDate = $date->format('d F Y');
    $orders = Order::where('order_date',$formatDate)->latest()->get();
    return view('backend.report.report_show',compact('orders'));
} // end mehtod ReportByDate



public function ReportByMonth(Request $request){

    $orders = Order::where('order_month',$request->month)->where('order_year',$request->year_name)->latest()->get();
    return view('backend.report.report_show',compact('orders'));

} // end mehtod ReportByMonth


   public function ReportByYear(Request $request){

    $orders = Order::where('order_year',$request->year)->latest()->get();
    return view('backend.report.report_show',compact('orders'));

} // end mehtod ReportByYear
}
