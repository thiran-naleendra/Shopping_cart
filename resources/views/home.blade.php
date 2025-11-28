@extends('layouts.navbar')

@extends('layouts.app')

<div id="preloader">
    <div data-loader="circle-side"></div>
</div><!-- /Page Preload -->
<main>
    <div class="header-video">
        <div id="">
            <div class="opacity-mask d-flex align-items-center">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-xl-8 col-lg-10 col-md-8 mt-2">
                            <h1 style="color: rgb(0, 0, 0); -webkit-text-stroke: 1px rgb(255, 255, 255);">Bringing You
                                The Best Products From Around The World At The Best Prices</h1>
                            <p></p>
                            <a class="btn_1" href="{{ route('order') }}">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="image/main_image.jpg" data-src="image/main_image.jpg" alt="" width="1920" height="1280"
            class="lazy">

        {{-- <img src="images/6505894.jpg" alt="" class="header-video--media" 
            data-teaser-source="video/intro" data-provider="" data-video-width="1920" data-video-height="960"> --}}
    </div>
    <!-- /header-video -->



    <div class="pattern_2">
        <div class="container margin_120_100 home_intro">
            <div class="row justify-content-center d-flex align-items-center">
                <div class="col-lg-5 text-lg-center d-none d-lg-block" data-cue="slideInUp">
                    <figure>
                        <img src="https://images.pexels.com/photos/15491800/pexels-photo-15491800/free-photo-of-shopping-cart-filled-with-packages-in-empty-aisle.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            data-src="https://images.pexels.com/photos/15491800/pexels-photo-15491800/free-photo-of-shopping-cart-filled-with-packages-in-empty-aisle.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            width="354" height="440" alt="" class="img-fluid lazy">
                        {{-- <a href="https://www.youtube.com/" class="btn_play" data-cue="zoomIn" data-delay="500"><span
                                class="pulse_bt"><i class="arrow_triangle-right"></i></span></a> --}}
                    </figure>
                </div>
                <div class="col-lg-5 pt-lg-4" data-cue="slideInUp" data-delay="500">
                    <div class="main_title">
                        <span><em></em></span>
                        <h2>Some words about us</h2>
                        <p>Minimart Supper</p>
                    </div>
                    <p>Minimart Supper is your go-to supermarket for all your grocery and household needs. We offer a
                        wide range of fresh produce, quality meats, pantry staples, snacks, and beverages at affordable
                        prices. Our mission is to provide a convenient and enjoyable shopping experience with friendly
                        service and a variety of products to suit every customer’s needs. Whether you’re stocking up for
                        the week or looking for something special, Minimart Supper has everything you need under one
                        roof.

                    </p>

                </div>
            </div>
            <!--/row -->
        </div>
        <!--/container -->
    </div>
    <!--/pattern_2 -->


    <!-- /bg_gray -->

    <div class="call_section lazy"
        data-bg="url(https://images.pexels.com/photos/2733918/pexels-photo-2733918.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1)">
        <div class="container clearfix">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 text-center">
                    <div class="box_1" data-cue="slideInUp">
                        <h2><span>Minimart Supper</span></h2>
                        <p>Minimart Supper is your local supermarket offering a wide variety of fresh produce, quality
                            groceries, snacks, and household essentials. We strive to provide affordable prices and a
                            convenient shopping experience for all your everyday needs. Visit us for great products and
                            friendly service, all in one place!</p>
                        <a href="{{ route('contact') }}" class="btn_1 mt-3">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/call_section-->


</main>
<!-- /main -->



<div id="toTop"></div><!-- Back to top button -->



@extends('layouts.footer')
