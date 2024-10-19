@extends('master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 text-center" style="background-color: #376996; border-radius: 20px; padding: 10px; color: white;">
                <h1 style="font-weight: bold;">Mata Diklat</h1>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary" style="background-color: #829cbc; border-radius: 10px;">
                    <form action="{{ route('md.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_md">Nama Mata Diklat</label>
                                <input type="text" name="nama_md" id="nama_md" class="form-control" placeholder="">
                            </div>
                            @error('nama_md')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group d-flex">
                                <a href="{{ URL::previous() }}" class="btn btn-default mr-2">Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

@endsection