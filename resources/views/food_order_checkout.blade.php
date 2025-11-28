@extends('layouts.navbar')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
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

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body>

    @php
        use Illuminate\Support\Facades\Auth;

    @endphp

    <div class="hero_single inner_pages background-image"
        data-background="url(https://images.unsplash.com/photo-1647427017067-8f33ccbae493?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80)">
        <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-10 col-md-8">
                        <h1>Checkout</h1>

                    </div>
                </div>
                <!-- /row -->
            </div>
        </div>
        <div class="frame white"></div>
    </div>

    <main class="pattern_2">

        <div class="container margin_60_40">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="box_booking_2 style_2">
                        <div class="head">
                            <div class="title">
                                <h3>Personal Details</h3>
                            </div>
                        </div>
                        <!-- /head -->
                        <div class="main">
                            <div class="form-group">
                                <label>First and Last Name</label>
                                @if (Auth::check() && Auth::user()->name)
                                    <!-- If the user is logged in and has a name -->
                                    <input class="form-control" placeholder="First and Last Name"
                                        value="{{ Auth::user()->name }}">
                                @else
                                    <!-- If the user is not logged in or does not have a name -->
                                    <div class="alert alert-warning">
                                        <strong>Warning!</strong> Please log in to proceed.
                                    </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        @if (Auth::check() && Auth::user()->email)
                                            <!-- If the user is logged in and has an email -->
                                            <input class="form-control" placeholder="Email Address"
                                                value="{{ Auth::user()->email }}">
                                        @else
                                            <!-- If the user is not logged in or does not have an email -->
                                            <div class="alert alert-warning">
                                                <strong>Warning!</strong> Please log in to proceed.
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        @if (Auth::check() && Auth::user()->mobile_no)
                                            <!-- If the user is logged in and has a phone number -->
                                            <input class="form-control" placeholder="Phone"
                                                value="{{ Auth::user()->mobile_no }}">
                                        @else
                                            <!-- If the user is not logged in or does not have a phone number -->
                                            <div class="alert alert-warning">
                                                <strong>Warning!</strong> Please log in to proceed.
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Full Address</label>
                                @if (Auth::check() && Auth::user()->address)
                                    <!-- If the user is logged in and has an address -->
                                    <input class="form-control" placeholder="Full Address"
                                        value="{{ Auth::user()->address }}">
                                @else
                                    <!-- If the user is not logged in or does not have an address -->
                                    <div class="alert alert-warning">
                                        <strong>Warning!</strong> Please log in to proceed.
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                    <!-- /box_booking -->
                    <div class="box_booking_2 style_2">
                        <div class="head">
                            <div class="title">
                                <h3>Payment Method</h3>
                            </div>
                        </div>
                        <!-- /head -->
                        <div class="main">

                            <div class="payment_select">
                                <label class="container_radio">Credit Card
                                    <input type="radio" value="" checked name="payment_method">
                                    <span class="checkmark"></span>
                                </label>
                                <i class="icon_creditcard"></i>
                            </div>

                            <form action="">
                                @csrf
                                <div class="form-group">
                                    <label>Name on card</label>
                                    <input type="text" class="form-control" id="name_card_order"
                                        name="name_card_order" placeholder="First and last name" required>
                                </div>
                                <div class="form-group">
                                    <label>Card number</label>
                                    <input type="text" id="card_number" name="card_number" class="form-control"
                                        placeholder="Card number" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Expiration date</label>
                                        <div class="row">
                                            <div class="col-md-6 col-6">
                                                <div class="form-group">
                                                    <input type="text" id="expire_month" name="expire_month"
                                                        class="form-control" placeholder="mm" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="form-group">
                                                    <input type="text" id="expire_year" name="expire_year"
                                                        class="form-control" placeholder="yyyy" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Security code</label>
                                            <div class="row">
                                                <div class="col-md-4 col-6">
                                                    <div class="form-group">
                                                        <input type="text" id="ccv" name="ccv"
                                                            class="form-control" placeholder="CCV" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    <img src="img/icon_ccv.gif" width="50" height="29"
                                                        alt="ccv"><small>Last 3 digits</small>
                                                </div>

                                            </div>
                                            <button type="submit" class="btn_1 full-width ">Add Card</button>
                                        </div>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                    <!-- /box_booking -->
                </div>
                <!-- /col -->
                <div class="col-xl-4 col-lg-4" id="sidebar_fixed">
                    <div class="box_booking">
                        <div class="head">
                            <h3>Order Summary</h3>
                        </div>
                        <!-- /head -->
                        <div class="main">
                            @php
                                $current_time = now()->tz('Asia/Kolkata');
                                $formatted_date = $current_time->format('d/m/Y');
                                $formatted_time = $current_time->format('h.ia');
                            @endphp
                            <ul>
                                <li>Date<span>{{ $formatted_date }}</span></li>
                                <li>Hour<span>{{ $formatted_time }}</span></li>
                                <li>Type<span>Delivery</span></li>
                            </ul>
                            <hr>
                            <form method="POST" action="{{ route('storeSales') }}">
                                @csrf
                                @if (session('menu'))
                                    <ul class="clearfix">

                                        @php
                                            $total = 0; //Initialize the total variable
                                        @endphp

                                        @foreach (session('menu') as $id => $name)
                                            @php
                                                $total += $name['price'] * $name['quantity']; // Add the price * quantity to the total
                                            @endphp


                                            <li><a
                                                    href="#0">{{ $name['name'] }}</a><span>Rs.{{ $name['price'] * $name['quantity'] }}</span>
                                            </li>
                                        @endforeach

                                    </ul>
                                    <ul class="clearfix">
                                        <li>Subtotal<span>Rs.{{ $total }}</span></li>
                                        <li>Delivery fee<span>Rs.0</span></li>
                                        <li class="total">Total<span>Rs.{{ $total }}</span></li>
                                    </ul>
                                @endif

                                <!-- Place Order Button -->
                                <button type="submit" class="btn_1 full-width mb_5" id="placeOrderButton"
                                    {{ Auth::check() ? '' : 'disabled' }}>
                                    Place Order
                                </button>
                                
                                <!-- Show warning if the user is not logged in -->
                                @if (!Auth::check())
                                    <div class="alert alert-warning">
                                        <strong>Warning!</strong> Please log in to place an order.
                                    </div>
                                @endif
                                <script>
                                    // If the user is not logged in, prevent the button from being clicked (in addition to disabling it)
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const placeOrderButton = document.getElementById('placeOrderButton');
                                        if (placeOrderButton.disabled) {
                                            placeOrderButton.addEventListener('click', function(event) {
                                                event.preventDefault(); // Prevent form submission if disabled
                                            });
                                        }
                                    });
                                </script>
                                <div class="text-center"><small>Or Call Us at <strong>0432 48432854</strong></small>
                                </div>
                        </div>
                        </form>
                    </div>
                    <!-- /box_booking -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </main>

    <!-- COMMON SCRIPTS -->
    <script src="js/common_scripts.min.js"></script>
    <script src="js/common_func.js"></script>
    <script src="phpmailer/validate.js"></script>

</body>

</html>

@extends('layouts.footer')
