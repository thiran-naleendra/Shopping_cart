<header class="header clearfix element_to_stick">
    <div class="container-fluid">
        <div id="logo">
            <a href="index.html">
                <img src="img/icons8-cart-100.png" width="35" height="35" alt="" class="logo_normal">
                
            </a>
        </div>
        <ul id="top_menu">
            <li><a href="#0" class="search-overlay-menu-btn"></a></li>
            <li>
                <div class="dropdown dropdown-cart">
                    <a href="shop-cart.html" class="cart_bt"><strong>2</strong></a>
                    <div class="dropdown-menu">
                        <ul>
                            @if (session('menu'))
                            <?php $total = 0; ?> <!-- Initialize the total variable -->
                                <li>
                                    {{-- <figure><img src="img/item_placeholder_square_small.jpg"
                                            data-src="img/item_square_small_1.jpg" alt="" width="50"
                                            height="50" class="lazy"></figure> --}}
                                    @foreach (session('menu') as $id => $name)
                                    <?php
                                    $total += $name['price'] * $name['quantity']; // Add the price * quantity to the total
                                    ?>
                                        <strong><span>{{ $name['name'] }}</span>Rs.{{ $name['price'] }}</strong><br><br>
                                    @endforeach
                                    {{-- <a href="#0" class="action"><i class="icon_trash_alt"></i></a> --}}
                                </li>

                        </ul>

                        <div class="total_drop">

                            <div class="clearfix add_bottom_15"><strong>Total</strong><span>Rs.{{ $total }}</span></div>
                            @endif
                            <a href="{{ route('food_order') }}" class="btn_1 outline">View Cart</a><a
                                href="{{ route('checkout') }}" class="btn_1">Checkout</a>
                        </div>
                    </div>
                </div>
                <!-- /dropdown-cart-->
            </li>
        </ul>
        <!-- /top_menu -->
        <a href="#0" class="open_close">
            <i class="icon_menu"></i><span>Menu</span>
        </a>
        <nav class="main-menu">
            <div id="header_menu">
                <a href="#0" class="open_close">
                    <i class="icon_close"></i><span>Menu</span>
                </a>
                <a href="{{ route('home') }}"><img src="img/logo.svg" width="140" height="35" alt=""></a>
            </div>
            <ul>
                <li class="submenu">
                    <a href="{{ route('home') }}" class="show-submenu">Home</a>
                </li>
                
                <li class="submenu">
                    <a href="{{ route('order') }}" class="show-submenu">Buy Products</a>
                </li>
                <li class="submenu">
                    <a href="{{ route('about') }}" class="show-submenu">About</a>
                </li>
                
                <li><a href="{{ route('contact') }}">Contact</a></li>
                <li><a href="{{ route('clogin') }}">Log In</a></li>
                <li><a href="{{ route('userProfile') }}">Profile</a></li>
                

            </ul>
        </nav>
    </div>
    <!-- Search -->
    <div class="search-overlay-menu">
        <span class="search-overlay-close"><span class="closebt"><i class="icon_close"></i></span></span>
        <form role="search" id="searchform" method="get">
            <input value="" name="q" type="search" placeholder="Search..." />
            <button type="submit"><i class="icon_search"></i></button>
        </form>
    </div><!-- End Search -->
</header>
<!-- /header -->

<!-- Modal terms -->
<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="termsLabel">Terms and conditions</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>,
                    mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus,
                    pro ne quod dicunt sensibus.</p>
                <p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam
                    dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt
                    sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum
                    accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum
                    sanctus, pro ne quod dicunt sensibus.</p>
                <p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam
                    dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt
                    sensibus.</p>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- COMMON SCRIPTS -->
<script src="js/common_scripts.min.js"></script>
<script src="js/common_func.js"></script>
<script src="phpmailer/validate.js"></script>

<!-- SPECIFIC SCRIPTS -->
<script src="js/modernizr.min.js"></script>
<script src="js/video_header.min.js"></script>
<script>
    // Video Header
    HeaderVideo.init({
        container: $('.header-video'),
        header: $('.header-video--media'),
        videoTrigger: $("#video-trigger"),
        autoPlayVideo: true
    });
</script>

<!-- SPECIFIC SCRIPTS (wizard form) -->
<script src="js/wizard/wizard_scripts.min.js"></script>
<script src="js/wizard/wizard_func.js"></script>
