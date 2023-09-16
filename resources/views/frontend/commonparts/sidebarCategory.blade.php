@php
    $categories = App\Models\Category::latest()->get();
@endphp
<div class="sidebar-widget wow fadeInUp">
    <h3 class="section-title">shop by</h3>
    <div class="widget-header">
      <h4 class="widget-title">Category</h4>
    </div>
    <div class="sidebar-widget-body">
      <div class="accordion">
        @foreach($categories as $category)
        <div class="accordion-group">
          <div class="accordion-heading">
            <a href="#collapse{{$category->id}}" data-toggle="collapse" class="accordion-toggle collapsed">
                <a href="#">@if(session()->get('language') == 'arabic') {{$category->category_name_ar}} @else {{$category->category_name_en}} @endif </a>
                
            </a> 
           </div>
          <!-- /.accordion-heading -->
          <div class="accordion-body collapse" id="collapse{{$category->id}}" style="height: 0px;">
            <div class="accordion-inner">
              <ul>
                @php
                    $subcategories = App\Models\SubCategory::where('category_id' , $category->id)->latest()->get();
                @endphp
                @foreach($subcategories as $subcategory)
                    <li>
                        <a href="{{route('subCategory.Products',[$subcategory->id,$subcategory->subcategory_slug_en])}}">
                            @if(session()->get('language') == 'arabic') {{$subcategory->subcategory_name_ar}} @else {{$subcategory->subcategory_name_en}} @endif
                        </a>
                    </li>
                @endforeach
              </ul>
            </div>
            <!-- /.accordion-inner -->
          </div>
          <!-- /.accordion-body -->
        </div>
        <!-- /.accordion-group -->
        @endforeach
      </div>
      <!-- /.accordion -->
    </div>
    <!-- /.sidebar-widget-body -->
  </div>