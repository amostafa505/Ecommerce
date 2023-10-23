<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Ecommerce Shop</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
        rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->

    @include('frontend.body.header')

    <!-- ============================================== HEADER : END ============================================== -->
    @yield('content')
    <!-- /#top-banner-and-menu -->

    <!-- ============================================================= FOOTER ============================================================= -->
    @include('frontend.body.footer')
    <!-- ============================================================= FOOTER : END============================================================= -->

    <!-- For demo purposes – can be removed on production -->
    <!-- For demo purposes – can be removed on production : End -->

    {{-- Product Add to Cart Modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><span id="pname"></span></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img id="productImage" src="..." height="200" width="180" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title"></h5>
                          <p class="card-text"></p>
                        </div>
                      </div>
                </div>{{-- //end col md  --}}
                <div class="col-md-4">
                    <ul class="list-group">
                        <li class="list-group-item">Product Price: <strong class="text-danger">$<span id="pprice"></span></strong><del id="oldprice">$</del></li>
                        <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
                        <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
                        <li class="list-group-item">Brand: <strong id="pbrand"></strong></li>
                        <li class="list-group-item">Stock: <span class="badge badge-bill badge-success" style="background-color: green" id="available"></span>
                          <span class="badge badge-bill badge-danger" style="background-color:red" id="outstock"></span>
                        </li>
                      </ul>
                </div>{{-- //end col md  --}}
                <div class="col-md-4">
                    <div class="form-group" id="colorArea">
                        <label for="exampleFormControlSelect1">Color</label>
                        <select class="form-control" id="color" name="color">
                          <option selected disableds>Select Color</option>
                        </select>
                      </div>
                      <div class="form-group" id="sizeArea">
                        <label for="exampleFormControlSelect1">Size</label>
                        <select class="form-control" id="size" name="size">
                          <option selected disabled>Select Size</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="qty">Product Quantity</label>
                        <input type="number" class="form-control" id="qty" value="1" min="1">
                      </div>
                      <input type="hidden" id="pid" name="product_id">
                      <button type="submit" class="btn btn-primary" onclick="addtocart()">Add To Cart</button>
                </div> {{-- //end col md  --}}
              </div>
            </div>

          </div>
        </div>
      </div>
    {{-- End Product Add to Cart Modal --}}

    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script type="text/javascript">
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        //Start Cart Modal View
            function productView(id){
               $.ajax({
                type: 'GET',
                url: '/product/view/modal/'+id,
                datatype: 'json',
                success:function(data){
                    // console.log(data)
                    $('#pname').text(data.product.product_name_en);
                    $('#pcode').text(data.product.product_code);
                    $('#pcategory').text(data.product.category.category_name_en);
                    $('#pbrand').text(data.product.brand.brand_name_en);
                    $('#productImage').attr('src', '/uploads/products/thambnails/'+data.product.product_thambnail);
                    $('#pid').val(id);
                    $('#qty').val(1);

                    //product price
                    if(data.product.discount_price == null){
                      $('#pprice').text('');
                      $('#oldprice').text('');
                      $('#pprice').text(data.product.selling_price);
                    }else{
                      $('#pprice').text(data.product.discount_price);
                      $('#oldprice').text(data.product.selling_price);
                    }
                    //color
                    $('select[name="color"]').empty();
                    $.each(data.color, function(key,value){
                        $('select[name="color"]').append('<option value=" '+value+' ">'+value+'</option>')
                        if(data.color == ""){
                            $('#colorArea').hide();
                        }else{
                            $('#colorArea').show();
                        }
                    })
                    //size
                    $('select[name="size"]').empty();
                    $.each(data.size, function(key,value){
                        $('select[name="size"]').append('<option value=" '+value+' ">'+value+'</option>')
                        if(data.size == ""){
                            $('#sizeArea').hide();
                        }else{
                            $('#sizeArea').show();
                        }
                    })
                    //instock or out stock
                    if(data.product.product_qty > 0){
                      $('#outstock').text('');
                      $('#available').text('');
                      $('#available').text('available');
                    }else{
                      $('#outstock').text('');
                      $('#available').text('');
                      $('#outstock').text('Out Of Stock');
                    }

                }
               })
            }
            //end Cart Modal View

            //Store Cart Method
            function addtocart(){
              var product_name = $('#pname').text();
              var id = $('#pid').val();
              var color = $('#color option:selected').text();
              var size = $('#size option:selected').text();
              var quantity = $('#qty').val();
              $.ajax({
                type:"POST",
                dataType:'json',
                data:{color:color , size:size , quantity:quantity , product_name:product_name},
                url : "/cart/data/store/"+id,
                success: function(data){
                  minicart();
                  $('#closeModal').click();
                  //Start SweetAlert Message
                  const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showconfirmButton: false,
                    timer: 3000,
                  })
                  if($.isEmptyObject(data.error)){
                    Toast.fire({
                      type: 'success',
                      icon: 'success',
                      title: data.success
                    })
                  }else{
                    Toast.fire({
                      type: 'error',
                      icon: 'error',
                      title: data.error
                    })
                  }
                  //end SweetAlert Message
                }
              })
            }


    </script>
    <script type="text/javascript">
      function minicart(){
        $.ajax({
          type: 'GET',
          url: '/product/getminicart',
          dataType: 'json',
          success:function(response){

            $('span[id="cartTotal"]').text(response.cartTotal);
            $('span[id="cartQty"]').text(response.cartQty);
            var miniCart = "";
            $.each(response.carts , function(key,value){
              miniCart +=
              `<div class="cart-item product-summary">
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="image"> <a href="detail.html"><img
                                        src="/uploads/products/thambnails/${value.options.image}" alt=""></a> </div>
                        </div>
                        <div class="col-xs-7">
                            <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                            <div class="price">${value.price} * ${value.qty}</div>
                        </div>
                        <div class="col-xs-1 action">
                           <button id="${value.rowId}" onclick="miniCartRemove(this.id)"><i
                                    class="fa fa-trash"></i></button> </div>
                    </div>
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>

              </div>
                <!-- /.cart-total-->`
            });

            $('#miniCart').html(miniCart);
          }
        })
      }
      minicart();

///// Mini Cart Remove button
      function miniCartRemove(rowid){
        $.ajax({
          type: 'GET',
          url: '/product/removeminicart/'+rowid,
          dataType: 'json',
          success:function(data){
            minicart();
                  //Start SweetAlert Message
                  const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showconfirmButton: false,
                    timer: 3000,
                  })
                  if($.isEmptyObject(data.error)){
                    Toast.fire({
                      type: 'success',
                      icon: 'success',
                      title: data.success
                    })
                  }else{
                    Toast.fire({
                      type: 'error',
                      icon: 'error',
                      title: data.error
                    })
                  }
                  //end SweetAlert Message
          }
        })
      }


    </script>


{{-- ////// WishList Section --}}
<script>
            //Store Cart Method
            function addToWishlist(product_id){
              $.ajax({
                type:"POST",
                dataType:'json',
                url : "/addToWishList/"+product_id,
                success: function(data){

                  //Start SweetAlert Message
                  const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showconfirmButton: false,
                    timer: 3000,
                  })
                  if($.isEmptyObject(data.error)){
                    Toast.fire({
                      type: 'success',
                      icon: 'success',
                      title: data.success
                    })
                  }else{
                    Toast.fire({
                      type: 'error',
                      icon: 'error',
                      title: data.error
                    })
                  }

                  //end SweetAlert Message
                }
              })
            }

///// wishlist Remove button
function wishlistRemove(id){
        $.ajax({
          type: 'get',
          url: '/wishlist/remove/'+id,
          dataType: 'json',
          success:function(data){
            //Start SweetAlert Message
            Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    Swal.fire(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                      )
                      window.location.reload();
                  }
                })
                  //end SweetAlert Message
          }
        })
      }
</script>

{{-- ///View MyCart Products --}}
<script>
function mycart(){
        $.ajax({
          type: 'GET',
          url: '/product/getminicart',
          dataType: 'json',
          success:function(response){
            // console.log(response.carts != 0 )
            var myCart = "";
            if(response.carts != 0){
            $.each(response.carts , function(key,value){
              myCart +=
              `<tr>
                    <td class="cart-image">
                        <a class="entry-thumbnail" href="detail.html">
                            <img src="/uploads/products/thambnails/${value.options.image}" alt="">
						</a>
					</td>
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="detail.html">${value.name}</a></h4>
						{{-- <div class="row">
                            <div class="col-sm-4">
                                <div class="rating rateit-small"></div>
							</div>
							<div class="col-sm-8">
                                <div class="reviews">
                                    (06 Reviews)
								</div>
							</div>
						</div><!-- /.row --> --}}
						<div class="cart-product-info">
                            <span class="product-color">COLOR:<span>${value.options.color}</span></span>
                        </div>
                    </td>
                    <td class="cart-product-grand-total"><span class="cart-grand-total-price">${value.options.size}</span>
                    </td>
                    <td class="cart-product-quantity">
                        <div class="quant-input">
                            <div class="arrows">
                                <a class="arrow plus gradient" id="${value.rowId}" onclick="cartIncrement(this.id)"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></a>
                                ${value.qty > 1
                                ? `<a class="arrow minus gradient" id="${value.rowId}" onclick="cartDecrement(this.id)"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></a>`
                                : `<a class="arrow minus gradient" disabled=""><span class="ir"><i class="icon fa fa-sort-desc"></i></span></a>`
                                }

                            </div>
                            <input type="text" value="${value.qty}" min="1" max="100" disabled="">
                        </div>
                    </td>
                    <td class="cart-product-sub-total"><span class="cart-sub-total-price">$${value.subtotal}</span></td>
                    <td class="romove-item"><button id="${value.rowId}" onclick="CartRemove(this.id)" title="cancel" class="icon"><i class="fa fa-trash-o"></i></button>
                    </td>
				</tr>`
            });
          }else{
            myCart +=
            `<tr>	<td class="cart-product-name-info"><h5 ><strong class="text-danger">No Items You Added Yet</strong></h5></td></tr>`
          }

            $('#myCart').html(myCart);
          }
        })
      }
      mycart();

// -------- CART INCREMENT --------//
function cartIncrement(rowId){
        $.ajax({
            type:'GET',
            url: "/cart-increment/"+rowId,
            dataType:'json',
            success:function(data){
                couponCalculation();
                mycart();
                minicart();
            }
        });
    }

 // -------- CART INCREMENT --------//
function cartDecrement(rowId){
        $.ajax({
            type:'GET',
            url: "/cart-Decrement/"+rowId,
            dataType:'json',
            success:function(data){
                couponCalculation();
                mycart();
                minicart();
            }
        });
    }

    ///// Mini Cart Remove button
    function CartRemove(rowid){
        $.ajax({
          type: 'GET',
          url: '/cartPage/remove/'+rowid,
          dataType: 'json',
          success:function(data){
            couponCalculation();
            mycart();
            minicart();
            $('#couponField').show();
            $('#coupon_name').val('');
                  //Start SweetAlert Message
                  const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showconfirmButton: false,
                    timer: 3000,
                  })
                  if($.isEmptyObject(data.error)){
                    Toast.fire({
                      type: 'success',
                      icon: 'success',
                      title: data.success
                    })
                  }else{
                    Toast.fire({
                      type: 'error',
                      icon: 'error',
                      title: data.error
                    })
                  }
                  //end SweetAlert Message
          }
        })
      }

</script>

<script type="text/javascript">

  function applycoupon(){
    var coupon_name = $('#coupon_name').val();
    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: {coupon_name:coupon_name},
        url: "{{ url('/coupon-apply') }}",
        success:function(data){

             // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                  couponCalculation();
                  $('#couponApply').hide();
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })

                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })

                }

                // End Message 

        }

    })
  }  
  function couponCalculation(){
    $.ajax({
        type: 'GET',
        url: "{{ url('/coupon-calculation') }}",
        dataType: 'json',
        success:function(data){
          if(data.total){
            $('#couponCalField').html(
              `<tr>
				<th>
					<div class="cart-sub-total">
						Subtotal<span class="inner-left-md">$ ${data.total}</span>
					</div>
					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md">$${data.total}</span>
					</div>
				</th>
			</tr>`
            );
           
          }else{
            $('#couponCalField').html(
              `<tr>
				<th>
					<div class="cart-sub-total">
						Subtotal<span class="inner-left-md">$ ${data.subtotal}</span>
					</div>
          <div class="cart-sub-total">
						Coupon Name<span class="inner-left-md">${data.coupon_name}</span>
            <button type="submit" onclick="removeCoupon()"><i class="fa fa-times"></i></button>
					</div>
          <div class="cart-sub-total">
						Discount Amount<span class="inner-left-md">${data.discount_amount}</span>
					</div>
					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md">$${data.total_amount}</span>
					</div>
				</th>
			</tr>`
            );
          }
        }
    })
  }
  couponCalculation();

  function removeCoupon(){
    $.ajax({
      Type:'GET',
      url: '/remove-coupon',
      dataType: 'json',
      success:function(data){
        $('#couponApply').show();
        $('#coupon_name').val('');
        couponCalculation();
          // Start Message 
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            
            showConfirmButton: false,
            timer: 3000
          })
      if ($.isEmptyObject(data.error)) {
          Toast.fire({
              type: 'success',
              icon: 'success',
              title: data.success
          })

      }else{
          Toast.fire({
              type: 'error',
              icon: 'error',
              title: data.error
          })

      }

      // End Message 
      }
    });
  }


</script>





</body>

</html>
