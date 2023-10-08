<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function viewCoupon(){
        $coupons = Coupon::latest()->get();
        $coupons2 = $this->validCheck($coupons);
        return view('backend.Coupon.all_coupons' , compact('coupons'));
    }//end viewCoupon

    public function store(Request $request){
        $validate = $request->validate([
            'coupon_name' => 'required|string',
            'coupon_discount' => 'required|integer',
            'coupon_validity_start' => 'required|string',
            'coupon_validity_end' => 'required|string',
        ]);
        Coupon::Create([
            'coupon_name' =>strtoupper($request->coupon_name),
            'coupon_discount' =>$request->coupon_discount,
            'coupon_validity_start' => $request->coupon_validity_start,
            'coupon_validity_end' => $request->coupon_validity_end,
        ]);
            return redirect()->route('all.coupons')->with('success' , 'Coupon Added Successfully');

    }//end store Coupon

    public function editCoupon($id){
        $coupon = Coupon::find($id);
        return view('backend.Coupon.edit_coupon' , compact('coupon'));
    }//end edit Coupon

    public function updateCoupon(Request $request){
        $validate = $request->validate([
            'coupon_name' => 'required|string',
            'coupon_discount' => 'required|integer',
            'coupon_validity_start' => 'required|string',
            'coupon_validity_end' => 'required|string',
        ]);
        $coupon = Coupon::find($request->id);
        $coupon->coupon_name = strtoupper($request->coupon_name);
        $coupon->coupon_discount = $request->coupon_discount;
        $coupon->coupon_validity_start = $request->coupon_validity_start;
        $coupon->coupon_validity_end = $request->coupon_validity_end;
        $coupon->save();
        return redirect()->route('all.coupons')->with('success' , 'Coupon Updated Successfully');
    }//end update Coupon

    public function deleteCoupon($id){
        $Coupon = Coupon::findOrFail($id);
        $Coupon->delete();
        return redirect()->back()->with('success' , 'Coupon Deleted Successfully');
    }//end delete Coupon

    public function inActiveCoupon($id){

        Coupon::findOrFail($id)->update(['status' => 0]);
        return redirect()->back()->with('danger' , 'Coupon deactivated Successfully');

    }//end inActiveProduct method

    public function activeCoupon($id){

        Coupon::findOrFail($id)->update(['status' => 1]);
        return redirect()->back()->with('success' , 'Coupon Activated Successfully');

    }//end ActiveProduct method


    protected function validCheck($coupons){
        // looping on all the coupons
        foreach($coupons as $coupon){
            //check every coupon if its status is active to avoid checking the already inactive coupons
            if($coupon->status == 1){
                //now checking if the coupon on its valid time or not 
                if($coupon->coupon_validity_start <= Carbon::now()->format('Y-m-d')&& $coupon->coupon_validity_end >= Carbon::now()){
                    return true;
                }else{
                    //now change all the coupons at its time is not valid
                    $coupon->update(['status' => 0]);
                    return true;
                }
            }else{
                return true;
            }
        }
    }
}
