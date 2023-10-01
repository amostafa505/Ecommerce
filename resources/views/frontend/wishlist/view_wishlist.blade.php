@extends('frontend.master')
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Wishlist</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th colspan="4" class="heading-title">My Wishlist</th>
				</tr>
			</thead>
			<tbody>
                @if($wishlists->count() == 0)
                    <td><h5><strong class="text-danger">No Items You Wished Yet</strong></h5></td>
                @else
                    @foreach($wishlists as $wishlist)
				<tr>
					<td class="col-md-2"><img src="{{asset('/uploads/products/thambnails/'.$wishlist->product->product_thambnail)}}" alt="image"></td>
					<td class="col-md-7">
						<div class="product-name"><a href="#">@if(session()->get('language') == 'arabic') {{$wishlist->product->product_name_ar}} @else {{$wishlist->product->product_name_en}} @endif</a></div>
						@if($wishlist->product->discount_price)
                        <div class="product-price"> <span class="price"> ${{$wishlist->product->discount_price}} </span>
                            <span class="price-before-discount" style="text-decoration: line-through">$ {{$wishlist->product->selling_price}}</span>
                        </div>
                        @else
                            <div class="product-price"> <span class="price"> ${{$wishlist->product->selling_price}} </span>
                            </div>
                        @endif
                        <!-- /.product-price -->
					</td>
					<td class="col-md-2">
						<button 
                        class="btn btn-primary icon" type="button"
                        title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{$wishlist->product->id}}" onclick="productView(this.id)"> Add To Cart</button>
					</td>
					<td class="col-md-1 close-btn">
						<button type="button" id="{{$wishlist->id}}" onclick="wishlistRemove(this.id)"><i class="fa fa-times"></i></button>
					</td>
				</tr>
                @endforeach
                
                @endif
			</tbody>
		</table>
	</div>
</div>			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
@endsection