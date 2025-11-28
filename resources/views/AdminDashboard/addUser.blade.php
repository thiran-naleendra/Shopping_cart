@extends('AdminDashboard.app')



@section('content')
    <div class="container-fluid">
        <div style="min-height: 1345.31px;">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Register User</a></li>
                                <li class="breadcrumb-item active"></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">


                {{-- content --}}

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add User</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('regUser') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    id="exampleInputEmail1" placeholder="Enter Name">
                            </div>


                            {{-- <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirm Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    id="exampleInputPassword1" placeholder="Password">
                            </div> --}}

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Confirm Password</label>
                                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm Password">
                            </div>
                            <div id="message"></div>
                            
                            <script>
                                // Selecting password and confirm password fields
                                var passwordField = document.getElementById("password");
                                var confirmPasswordField = document.getElementById("confirmPassword");
                                var messageBox = document.getElementById("message");
                            
                                // Function to check if passwords match
                                function checkPasswordMatch() {
                                    var password = passwordField.value;
                                    var confirmPassword = confirmPasswordField.value;
                            
                                    if (password !== confirmPassword) {
                                        messageBox.innerHTML = "Passwords do not match!";
                                        messageBox.style.color = "red";
                                    } else {
                                        messageBox.innerHTML = "Passwords match!";
                                        messageBox.style.color = "green";
                                    }
                                }
                            
                                // Adding an event listener to both fields to trigger the check when the user types
                                passwordField.addEventListener("keyup", checkPasswordMatch);
                                confirmPasswordField.addEventListener("keyup", checkPasswordMatch);
                            </script>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    id="exampleInputEmail1" placeholder="Enter email">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">User Role</label>
                                <select name="user_role" id="user_role" class="form-control">
                                    <option value=""><------></option>
                                    <option value="Sale Assistant">Sale Assistant</option>
                                    <option value="Admin">Admin</option>
                                </select>

                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" id="addUser" class="btn btn-primary">Add User</button>
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

                <!-- view tabale -->
                <div class="row">
                    <div class="col-sm-12 form-grop">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">User List</h3>
                            </div>
                            <div class="card-body">

                                <table class="table table-striped table-bordered" id="dataTabl">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>User Role</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($user as $us)
                                        <tbody>

                                            <tr>
                                                @if ($us->user_role !== 'user')
                                                    <td>{{ $us->name }}</td>
                                                    <td>{{ $us->user_role }}</td>
                                                    <td>{{ $us->email }}</td>



                                                    <td>
                                                        <div class="row">
                                                            {{-- <div class="col">
                                                                <a href="" class="btn btn-primary btn-sm btn-flat"
                                                                    style="width: 100%">Edit</a>
                                                            </div> --}}
                                                            {{-- delete --}}
                                                            <div class="col">
                                                                <form method="POST" action="{{ route('userDelete') }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $us->id }}">
                                                                    <button type="submit"
                                                                        onclick="return confirm('Are you sure you want to delete this User?')"
                                                                        class="btn btn-danger btn-sm btn-flat"
                                                                        style="width: 100%">
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>


                                                    </td>
                                                @endif
                                            </tr>



                                        </tbody>
                                    @endforeach
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

                {{-- end content --}}


            </section>

        </div>
    </div>


    <!-- jQuery -->
@endsection
