@extends('admin.admin_master')
@section('admin')
<div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">All Sliders</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Slider Image</th>
								<th>Title</th>
								<th>Descreption</th>
                                <th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($sliders as $slider)
							<tr>
								<td><img src="{{asset('/uploads/slider_images/'.$slider->slider_img)}}" width="70px" height="40px"></td>
								<td>{{$slider->title}}</td>
								<td>{{$slider->descreption}}</td>
                                <td>
                                    @if ($slider->status == 1)
                                        <span class="badge badge-bill badge-success">Active</span>
                                    @else
                                        <span class="badge badge-bill badge-danger">Inactive</span>

                                    @endif
                                </td>
								<td>
                                    <a href="{{route('edit.slider', $slider->id)}}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="{{route('delete.slider',$slider->id)}}" id="delete" class="btn btn-danger" title="delete"><i class="fa fa-trash"></i></a>
                                    @if ($slider->status == 1)
                                        <a href="{{route('inactive.slider', $slider->id)}}" class="btn btn-danger" title="Inactive Now"><i class="fa fa-arrow-down"></i></a>
                                    @else
                                        <a href="{{route('active.slider', $slider->id)}}" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up"></i></a>
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
                    <div class="box-body">
                <form method="post" action="{{route('add.slider')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <h5>Title<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="title"  class="form-control"> </div>
                        </div>
                        <div class="form-group">
                            <h5>Descreption <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="descreption"  class="form-control" > </div>
                        </div>
                        <div class="form-group">
                            <h5>Slider Image<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="slider_img"  class="form-control"> </div>
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
