@php
    $sliders = App\Models\Slider::where('status' , 1)->orderBy('id' , 'DESC')->limit(3)->get();
@endphp


<div id="hero">
    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
        @foreach($sliders as $slider)

        <div class="item" style="background-image: url({{asset('uploads/slider_images/' . $slider->slider_img)}});">
            <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                    <div class="slider-header fadeInDown-1">{{$slider->title}}</div>
                    <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{$slider->descreption}}</span> </div>
                    <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product"
                            class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
                    </div>
                </div>
                <!-- /.caption -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.item -->
        @endforeach
    </div>
    <!-- /.owl-carousel -->
</div>
