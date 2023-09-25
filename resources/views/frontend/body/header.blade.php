<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                        <li><a href="#"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                        <li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li>
                        @auth
                            <li><a href="{{ route('dashboard') }}"><i class="icon fa fa-user"></i>My Profile</a></li>
                        @else
                            <li><a href="{{route('login')}}"><i class="icon fa fa-lock"></i>Login/Register</a></li>
                        @endauth
                    </ul>
                </div>
                <!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle"
                                data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">INR</a></li>
                                <li><a href="#">GBP</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle"
                                data-hover="dropdown" data-toggle="dropdown"><span class="value">@if(session()->get('language') == 'arabic') اللغه @else language @endif</span><b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @if (session()->get('language') == 'arabic')
                                <li><a href="{{route('english.language')}}">English</a></li>
                                @else
                                <li><a href="{{route('arabic.language')}}">Arabic</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                    <!-- /.list-unstyled -->
                </div>
                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo"> <a href="/"> <img src="{{asset('frontend/assets/images/logo.png')}}" alt="logo"> </a>
                    </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form>
                            <div class="control-group">
                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown"
                                            href="category.html">Categories <b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="menu-header">Computer</li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Clothing</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Electronics</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Shoes</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Watches</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <input class="search-field" placeholder="Search here..." />
                                <a class="search-button" href="#"></a>
                            </div>
                        </form>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart"
                            data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                <div class="basket-item-count"><span class="count">2</span></div>
                                <div class="total-price-basket"> <span class="lbl">cart -</span> <span
                                        class="total-price"> <span class="sign">$</span><span
                                            class="value">600.00</span> </span> </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>


                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw"> <a href="/" data-hover="dropdown"
                                        class="dropdown-toggle" data-toggle="dropdown">@if(session()->get('language') == 'arabic') الرئيسيه @else Home @endif</a>
                                </li>
                                @php
                                    $categories = App\Models\Category::latest()->get();
                                @endphp
                            @foreach($categories as $category)
                            <li class="dropdown yamm mega-menu">
                                 <a href="{{route('category.Products',[$category->id , $category->category_slug_en])}}" data-hover="dropdown"
                                    class="dropdown-toggle" data-toggle="dropdown">@if(session()->get('language') == 'arabic') {{$category->category_name_ar}} @else {{$category->category_name_en}} @endif
                                </a>
                                <ul class="dropdown-menu container">
                                    <li>
                                        <div class="yamm-content ">
                                            <div class="row">

                                                    @php
                                                    $subcategories = App\Models\SubCategory::where('category_id' , $category->id)->latest()->get();
                                                    @endphp
                                                    @foreach($subcategories as $subcategory)
                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                        
                                                        <a href="{{route('subCategory.Products',[$subcategory->id , $subcategory->subcategory_slug_en])}}" >
                                                             <h2 class="title">@if(session()->get('language') == 'arabic') {{$subcategory->subcategory_name_ar}} @else {{$subcategory->subcategory_name_en}} @endif</h2>
                                                        </a>
                                                    <ul class="links">
                                                        @php
                                                            $subsubcategories = App\Models\SubSubCategory::where('subcategory_id' , $subcategory->id)->latest()->get();
                                                            // dd($subsubcategories)
                                                        @endphp
                                                        @foreach($subsubcategories as $subsubcategory)
                                                            <li>
                                                                <a href="{{route('subSubCategory.Products',[$subsubcategory->id , $subsubcategory->subsubcategory_slug_en])}}">
                                                                    @if(session()->get('language') == 'arabic') {{$subsubcategory->subsubcategory_name_ar}} @else {{$subsubcategory->subsubcategory_name_en}} @endif
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                        
                                                    </ul>
                                                    </div>

                                                    @endforeach
                                                    
                                                <!-- /.col -->
                                                <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                    <img class="img-responsive"
                                                        src="{{asset('frontend/assets/images/banners/top-menu-banner.jpg')}}"
                                                        alt="">
                                                </div>
                                                <!-- /.yamm-content -->
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            @endforeach {{-- End Category --}}

                                <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a>
                                </li>
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>
