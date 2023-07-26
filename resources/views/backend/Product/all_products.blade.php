@extends('admin.admin_master')
@section('admin')
<div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">All Products</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th>Product_Thambnail</th>
								<th>Product En</th>
								<th>Product Price</th>
                                <th>Quantity</th>
                                <th>Discount</th>
                                <th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($products as $product)
							<tr>
                                <td><img src="{{asset('/uploads/products/thambnails/'.$product->product_thambnail)}}" width="70px" height="40px"></td></td>
								<td>{{$product->product_name_en}}</td>
								<td>{{$product->selling_price}}</td>
                                <td>{{$product->product_qty}}</td>
                                <td>
                                    @if ($product->discount_price == NULL)
                                        <span class="badge badge-bill badge-danger">No Discount</span>
                                    @else
                                        @php
                                            $amount = $product->selling_price - $product->discount_price ;
                                            $discount  = ($amount / $product->selling_price) * 100;
                                        @endphp
                                        <span class="badge badge-bill success-danger">{{ round($discount)}} %</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($product->status == 1)
                                        <span class="badge badge-bill badge-success">Active</span>
                                    @else
                                        <span class="badge badge-bill badge-danger">Inactive</span>

                                    @endif
                                </td>
								<td>
                                    <a href="{{route('edit.product', $product->id)}}" class="btn btn-info" title="Product Details"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('edit.product', $product->id)}}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="{{route('delete.product',$product->id)}}" id="delete" class="btn btn-danger" title="delete"><i class="fa fa-trash"></i></a>
                                    @if ($product->status == 1)
                                        <a href="{{route('inactive.product', $product->id)}}" class="btn btn-danger" title="Inactive Now"><i class="fa fa-arrow-down"></i></a>
                                    @else
                                        <a href="{{route('active.product', $product->id)}}" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up"></i></a>
                                    @endif
                                </td>
							</tr>
                            @endforeach
						</tbody>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			</div>
            </div>
            </div>
		  </div>
		  <!-- /.row -->
		<!-- /.content -->

@endsection
