@extends('admin.admin_master')
@section('admin')
<div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">All SubCategories</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>SubCategory Name English</th>
								<th>SubCategory Name Arabic</th>
								<th>Category Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($subcategories as $subcategory)
							<tr>
                                {{-- {{dd($subcategory)}} --}}
								<td>{{$subcategory->subcategory_name_en}}</td>
								<td>{{$subcategory->subcategory_name_ar}}</td>
								<td>{{$subcategory['category']->category_name_en}}</td>
								<td>
                                    <a href="{{route('edit.subcategory', $subcategory->id)}}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="{{route('delete.subcategory',$subcategory->id)}}" id="delete" class="btn btn-danger" title="delete"><i class="fa fa-trash"></i></a>
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
                <form method="post" action="{{route('add.subcategory')}}">
                    @csrf
                        <div class="form-group">
                            <h5>SubCategory Name English<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="subcategory_name_en"  class="form-control"> </div>
                        </div>
                        <div class="form-group">
                            <h5>SubCategory Name Arabic<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="subcategory_name_ar"  class="form-control" > </div>
                        </div>
                        <div class="form-group">
                            <h5>Category<span class="text-danger">*</span></h5>
                            <select class="form-control" name="category_id">
                                <option disabled selected="" value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name_en}}</option>
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
