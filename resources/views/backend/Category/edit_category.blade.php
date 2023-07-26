@extends('admin.admin_master')
@section('admin')
<div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">

            <div class="col-12">
                <div class="box">
                    <div class="box-body">
                <form method="post" action="{{route('update.category')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$category->id}}">
                        <div class="form-group">
                            <h5>Category Name English<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="category_name_en" value="{{$category->category_name_en}}"  class="form-control"> </div>
                                @error('category_name_en')
                                <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <h5>Category Name Arabic<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="category_name_ar" value="{{$category->category_name_ar}}"  class="form-control" > </div>
                                @error('category_name_ar')
                                <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <h5>Category Icon<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="category_icon" value="{{$category->category_icon}}"  class="form-control" > </div>
                                @error('category_icon')
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

