@extends('frontend.master')
@section('content')



@section('title')
    Cash On Delivery Payment Page
@endsection


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Cash On Delivery</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->




<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">





                <div class="col-md-6">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Your Shopping Amount </h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">


                                        <hr>
                                        <li>
                                            @if (Session::has('coupon'))
                                                <strong>SubTotal: </strong> ${{ $cartTotal }}
                                                <hr>

                                                <strong>Coupon Name : </strong>
                                                {{ session()->get('coupon')['coupon_name'] }}
                                                ( {{ session()->get('coupon')['coupon_discount'] }} % )
                                                <hr>

                                                <strong>Coupon Discount : </strong>
                                                ${{ session()->get('coupon')['discount_amount'] }}
                                                <hr>

                                                <strong>Grand Total : </strong>
                                                ${{ session()->get('coupon')['total_amount'] }}
                                                <hr>
                                            @else
                                                <strong>SubTotal: </strong> ${{ $cartTotal }}
                                                <hr>

                                                <strong>Grand Total : </strong> ${{ $cartTotal }}
                                                <hr>
                                            @endif

                                        </li>



                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div> <!--  // end col md 6 -->







                <div class="col-md-6">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Select Payment Method</h4>
                                </div>


                                <form action=" {{route('Cash-Order')}} " method="post" id="payment-form">
                                    @csrf
                                <div class="form-row">
                                    <img src="{{ asset('frontend/assets/images/payments/cash.png') }}">

                                    <input type="hidden" name="name" value="{{ $Checkout['shipping_name'] }}">
                                    <input type="hidden" name="email" value="{{ $Checkout['shipping_email'] }}">
                                    <input type="hidden" name="phone" value="{{ $Checkout['shipping_phone'] }}">
                                    <input type="hidden" name="postal_code" value="{{ $Checkout['postal_code'] }}">
                                    <input type="hidden" name="shipping_address" value="{{ $Checkout['shipping_address'] }}">
                                    <input type="hidden" name="country_id" value="{{ $Checkout['country_id'] }}">
                                    <input type="hidden" name="city_id" value="{{ $Checkout['city_id'] }}">
                                    <input type="hidden" name="notes" value="{{ $Checkout['notes'] }}">


                                </div>
                                <br>
                                <button class="btn btn-primary">Submit Payment</button>
                                </form>


                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div><!--  // end col md 6 -->







                </form>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
        <!-- === ===== BRANDS CAROUSEL ==== ======== -->








        <!-- ===== == BRANDS CAROUSEL : END === === -->
    </div><!-- /.container -->
</div><!-- /.body-content -->



@endsection
