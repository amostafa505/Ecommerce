@php
    $breadcrumb = App\Models\SubSubCategory::with(['subcategory', 'category'])->where('id' ,$product->subsubcategory_id)->first();
    // dd($breadcrumb)
@endphp
@extends('frontend.master')
@section('content')

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="/">Home</a></li>
                    <li><a href="{{route('category.Products',[$breadcrumb->category->id , $breadcrumb->category->category_slug_en])}}">{{$breadcrumb->category->category_name_en}}</a></li>
                    <li><a href="{{route('subCategory.Products',[$breadcrumb->subcategory->id , $breadcrumb->subcategory->subcategory_slug_en])}}">{{$breadcrumb->subcategory->subcategory_name_en}}</a></li>
                    <li class='active'><a href="{{route('subSubCategory.Products',[$breadcrumb->id , $breadcrumb->subsubcategory_slug_en])}}">{{$breadcrumb->subsubcategory_name_en}}</a></li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product'>
                <div class='col-md-3 sidebar'>
                    <div class="sidebar-module-container">
                        <div class="home-banner outer-top-n">
                            <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image">
                        </div>



                        <!-- ============================================== HOT DEALS ============================================== -->
                        @include('frontend.commonparts.hotdeals')
                        <!-- ============================================== HOT DEALS: END ============================================== -->

                        <!-- ============================================== NEWSLETTER ============================================== -->
                        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
                            <h3 class="section-title">Newsletters</h3>
                            <div class="sidebar-widget-body outer-top-xs">
                                <p>Sign Up for Our Newsletter!</p>
                                <form>
                                    <div class="form-group">
                                        <label class="sr-only" for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            placeholder="Subscribe to our newsletter">
                                    </div>
                                    <button class="btn btn-primary">Subscribe</button>
                                </form>
                            </div><!-- /.sidebar-widget-body -->
                        </div><!-- /.sidebar-widget -->
                        <!-- ============================================== NEWSLETTER: END ============================================== -->

                        <!-- ============================================== Testimonials============================================== -->
                        @include('frontend.commonparts.testmonials')

                        <!-- ============================================== Testimonials: END ============================================== -->



                    </div>
                </div><!-- /.sidebar -->
                <div class='col-md-9'>
                    <div class="detail-block">
                        <div class="row  wow fadeInUp">

                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">
                                    <div id="owl-single-product">
                                        @foreach ($multiImg as $img)
                                            <div class="single-product-gallery-item" id="slide{{ $img->id }}">
                                                <a data-lightbox="image-1" data-title="Gallery"
                                                    href="{{ asset('/uploads/products/Multi-Images/' . $img->image_name) }}">
                                                    <img class="img-responsive" alt=""
                                                        src="{{ asset('/uploads/products/Multi-Images/' . $img->image_name) }}"
                                                        data-echo="{{ asset('/uploads/products/Multi-Images/' . $img->image_name) }}" />
                                                </a>
                                            </div><!-- /.single-product-gallery-item -->
                                        @endforeach
                                    </div><!-- /.single-product-slider -->

                                    <div class="single-product-gallery-thumbs gallery-thumbs">
                                        <div id="owl-single-product-thumbnails">
                                            @foreach ($multiImg as $img)
                                                <div class="item">
                                                    <a class="horizontal-thumb active" data-target="#owl-single-product"
                                                        data-slide="1" href="#slide{{ $img->id }}">
                                                        <img class="img-responsive" width="85" alt=""
                                                            src="{{ asset('/uploads/products/Multi-Images/' . $img->image_name) }}"
                                                            data-echo="{{ asset('/uploads/products/Multi-Images/' . $img->image_name) }}" />
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div><!-- /#owl-single-product-thumbnails -->
                                    </div><!-- /.gallery-thumbs -->
                                </div><!-- /.single-product-gallery -->
                            </div><!-- /.gallery-holder -->
                            <div class='col-sm-6 col-md-7 product-info-block'>
                                <div class="product-info">
                                    <h1 class="name" id="pname">
                                        @if (session()->get('language') == 'arabic')
                                            {{ $product->product_name_ar }}
                                        @else
                                            {{ $product->product_name_en }}
                                        @endif
                                    </h1>
                                    {{-- Review Star System --}}
                                    <div class="rating-reviews m-t-20">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                @php
                                                    $rate = number_format($reviewValue);
                                                @endphp
                                                <div class="rating">
                                                    @for($i=1; $i <= $rate; $i++)
                                                        <i class="fa fa-star checked"></i>
                                                    @endfor

                                                    @for($j= $rate ; $j<5; $j++)
                                                        <i class="fa fa-star"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    <a href="#" class="lnk">({{count($reviews)}} Reviews)</a>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.rating-reviews -->
                                    {{-- End Review Star System --}}
                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="stock-box">
                                                    <span class="label">Availability :</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    @if ($product->product_qty <= 0)
                                                        <span class="text-danger">Out Of Stock</span>
                                                    @else
                                                        <span class="text-success">In Stock</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.stock-container -->

                                    <div class="description-container m-t-20">
                                        @if (session()->get('language') == 'arabic')
                                            {{ $product->short_desc_ar }}
                                        @else
                                            {{ $product->short_desc_en }}
                                        @endif
                                    </div><!-- /.description-container -->

                                    <div class="price-container info-container m-t-20">
                                        <div class="row">


                                            <div class="col-sm-6">
                                                <div class="price-box">
                                                    @if ($product->discount_price)
                                                        <span class="price">${{ $product->discount_price }}</span>
                                                        <span class="price-strike">$ {{ $product->selling_price }}</span>
                                                    @else
                                                        <span class="price">${{ $product->selling_price }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="favorite-button m-t-10">
                                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                                                        title="Wishlist" href="#">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                                                        title="Add to Compare" href="#">
                                                        <i class="fa fa-signal"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                                                        title="E-mail" href="#">
                                                        <i class="fa fa-envelope"></i>
                                                    </a>
                                                </div>
                                            </div>

                                        </div><!-- /.row -->
                                    </div><!-- /.price-container -->
                                    <div class="quantity-container info-container">
                                        <div class="row">
                                            @if($product->product_color_en == NULL)

                                            @else
                                                <div class="form-group col-md-6">
                                                    <label class="info-title control-label">Color <span></span></label>
                                                    <select class="form-control unicase-form-control selectpicker" id="color">
                                                        <option selected disabled>--Choose Color--</option>
                                                        @if (session()->get('language') == 'arabic')
                                                            @foreach ($productColorAr as $color)
                                                                <option value="{{ $color }}">{{ $color }}
                                                                </option>
                                                            @endforeach
                                                        @else
                                                            @foreach ($productColorEn as $color)
                                                                <option value="{{ $color }}">{{ ucfirst($color) }}
                                                                </option>
                                                            @endforeach
                                                        @endif

                                                    </select>
                                                </div>
                                            @endif
                                            @if($product->product_size_en == NULL)

                                            @else
                                            <div class="form-group col-md-6">
                                                <label class="info-title control-label">Size <span></span></label>
                                                <select class="form-control unicase-form-control selectpicker" id="size">
                                                    <option selected disabled>--Choose Size--</option>
                                                    @if (session()->get('language') == 'arabic')
                                                    @foreach ($productSizeAr as $size)
                                                        <option value="{{ $size }}">{{ $size }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    @foreach ($productSizeEn as $size)
                                                        <option value="{{ $size }}">{{ ucfirst($size) }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                                </select>
                                            </div>
                                        @endif
                                        </div>
                                    </div>{{-- //Color And Size Containter --}}
                                    <div class="quantity-container info-container">
                                        <div class="row">

                                            <div class="col-sm-2">
                                                <span class="label">Qty :</span>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="cart-quantity">
                                                    <div class="quant-input">
                                                        <div class="arrows">
                                                            <div class="arrow plus gradient"><span class="ir"><i
                                                                        class="icon fa fa-sort-asc"></i></span></div>
                                                            <div class="arrow minus gradient"><span class="ir"><i
                                                                        class="icon fa fa-sort-desc"></i></span></div>
                                                        </div>
                                                        <input type="number" class="form-control" id="qty" value="1" min="1">                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" id="pid" name="product_id" value="{{$product->id}}" min="1">
                                            <div class="col-sm-7">
                                                <button type="submit" class="btn btn-primary" onclick="addtocart()"><i
                                                    class="fa fa-shopping-cart inner-right-vs"></i>ADD TO CART</button>
                                                {{-- <a href="#" class="btn btn-primary"><i
                                                        class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a> --}}
                                            </div>


                                        </div><!-- /.row -->
                                    </div><!-- /.quantity-container -->

                                </div><!-- /.product-info -->
                                {{-- </div><!-- /.col-sm-7 --> --}}
                                {{-- </div><!-- /.row --> --}}
                            </div>
                        </div>
                    </div>
                    <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                    <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                    <li><a data-toggle="tab" href="#tags">TAGS</a></li>
                                </ul><!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-9">

                                <div class="tab-content">

                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                            <p class="text">
                                                @if (session()->get('language') == 'arabic')
                                                    {!! $product->long_desc_ar !!}
                                                @else
                                                    {!! $product->long_desc_en !!}
                                                @endif
                                            </p>
                                        </div>
                                    </div><!-- /.tab-pane -->
                                    <div id="review" class="tab-pane">
                                        <div class="product-tab">
                                            <div class="product-reviews">
                                                <h4 class="title">Customer Reviews</h4>
                                            @foreach($reviews as $review)
                                                <div class="reviews">
                                                    <div class="review">
                                                        <img style="border-radius: 50%" src="{{ (!empty($review->user->profile_photo_path))? url('uploads/user_images/'.$review->user->profile_photo_path):url('uploads/no_image.jpg') }}" width="40px;" height="40px;">
                                                        <b> {{ $review->user->name }}</b>
                                                         <div class="rating">
                                                            @for($i=1; $i <= $review->stars; $i++)
                                                                <i class="fa fa-star checked"></i>
                                                            @endfor

                                                            @for($j= $review->stars ; $j<5; $j++)
                                                                <i class="fa fa-star"></i>
                                                            @endfor
                                                        </div>
                                                        <div class="review-title"><span class="summary">{{$review->summary}}</span>
                                                            <span class="date"><i
                                                                    class="fa fa-calendar"></i><span>{{$review->created_at->diffForHumans()}}</span></span></div>
                                                        <div class="text">"{{Str::limit($review->review,150)}}"</div>
                                                    </div>
                                                </div><!-- /.reviews -->
                                                @endforeach
                                            </div><!-- /.product-reviews -->



        <div class="product-add-review">
            @guest
            <h4 class="title"><b>To Write your own review you have to sign-in First</b><br><a href="{{route('login')}}">Click here to login</a></h4>
            @endguest
            @auth
            <h4 class="title">Write your own review</h4>
            <div class="review-table">
                <form role="form" class="cnt-form" action="{{route('user.review',$product->id)}}" method="POST">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="cell-label">&nbsp;</th>
                                <th>1 star</th>
                                <th>2 stars</th>
                                <th>3 stars</th>
                                <th>4 stars</th>
                                <th>5 stars</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="cell-label">Your rate</td>
                                <td><input type="radio" name="stars" class="radio" value="1"></td>
                                <td><input type="radio" name="stars" class="radio" value="2"></td>
                                <td><input type="radio" name="stars" class="radio" value="3"></td>
                                <td><input type="radio" name="stars" class="radio" value="4"></td>
                                <td><input type="radio" name="stars" class="radio" value="5"></td>
                            </tr>
                        </tbody>
                    </table><!-- /.table .table-bordered -->
                </div><!-- /.table-responsive -->
            </div><!-- /.review-table -->
            <div class="review-form">
                <div class="form-container">

                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputSummary">Summary <span
                                            class="astk">*</span></label>
                                    <input type="text" name="summary" class="form-control txt"
                                        id="exampleInputSummary" placeholder="">
                                        @error('summary')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- /.form-group -->
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputReview">Review <span
                                        class="astk">*</span></label>
                                    <textarea class="form-control txt txt-review" name="review" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                    @error('review')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div><!-- /.form-group -->
                            </div>
                        </div><!-- /.row -->

                        <div class="action text-right">
                            <button class="btn btn-primary btn-upper">SUBMIT
                                REVIEW</button>
                        </div><!-- /.action -->

                    </form><!-- /.cnt-form -->
                </div><!-- /.form-container -->
            </div><!-- /.review-form -->
            @endauth
        </div><!-- /.product-add-review -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                    <div id="tags" class="tab-pane">
                                        <div class="product-tag">

                                            <h4 class="title">Product Tags</h4>
                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-container">

                                                    <div class="form-group">
                                                        <label for="exampleInputTag">Add Your Tags: </label>
                                                        <input type="email" id="exampleInputTag"
                                                            class="form-control txt">


                                                    </div>

                                                    <button class="btn btn-upper btn-primary" type="submit">ADD
                                                        TAGS</button>
                                                </div><!-- /.form-container -->
                                            </form><!-- /.form-cnt -->

                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <span class="text col-md-offset-3">Use spaces to separate tags. Use
                                                        single quotes (') for phrases.</span>
                                                </div>
                                            </form><!-- /.form-cnt -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                </div><!-- /.tab-content -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.product-tabs -->

                    <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">Related Products</h3>
                        <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                            @foreach($relatedProducts as $product)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href="{{url('/product/details/'. $product->id.'/'.$product->product_slug_en)}}"><img
                                                        src="{{asset('/uploads/products/thambnails/'.$product->product_thambnail)}}"
                                                        alt=""></a> </div>
                                            <!-- /.image -->

                                            @if ($product->discount_price == NULL)
                                            <div class="tag new"><span>new</span></div>
                                            @else
                                            @php
                                                $amount = $product->selling_price - $product->discount_price ;
                                                $discount  = ($amount / $product->selling_price) * 100;
                                            @endphp
                                            <div class="tag hot"><span>{{ round($discount)}} %</span></div>
                                        @endif
                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="{{url('/product/details/'. $product->id.'/'.$product->product_slug_en)}}">@if(session()->get('language') == 'arabic') {{$product->product_name_ar}} @else {{$product->product_name_en}} @endif</a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            @if($product->discount_price)
                                            <div class="product-price"> <span class="price"> ${{$product->discount_price}} </span>
                                                <span class="price-before-discount">$ {{$product->selling_price}}</span>
                                            </div>
                                            @else
                                                <div class="product-price"> <span class="price"> ${{$product->selling_price}} </span>
                                                </div>
                                            @endif
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button data-toggle="tooltip"
                                                            class="btn btn-primary icon" type="button"
                                                            title="Add Cart"> <i
                                                                class="fa fa-shopping-cart"></i> </button>
                                                        <button class="btn btn-primary cart-btn"
                                                            type="button">Add to cart</button>
                                                    </li>
                                                    <li class="lnk wishlist"> <a data-toggle="tooltip"
                                                            class="add-to-cart" href="detail.html"
                                                            title="Wishlist"> <i class="icon fa fa-heart"></i>
                                                        </a> </li>
                                                    <li class="lnk"> <a data-toggle="tooltip"
                                                            class="add-to-cart" href="detail.html"
                                                            title="Compare"> <i class="fa fa-signal"
                                                                aria-hidden="true"></i> </a> </li>
                                                </ul>
                                            </div>
                                            <!-- /.action -->
                                        </div>
                                        <!-- /.cart -->
                                    </div>
                                    <!-- /.product -->

                                </div>
                                <!-- /.products -->
                            </div>
                            @endforeach
                            <!-- /.item -->
                        </div><!-- /.home-owl-carousel -->
                    </section><!-- /.section -->
                    <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

                </div><!-- /.col -->
                <div class="clearfix"></div>
            </div><!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('frontend.body.brands')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->

        </div><!-- /.body-content -->
    @endsection
