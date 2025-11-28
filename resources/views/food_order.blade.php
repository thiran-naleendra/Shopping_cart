@extends('layouts.navbar')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Butlers">
    <meta name="author" content="">
    <title>Minimart Super</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/vendors.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <main>
        <div class="hero_single inner_pages background-image"
            data-background="url(https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=1170&q=80)">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>Order Food</h1>
                            <p>Order food with home delivery or take away</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="frame white"></div>
        </div>

        <div class="container margin_60_40">
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <div class="box_booking">
                        <div class="head">
                            <h3>Order Summary</h3>
                        </div>
                        <div class="main">
                            @if (session('menu'))
                                <?php $total = 0; ?>

                                @foreach (session('menu') as $id => $name)
                                    <?php $total += $name['price'] * $name['quantity']; ?>
                                    <ul class="clearfix">
                                        <li>
                                            <a href="#0">{{ $name['name'] }}</a> 
                                            &ensp; Items: {{ $name['quantity'] }} 
                                            <span>Rs{{ $name['price'] * $name['quantity'] }}</span>
                                            
                                            <!-- Remove Item Button -->
                                            <a href="{{ route('remove_from_cart', ['id' => $id]) }}" 
                                                class="btn btn-danger btn-sm remove-item"
                                                data-item="{{ $id }}">
                                                Remove
                                            </a>
                                        </li>
                                    </ul>
                                @endforeach

                                <ul class="clearfix">
                                    <li>Subtotal<span>Rs.{{ $total }}</span></li>
                                    <li>Delivery fee<span>Rs.0</span></li>
                                    <li class="total">Total<span>Rs.{{ $total }}</span></li>
                                </ul>
                            @endif

                            <a href="{{route('checkout') }}" class="btn_1 full-width mb_5">Order Now</a>
                            <div class="text-center"><small>No money charged on this step</small></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="js/common_scripts.min.js"></script>
    <script src="js/common_func.js"></script>
    <script src="phpmailer/validate.js"></script>

    <script>
        document.querySelectorAll('.remove-item').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                let itemId = this.getAttribute('data-item');

                Swal.fire({
                    title: "Are you sure?",
                    text: "This item will be removed from your cart.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, remove it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ url('/remove_from_cart') }}/" + itemId;
                    }
                });
            });
        });
    </script>

</body>
</html>

@extends('layouts.footer')
