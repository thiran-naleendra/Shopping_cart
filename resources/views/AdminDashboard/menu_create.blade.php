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
                <!-- general form elements disabled -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Item</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if ($message = \Illuminate\Support\Facades\Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        <form action="{{ route('menu_store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Item Name</label>
                                        <input type="text" class="form-control" placeholder="Enter menu name"
                                            name="name" id="item_no">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Item Code</label>
                                        <input type="text" class="form-control" placeholder="Enter menu code"
                                            name="code" id="item_no">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select
                                            class="form-select form-select-transparent @error('category_id') is-invalid @enderror"
                                            style="appearance:none;" name="category_id" id="category_id">
                                            <option value="" disabled selected hidden>Select category</option>
                                            @foreach ($Category as $Categorys)
                                                <option value="{{ $Categorys->id }}"
                                                    {{ old('category_id') == $Categorys->id ? 'selected' : '' }}>
                                                    {{ $Categorys->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" class="form-control" name="price" id="price"
                                            placeholder="Enter price">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="tel" name="description" id="description"
                                            placeholder="Enter description">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>qty</label>
                                        <input type="tel" name="qty" id="qty"
                                            placeholder="Enter description">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="image" id="image"
                                            placeholder="Choose image for menu">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="reset" name="reset" value="Reset" class="btn btn-dark">
                                <button type="submit" id="addItem" class="btn btn-primary">Submit</button>
                            </div>
                            <script>
                                // Get a reference to the button element
                                const submitButton = document.getElementById('addItem');
                              
                                // Add a click event listener to the button
                                submitButton.addEventListener('click', function() {
                                  // Display a pop-up message using the alert function
                                  alert('Sucessfully Added Item. ');
                                });
                              </script>
                    </div>
                    </form>



                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Category</h3>
                        </div>
                        <form action="{{ route('category_create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" class="form-control" placeholder="Enter category name"
                                            name="catagory_name" id="catagory_name">
                                    </div>
                                    
                                </div>
                                <div class="col-sm-3">
                                  <div class="form-group">
                                      <label>Category Discription</label>
                                      <input type="text" class="form-control" placeholder="Enter category name"
                                          name="catagory_discription" id="catagory_discription">
                                  </div>
                                  
                              </div>
                                <div class="form-group">
                                  <input type="reset" name="reset" value="Reset" class="btn btn-dark">
                                  <button type="submit" id="addCategory" class="btn btn-primary">Submit</button>
                              </div>
                            </div>
                        </form>
                    </div>
                    <script>
                        // Get a reference to the button element
                        const submitButton = document.getElementById('addCategory');
                      
                        // Add a click event listener to the button
                        submitButton.addEventListener('click', function() {
                          // Display a pop-up message using the alert function
                          alert('Sucessfully Added Category. ');
                        });
                      </script>








                    <!-- view tabale -->
                    <div class="row">
                        <div class="col-sm-12 form-grop">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Menu List</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped table-bordered" id="dataTabl">
                                        <thead>
                                            <tr>
                                                <th>Menu Name</th>
                                                <th>Menu Code</th>
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>QTY</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Menu as $menu)
                                                <tr>
                                                    <td><a>{{ $menu->name }}</a></td>
                                                    <td>{{ $menu->code }}</td>
                                                    <td>{{ $menu->category->category_name }}</td>
                                                    <td>{{ $menu->description }}</td>
                                                    <td>LKR {{ $menu->price }}</td>
                                                    <td>{{ $menu->qty }}</td>
                                                    <td style="text-align: center;"><img
                                                            src="{{ asset('uploads/menu/' . $menu->image) }}"
                                                            width= '60' height='60' class="img img-responsive" />
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col">
                                                                <a href="{{ route('menu_update', ['id' => $menu->id]) }}"
                                                                    class="btn btn-default btn-sm btn-flat"
                                                                    style="width: 100%">Edit</a>
                                                            </div>
                                                            {{-- delete --}}
                                                            <div class="col">
                                                                <form method="POST" action="{{ route('delete_menu') }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="hidden" class="form-control"
                                                                        name="id" id="id"
                                                                        value="{{ $menu->id }}">
                                                                    <button type="submit"
                                                                        onclick="return confirm('Are you sure you want to delete this item ?')"
                                                                        class="btn btn-danger btn-sm btn-flat"
                                                                        style="width: 100%">
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>


                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </section>

        </div>
    </div>

    {{-- sweet alert cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- utilites import --}}
    <script src="js/utilities.js"></script>

    {{-- custom js --}}
    <script>
        // on file input selection, validate image resolution

        $(document).ready(function() {

            // get image file input element
            let imageFileInput = $('#image');

            // on image file input file change
            imageFileInput.on("change", function() {

                if (imageFileInput.prop('files') && imageFileInput.prop('files')[0]) {

                    const selectedFile = imageFileInput.prop('files')[0];
                    const reader = new FileReader();

                    reader.onload = function(e) {

                        validateImageResolution(e.target.result, 400, 400, function(isValid) {
                            if (!isValid) {

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Resolution not optimal',
                                    text: 'Please select an image of resolution 400 x 400!',
                                })

                                imageFileInput.val(null);
                            }
                        });

                    };

                    // Read the selected file as a Data URL (base64 encoded image)
                    reader.readAsDataURL(selectedFile);
                }
            });

        });
    </script>
@endsection
