@extends('layouts.navbar')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Butlers">
    <meta name="author" content="Rabbit">
    <title>Minimart Super</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/vendors.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="css/shop.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body>

    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div><!-- /Page Preload -->

    <main>
        <div class="hero_single inner_pages background-image"
            data-background="url(https://images.unsplash.com/photo-1568724001336-2101ca2a0d8b?auto=format&fit=crop&q=80&w=1891&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D)">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>Our Shop</h1>
                            <p>Order Items with home delivery </p>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <div class="frame white"></div>
        </div>
        <!-- /hero_single -->

        <div class="filters_full clearfix">
            <div class="container">
                <div class="count_results">Showing 1–6 Of 12 Results</div>
                <a href="#0" class="open_filters btn_filters"><i class="icon_adjust-vert"></i></a>
                <div class="sort_select">
                    <select name="sort" id="sort">
                        <option value="popularity" selected="selected">Sort by Popularity</option>
                        <option value="rating">Sort by Average rating</option>
                        <option value="date">Sort by newness</option>
                        <option value="price">Sort by Price: low to high</option>
                        <option value="price-desc">Sort by Price: high to low</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- /filters_full -->

        <div class="container margin_60_40">
            
            <div class="row">
                <aside class="col-lg-3" id="sidebar_fixed">


                    
                        
                        
                        
                    </div>
                </aside>
                <!-- /col -->
                <div class="col-lg-9">

                    @foreach ($menu as $menu)
    <div class="row row_item" data-cue="slideInUp">
        <div class="col-sm-4">
            <figure>
                <a href="shop-single.html">
                    <img class="img-fluid lazy" src="{{ asset('uploads/menu/' .$menu->image) }}"
                         data-src="{{ asset('uploads/menu/' .$menu->image) }}" alt="">
                </a>
            </figure>
        </div>
        <div class="col-sm-8">
            <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i
                    class="icon_star voted"></i><i class="icon_star"></i></div>
            <a href="shop-single.html">
                <h3>{{ $menu->name }}</h3>
            </a>
            <p>{{ $menu->description }}</p>
            <div class="price_box">
                <span class="new_price">Rs.{{ $menu->price }}</span>
                <span class="old_price">Rs.{{ $menu->old_price }}</span>
            </div>

            <!-- Quantity input field -->
            <form action="{{ route('add_to_cart', $menu->id) }}" method="POST">
                @csrf
                <input type="number" name="qtys" id="qtys" value="1" min="1">

                <ul>
                    <li><button type="submit" class="btn_1">Add to cart</button></li>
                </ul>
            </form>
        </div>
    </div>
@endforeach

                    @if(session('sucess'))
                        <div>
                            {{session('sucess')}}
                        </div>
                    @endif

                    <!-- /row_item -->


                    <!-- /row_item -->
                    {{-- <div class="row row_item" data-cue="slideInUp">
                        <div class="col-sm-4">
                            <figure>
                                <span class="ribbon off">-30%</span>
                                <a href="shop-single.html">
                                    <img class="img-fluid lazy" src="img/menu_items/menu_items_placeholder.png"
                                        data-src="img/menu_items/7.jpg" alt="">
                                </a>
                            </figure>
                        </div>
                        <div class="col-sm-8">
                            <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                    class="icon_star voted"></i><i class="icon_star voted"></i><i
                                    class="icon_star"></i></div>
                            <a href="shop-single.html">
                                <h3>Terrific Turkey Chili</h3>
                            </a>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                nulla pariatur. Excepteur sint occaecat cupidatat non proident...</p>
                            <div class="price_box">
                                <span class="new_price">$48.00</span>
                                <span class="old_price">$60.00</span>
                            </div>
                            <ul>
                                <li><a href="#0" class="btn_1">Add to cart</a></li>
                            </ul>
                        </div>
                    </div> --}}

                    
                    <!-- /row_item -->
                    <div class="pagination_fg add_bottom_15" data-cue="slideInUp">
                        <a href="#">&laquo;</a>
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">&raquo;</a>
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>
    <!-- /main -->


    <!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.min.js"></script>
    <script src="js/common_func.js"></script>
    <script src="phpmailer/validate.js"></script>

    <!-- SPECIFIC SCRIPTS -->
    <script src="js/specific_shop.js"></script>
    <script src="js/sticky_sidebar.min.js"></script>
    <script>
        // Sticky sidebar
        $('#sidebar_fixed').theiaStickySidebar({
            minWidth: 991,
            updateSidebarHeight: true,
            additionalMarginTop: 90
        });
    </script>

</body>

</html>

@extends('layouts.footer')
