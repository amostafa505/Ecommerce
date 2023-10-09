@extends('admin.admin_master')
@section('admin')
<div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">All States</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>State Name</th>
								<th>Division Name</th>
								<th>District Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
              @foreach($states as $item)
							<tr>
                {{-- {{dd()}} --}}
								<td>{{$item->state_name}}</td>
								<td>{{$item['division']->division_name}}</td>
								<td>{{$item['district']->district_name}}</td>
								<td>
                  <a href="{{route('edit.state', $item->id)}}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                  <a href="{{route('delete.state',$item->id)}}" id="delete" class="btn btn-danger" title="delete"><i class="fa fa-trash"></i></a>
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
                        <h3 class="box-title">Add State</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                <form method="post" action="{{route('add.state')}}">
                    @csrf
                        <div class="form-group">
                            <h5>State Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="district_name"  class="form-control"> </div>
                        </div>
						<div class="form-group">
                            <h5>District<span class="text-danger">*</span></h5>
                            <select class="form-control" name="district_id">
                                <option disabled selected="" value="">Select Division</option>
                            @foreach($districts as $item)
                                <option value="{{$item->id}}">{{$item->district_name}}</option>
                            @endforeach
							</select>
                        </div>
						<div class="form-group">
                            <h5>Division<span class="text-danger">*</span></h5>
                            <select class="form-control" name="division_id">
                                <option disabled selected="" value="">Select Division</option>
                            @foreach($divisions as $item)
                                <option value="{{$item->id}}">{{$item->division_name}}</option>
                            @endforeach
							</select>
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
