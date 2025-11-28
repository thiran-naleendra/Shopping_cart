@extends('layouts.app')

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
                    <h3 class="card-title">Add Promotions</h3>
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

                    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Promotion Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" id="image"
                                        placeholder="Choose image for Promotion">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="reset" name="reset" value="Reset" class="btn btn-dark">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </div>
                </form>
                <!-- view tabale -->
                <div class="row">
                    <div class="col-sm-12 form-grop">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Promotions List</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="dataTabl">
                                    <thead>
                                        <tr>
                                            <th>Promotion Name</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($promotions as $promo)
                                            <tr>
                                                <td><a>{{ $promo->name }}</a></td>
                                                <td>{{ $promo->description }}</td>
                                                <td style="text-align: center;"><img
                                                        src="{{ asset('images/'. $promo->image) }}" width='60'
                                                        height='60' class="img img-responsive" />
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col">
                                                            <a href="{{ route('edit', ['id' => $promo->id]) }}"
                                                                class="btn btn-default btn-sm btn-flat"
                                                                style="width: 100%">Edit</a>
                                                        </div>
                                                        {{-- delete --}}
                                                        <div class="col">
                                                            <form
                                                                action="{{ route('destroy', ['id' => $promo->id]) }}"
                                                                method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <input type="hidden" class="form-control"
                                                                    name="id" id="id" value="">
                                                                <button type="submit"
                                                                    onclick="return confirm('Are you sure you want to delete the Promotion ?')"
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

@endsection
