@extends('admin.admin_master')
@section('admin')


<div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">All Cities</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>City Name</th>
								<th>Country Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
              @foreach($cities as $item)
							<tr>
                {{-- {{dd()}} --}}
								<td>{{$item->city_name}}</td>
								<td>{{$item['country']->country_name}}</td>
								<td>
                  <a href="{{route('edit.city', $item->id)}}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
                  <a href="{{route('delete.city',$item->id)}}" id="delete" class="btn btn-danger" title="delete"><i class="fa fa-trash"></i></a>
                </td>
							</tr>
              @endforeach
						</tbody>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			</div>
			<!-- /.col -->
            <div class="col-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Add City</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                <form method="post" action="{{route('add.city')}}">
                    @csrf
                        <div class="form-group">
                            <h5>City Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="city_name"  class="form-control">
                            </div>
                        </div>
						<div class="form-group">
                            <h5>Country<span class="text-danger">*</span></h5>
                            <select class="form-control" name="country_id">
                                <option disabled selected="" value="">Select Country</option>
                            @foreach($countries as $item)
                                <option value="{{$item->id}}">{{$item->country_name}}</option>
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


{{-- <script type="text/javascript">
  $(document).ready(function(){
      $('select[name="country_id"]').on('change',function(){
          var country_id = $(this).val();
          if(country_id){
              $.ajax({
                  url:"{{url('/Country/ajax)}}/"+country_id,
                  type:"Get",
                  dataType:"json",
                  success:function(data){
                    //   var d=$('select[name="subcategory_id"]').empty();
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
</script> --}}
