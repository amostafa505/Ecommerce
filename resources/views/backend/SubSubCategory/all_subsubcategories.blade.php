@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">All SubSubCategories</h3>
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
                                <th>SubCategory Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($subsubcategories as $subsubcategory)
							<tr>
                                {{-- {{dd($subcategory)}} --}}
								<td>{{$subsubcategory->subsubcategory_name_en}}</td>
								<td>{{$subsubcategory->subsubcategory_name_ar}}</td>
								<td>{{$subsubcategory['category']->category_name_en}}</td>
                                <td>{{$subsubcategory['subcategory']->subcategory_name_en}}</td>
								<td>
                                    <a href="{{route('edit.subsubcategory', $subsubcategory->id)}}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="{{route('delete.subsubcategory',$subsubcategory->id)}}" id="delete" class="btn btn-danger" title="delete"><i class="fa fa-trash"></i></a>
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
                <form method="post" action="{{route('add.subSubCategory')}}">
                    @csrf
                        <div class="form-group">
                            <h5>SubSubCategory Name English<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="subsubcategory_name_en"  class="form-control"> </div>
                        </div>
                        <div class="form-group">
                            <h5>SubSubCategory Name Arabic<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="subsubcategory_name_ar"  class="form-control" > </div>
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
                        <div class="form-group">
                            <h5>SubCategory<span class="text-danger">*</span></h5>
                            <select class="form-control" name="subcategory_id">
                                <option disabled selected="" value="">Select SubCategory</option>
                            {{-- @foreach($subcategories as $subCategory)
                                <option value="{{$subCategory->id}}">{{$subCategory->subcategory_name_en}}</option>
                            @endforeach --}}
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
<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="category_id"]').on('change',function(){
            var category_id = $(this).val();
            if(category_id){
                $.ajax({
                    url:"{{url('/category/subcategory/ajax')}}/"+category_id,
                    type:"Get",
                    dataType:"json",
                    success:function(data){
                        var d=$('select[name="subcategory_id"]').empty();
                        $.each(data , function(key , value){
                            $('select[name="subcategory_id"]').append('<option value="'+value.id +'">' + value.subcategory_name_en+'</option>');
                        });
                    },
                });
            }else{
                alert(danger);
            }
        });
    });
</script>
@endsection
