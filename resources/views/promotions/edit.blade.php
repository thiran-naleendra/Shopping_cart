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
                    <h3 class="card-title">Edit Promotion</h3>
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
                    <form action="{{ route('update', ['id' => $promotions->id]) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <!-- hidden id field -->
                        <input type="hidden" id="id" name="id" value="{{ $promotions->id }}">


                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Promotion Name</label>
                                    <input type="text" name="name" value="{{ $promotions->name }}" class="form-control"
                                    placeholder="Name">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Promotion Detail</label>
                                    <strong>Detail:</strong>
                                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $promotions->detail }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Image</label>
                                    <div>
                                        <img src="{{ asset('images/' . $promotions->image) }}" width='60'
                                            height='60' class="img img-responsive" />
                                        <input type="file" name="image" id="image"
                                            placeholder="Choose image for Promotion"
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

    </div>
</div>
