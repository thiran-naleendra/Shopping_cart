@extends('layouts.app')
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
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                        <h3 class="card-title">Edit Menu</h3>
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
                        {{-- @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
          </div>
          @endif --}}
                        <form action="{{ route('menu_update', ['id' => $menu->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- hidden id field -->


                            <input type="hidden" name="id" value="{{ $menu->id }}">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Menu Name</label>
                                        <input type="text" class="form-control" placeholder="Enter menu name"
                                            name="name" id="name" value="{{ $menu->name }}">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Menu Code</label>
                                        <input type="text" class="form-control" placeholder="Enter menu code"
                                            name="code" id="code" value="{{ $menu->code }}">
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
                                                    {{ $menu->category_id == $Categorys->id ? 'selected' : '' }}>
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
                                            placeholder="Price" value="{{ $menu->price }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- old price -->
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Old Price</label>
                                        <p>LKR {{ $menu->old_price }}/=</p>
                                        <input type="text" class="form-control" name="old_price" id="old_price"
                                            placeholder="old price" value="{{ $menu->price }}" hidden>
                                    </div>
                                </div>
                                <!-- old price -->

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="tel" name="description" id="description" placeholder="Description"
                                            value="{{ $menu->description }}">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>QTY</label>
                                        <input type="tel" name="qty" id="qty" placeholder="qty"
                                            value="{{ $menu->qty }}">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div>
                                            <img src="{{ asset('uploads/menu/' . $menu->image) }}" width= '60'
                                                height='60' class="img img-responsive" />
                                            <input type="file" name="image" id="image"
                                                placeholder="Choose image for menu"
                                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                        </div>
                                    </div>
                                </div>


                                <!-- image end -->
                            </div>
                            <div class="form-group">
                                <input type="reset" name="reset" value="Reset" class="btn btn-dark">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </div>
                    </form>
                </div>
            </section>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

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
