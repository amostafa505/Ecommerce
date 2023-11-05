@extends('frontend.master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    @include('frontend.commonparts.userProfile-Sidebar')
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-right">Order</h4>
                        </div>
                        <hr>
                        <div class="card-body" style="background: #E9EBEC;">
                            <table class="table">
                                <tr>
                                    <th> Shipping Name : </th>
                                    <th> {{ $order->name }} </th>
                                </tr>

                                <tr>
                                    <th> Shipping Phone : </th>
                                    <th> {{ $order->phone }} </th>
                                </tr>

                                <tr>
                                    <th> Shipping Email : </th>
                                    <th> {{ $order->email }} </th>
                                </tr>

                                <tr>
                                    <th> Country : </th>
                                    <th> {{ $order->country->country_name }} </th>
                                </tr>

                                <tr>
                                    <th> City : </th>
                                    <th> {{ $order->city->city_name }} </th>
                                </tr>

                                <tr>
                                    <th> Address : </th>
                                    <th>{{ $order->shipping_address }} </th>
                                </tr>
                            </table>


                        </div>

                    </div>

                </div> <!-- // end col md -5 -->
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-left">Details</h4>
                        </div>
                        <hr>
                        <div class="card-body" style="background: #E9EBEC;">
                            <table class="table">
                                <tr>
                                    <th> Post Code : </th>
                                    <th> {{ $order->postal_code }} </th>
                                </tr>

                                <tr>
                                    <th> Order Date : </th>
                                    <th> {{ $order->order_date }} </th>
                                </tr>
                                <tr>
                                    <th> Invoice  : </th>
                                     <th class="text-danger"> {{ $order->invoice_no }} </th>
                                </tr>
                                <tr>
                                    <th> Payment Type : </th>
                                     <th> {{ $order->payment_method }} </th>
                                </tr>
                                <tr>
                                    <th> Order Total : </th>
                                    <th> {{ $order->amount  }} </th>
                                </tr>

                                <tr>
                                    <th> Order : </th>
                                    <th>
                                        <span class="badge badge-pill badge-warning"
                                            style="background: #418DB9;">{{ $order->status }} </span>
                                    </th>
                                </tr>
                            </table>


                        </div>

                    </div>

                </div> <!-- // end col md -5 -->
                   <div class="col-md-12">
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                            <tr class="info">
                                <th class="col-md-3">Image</th>
                                <th class="col-md-3">Product Name</th>
                                <th class="col-md-1">Color</th>
                                <th class="col-md-2">Size</th>
                                <th class="col-md-1">Quantity</th>
                                <th class="col-md-2">Price</th>
                            </tr>
                        </thead>
                        @foreach($order_items as $item)
                        <tbody>
                            <tr>
                                <td>
                                    <img src="{{ asset('/uploads/products/thambnails/'.$item->product->product_thambnail) }}" height="50px;" width="50px;">
                                </td>
                                <td>{{ $item->product->product_name_en }}</td>
                                <td>{{ $item->color }}</td>
                                <td>{{ $item->size }}</td>
                                <td>{{ $item->qty }}</td>
                                <td class="col-md-3"> ${{ $item->price }}  ( ${{ $item->price * $item->qty}})</td>
                            </tr>
                        </tbody>
                            @endforeach
                        </table>
                    </div>



                </div> <!-- / end col md 10 -->









                  </div> <!-- // END ORDER ITEM ROW -->

                @if($order->status !== "delivered")

                @else
                    <div class="form-group">
                        <label for="label"> Order Return Reason:</label>
                        <textarea name="return_reason" id="" class="form-control" cols="30" rows="05">Return Reason</textarea>
                    </div>
                @endif


            </div> <!-- // end row -->

        </div>

    </div>
@endsection
