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

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">

		<li class="{{($route == 'dashboard')? 'active' : ''}}">
          <a href="{{url('/admin/dashboard')}}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>

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
          </ul>
        </li>

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
        <li class="header nav-small-cap">User Interface</li>

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
            </ul>
          </li>


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
