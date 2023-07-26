@extends('admin.admin_master')
@section('admin')
<div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">

            <div class="col-12">
                <div class="box">
                    <div class="box-body">
                <form method="post" action="{{route('update.brand')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$brand->id}}">
                    <input type="hidden" name="oldImage" value="{{$brand->brand_image}}">
                        <div class="form-group">
                            <h5>Brand Name English<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="brand_name_en" value="{{$brand->brand_name_en}}"  class="form-control"> </div>
                                @error('brand_name_en')
                                <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <h5>Brand Name Arabic<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="brand_name_ar" value="{{$brand->brand_name_ar}}"  class="form-control" > </div>
                                @error('brand_name_ar')
                                <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <h5>Brand Image<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="brand_image" id="img" class="form-control"> </div>
                                @error('brand_image')
                                <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                </span>
                                @enderror
                        </div>
                        <div>
                            <img id="showimg" src="{{url('uploads/brand_images/' . $brand->brand_image)}}"  style="height: 100px; width:100px; border-radius:50%" alt="Brand_image">
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
        $('#img').change(function(e){
            var reader = new FileReader();
            reader.onload = (function(e){
                $('#showimg').attr('src' , e.target.result);
            });
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
