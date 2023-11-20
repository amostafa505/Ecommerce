@php
    $prefix = Request::route()->getprefix();
    $route = Route::Current()->getName();
    // dd($prefix);
@endphp
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">
						  <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
						  <h3><b>Ecommerce</b> Admin</h3>
					 </div>
				</a>
			</div>
        </div>


        @php
            $brand = (auth()->guard('admin')->user()->brand == 1);
            $category = (auth()->guard('admin')->user()->category == 1);
            $product = (auth()->guard('admin')->user()->product == 1);
            $slider = (auth()->guard('admin')->user()->slider == 1);
            $coupon = (auth()->guard('admin')->user()->coupons == 1);
            $shippingarea = (auth()->guard('admin')->user()->shippingarea == 1);
            $blog = (auth()->guard('admin')->user()->blog == 1);
            $site = (auth()->guard('admin')->user()->site == 1);
            $review = (auth()->guard('admin')->user()->review == 1);
            $orders = (auth()->guard('admin')->user()->orders == 1);
            $report = (auth()->guard('admin')->user()->report == 1);
            $allusers = (auth()->guard('admin')->user()->allusers == 1);
            $adminuserrole = (auth()->guard('admin')->user()->adminuserrole == 1);
        @endphp

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">

		<li class="{{($route == 'dashboard')? 'active' : ''}}">
          <a href="{{url('/admin/dashboard')}}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>
        @if($brand)
            <li class="treeview {{($prefix == '/Brand')?'active':''}}">
            <a href="#">
                <i data-feather="message-circle"></i>
                <span>Brands</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{($route == 'all.brands')? 'active' : ''}}"><a href="{{route('all.brands')}}"><i class="ti-more"></i>All brands</a></li>
            </ul>
            </li>
        @endif
        @if($category)
        <li class="treeview {{($prefix == '/Category')?'active':''}}">
            <a href="#">
            <i data-feather="mail"></i>
              <span>Categories</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{($route == 'all.categories')? 'active' : ''}}"><a href="{{route('all.categories')}}"><i class="ti-more"></i>All Categories</a></li>
              <li class="{{($route == 'all.subcategories')? 'active' : ''}}"><a href="{{route('all.subcategories')}}"><i class="ti-more"></i>All SubCategories</a></li>
              <li class="{{($route == 'all.subsubcategories')? 'active' : ''}}"><a href="{{route('all.subsubcategories')}}"><i class="ti-more"></i>All SubSubCategories</a></li>
            </ul>
          </li>
        @endif
        @if($product)
        <li class="treeview {{($prefix == '/Product')?'active':''}}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'add.product')? 'active' : ''}}"><a href="{{route('add.product')}}"><i class="ti-more"></i>Add Product</a></li>
            <li class="{{($route == 'all.products')? 'active' : ''}}"><a href="{{route('all.products')}}"><i class="ti-more"></i>Manage Product</a></li>
            <li class="{{($route == 'manage.stock')? 'active' : ''}}"><a href="{{route('manage.stock')}}"><i class="ti-more"></i>Manage Stock</a></li>

        </ul>
        </li>
        @endif
        @if($slider)
        <li class="treeview {{($prefix == '/Slider')?'active':''}}">
            <a href="#">
              <i data-feather="file"></i>
              <span>Sliders</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{($route == 'all.sliders')? 'active' : ''}}"><a href="{{route('all.sliders')}}"><i class="ti-more"></i>All Sliders</a></li>
            </ul>
          </li>
          @endif
          @if($coupon)
          <li class="treeview {{($prefix == '/Coupon')?'active':''}}">
            <a href="#">
              <i data-feather="file"></i>
              <span>Coupons</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{($route == 'all.coupons')? 'active' : ''}}"><a href="{{route('all.coupons')}}"><i class="ti-more"></i>All Coupons</a></li>
            </ul>
          </li>
          @endif
          {{-- <li class="header nav-small-cap">User Interface</li> --}}

          @if($shippingarea)
            <li class="treeview  {{($prefix == '/shippingarea')?'active':''}}">
            <a href="#">
                <i data-feather="grid"></i>
                <span>Shipping Area</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{($route == 'all.countries')? 'active' : ''}}"><a href="{{route('all.countries')}}"><i class="ti-more"></i>All Countries</a></li>
                <li class="{{($route == 'all.cities')? 'active' : ''}}"><a href="{{route('all.cities')}}"><i class="ti-more"></i>All Cities</a></li>
            </ul>
            </li>
        @endif
        @if($orders)
        <li class="treeview  {{($prefix == '/Orders')?'active':''}}">
            <a href="#">
              <i data-feather="grid"></i>
              <span>Orders</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{($route == 'pending.orders')? 'active' : ''}}"><a href="{{route('pending.orders')}}"><i class="ti-more"></i>All Pending Orders</a></li>
              <li class="{{($route == 'confirmed.orders')? 'active' : ''}}"><a href="{{route('confirmed.orders')}}"><i class="ti-more"></i>All Confirmed Orders</a></li>
              <li class="{{($route == 'processing.orders')? 'active' : ''}}"><a href="{{route('processing.orders')}}"><i class="ti-more"></i>All Processing Orders</a></li>
              <li class="{{($route == 'picked.orders')? 'active' : ''}}"><a href="{{route('picked.orders')}}"><i class="ti-more"></i>All Picked Orders</a></li>
              <li class="{{($route == 'shipped.orders')? 'active' : ''}}"><a href="{{route('shipped.orders')}}"><i class="ti-more"></i>All Shipped Orders</a></li>
              <li class="{{($route == 'delivered.orders')? 'active' : ''}}"><a href="{{route('delivered.orders')}}"><i class="ti-more"></i>All Delivered Orders</a></li>
              <li class="{{($route == 'canceled.orders')? 'active' : ''}}"><a href="{{route('canceled.orders')}}"><i class="ti-more"></i>All Canceled Orders</a></li>
              <li class="{{($route == 'returned.orders.unapproved')? 'active' : ''}}"><a href="{{route('returned.orders.unapproved')}}"><i class="ti-more"></i>All Returned Orders (UnApproved)</a></li>
              <li class="{{($route == 'returned.orders.approved')? 'active' : ''}}"><a href="{{route('returned.orders.approved')}}"><i class="ti-more"></i>All Returned Orders (Approved)</a></li>
            </ul>
          </li>
          @endif
          @if($report)
            <li class="treeview  {{($prefix == '/report')?'active':''}}">
                <a href="#">
                <i data-feather="grid"></i>
                <span>Reports</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                <li class="{{($route == 'all.reports')? 'active' : ''}}"><a href="{{route('all.reports')}}"><i class="ti-more"></i>All Reports</a></li>
                </ul>
            </li>
          @endif
          @if($allusers)
          <li class="treeview  {{($prefix == '/allusers')?'active':''}}">
            <a href="#">
              <i data-feather="grid"></i>
              <span>All Users</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{($route == 'all.users')? 'active' : ''}}"><a href="{{route('all.users')}}"><i class="ti-more"></i>All Users</a></li>
            </ul>
          </li>
          @endif
          @if($blog)
          <li class="treeview  {{($prefix == '/blog')?'active':''}}">
            <a href="#">
              <i data-feather="grid"></i>
              <span>All Blog Section</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{($route == 'all.blog.categories')? 'active' : ''}}"><a href="{{route('all.blog.categories')}}"><i class="ti-more"></i>All Blog Category</a></li>
              <li class="{{($route == 'all.blog.posts')? 'active' : ''}}"><a href="{{route('all.blog.posts')}}"><i class="ti-more"></i>All Blog Posts</a></li>
            </ul>
          </li>
          @endif
          @if($site)
          <li class="treeview  {{($prefix == '/Site')?'active':''}}">
            <a href="#">
              <i data-feather="grid"></i>
              <span>All Site Setting Section</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{($route == 'setting')? 'active' : ''}}"><a href="{{route('setting')}}"><i class="ti-more"></i>Site Setting</a></li>
                <li class="{{($route == 'seo')? 'active' : ''}}"><a href="{{route('seo')}}"><i class="ti-more"></i>Seo Setting</a></li>
            </ul>
          </li>
          @endif
          @if($review)
          <li class="treeview  {{($prefix == '/review')?'active':''}}">
            <a href="#">
              <i data-feather="grid"></i>
              <span>All Reviews Section</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{($route == 'pending.reviews')? 'active' : ''}}"><a href="{{route('pending.reviews')}}"><i class="ti-more"></i>All Pending Reviews</a></li>
              <li class="{{($route == 'approved.reviews')? 'active' : ''}}"><a href="{{route('approved.reviews')}}"><i class="ti-more"></i>All Approved Reviews</a></li>

            </ul>
          </li>
          @endif
          @if($adminuserrole)
          <li class="treeview  {{($prefix == '/adminuserrole')?'active':''}}">
            <a href="#">
              <i data-feather="grid"></i>
              <span>All Admin Roles Section</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{($route == 'admins.view')? 'active' : ''}}"><a href="{{route('admins.view')}}"><i class="ti-more"></i>All Admin Users</a></li>
            </ul>
          </li>
          @endif
      </ul>
    </section>

	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>
