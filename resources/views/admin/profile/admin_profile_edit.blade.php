@extends('admin.admin_master')
@section('admin')

		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Admin Profile Edit</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Profile</li>
								<li class="breadcrumb-item active" aria-current="page">Profile Edit</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Admin Profile Edit</h4>
			  <h6 class="box-subtitle">Edit Your Information</a></h6>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{route('admin.proupdate')}}" enctype="multipart/form-data" novalidate>
                        @csrf
					  <div class="row">
						<div class="col-12">
							<div class="form-group">
								<h5>Name<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="name" value="{{$admin->name}}" class="form-control" required data-validation-required-message="This field is required"> </div>
							</div>
							<div class="form-group">
								<h5>Email<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="email" name="email" value="{{$admin->email}}" class="form-control" required data-validation-required-message="This field is required"> </div>
							</div>
							{{-- <div class="form-group">
								<h5>Password Input Field <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="password" name="password" class="form-control" required data-validation-required-message="This field is required"> </div>
							</div>
							<div class="form-group">
								<h5>Repeat Password Input Field <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="password" name="password2" data-validation-match-match="password" class="form-control" required> </div>
							</div> --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Profile Photo<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="profile_photo_path" id="img" class="form-control" required>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img id="showimg" src="{{ !empty($admin->profile_photo_path) ? url('uploads/admin_images/' . $admin->profile_photo_path) : url('uploads/no_image.jpg') }}" style="height: 100px; width:100px;" alt="Profile_image">
                                </div>
                            </div>
						</div>
					  </div>
						<div class="text-xs-right">
							<button type="submit" class="btn btn-rounded btn-info">Submit</button>
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
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
