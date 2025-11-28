@extends('layouts.app')
@extends('layouts.navbar')
<html>

<head>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
    <style>
        /* Styling for the modal dialog */
        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px #888;
            z-index: 1000;
        }
    </style>
</head>

<body>
    <section class="h-100 bg-dark">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img src="https://st3.depositphotos.com/15648834/17930/v/450/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"
                                    alt="Sample photo" class="img-fluid"
                                    style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">
                                    <h3 class="mb-5 text-uppercase">User registration form</h3>
                                    <form action="{{ route('createUser') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" name="name" id="fname"
                                                        class="form-control form-control-lg" />
                                                    <label class="form-label" for="form3Example1m">Name</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" name="email" id="form3Example97"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Example97">Email ID</label>
                                        </div>

                                        {{-- <div class="form-outline mb-4">
                                            <input type="password" name="password" id="form3Example8"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Example8">Password</label>
                                        </div> --}}
                                        <div class="form-outline mb-4">
                                            <input type="password" name="password" id="form3Example8" class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Example8">Password</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control form-control-lg" />
                                            <label class="form-label" for="confirmPassword">Confirm Password</label>
                                            
                                        </div>
                                        <div id="passwordMatchMessage"></div>
                                        <script>
                                            var passwordField = document.getElementById("form3Example8");
                                            var confirmPasswordField = document.getElementById("confirmPassword");
                                            var passwordMatchMessage = document.getElementById("passwordMatchMessage");
                                        
                                            function checkPasswordMatch() {
                                                var password = passwordField.value;
                                                var confirmPassword = confirmPasswordField.value;
                                        
                                                if (password !== confirmPassword) {
                                                    passwordMatchMessage.innerHTML = "Passwords do not match!";
                                                    passwordMatchMessage.style.color = "red";
                                                } else {
                                                    passwordMatchMessage.innerHTML = "Passwords match!";
                                                    passwordMatchMessage.style.color = "green";
                                                }
                                            }
                                        
                                            passwordField.addEventListener("keyup", checkPasswordMatch);
                                            confirmPasswordField.addEventListener("keyup", checkPasswordMatch);
                                        </script>

                                        <div class="form-outline mb-4">
                                            <input type="text" name="address" id="form3Example8"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Example8">Address</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" name="mobileno" id="form3Example90"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Example90">Mobile Number</label>
                                        </div>



                                        <div class="form-outline mb-4">
                                            <input type="date" name="dob" id="form3Example9"
                                                class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Example9">DOB</label>
                                        </div>







                                        <div class="d-flex justify-content-end pt-3">

                                            <button type="submit" class="btn btn-primary btn-lg ms-2">Register</button>
                                        </div>
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        @if (session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>

</html>
