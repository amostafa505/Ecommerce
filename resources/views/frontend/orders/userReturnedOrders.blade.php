@extends('frontend.master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">

                <div class="col-md-2">
                    @include('frontend.commonparts.userProfile-Sidebar')
                </div>

                <div class="col-md-10">
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                            <tr class="info">
                                <th>Date</th>
                                <th>Total</th>
                                <th>Invoice</th>
                                <th>Order Number</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        @foreach ($orders as $order)
                        <tbody>
                            <tr>
                                <td>
                                    <div class="product-price">
                                        {{ $order->order_date }}
                                    </div>
                                </td>
                                <td><p class="text"> ${{ $order->amount }}</p></td>
                                <td><p class="in-stock">{{ $order->payment_method }}</p></td>
                                <td><p class="in-stock">{{ $order->order_number }}</p></td>
                                <td class="col-md-2">
                                    <label for="">
                                    @if($order->return_order == 0)
                                        <span class="badge badge-pill badge-warning" style="background: #418DB9;"> No Return Request </span>
                                    @elseif($order->return_order == 1)
                                        <span class="badge badge-pill badge-warning" style="background: #800000;"> Pending </span>
                                        <span class="badge badge-pill badge-warning" style="background:red;">Return Requested </span>

                                    @elseif($order->return_order == 2)
                                        <span class="badge badge-pill badge-warning" style="background: #008000;">Success </span>
                                    @endif


                                    </label>
                                </td>
                            </tr>
                        </tbody>
                            @endforeach
                        </table>
                    </div>



                </div> <!-- / end col md 10 -->





            </div> <!-- // end row -->

        </div>

    </div>
@endsection
