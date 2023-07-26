@extends('admin.admin_master')
@section('admin')
<div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">

            <div class="col-12">
                <div class="box">
                    <div class="box-body">
                <form method="post" action="{{route('update.subcategory')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$subcategory->id}}">
                        <div class="form-group">
                            <h5>SubCategory Name English<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="subcategory_name_en" value="{{$subcategory->subcategory_name_en}}"  class="form-control"> </div>
                                @error('subcategory_name_en')
                                <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <h5>SubCategory Name Arabic<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="subcategory_name_ar" value="{{$subcategory->subcategory_name_ar}}"  class="form-control" > </div>
                                @error('subcategory_name_ar')
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
                                <option {{($subcategory->category->id == $category->id)? 'selected' : ''}} value="{{$category->id}}">{{$category->category_name_en}}</option>
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

