@extends('admin.admin_master')
@section('admin')
<div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">

            <div class="col-12">
                <div class="box">
                    <div class="box-body">
                <form method="post" action="{{route('update.coupon')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$coupon->id}}">
                        <div class="form-group">
                            <h5>Coupon Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="coupon_name" value="{{$coupon->coupon_name}}"  class="form-control"> </div>
                                @error('coupon_name')
                                <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <h5>Coupon Discount<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="coupon_discount" value="{{$coupon->coupon_discount}}"  class="form-control" > </div>
                                @error('coupon_discount')
                                <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <h5>Coupon Starts at<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="date" name="coupon_validity_start" value="{{$coupon->coupon_validity_start}}"  class="form-control" > </div>
                                @error('coupon_validity_start')
                                <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <h5>Coupon end at<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="date" name="coupon_validity_end" value="{{$coupon->coupon_validity_end}}"  class="form-control" > </div>
                                @error('coupon_validity_end')
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

