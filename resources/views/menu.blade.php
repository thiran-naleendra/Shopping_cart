@extends('layouts.navbar')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Butlers">
    <meta name="author" content="Rabbit">
    <title>MInimart Super</title>

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

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body>

    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div><!-- /Page Preload -->
    <main>
        <div class="hero_single inner_pages background-image" data-background="url(image/menu.jpg)">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>Menu with Tabs</h1>
                            <p>Enjoy Our Delicious Meal</p>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <div class="frame white"></div>
        </div>
        <!-- /hero_single -->

        <div class="pattern_2">
            <div class="container margin_60_40" data-cue="slideInUp">
                <div class="tabs_menu add_bottom_25">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab"
                                role="tab">Starters</a>
                        </li>
                        <li class="nav-item">
                            <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab">Pasta</a>
                        </li>
                        <li class="nav-item">
                            <a id="tab-C" href="#pane-C" class="nav-link" data-toggle="tab"
                                role="tab">Juice Jar</a>
                        </li>
                    </ul>
                    <div class="tab-content add_bottom_25" role="tablist">
                        <div id="pane-A" class="card tab-pane fade show active" role="tabpanel"
                            aria-labelledby="tab-A">
                            <div class="card-header" role="tab" id="heading-A">
                                <h5>
                                    <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="true"
                                        aria-controls="collapse-A">
                                        Starters
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                                <div class="card-body">
                                    <div class="banner lazy" data-bg="url(img/banner_bg_2.jpg)">
                                        <div class="wrapper d-flex align-items-center justify-content-between opacity-mask"
                                            data-opacity-mask="rgba(0, 0, 0, 0.6)">
                                            <div>
                                                <small>Starters Special Offer</small>
                                                <h3>Mix Starters Menu $18 only</h3>
                                                <p>Hamburgher, Chips, Mix Sausages, Beer, Muffin</p>
                                                <a href="reservations.html" class="btn_1">Reserve now</a>
                                            </div>
                                            <figure class="d-none d-lg-block"><img src="img/banner.svg" alt=""
                                                    width="200" height="200" class="img-fluid"></figure>
                                        </div>
                                        <!-- /wrapper -->
                                    </div>
                                    <!-- /banner -->
                                    
                                    
                                    <div class="row magnific-gallery add_top_30">
                                    @foreach($Starters as $st)
                                        <div class="col-lg-6">
                                            <div class="menu_item">
                                                <figure>
                                                    <a href="img/menu_items/large/1.jpg" title="Soft shell crab"
                                                        data-effect="mfp-zoom-in">
                                                        <img src="{{ asset('uploads/menu/' .$st->image) }}"
                                                            data-src="{{ asset('uploads/menu/' .$st->image) }}" class="lazy"
                                                            alt="">
                                                    </a>
                                                </figure>
                                                <div class="menu_title">
                                                    <h3>{{$st->name}}</h3><em>{{$st->price}}</em>
                                                </div>
                                                <p>Potato</p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                   
                                    <!-- /row -->
                                </div>
                                <!-- /card-body -->
                            </div>
                        </div>
                        <!-- /tab -->
                        <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                            <div class="card-header" role="tab" id="heading-B">
                                <h5>
                                    <a class="collapsed" data-toggle="collapse" href="#collapse-B"
                                        aria-expanded="false" aria-controls="collapse-B">
                                        Pasta
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                                <div class="card-body">
                                    <div class="banner lazy" data-bg="url(img/banner_bg.jpg)">
                                        <div class="wrapper d-flex align-items-center justify-content-between opacity-mask"
                                            data-opacity-mask="rgba(0, 0, 0, 0.5)">
                                            <div>
                                                <small>Special Offer</small>
                                                <h3>Burgher Menu $14 only</h3>
                                                <p>Hamburgher, Chips, Mix Sausages, Beer, Muffin</p>
                                                <a href="reservations.html" class="btn_1">Reserve now</a>
                                            </div>
                                            <figure class="d-none d-lg-block"><img src="img/banner.svg"
                                                    alt="" width="200" height="200" class="img-fluid">
                                            </figure>
                                        </div>
                                        <!-- /wrapper -->
                                    </div>
                                    <!-- /banner -->
                                    <div class="row magnific-gallery add_top_30">
                                    @foreach($Pasta as $Pa)
                                        <div class="col-lg-6">
                                            <div class="menu_item">
                                                <figure>
                                                    <a href="img/menu_items/large/7.jpg" title="Prime Rib"
                                                        data-effect="mfp-zoom-in">
                                                        <img src="{{ asset('uploads/menu/' .$Pa->image) }}" 
                                                            data-src="{{ asset('uploads/menu/' .$Pa->image) }}"  class="lazy"
                                                            alt="">
                                                    </a>
                                                </figure>
                                                <div class="menu_title">
                                                    <h3>{{$Pa->name}}</h3><em>{{$Pa->price}}</em>
                                                </div>
                                                <p>Rib, Rosemary, Black pepper</p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- /row -->
                                </div>
                            </div>
                        </div>
                        <!-- /tab -->
                        <div id="pane-C" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-C">
                            <div class="card-header" role="tab" id="heading-C">
                                <h5>
                                    <a class="collapsed" data-toggle="collapse" href="#collapse-C"
                                        aria-expanded="false" aria-controls="collapse-C">
                                        Desserts and Drinks
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse-C" class="collapse" role="tabpanel" aria-labelledby="heading-C">
                                <div class="card-body">
                                    <div class="banner lazy" data-bg="url(img/banner_bg_3.jpg)">
                                        <div class="wrapper d-flex align-items-center justify-content-between opacity-mask"
                                            data-opacity-mask="rgba(0, 0, 0, 0.5)">
                                            <div>
                                                <small>Desserts Special Offer</small>
                                                <h3>Mix Cakes $12 only</h3>
                                                <p>Cheese cake, Muffin, Sweet bred</p>
                                                <a href="reservations.html" class="btn_1">Reserve now</a>
                                            </div>
                                            <figure class="d-none d-lg-block"><img src="img/banner.svg"
                                                    alt="" width="200" height="200" class="img-fluid">
                                            </figure>
                                        </div>
                                        <!-- /wrapper -->
                                    </div>
                                    <!-- /banner -->


                                    <div class="row magnific-gallery add_top_30">
                                        @foreach($Juice as $Ju)
                                            <div class="col-lg-6">
                                                <div class="menu_item">
                                                    <figure>
                                                        <a href="img/menu_items/large/3.jpg" title="Summer Berry"
                                                            data-effect="mfp-zoom-in">
                                                            <img src="{{ asset('uploads/menu/' .$Ju->image) }}"
                                                                data-src="{{ asset('uploads/menu/' .$Ju->image) }}" class="lazy"
                                                                alt="">
                                                        </a>
                                                    </figure>
                                                    <div class="menu_title">
                                                        <h3>{{$Ju->name}}</h3><em>{{$Ju->price}}</em>
                                                    </div>
                                                    <p>Raspberries, Blackberries</p>
                                                </div>
                                            </div>
                                            
                                        @endforeach    


                                    </div>
                                    <!-- /row -->
                                </div>
                            </div>
                        </div>
                        <!-- /tab -->
                    </div>
                    <!-- /tab-content -->
                </div>
                <!-- /tabs_menu-->

                <p class="text-center"><a href="#0" class="btn_1 outline">Download Menu</a></p>
            </div>
            <!-- /container -->
        </div>
        <!-- /pattern -->

    </main>
    <!-- /main -->


    <!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.min.js"></script>
    <script src="js/common_func.js"></script>
    <script src="phpmailer/validate.js"></script>

</body>

</html>

@extends('layouts.footer')
