@extends('master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 text-center" style="background-color: #376996; border-radius: 20px; padding: 10px; color: white;">
                <h1 style="font-weight: bold;">Kelas</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary" style="background-color: #829cbc; border-radius: 10px;">
                    <form action="{{ route('kelas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <label>Kelas</label>
                            <select type="text" id="kelas" name="kelas" class="form-control">
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                            @error('kelas')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <label>Nama Kelas</label>
                            <select type="text" id="nama_kelas" name="nama_kelas" class="form-control">
                                <option value="RPL 1">RPL 1</option>
                                <option value="RPL 2">RPL 2</option>
                                <option value="TKJ 1">TKJ 1</option>
                                <option value="TKJ 2">TKJ 2</option>
                            </select>
                            @error('nama_kelas')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="jumlah_siswa">Jumlah Siswa</label>
                                <input type="number" name="jumlah_siswa" id="jumlah_siswa" class="form-control"
                                    placeholder="">
                            </div>
                            @error('jumlah_siswa')
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

@endsection