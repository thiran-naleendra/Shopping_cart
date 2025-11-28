@extends('AdminDashboard.app')

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/style.css">




</head>

@php
    use Illuminate\Support\Facades\Auth;

@endphp

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
                                <li class="breadcrumb-item"><a href="#">Reports</a></li>
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
                        <h3 class="card-title">Delivary Reports</h3>
                    </div>
                </div>


                <table id="dataTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Item Name</th>
                            <th>Customer</th>
                            <th>Quntity</th>
                            <th>Price</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $sl)
                            <tr>
                                <td>{{ $sl->id }}</td>
                                <td>{{ $sl->item_name }}</td>
                                <td>{{ $sl->user_name }}</td>
                                <td>{{ $sl->qty }}</td>
                                <td>{{ $sl->price * $sl->qty }}</td>
                                <td>
                                    <form action="{{ route('updateStatus', $sl->id) }}" method="POST">
                                        @csrf
                                        <select name="status" class="form-control form-select" onchange="this.form.submit(); changeColor(this)">
                                            <option value="1" {{ $sl->status == 1 ? 'selected' : '' }} data-color="yellow">Pending</option>
                                            <option value="2" {{ $sl->status == 2 ? 'selected' : '' }} data-color="green">Delivered</option>
                                            <option value="3" {{ $sl->status == 3 ? 'selected' : '' }} data-color="red">Canceled</option>
                                        </select>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>





                {{-- end content --}}

            </section>


        </div>
    </div>

    <script>
        // Function to change background color of selected option
        function changeColor(select) {
            // Get all options inside the select element
            var options = select.options;
    
            // Loop through all options and remove any previous background color
            for (var i = 0; i < options.length; i++) {
                options[i].style.backgroundColor = '';  // Reset background color
            }
    
            // Get the selected option's color and set it as the background color
            var color = select.options[select.selectedIndex].getAttribute('data-color');
            select.options[select.selectedIndex].style.backgroundColor = color;  // Set the color of the selected option
        }
    
        // Apply color for the initially selected option when the page loads
        window.onload = function() {
            var selectElement = document.querySelector('select[name="status"]');
            changeColor(selectElement);  // Call the function when the page loads
        }
    </script>
@endsection
