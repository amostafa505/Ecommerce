<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> @if(session()->get('language') == 'arabic') الاقسام @else Categories @endif </div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">
@php
   $categories = App\Models\Category::latest()->get();
@endphp
            @foreach($categories as $category)
            <li class="dropdown menu-item"> <a href="{{route('category.Products',[$category->id , $category->category_slug_en])}}" class="dropdown-toggle"
                    data-toggle="dropdown"><i class="{{$category->category_icon}}"
                        aria-hidden="true"></i>@if(session()->get('language') == 'arabic') {{$category->category_name_ar}} @else {{$category->category_name_en}} @endif</a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <div class="row">
                            @php
                                $subcategories = App\Models\SubCategory::where('category_id' , $category->id)->latest()->get();
                            @endphp
                            @foreach($subcategories as $subcategory)
                            <div class="col-sm-12 col-md-3">
                            <a href="{{route('subCategory.Products',[$subcategory->id , $subcategory->subcategory_slug_en])}}"><h2 class="title">@if(session()->get('language') == 'arabic') {{$subcategory->subcategory_name_ar}} @else {{$subcategory->subcategory_name_en}} @endif</h2></a>
                                <ul class="links list-unstyled">
                                    @php
                                        $subsubcategories = App\Models\SubSubCategory::where('subcategory_id' , $subcategory->id)->latest()->get();
                                    @endphp
                                    @foreach($subsubcategories as $subsubcategory)
                                    <li><a href="{{route('subSubCategory.Products',[$subsubcategory->id , $subsubcategory->subsubcategory_slug_en])}}">@if(session()->get('language') == 'arabic') {{$subsubcategory->subsubcategory_name_ar}} @else {{$subsubcategory->subsubcategory_name_en}} @endif</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            @endforeach
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </li>
                    <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu -->
            </li>
            @endforeach
            <!-- /.menu-item -->



        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
