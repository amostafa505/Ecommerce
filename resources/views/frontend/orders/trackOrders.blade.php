@extends('frontend.master')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

        body {
            background-color: #eeeeee;
            font-family: 'Open Sans', serif
        }

        .containertrack {
            margin-top: 50px;
            margin-bottom: 50px
        }

        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 0.10rem
        }

        .card-header:first-child {
            border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
        }

        .card-header {
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1)
        }

        .track {
            position: relative;
            background-color: #ddd;
            height: 7px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 60px;
            margin-top: 50px
        }

        .track .step {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            width: 25%;
            margin-top: -18px;
            text-align: center;
            position: relative
        }

        .track .step.active:before {
            background: #157ed2
        }

        .track .step::before {
            height: 7px;
            position: absolute;
            content: "";
            width: 100%;
            left: 0;
            top: 18px
        }

        .track .step.active .icon {
            background: #157ed2;
            color: #fff
        }

        .track .icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            position: relative;
            border-radius: 100%;
            background: #ddd
        }

        .track .step.active .text {
            font-weight: 400;
            color: #000
        }

        .track .text {
            display: block;
            margin-top: 7px
        }

        .itemside {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            width: 100%
        }

        .itemside .aside {
            position: relative;
            -ms-flex-negative: 0;
            flex-shrink: 0
        }

        .img-sm {
            width: 80px;
            height: 80px;
            padding: 7px
        }

        ul.row,
        ul.row-sm {
            list-style: none;
            padding: 0
        }

        .itemside .info {
            padding-left: 15px;
            padding-right: 7px
        }

        .itemside .title {
            display: block;
            margin-bottom: 5px;
            color: #212529
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem
        }

        .btn-warning {
            color: #ffffff;
            background-color: #ee5435;
            border-color: #ee5435;
            border-radius: 1px
        }

        .btn-warning:hover {
            color: #ffffff;
            background-color: #ff2b00;
            border-color: #ff2b00;
            border-radius: 1px
        }
    </style>


   <div class="container">
    <div class="containertrack">
        <article class="card">
            <div class="col-md-12">
            <header class="card-header"> <b> My Orders Tracking </b> </header>
            <div class="card-body">
                <h4><p> Order ID: {{$order->invoice_no}}</p></h4>
                <article class="card">
                    <div class="card-body">

                        <div class="col-md-6">
                            <div> <strong>Order Date:</strong> <br>{{ $order->order_date }} </div>
                            <div> <strong>Shipping Address / Shipping Phone:</strong> <br> {{$order->shipping_address}} | <i class="fa fa-phone"></i>
                            {{$order->phone}} </div>
                        </div>
                        <div class="col-md-6">
                            <div> <strong><b> Payment Method  </b></strong> <br> {{$order->payment_method}} </div>
                            <div> <strong>Total Amount:</strong> <br> ${{$order->amount}} </div>
                        </div>
                    </div>
                </article>
                <div class="track">
                    @if($order->status =='Pending')
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Processing  </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Picked</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Shipped </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered </span> </div>
                    @elseif($order->status =='Confirmed')
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Processing  </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Picked</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Shipped </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered </span> </div>
                    @elseif($order->status =='Processing')
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Processing  </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Picked</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Shipped </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered </span> </div>
                    @elseif($order->status =='Picked')
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Processing  </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Picked</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Shipped </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered </span> </div>
                    @elseif($order->status =='Shipped')
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Processing  </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Picked</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Shipped </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered </span> </div>
                    @elseif($order->status =='Delivered')
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Processing  </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Picked</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Shipped </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered </span> </div>
                    @endif
                    {{-- <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">Picked by courier</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for pickup</span> </div> --}}
                </div>

            </div>
            </div>
        </article>

    </div> {{--End Containertrack --}}
    </div> {{--End Container --}}
@endsection
