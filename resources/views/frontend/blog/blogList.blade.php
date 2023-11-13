@extends('frontend.master')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Blog</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="blog-page">
                    <div class="col-md-9">
                        @foreach($blogPosts as $post)
                        <div class="blog-post  wow fadeInUp">
                            <a href="{{route('blog.details',$post->id)}}"><img class="img-responsive"
                                    src="{{asset($post->post_image)}}" alt=""></a>
                            <h1><a href="{{route('blog.details',$post->id)}}">@if(session()->get('language') == 'arabic') {{$post->post_title_ar}} @else {{$post->post_title_en}} @endif</a></h1>
                            {{-- <span class="author">John Doe</span>
                            <span class="review">6 Comments</span> --}}
                            <span class="date-time">{{$post->created_at->diffForHumans()}}</span>
                            <p>@if(session()->get('language') == 'arabic') {!! Str::limit($post->post_details_ar,200) !!} @else {!! Str::limit($post->post_details_en,200) !!} @endif</p>
                            <a href="{{route('blog.details',$post->id)}}" class="btn btn-upper btn-primary read-more">read more</a>
                        </div>
                       @endforeach

                        <div class="clearfix blog-pagination filters-container  wow fadeInUp"
                            style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">

                            <div class="text-right">
                                <div class="pagination-container">
                                    <ul class="list-inline list-unstyled">
                                        <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                        <li><a href="#">1</a></li>
                                        <li class="active"><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                    </ul><!-- /.list-inline -->
                                </div><!-- /.pagination-container -->
                            </div><!-- /.text-right -->

                        </div><!-- /.filters-container -->
                    </div>
                    <div class="col-md-3 sidebar">



                        <div class="sidebar-module-container">
                            <div class="search-area outer-bottom-small">
                                <form>
                                    <div class="control-group">
                                        <input placeholder="Type to search" class="search-field">
                                        <a href="#" class="search-button"></a>
                                    </div>
                                </form>
                            </div>

                            <div class="home-banner outer-top-n outer-bottom-xs">
                                <img src="{{asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image">
                            </div>
                            <!-- ==============================================CATEGORY============================================== -->
                            <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                                <h3 class="section-title">Category</h3>
                                <div class="sidebar-widget-body m-t-10">
                                    <div class="accordion">
                                        <div class="accordion-group">
                                            @foreach($blogCategory as $category)
                                            <div class="accordion-heading">
                                                <a href="{{route('postsByCategory',$category->id)}}" >
                                                    @if(session()->get('language') == 'arabic') {{$category->blog_category_name_ar}} @else {{$category->blog_category_name_en}} @endif
                                                </a>
                                            </div><!-- /.accordion-heading -->
                                            @endforeach
                                        </div><!-- /.accordion-group -->
                                    </div><!-- /.accordion -->
                                </div><!-- /.sidebar-widget-body -->
                            </div><!-- /.sidebar-widget -->
                            <!-- ============================================== CATEGORY : END ============================================== -->
                            <!-- ============================================== PRODUCT TAGS ============================================== -->
                            @include('frontend.commonparts.tags')
                            <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('frontend.body.brands')
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
    </div>
@endsection
