<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Coupon;
use Illuminate\Console\Command;

class CouponCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:coupon-check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Here i check if the Coupon time is vaild or not if now then the status turns to 0';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $coupons = Coupon::where('status' , 1)->get();
        foreach($coupons as $coupon){
        if($coupon->coupon_validity_start >= Carbon::now()->format('Y-m-d') && $coupon->coupon_validity_end <= Carbon::now()){
            return true;
        }else{
            //now change all the coupons at its time is not valid
            $coupon->update(['status' => 0]);
            return true;
        }
    }
    }
}
