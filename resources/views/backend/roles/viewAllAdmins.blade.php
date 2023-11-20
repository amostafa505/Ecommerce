@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">



			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Total Admin User </h3>
                  <a href="{{ route('add.admin') }}" class="btn btn-danger" style="float: right;">Add Admin User</a>

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image  </th>
								<th>Name  </th>
								<th>Email </th>
								<th>Access </th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody>
                            @foreach($adminUsers as $item)
                            <tr>
                                <td> <img src="{{ asset($item->profile_photo_path) }}" style="width: 50px; height: 50px;">  </td>
                                <td> {{ $item->name }}  </td>
                                <td>  {{ $item->email  }}  </td>

                                <td>
                                    @if($item->brand == 1)
                                        <span class="badge btn-primary">Brand</span>
                                    @endif

                                    @if($item->category == 1)
                                    <span class="badge btn-secondary">Category</span>
                                    @endif

                                    @if($item->product == 1)
                                    <span class="badge btn-success">Product</span>
                                    @endif

                                    @if($item->slider == 1)
                                    <span class="badge btn-danger">Slider</span>
                                    @endif

                                    @if($item->coupon == 1)
                                    <span class="badge btn-warning">Coupons</span>
                                    @endif

                                    @if($item->shippingarea == 1)
                                    <span class="badge btn-info">Shipping</span>
                                    @endif

                                    @if($item->blog == 1)
                                    <span class="badge btn-light">Blog</span>
                                    @endif

                                    @if($item->site == 1)
                                    <span class="badge btn-dark">Setting</span>
                                    @endif

                                    @if($item->review == 1)
                                    <span class="badge btn-secondary">Review</span>
                                    @endif

                                    @if($item->orders == 1)
                                    <span class="badge btn-success">Orders</span>
                                    @endif

                                    @if($item->report == 1)
                                    <span class="badge btn-warning">Reports</span>
                                    @endif

                                    @if($item->allusers == 1)
                                    <span class="badge btn-info">All User</span>
                                    @endif

                                    @if($item->adminuserrole == 1)
                                    <span class="badge btn-dark">Admin User Role</span>
                                    @endif </td>


                                <td>
                                <a href="{{route('admin.edit', $item->id)}}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                <a href="{{route('admin.delete',$item->id)}}" id="delete" class="btn btn-danger" title="delete"><i class="fa fa-trash"></i></a>
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
			<!-- /.col -->






		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->

	  </div>




@endsection
