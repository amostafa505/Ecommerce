@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<!-- Main content -->
<section class="content">

    <!-- Basic Forms -->
    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Edit Product </h4>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col">
                    <form method="POST" action="{{route('update.product')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <div class="row">
                            <div class="col-12">


                                <div class="row">
                                    <!-- start 1st row  -->
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Brand Select <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="brand_id" class="form-control">
                                                    <option value="" selected="" disabled="">Select Brand</option>

                                                    @foreach ($brands as $brand)
                                                        <option value="{{$brand->id}}"{{ ($product->brand_id == $brand->id)? 'selected' :  ''  }}>
                                                            {{ $brand->brand_name_en }}</option>
                                                    @endforeach
                                                </select>
                                                @error('brand_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Category Select <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="category_id" class="form-control">
                                                    <option value="" selected="" disabled="">Select Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" {{ ($product->category_id == $category->id)? 'selected' :  ''  }}>
                                                            {{ $category->category_name_en }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->


                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="subcategory_id" class="form-control">
                                                    <option value="" selected="" disabled="">Select SubCategory</option>
                                                    @foreach ($subcategories as $subcategory)
                                                    <option value="{{ $subcategory->id }}" {{ ($product->subcategory_id == $subcategory->id)? 'selected' :  ''  }}>
                                                        {{ $subcategory->subcategory_name_en }}</option>
                                                @endforeach
                                                </select>
                                                @error('subcategory_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->

                                </div> <!-- end 1st row  -->



                                <div class="row">
                                    <!-- start 2nd row  -->
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>SubSubCategory Select <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="subsubcategory_id" class="form-control">
                                                    <option value="" selected="" disabled="">Select SubSubCategory</option>
                                                    @foreach ($subsubcategories as $subsubcategory)
                                                    <option value="{{ $subsubcategory->id }}" {{ ($product->subsubcategory_id == $subsubcategory->id)? 'selected' :  ''  }}>
                                                        {{ $subsubcategory->subsubcategory_name_en }}</option>
                                                    @endforeach
                                                </select>
                                                @error('subsubcategory_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Product Name En <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_name_en" class="form-control" value="{{$product->product_name_en}}">
                                                @error('product_name_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->


                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Product Name Ar <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_name_ar" class="form-control" value="{{$product->product_name_ar}}">
                                                @error('product_name_ar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->

                                </div> <!-- end 2nd row  -->



                                <div class="row">
                                    <!-- start 3RD row  -->
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Product Code <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_code" class="form-control" value="{{$product->product_code}}">
                                                @error('product_code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 6 -->

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Product Quantity <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_qty" class="form-control" value="{{$product->product_qty}}">
                                                @error('product_qty')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 6 -->




                                </div> <!-- end 3RD row  -->






                                <div class="row">
                                    <!-- start 4th row  -->
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Product Tags En <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_tags_en" class="form-control"
                                                 data-role="tagsinput" value="{{$product->product_tags_en}}">
                                                @error('product_tags_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Product Tags Ar <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_tags_ar"
                                                    class="form-control"
                                                    data-role="tagsinput"  value="{{$product->product_tags_ar}}">
                                                @error('product_tags_ar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Product Size En <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_size_en" class="form-control"
                                                value="{{$product->product_size_en}}" data-role="tagsinput">
                                                @error('product_size_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->




                                </div> <!-- end 4th row  -->



                                <div class="row">
                                    <!-- start 5th row  -->
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Product Size Ar <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_size_ar"
                                                    class="form-control" value="{{$product->product_size_ar}}"
                                                    data-role="tagsinput">
                                                @error('product_size_ar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Product Color En <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_color_en"
                                                    class="form-control" value="{{$product->product_color_en}}"
                                                    data-role="tagsinput">
                                                @error('product_color_en')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h5>Product Color Ar <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="product_color_ar"
                                                    class="form-control" value="{{$product->product_color_ar}}"
                                                    data-role="tagsinput">
                                                @error('product_color_ar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 4 -->




                                </div> <!-- end 5th row  -->




                                <div class="row">
                                    <!-- start 6th row  -->
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="selling_price" class="form-control" value="{{$product->selling_price}}">
                                                @error('selling_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 6 -->

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="discount_price" class="form-control" value="{{$product->discount_price}}">
                                                @error('discount_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end col md 6 -->


                                </div> <!-- end 6th row  -->





                                <div class="row">
                                    <!-- start 7th row  -->
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Short Description English <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="short_desc_en" id="textarea" class="form-control" required placeholder="Textarea text">{!!$product->short_desc_en!!}</textarea>
                                            </div>
                                        </div>

                                    </div> <!-- end col md 6 -->

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Short Description Arabic <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="short_desc_ar" id="textarea" class="form-control" required placeholder="Textarea text">{!!$product->short_desc_ar!!}</textarea>
                                            </div>
                                        </div>


                                    </div> <!-- end col md 6 -->

                                </div> <!-- end 7th row  -->





                                <div class="row">
                                    <!-- start 8th row  -->
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Long Description English <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea id="editor1" name="long_desc_en" rows="10" cols="80">
                                                    {!!$product->long_desc_en!!}
                                                </textarea>
                                            </div>
                                        </div>

                                    </div> <!-- end col md 6 -->

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <h5>Long Description Arabic <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea id="editor2" name="long_desc_ar" rows="10" cols="80">
                                                    {!!$product->long_desc_ar!!}
                                                </textarea>
                                            </div>
                                        </div>


                                    </div> <!-- end col md 6 -->

                                </div> <!-- end 8th row  -->


                                <hr>



                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_2" name="hot_deals"
                                                        value="1" {{$product->hot_deals == 1 ? 'checked' : ' '}}>
                                                    <label for="checkbox_2">Hot Deals</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_3" name="featured"
                                                        value="1" {{$product->featured == 1 ? 'checked' : ' '}}>
                                                    <label for="checkbox_3">Featured</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_4" name="special_offer"
                                                        value="1" {{$product->special_offer == 1 ? 'checked' : ' '}}>
                                                    <label for="checkbox_4">Special Offer</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_5" name="special_deals"
                                                        value="1" {{$product->special_deals == 1 ? 'checked' : ' '}}>
                                                    <label for="checkbox_5">Special Deals</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                        value="Update Product">
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

{{-- Image Edit Section --}}

<section class="content">

            <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Product Multi Image Update</h4>
            </div>
            <form action="{{route('update.product.multiImage')}}" method="Post" enctype="multipart/form-data">
                @csrf
                <div class="box-body row row-sm">
                    @foreach($multi_image as $img)
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <img src="{{asset('/uploads/products/Multi-Images/'.$img->image_name)}}" class="card-img-top" style="width: 280px; height:130px;">
                            <div class="card-body">
                              <h5 class="card-title">
                                <a href="{{route('delete.product.multiImage',$img->id)}}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"> <i class="fa fa-trash"></i></a>
                              </h5>
                              <p class="card-text">
                                <div class="form-group">
                                    <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                    <input type="file" name="multi_img[ {{$img->id}} ]" multiple id="multiImg"  class="form-control">
                                </div>
                              </p>
                            </div>
                          </div>
                    </div>
                    @endforeach
                </div>

                <div class="box-footer text-xs-right">
                    <input type="submit" class="btn btn-rounded btn-primary mb-5"
                        value="Update Product">
                </div>
            </form>
            </div>
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Product Image Update</h4>
                </div>
                <form action="{{route('update.product.image')}}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body row row-sm">
                        <div class="col-md-3">
                            <div class="card" style="width: 18rem;">
                                <img src="{{asset('/uploads/products/thambnails/'.$product->product_thambnail)}}" class="card-img-top" style="width: 280px; height:130px;">
                                <div class="card-body">
                                  {{-- <h5 class="card-title">
                                    <a href="{{route('delete.product.image',$product->product_thambnail)}}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"> <i class="fa fa-trash"></i></a>
                                  </h5> --}}
                                  <p class="card-text">
                                    <div class="form-group">
                                        <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                        <input type="file" name="product_thambnail"  class="form-control">
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                    </div>
                                  </p>
                                </div>
                              </div>
                        </div>
                    </div>

                    <div class="box-footer text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-primary mb-5"
                            value="Update Product">
                    </div>
                </form>
                </div>
</section>
{{-- End Image Edit Section --}}
<!-- /.content -->


<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="category_id"]').on('change',function(){
            var category_id = $(this).val();
            if(category_id){
                $.ajax({
                    url:"{{url('/category/subcategory/ajax')}}/"+category_id,
                    type:"Get",
                    dataType:"json",
                    success:function(data){
                        var d=$('select[name="subcategory_id"]').empty();
                        var d=$('select[name="subsubcategory_id"]').html('');
                        $.each(data , function(key , value){
                            $('select[name="subcategory_id"]').append('<option value="'+value.id +'">' + value.subcategory_name_en+'</option>');
                        });
                    },
                });
            }else{
                alert(danger);
            }
        });

        $('select[name="subcategory_id"]').on('change',function(){
            var subcategory_id = $(this).val();
            if(subcategory_id){
                $.ajax({
                    url:"{{url('/category/subsubcategory/ajax')}}/"+subcategory_id,
                    type:"Get",
                    dataType:"json",
                    // alert(data);
                    success:function(data){
                        var d=$('select[name="subsubcategory_id"]').empty();
                        $.each(data , function(key , value){
                            $('select[name="subsubcategory_id"]').append('<option value="'+value.id +'">' + value.subsubcategory_name_en+'</option>');
                        });
                    },
                });
            }else{
                alert(danger);
            }
        });
    });
</script>

<script type="text/javascript">
    $('#thambnail').change(function(e){
    var reader = new FileReader();
    reader.onload = (function(e){
        $('#showimg').attr('src' , e.target.result).width(80).height(80);
    });
    reader.readAsDataURL(e.target.files['0']);
});

$(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data

          $.each(data, function(index, file){ //loop through each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });

      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
</script>
@endsection
