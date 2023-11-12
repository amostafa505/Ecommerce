@extends('admin.admin_master')
@section('admin')
<div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">All Blog Categories</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Blog Category Name English</th>
								<th>Blog Category Name Arabic</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($blogcategories as $blogCategory)
							<tr>
								<td>{{$blogCategory->blog_category_name_en}}</td>
								<td>{{$blogCategory->blog_category_name_ar}}</td>
								<td>
                                    <a href="{{route('edit.blog.category', $blogCategory->id)}}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="{{route('delete.blog.category',$blogCategory->id)}}" id="delete" class="btn btn-danger" title="delete"><i class="fa fa-trash"></i></a>
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
                        <h3 class="box-title">Add Blog Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                <form method="post" action="{{route('add.blog.category')}}">
                    @csrf
                        <div class="form-group">
                            <h5>Blog Category Name English<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="blog_category_name_en"  class="form-control"> </div>
                                @error('blog_category_name_en')
                                <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <h5>Blog Category Name Arabic<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="blog_category_name_ar"  class="form-control" > </div>
                                @error('blog_category_name_ar')
                                <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                </span>
                                @enderror
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
