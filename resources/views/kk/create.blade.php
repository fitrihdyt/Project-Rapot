@extends('master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 text-center" style="background-color: #656d4a; border-radius: 20px; padding: 10px; color: white;">
                <h1 style="font-weight: bold;">Kompetensi Keahlian</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary" style="background-color: #a3b18a; border-radius: 10px;">
                    <form action="{{ route('kk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_kk">Nama Kompetensi Keahlian</label>
                                <input type="text" name="nama_kk" id="nama_kk" class="form-control" placeholder="">
                            </div>
                            @error('nama_kk')
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