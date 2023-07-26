@extends('admin.admin_master')
@section('admin')
<div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">All Categories</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Category Name English</th>
								<th>Category Name Arabic</th>
								<th>Category Icon</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($categories as $category)
							<tr>
								<td>{{$category->category_name_en}}</td>
								<td>{{$category->category_name_ar}}</td>
								<td><span><i class="{{$category->category_icon}}"></i></span></td>
								<td>
                                    <a href="{{route('edit.category', $category->id)}}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="{{route('delete.category',$category->id)}}" id="delete" class="btn btn-danger" title="delete"><i class="fa fa-trash"></i></a>
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
                        <h3 class="box-title">Add SubSub Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                <form method="post" action="{{route('add.category')}}">
                    @csrf
                        <div class="form-group">
                            <h5>Category Name English<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="category_name_en"  class="form-control"> </div>
                        </div>
                        <div class="form-group">
                            <h5>Category Name Arabic<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="category_name_ar"  class="form-control" > </div>
                        </div>
                        <div class="form-group">
                            <h5>Category Icon<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="category_icon"  class="form-control" > </div>
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
