@extends('admin.admin_master')
@section('admin')
<div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">

            <div class="col-12">
                <div class="box">
                    <div class="box-body">
                <form method="post" action="{{route('update.slider')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$slider->id}}">
                    <input type="hidden" name="oldImage" value="{{$slider->slider_img}}">
                        <div class="form-group">
                            <h5>Title<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="title" value="{{$slider->title}}"  class="form-control"> </div>
                                @error('title')
                                <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <h5>Descreption<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="descreption" value="{{$slider->descreption}}"  class="form-control" > </div>
                                @error('descreption')
                                <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <h5>Slider Image<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="slider_img" id="img" class="form-control"> </div>
                                @error('slider_img')
                                <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                </span>
                                @enderror
                        </div>
                        <div>
                            <img id="showimg" src="{{url('uploads/slider_images/' . $slider->slider_img)}}"  style="height: 100px; width:100px; border-radius:50%" alt="Slider Image">
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
