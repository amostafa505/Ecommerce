@extends('admin.admin_master')
@section('admin')

		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Admin Change Password</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item active" aria-current="page">Change Password</li>
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
			  <h4 class="box-title">Admin Change Password</h4>
			  <h6 class="box-subtitle">Edit Your Password</a></h6>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{route('admin.update.password')}}" novalidate>
                        @csrf
					  <div class="row">
						<div class="col-12">
                            <div class="form-group">
								<h5>Current Password<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="password" name="oldpassword" id="current_password" class="form-control" required data-validation-required-message="This field is required"> </div>
							</div>
							<div class="form-group">
								<h5>New Password<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="password" name="password" id="password" class="form-control" required data-validation-required-message="This field is required"> </div>
							</div>
							<div class="form-group">
								<h5>Repeat New Password<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="password" id="password_confirmation" name="password_confirmation" data-validation-match-match="password" class="form-control" required> </div>
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
@endsection

