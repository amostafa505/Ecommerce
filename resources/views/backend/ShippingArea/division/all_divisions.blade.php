@extends('admin.admin_master')
@section('admin')
<div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">All Divisons</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Coupon Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
              @foreach($divisions as $item)
							<tr>
                {{-- {{dd()}} --}}
								<td>{{$item->division_name}}</td>
								<td>
                  <a href="{{route('edit.division', $item->id)}}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                  <a href="{{route('delete.division',$item->id)}}" id="delete" class="btn btn-danger" title="delete"><i class="fa fa-trash"></i></a>
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
                        <h3 class="box-title">Add Division</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                <form method="post" action="{{route('add.division')}}">
                    @csrf
                        <div class="form-group">
                            <h5>Division Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="division_name"  class="form-control"> </div>
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
