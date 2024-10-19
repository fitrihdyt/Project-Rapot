@extends('master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 text-center" style="background-color: #656d4a; border-radius: 20px; padding: 10px; color: white;">
                <h1 style="font-weight: bold;">Siswa</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary" style="background-color: #a3b18a; border-radius: 10px;">
                    <form action="{{ route('siswa.store', ['id' => 1]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_siswa">Nama</label>
                                <input type="text" name="nama_siswa" id="nama_siswa" class="form-control"
                                    placeholder="">
                            </div>
                            @error('nama_siswa')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="number" name="nisn" id="nisn" class="form-control" placeholder="">
                            </div>
                            @error('nisn')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <label>Jenis Kelamin</label>
                            <select type="text" id="jk" name="jk" class="form-control">
                                <option value="P">Perempuan</option>
                                <option value="L">Laki laki</option>
                            </select>
                            @error('jk')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="">
                            </div>
                            @error('tgl_lahir')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" name="alamat" id="alamat" cols="30" rows="10"
                                    class="form-control" placeholder="alamat Film"> </textarea>
                            </div>
                            @error('alamat')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="kelas_id">Kelas</label>
                                <select name="kelas_id" id="kelas_id" class="form-control">
                                    <option disabled>---Pilih Salah Satu---</option>
                                    @forelse ($kelases as $key => $value)
                                    <option value="{{ $value->id}}"> {{ $value->kelas}}</option>
                                    @empty
                                    <option disabled>Data Masih Kosong</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kelas_id">Nama Kelas</label>
                                <select name="kelas_id" id="kelas_id" class="form-control">
                                    <option disabled>---Pilih Salah Satu---</option>
                                    @forelse ($kelases as $key => $value)
                                    <option value="{{ $value->id}}"> {{ $value->nama_kelas}}</option>
                                    @empty
                                    <option disabled>Data Masih Kosong</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kk_id">Jurusan</label>
                                <select name="kk_id" id="kk_id" class="form-control">
                                    <option disabled>---Pilih Salah Satu---</option>
                                    @forelse ($kks as $key => $value)
                                    <option value="{{ $value->id}}"> {{ $value->nama_kk}}</option>
                                    @empty
                                    <option disabled>Data Masih Kosong</option>
                                    @endforelse
                                </select>
                            </div>
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