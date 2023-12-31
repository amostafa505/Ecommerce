@extends('frontend.master')
@section('content')

<div class="body-content outer-top-xs">
    <div class='container'>
      <div class='row'>
        <div class='col-md-3 sidebar'>
          <!-- ================================== TOP NAVIGATION ================================== -->
          @include('frontend.commonparts.categorySidebar')
          <!-- /.side-menu -->
          <!-- ================================== TOP NAVIGATION : END ================================== -->
          <div class="sidebar-module-container">
            <div class="sidebar-filter">
              <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
              @include('frontend.commonparts.sidebarCategory')
              <!-- /.sidebar-widget -->
              <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

              <!-- ============================================== PRICE SILDER============================================== -->
              <div class="sidebar-widget wow fadeInUp">
                <div class="widget-header">
                  <h4 class="widget-title">Price Slider</h4>
                </div>
                <div class="sidebar-widget-body m-t-10">
                  <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span> </span>
                    <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                    <input type="text" class="price-slider" value="" >
                  </div>
                  <!-- /.price-range-holder -->
                  <a href="#" class="lnk btn btn-primary">Show Now</a> </div>
                <!-- /.sidebar-widget-body -->
              </div>
              <!-- /.sidebar-widget -->
              <!-- ============================================== PRICE SILDER : END ============================================== -->
              <!-- ============================================== MANUFACTURES============================================== -->
              <div class="sidebar-widget wow fadeInUp">
                <div class="widget-header">
                  <h4 class="widget-title">Manufactures</h4>
                </div>
                <div class="sidebar-widget-body">
                  <ul class="list">
                    @foreach($brands as $brand)
                    <li><a href="#">@if(session()->get('language') == 'arabic') {{$brand->brand_name_ar}} @else {{$brand->brand_name_en}} @endif</a></li>
                    @endforeach
                  </ul>
                  <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
                </div>
                <!-- /.sidebar-widget-body -->
              </div>
              <!-- /.sidebar-widget -->
              <!-- ============================================== MANUFACTURES: END ============================================== -->
              <!-- ============================================== COLOR============================================== -->
              @php
                $colors_en = App\Models\Product::groupBy('product_color_en')
                    ->select('product_color_en')
                    ->where('status', 1)
                    ->get();
                $colors_ar = App\Models\Product::groupBy('product_color_ar')
                    ->select('product_color_ar')
                    ->where('status', 1)
                    ->get();
              @endphp
              <div class="sidebar-widget wow fadeInUp">
                <div class="widget-header">
                  <h4 class="widget-title">Colors</h4>
                </div>
                <div class="sidebar-widget-body">
                  <ul class="list">
                    @if(session()->get('language') == 'arabic')
                        @foreach($colors_ar as $color)
                            <li><a href="#">{{str_replace(',',' ' ,$color->product_color_ar)}}</a></li>
                        @endforeach
                    @else
                        @foreach($colors_en as $color)
                            <li><a href="#">{{str_replace(',',' ' ,$color->product_color_en)}}</a></li>
                        @endforeach
                    @endif

                  </ul>
                </div>
                <!-- /.sidebar-widget-body -->
              </div>
              <!-- /.sidebar-widget -->
              <!-- ============================================== COLOR: END ============================================== -->
              <!-- ============================================== COMPARE============================================== -->
              <div class="sidebar-widget wow fadeInUp outer-top-vs">
                <h3 class="section-title">Compare products</h3>
                <div class="sidebar-widget-body">
                  <div class="compare-report">
                    <p>You have no <span>item(s)</span> to compare</p>
                  </div>
                  <!-- /.compare-report -->
                </div>
                <!-- /.sidebar-widget-body -->
              </div>
              <!-- /.sidebar-widget -->
              <!-- ============================================== COMPARE: END ============================================== -->
              <!-- ============================================== PRODUCT TAGS ============================================== -->
              @include('frontend.commonparts.tags')
              <!-- /.sidebar-widget -->
            <!----------- Testimonials------------->
              @include('frontend.commonparts.testmonials')

              <!-- ============================================== Testimonials: END ============================================== -->

              <div class="home-banner"> <img src="{{asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image"> </div>
            </div>
            <!-- /.sidebar-filter -->
          </div>
          <!-- /.sidebar-module-container -->
        </div>
        <!-- /.sidebar -->
        <div class='col-md-9'>
          <!-- ========================================== SECTION – HERO ========================================= -->

          @include('frontend.commonparts.heroSection')

          <!-- ========================================= SECTION – HERO : END ========================================= -->



          <div class="clearfix filters-container m-t-10">
            <div class="row">
              <div class="col col-sm-6 col-md-2">
                <div class="filter-tabs">
                  <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                    <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                    <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                  </ul>
                </div>
                <!-- /.filter-tabs -->
              </div>
              <!-- /.col -->
              <div class="col col-sm-12 col-md-6">
                <div class="col col-sm-3 col-md-6 no-padding">
                  <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                    <div class="fld inline">
                      <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                        <ul role="menu" class="dropdown-menu">
                          <li role="presentation"><a href="#">position</a></li>
                          <li role="presentation"><a href="#">Price:Lowest first</a></li>
                          <li role="presentation"><a href="#">Price:HIghest first</a></li>
                          <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- /.fld -->
                  </div>
                  <!-- /.lbl-cnt -->
                </div>
                <!-- /.col -->
                <div class="col col-sm-3 col-md-6 no-padding">
                  <div class="lbl-cnt"> <span class="lbl">Show</span>
                    <div class="fld inline">
                      <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                        <ul role="menu" class="dropdown-menu">
                          <li role="presentation"><a href="#">1</a></li>
                          <li role="presentation"><a href="#">2</a></li>
                          <li role="presentation"><a href="#">3</a></li>
                          <li role="presentation"><a href="#">4</a></li>
                          <li role="presentation"><a href="#">5</a></li>
                          <li role="presentation"><a href="#">6</a></li>
                          <li role="presentation"><a href="#">7</a></li>
                          <li role="presentation"><a href="#">8</a></li>
                          <li role="presentation"><a href="#">9</a></li>
                          <li role="presentation"><a href="#">10</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- /.fld -->
                  </div>
                  <!-- /.lbl-cnt -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.col -->
              <div class="col col-sm-6 col-md-4 text-right">
                <div class="pagination-container">
                  <ul class="list-inline list-unstyled">
                    {{$products->links()}}
                  </ul>
                  <!-- /.list-inline -->
                </div>
                <!-- /.pagination-container --> </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <div class="search-result-container ">
            <div id="myTabContent" class="tab-content category-list">
              <div class="tab-pane active " id="grid-container">
                <div class="category-product">
                  <div class="row">

                    @foreach($products as $product)
                    <div class="col-sm-6 col-md-4 wow fadeInUp">
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
                            <h3 class="name"><a href="{{url('/product/details/'. $product->id.'/'.$product->product_slug_en)}}}">@if(session()->get('language') == 'arabic') {{$product->product_name_ar}} @else {{$product->product_name_en}} @endif</a></h3>
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
                                  <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                  <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                </li>
                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
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
                    <!-- /.item -->
                    @endforeach
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.category-product -->

              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane "  id="list-container">
                <div class="category-product">
                  @foreach($products as $product)
                  <div class="category-product-inner wow fadeInUp">
                    <div class="products">
                      <div class="product-list product">
                        <div class="row product-list-row">
                          <div class="col col-sm-4 col-lg-4">
                            <div class="product-image">
                                <div class="image"> <a href="{{url('/product/details/'. $product->id.'/'.$product->product_slug_en)}}"><img
                                    src="{{asset('/uploads/products/thambnails/'.$product->product_thambnail)}}"
                                    alt=""></a> </div>
                            </div>
                            <!-- /.product-image -->
                          </div>
                          <!-- /.col -->
                          <div class="col col-sm-8 col-lg-8">
                            <div class="product-info">
                              <h3 class="name"><a href="detail.html">@if(session()->get('language') == 'arabic') {{$product->product_name_ar}} @else {{$product->product_name_en}} @endif</a></h3>
                              <div class="rating rateit-small"></div>
                              @if($product->discount_price)
                              <div class="product-price"> <span class="price"> ${{$product->discount_price}} </span>
                                  <span class="price-before-discount">$ {{$product->selling_price}}</span>
                              </div>
                              @else
                                  <div class="product-price"> <span class="price"> ${{$product->selling_price}} </span>
                                  </div>
                              @endif
                              <!-- /.product-price -->
                              <!-- /.product-price -->
                              <div class="description m-t-10">
                                @if (session()->get('language') == 'arabic')
                                {{ $product->short_desc_ar }}
                                @else
                                    {{ $product->short_desc_en }}
                                @endif
                              </div>
                              <div class="cart clearfix animate-effect">
                                <div class="action">
                                  <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                      <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                    </li>
                                    <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                    <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                  </ul>
                                </div>
                                <!-- /.action -->
                              </div>
                              <!-- /.cart -->

                            </div>
                            <!-- /.product-info -->
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.product-list-row -->
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
                      <!-- /.product-list -->
                    </div>
                    <!-- /.products -->
                  </div>
                  @endforeach
                  <!-- /.category-product-inner -->




                </div>
                <!-- /.category-product -->
              </div>
              <!-- /.tab-pane #list-container -->
            </div>
            <!-- /.tab-content -->
            <div class="clearfix filters-container">
              <div class="text-right">
                <div class="pagination-container">
                  <ul class="list-inline list-unstyled">
                    {{$products->links()}}
                  </ul>
                  <!-- /.list-inline -->
                </div>
                <!-- /.pagination-container --> </div>
              <!-- /.text-right -->

            </div>
            <!-- /.filters-container -->

          </div>
          <!-- /.search-result-container -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- ============================================== BRANDS CAROUSEL ============================================== -->
      @include('frontend.body.brands')
      <!-- /.logo-slider -->
      <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> </div>
    <!-- /.container -->

  </div>
@endsection
