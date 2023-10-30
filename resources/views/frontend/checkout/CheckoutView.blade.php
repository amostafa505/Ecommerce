<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
@extends('frontend.master')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Checkout</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">

                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="" data-parent="#accordion"
                                            href="#collapseOne">
                                            <span>1</span>Checkout Method
                                        </a>
                                    </h4>
                                </div>
                                <!-- panel-heading -->

                                <div id="collapseOne" class="panel-collapse collapse in">

                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        <div class="row">

                                            <!-- guest-login -->
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                <h4 class="checkout-subtitle"><b>Shipping Address</b></h4>

                                                <form class="register-form" action="{{ route('checkout.Store') }}"
                                                    method="POST" role="form">
                                                    @CSRF


                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Shipping Name
                                                            <span>*</span></label>
                                                        <input type="text" name="shipping_name"
                                                            class="form-control unicase-form-control text-input"
                                                            placeholder="Full Name"
                                                            value="{{ Auth::user()->name }}" required="">
                                                        @error('shipping_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div> <!-- // end form group  -->


                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Email
                                                            <span>*</span></label>
                                                        <input type="email" name="shipping_email"
                                                            class="form-control unicase-form-control text-input"
                                                           placeholder="Email"
                                                            value="{{ Auth::user()->email }}" required="">
                                                        @error('shipping_email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div> <!-- // end form group  -->


                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Phone
                                                            <span>*</span></label>
                                                        <input type="number" name="shipping_phone"
                                                            class="form-control unicase-form-control text-input"
                                                             placeholder="Phone"
                                                            value="{{ Auth::user()->phone }}" required="">
                                                        @error('shipping_phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div> <!-- // end form group  -->


                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Post Code
                                                            <span>*</span></label>
                                                        <input type="text" name="postal_code"
                                                            class="form-control unicase-form-control text-input"
                                                            placeholder="Post Code" required="">
                                                        @error('post_code')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div> <!-- // end form group  -->



                                            </div>
                                            <!-- guest-login -->

                                            <!-- already-registered-login -->
                                            <div class="col-md-6 col-sm-6 already-registered-login">


                                                <div class="form-group">
                                                    <h5><b>Country Select </b> <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="country_id" class="form-control" required="">
                                                            <option value="" selected="" disabled="">Select
                                                                Country</option>
                                                            @foreach ($countries as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->country_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('country_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- // end form group -->


                                                <div class="form-group">
                                                    <h5><b>City Select</b> <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="city_id" class="form-control" required="">
                                                            <option value="" selected="" disabled="">Select City
                                                            </option>

                                                        </select>
                                                        @error('city_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- // end form group -->
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Address
                                                        <span>*</span></label>
                                                    <textarea class="form-control" cols="30" rows="5" placeholder="Please Write You Full Address"
                                                        name="shipping_address"></textarea>
                                                    @error('shipping_address')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div> <!-- // end form group  -->

                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Notes
                                                        <span>*</span></label>
                                                    <textarea class="form-control" cols="30" rows="5" placeholder="Notes" name="notes"></textarea>
                                                    @error('notes')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div> <!-- // end form group  -->



                                                {{-- <button type="submit"
                                                    class="btn-upper btn btn-primary checkout-page-button">Confirm Checkout
                                                </button> --}}
                                            </div>
                                        </div>
                                        <!-- panel-body  -->

                                    </div><!-- row -->
                                </div>
                                <!-- checkout-step-01  -->
                            </div><!-- /.checkout-steps -->
                        </div>

                    </div>{{-- end col-md-8  --}}
                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Checkout Products Details</h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">
                                            @foreach ($carts as $item)
                                                <li>
                                                    <strong>Image: </strong>
                                                    <img src="{{ asset('uploads/products/thambnails/' . $item->options->image) }}"
                                                        style="height: 50px; width: 50px;">
                                                </li>

                                                <li>
                                                    <strong>Qty: </strong>
                                                    ({{ $item->qty }})
                                                    <strong>Color: </strong>
                                                    {{ $item->options->color }}

                                                    <strong>Size: </strong>
                                                    {{ $item->options->size }}
                                                </li>
                                            @endforeach
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

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->
                    </div>
                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Select Payment Method</h4>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Stripe</label>
                                            <input type="radio" name="payment_method" value="stripe">
                                            <img src="{{ asset('frontend/assets/images/payments/4.png') }}">
                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-4">
                                            <label for="">Card</label>
                                            <input type="radio" name="payment_method" value="card">
                                            <img src="{{ asset('frontend/assets/images/payments/3.png') }}">
                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-4">
                                            <label for="">Cash</label>
                                            <input type="radio" name="payment_method" value="cash">
                                            <img src="{{ asset('frontend/assets/images/payments/6.png') }}">
                                        </div> <!-- end col md 4 -->


                                    </div> <!-- // end row  -->
                                    <hr>
                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment
                                        Step</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('frontend.body.brands')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection


<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="country_id"]').on('change', function() {
            var country_id = $(this).val();
            if (country_id) {
                $.ajax({
                    type: "Get",
                    url: "/City/ajax/" + country_id,
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="city_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city_id"]').append('<option value="' +
                                value.id + '">' + value.city_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });

    });
</script>
