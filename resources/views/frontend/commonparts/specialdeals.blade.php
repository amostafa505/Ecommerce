<div class="sidebar-widget outer-bottom-small wow fadeInUp">
    <h3 class="section-title">Special Deals</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div
            class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
            <div class="item">
                <div class="products special-product">
                    @php
                        $specialdeal = App\Models\Product::where('special_deals' , 1)->where('status' , 1)->orderBy('id' , 'DESC')->limit(3)->get();
                    @endphp
                    @foreach($specialdeal as $product)
                    <div class="product">
                        <div class="product-micro">
                            <div class="row product-micro-row">
                                <div class="col col-xs-5">
                                    <div class="product-image">
                                        <div class="image"> <a href="{{url('/product/details/'. $product->id.'/'.$product->product_slug_en)}}"> <img
                                                    src="{{asset('/uploads/products/thambnails/'.$product->product_thambnail)}}"
                                                    alt=""> </a> </div>
                                        <!-- /.image -->

                                    </div>
                                    <!-- /.product-image -->
                                </div>
                                <!-- /.col -->
                                <div class="col col-xs-7">
                                    <div class="product-info">
                                        <h3 class="name"><a href="{{url('/product/details/'. $product->id.'/'.$product->product_slug_en)}}">@if(session()->get('language') == 'arabic') {{$product->product_name_ar}} @else {{$product->product_name_en}} @endif</a>
                                        </h3>
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

                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.product-micro-row -->
                        </div>
                        <!-- /.product-micro -->

                    </div>
                    @endforeach
                </div>
            </div>
            <div class="item">
                <div class="products special-product">
                    <div class="product">
                        <div class="product-micro">
                            <div class="row product-micro-row">
                                <div class="col col-xs-5">
                                    <div class="product-image">
                                        <div class="image"> <a href="#"> <img
                                                    src="{{asset('frontend/assets/images/products/p18.jpg')}}"
                                                    alt=""> </a> </div>
                                        <!-- /.image -->

                                    </div>
                                    <!-- /.product-image -->
                                </div>
                                <!-- /.col -->
                                <div class="col col-xs-7">
                                    <div class="product-info">
                                        <h3 class="name"><a href="#">Floral Print Shirt</a>
                                        </h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="product-price"> <span class="price"> $450.99
                                            </span> </div>
                                        <!-- /.product-price -->

                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.product-micro-row -->
                        </div>
                        <!-- /.product-micro -->

                    </div>
                    <div class="product">
                        <div class="product-micro">
                            <div class="row product-micro-row">
                                <div class="col col-xs-5">
                                    <div class="product-image">
                                        <div class="image"> <a href="#"> <img
                                                    src="{{asset('frontend/assets/images/products/p17.jpg')}}"
                                                    alt=""> </a> </div>
                                        <!-- /.image -->

                                    </div>
                                    <!-- /.product-image -->
                                </div>
                                <!-- /.col -->
                                <div class="col col-xs-7">
                                    <div class="product-info">
                                        <h3 class="name"><a href="#">Floral Print Shirt</a>
                                        </h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="product-price"> <span class="price"> $450.99
                                            </span> </div>
                                        <!-- /.product-price -->

                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.product-micro-row -->
                        </div>
                        <!-- /.product-micro -->

                    </div>
                    <div class="product">
                        <div class="product-micro">
                            <div class="row product-micro-row">
                                <div class="col col-xs-5">
                                    <div class="product-image">
                                        <div class="image"> <a href="#"> <img
                                                    src="{{asset('frontend/assets/images/products/p16.jpg')}}"
                                                    alt=""> </a> </div>
                                        <!-- /.image -->

                                    </div>
                                    <!-- /.product-image -->
                                </div>
                                <!-- /.col -->
                                <div class="col col-xs-7">
                                    <div class="product-info">
                                        <h3 class="name"><a href="#">Floral Print Shirt</a>
                                        </h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="product-price"> <span class="price"> $450.99
                                            </span> </div>
                                        <!-- /.product-price -->
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.product-micro-row -->
                        </div>
                        <!-- /.product-micro -->

                    </div>
                </div>
            </div>
            <div class="item">
                <div class="products special-product">
                    <div class="product">
                        <div class="product-micro">
                            <div class="row product-micro-row">
                                <div class="col col-xs-5">
                                    <div class="product-image">
                                        <div class="image"> <a href="#"> <img
                                                    src="{{asset('frontend/assets/images/products/p15.jpg')}}"
                                                    alt="images">
                                                <div class="zoom-overlay"></div>
                                            </a> </div>
                                        <!-- /.image -->

                                    </div>
                                    <!-- /.product-image -->
                                </div>
                                <!-- /.col -->
                                <div class="col col-xs-7">
                                    <div class="product-info">
                                        <h3 class="name"><a href="#">Floral Print Shirt</a>
                                        </h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="product-price"> <span class="price"> $450.99
                                            </span> </div>
                                        <!-- /.product-price -->

                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.product-micro-row -->
                        </div>
                        <!-- /.product-micro -->

                    </div>
                    <div class="product">
                        <div class="product-micro">
                            <div class="row product-micro-row">
                                <div class="col col-xs-5">
                                    <div class="product-image">
                                        <div class="image"> <a href="#"> <img
                                                    src="{{asset('frontend/assets/images/products/p14.jpg')}}"
                                                    alt="">
                                                <div class="zoom-overlay"></div>
                                            </a> </div>
                                        <!-- /.image -->

                                    </div>
                                    <!-- /.product-image -->
                                </div>
                                <!-- /.col -->
                                <div class="col col-xs-7">
                                    <div class="product-info">
                                        <h3 class="name"><a href="#">Floral Print Shirt</a>
                                        </h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="product-price"> <span class="price"> $450.99
                                            </span> </div>
                                        <!-- /.product-price -->

                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.product-micro-row -->
                        </div>
                        <!-- /.product-micro -->

                    </div>
                    <div class="product">
                        <div class="product-micro">
                            <div class="row product-micro-row">
                                <div class="col col-xs-5">
                                    <div class="product-image">
                                        <div class="image"> <a href="#"> <img
                                                    src="{{asset('frontend/assets/images/products/p13.jpg')}}"
                                                    alt="image"> </a> </div>
                                        <!-- /.image -->

                                    </div>
                                    <!-- /.product-image -->
                                </div>
                                <!-- /.col -->
                                <div class="col col-xs-7">
                                    <div class="product-info">
                                        <h3 class="name"><a href="#">Floral Print Shirt</a>
                                        </h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="product-price"> <span class="price"> $450.99
                                            </span> </div>
                                        <!-- /.product-price -->

                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.product-micro-row -->
                        </div>
                        <!-- /.product-micro -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.sidebar-widget-body -->
</div>
