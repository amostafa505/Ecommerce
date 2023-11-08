@extends('admin.admin_master')
@section('admin')
<div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">View All Registered Users</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image</th>
								<th>Name</th>
								<th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
              @foreach($users as $item)
							<tr>
								<td><img src="{{asset('uploads/user_images/'.$item->profile_photo_path)}}" width="60px" height="60px" alt="User Image" ></td>
								<td>{{$item->name}}</td>
								<td>{{$item->email}}</td>
								<td>{{$item->phone}}</td>
								<td>
                                    @if($item->UserOnline())
                                     <span class="badge badge-pill badge-success">Active Now</span>
                                    @else
                                        <span class="badge badge-pill badge-danger">{{ Carbon\Carbon::parse($item->last_seen)->diffForHumans() }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="" id="delete" class="btn btn-danger" title="delete"><i class="fa fa-trash"></i></a>
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
            </div>
		  </div>
		  <!-- /.row -->
		<!-- /.content -->

@endsection
