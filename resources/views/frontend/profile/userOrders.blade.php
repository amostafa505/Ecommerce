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
                                <th>Order</th>
                                <th>Action</th>
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
                                <td><p class="text"> ${{ $order->amount }}<p></td>
                                 <td><p class="in-stock">{{ $order->payment_method }}</p></td>
                                <td><p class="in-stock">{{ $order->status }}</p></td>
                                <td class='text-center'><a href="{{url('user/order/details/'.$order->id)}}" class="remove-icon"><i class="fa fa-eye"></i></a>
                                    <a href="{{url('user/order/download/'.$order->id)}}" class="remove-icon"><i class="fa fa-download"></i></a></td>
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
