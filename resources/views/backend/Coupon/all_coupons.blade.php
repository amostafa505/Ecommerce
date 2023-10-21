@extends('admin.admin_master')
@section('admin')
<div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">All Coupons</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Coupon Name</th>
								<th>Coupon Discount</th>
								<th>Coupons Starts At</th>
                <th>Coupons ends At</th>
                <th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
              @foreach($coupons as $item)
							<tr>
                {{-- {{dd()}} --}}
								<td>{{$item->coupon_name}}</td>
								<td>{{$item->coupon_discount}}%</td>
								<td>{{ Carbon\Carbon::parse($item->coupon_validity_start)->format('Y-m-d') }}</td>
                <td>{{ Carbon\Carbon::parse($item->coupon_validity_end)->format('Y-m-d') }}</td>
                <td>
                  @if($item->status == 1 )
                      <span class="badge badge-bill badge-success">Active</span>
                  @else
                      <span class="badge badge-bill badge-danger">Inactive</span>

                  @endif
              </td>
								<td>
                  {{-- {{dd()}} --}}
                  <a href="{{route('edit.coupon', $item->id)}}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                  <a href="{{route('delete.coupon',$item->id)}}" id="delete" class="btn btn-danger" title="delete"><i class="fa fa-trash"></i></a>
                  @if ($item->status == 1 && $item->coupon_validity_start <= Carbon\Carbon::now()->format('Y-m-d')&& $item->coupon_validity_end >= Carbon\Carbon::now())
                      <a href="{{route('inactive.coupon', $item->id)}}" class="btn btn-danger" title="Inactive Now"><i class="fa fa-arrow-down"></i></a>
                  @else
                      <a href="{{route('active.coupon', $item->id)}}" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up"></i></a>
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
			<!-- /.col -->
            <div class="col-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Add Coupon</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                <form method="post" action="{{route('add.coupon')}}">
                    @csrf
                        <div class="form-group">
                            <h5>Coupon Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="coupon_name"  class="form-control"> </div>
                        </div>
                        <div class="form-group">
                            <h5>Coupon Discount<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="coupon_discount"  class="form-control" > </div>
                        </div>
                        <div class="form-group">
                            <h5>Coupon Starts at<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="date" name="coupon_validity_start"  class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"> </div>
                        </div>
                        <div class="form-group">
                          <h5>Coupon Ends at<span class="text-danger">*</span></h5>
                          <div class="controls">
                              <input type="date" name="coupon_validity_end"  class="form-control" > </div>
                      </div>
                        <div class="text-xs-right">
                            <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                        </div>
                    </form>
                    </div>
                  </div>
                </div>
                <!-- /.col -->

            </div>
            </div>
		  </div>
		  <!-- /.row -->
		<!-- /.content -->

@endsection
