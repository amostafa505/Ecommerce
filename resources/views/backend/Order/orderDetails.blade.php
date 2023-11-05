@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Order Details</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Order Details</li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>



        <!-- Main content -->
        <section class="content">
            <div class="row">


                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Shipping Details</strong> </h4>
                        </div>


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
                                <th>{{ $order->city->city_name }} </th>
                            </tr>

                            <tr>
                                <th> Address : </th>
                                <th> {{ $order->shipping_address }} </th>
                            </tr>

                            <tr>
                                <th> Post Code : </th>
                                <th> {{ $order->postal_code }} </th>
                            </tr>

                            <tr>
                                <th> Order Date : </th>
                                <th> {{ $order->order_date }} </th>
                            </tr>

                        </table>



                    </div>
                </div> <!--  // cod md -6 -->


                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Order Details</strong><span class="text-danger"> Invoice :
                                    {{ $order->invoice_no }}</span></h4>
                        </div>


                        <table class="table">
                            <tr>
                                <th> Name : </th>
                                <th> {{ $order->user->name }} </th>
                            </tr>

                            <tr>
                                <th> Phone : </th>
                                <th> {{ $order->phone }} </th>
                            </tr>

                            <tr>
                                <th> Payment Type : </th>
                                <th> {{ $order->payment_method }} </th>
                            </tr>

                            <tr>
                                <th> Tranx ID : </th>
                                <th> {{ $order->transaction_id }} </th>
                            </tr>

                            <tr>
                                <th> Invoice : </th>
                                <th class="text-danger"> {{ $order->invoice_no }} </th>
                            </tr>

                            <tr>
                                <th> Order Total : </th>
                                <th>${{ $order->amount }} </th>
                            </tr>

                            <tr>
                                <th> Order : </th>
                                <th>
                                    <span class="badge badge-pill badge-warning"
                                        style="background: #418DB9;">{{ $order->status }} </span>
                                </th>
                            </tr>
                            @if($order->status =='Pending')
                                <tr>
                                    <th> Confirm Order : </th>
                                    <th>
                                        <a href="{{route('confirm.Order',$order->id)}}" id="confirmOrder" class="btn btn-primary">Confirm Order</a>
                                    </th>
                                </tr>
                            @elseif($order->status =='Confirmed'){
                                <tr>
                                    <th> Process Order : </th>
                                    <th>
                                        <a href="{{route('process.Order',$order->id)}}" id="processOrder" class="btn btn-primary">Process Order</a>
                                    </th>
                                </tr>
                            }@elseif($order->status =='Processing'){
                                <tr>
                                    <th> Pick Order : </th>
                                    <th>
                                        <a href="{{route('pick.Order',$order->id)}}" id="pickOrder" class="btn btn-primary">Pick Order</a>
                                    </th>
                                </tr>
                            }@elseif($order->status =='Picked'){
                                <tr>
                                    <th> Ship Order : </th>
                                    <th>
                                        <a href="{{route('ship.Order',$order->id)}}" id="shipOrder" class="btn btn-primary">Ship Order</a>
                                    </th>
                                </tr>
                            }@elseif($order->status =='Shipped'){
                                <tr>
                                    <th> Deliver Order : </th>
                                    <th>
                                        <a href="{{route('deliver.Order',$order->id)}}" id="deliverOrder" class="btn btn-primary">Deliver Order</a>
                                    </th>
                                </tr>
                            }@elseif($order->status =='Delivered'){
                                <tr>
                                    <th> Cancel Order : </th>
                                    <th>
                                        <a href="{{route('cancel.Order',$order->id)}}" id="cancelOrder" class="btn btn-primary">Cancel Order</a>
                                    </th>
                                </tr>
                            }@endif


                        </table>



                    </div>
                </div> <!--  // cod md -6 -->





                <div class="col-md-12 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">

                        </div>



                        <table class="table">
                            <tbody>

                                <tr>
                                    <td width="10%">
                                        <label for=""> Image</label>
                                    </td>

                                    <td width="20%">
                                        <label for=""> Product Name </label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> Product Code</label>
                                    </td>


                                    <td width="10%">
                                        <label for=""> Color </label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> Size </label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> Quantity </label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> Price </label>
                                    </td>

                                </tr>


                                @foreach ($orderItem as $item)
                                    <tr>
                                        <td width="10%">
                                            <label for=""><img src="{{ asset('uploads/products/thambnails/'.$item->product->product_thambnail) }}"
                                                    height="50px;" width="50px;"> </label>
                                        </td>

                                        <td width="20%">
                                            <label for=""> {{ $item->product->product_name_en }}</label>
                                        </td>


                                        <td width="10%">
                                            <label for=""> {{ $item->product->product_code }}</label>
                                        </td>

                                        <td width="10%">
                                            <label for=""> {{ $item->color }}</label>
                                        </td>

                                        <td width="10%">
                                            <label for=""> {{ $item->size }}</label>
                                        </td>

                                        <td width="10%">
                                            <label for=""> {{ $item->qty }}</label>
                                        </td>

                                        <td width="10%">
                                            <label for=""> ${{ $item->price }} ( $
                                                {{ $item->price * $item->qty }} ) </label>
                                        </td>

                                    </tr>
                                @endforeach


                            </tbody>

                        </table>
                    </div>
                </div> <!--  // cod md -12 -->

            </div>
            <!-- /. end row -->
        </section>
        <!-- /.content -->

    </div>
@endsection
