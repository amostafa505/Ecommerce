@extends('admin.admin_master')
@section('admin')
<div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">

            <div class="col-12">
                <div class="box">
                    <div class="box-body">
                <form method="post" action="{{route('update.city')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$city->id}}">
                        <div class="form-group">
                            <h5>Country Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="country_name" value="{{$city['country']->country_name}}"  class="form-control"> </div>
                                @error('country_name')
                                <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <h5>City Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="city_name" value="{{$city->city_name}}"  class="form-control"> </div>
                                @error('city_name')
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

