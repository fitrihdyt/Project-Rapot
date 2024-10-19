@extends('master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data wm</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Wali Murid</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Wali Murid</h3>
                    </div>
                    <form action="{{ route('wm.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama Siswa</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="">
                            </div>
                            @error('nama')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="text" name="nisn" id="nisn" class="form-control" placeholder="">
                            </div>
                            @error('nisn')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="ttl">Tempat, tanggal lahir</label>
                                <input type="text" name="ttl" id="ttl" class="form-control" placeholder="">
                            </div>
                            @error('ttl')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <input type="text" name="jk" id="jk" class="form-control" placeholder="">
                            </div>
                            @error('jk')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="">
                            </div>
                            @error('alamat')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" name="nama_ayah" id="nama_ayah" class="form-control" placeholder="">
                            </div>
                            @error('nama_ayah')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control"
                                    placeholder="">
                            </div>
                            @error('pekerjaan_ayah')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" placeholder="">
                            </div>
                            @error('nama_ibu')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control"
                                    placeholder="">
                            </div>
                            @error('pekerjaan_ibu')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="alamat_wali">Alamat</label>
                                <textarea name="alamat_wali" name="alamat_wali" id="alamat_wali" cols="30" rows="10"
                                    class="form-control" placeholder="alamat_wali Film"> </textarea>
                            </div>
                            @error('alamat_wali')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="no_telp_wali">Nomor Telephone Wali</label>
                                <input type="number" name="no_telp_wali" id="no_telp_wali" class="form-control"
                                    placeholder="">
                            </div>
                            @error('no_telp_wali')
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