@extends('admin.admin_master')
@section('admin')
<div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">All Brands</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Brand Name English</th>
								<th>Brand Name Arabic</th>
								<th>Brand Image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($brands as $brand)
							<tr>
								<td>{{$brand->brand_name_en}}</td>
								<td>{{$brand->brand_name_ar}}</td>
								<td><img src="{{asset('/uploads/brand_images/'.$brand->brand_image)}}" width="70px" height="40px"></td>
								<td>
                                    <a href="{{route('edit.brand', $brand->id)}}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="{{route('delete.brand',$brand->id)}}" id="delete" class="btn btn-danger" title="delete"><i class="fa fa-trash"></i></a>
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
                <form method="post" action="{{route('add.brand')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <h5>Brand Name English<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="brand_name_en"  class="form-control"> </div>
                        </div>
                        <div class="form-group">
                            <h5>Brand Name Arabic<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="brand_name_ar"  class="form-control" > </div>
                        </div>
                        <div class="form-group">
                            <h5>Brand Image<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="brand_image"  class="form-control"> </div>
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
