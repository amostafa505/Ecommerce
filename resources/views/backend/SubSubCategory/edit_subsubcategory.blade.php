@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">

            <div class="col-12">
                <div class="box">
                    <div class="box-body">
                <form method="post" action="{{route('update.subsubcategory')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$SubSubCategory->id}}">
                        <div class="form-group">
                            <h5>SubSubCategory Name English<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="subsubcategory_name_en" value="{{$SubSubCategory->subsubcategory_name_en}}"  class="form-control"> </div>
                                @error('subsubcategory_name_en')
                                <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <h5>ٍSubSubCategory Name Arabic<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="subsubcategory_name_ar" value="{{$SubSubCategory->subsubcategory_name_ar}}"  class="form-control" > </div>
                                @error('subsubcategory_name_ar')
                                <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <h5>Category<span class="text-danger">*</span></h5>
                            <select class="form-control" name="category_id">
                                <option disabled selected="" value="">Select Category</option>
                            @foreach($categories as $category)
                                <option {{($SubSubCategory->category->id == $category->id)? 'selected' : ''}} value="{{$category->id}}">{{$category->category_name_en}}</option>
                            @endforeach
							</select>
                        </div>
                        <div class="form-group">
                            <h5>SubCategory<span class="text-danger">*</span></h5>
                            <select class="form-control" name="subcategory_id">
                                <option disabled selected="" value="">Select SubCategory</option>
                            @foreach($subcategories as $subcategory)
                                <option {{($SubSubCategory->subcategory->id == $subcategory->id)? 'selected' : ''}} value="{{$subcategory->id}}">{{$subcategory->subcategory_name_en}}</option>
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

