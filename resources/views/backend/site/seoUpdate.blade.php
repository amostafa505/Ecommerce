@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">

	 <section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Seo Setting Page </h4>

			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
	 <form method="post" action="{{ route('update.seo') }}" enctype="multipart/form-data">
	 	@csrf

	 	<input type="hidden" name="id" value="{{ $seo->id }}">
					  <div class="row">
						<div class="col-12">

			<div class="row">
				<div class="col-md-6">

	<div class="form-group">
		<h5>Meta Title <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="meta_title" class="form-control" value="{{ $seo->meta_title }}" > </div>
	</div>



	<div class="form-group">
		<h5>Meta Author <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="meta_author" class="form-control"  value="{{ $seo->meta_author }}"  > </div>
	</div>

	<div class="form-group">
		<h5>Meta Keywords <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="meta_keyword" class="form-control" value="{{ $seo->meta_keyword }}"   > </div>
	</div>

<div class="form-group">
		<h5>Meta Description <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="meta_description" class="form-control" value="{{ $seo->meta_description }}"   > </div>
	</div>


	<div class="form-group">
		<h5>Google Analytics <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="google_analytics" class="form-control" value="{{ $seo->google_analytics }}"   > </div>
	</div>

				</div> <!-- end cold md 6 -->

			</div>	<!-- end row 	 -->




			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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



	  </div>



@endsection
