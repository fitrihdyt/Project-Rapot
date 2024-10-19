@extends('master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 text-center" style="background-color: #376996; border-radius: 20px; padding: 10px; color: white;">
                <h1 style="font-weight: bold;">Standar Kompetensi</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary" style="background-color: #829cbc; border-radius: 10px;">
                    <form action="{{ route('sk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                            <label for="kelas">Kelas</label>
                                <select name="kelas" id="kelas" class="form-control">
                                    <option disabled selected>---Pilih Salah Satu---</option>
                                    @forelse ($kelases as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                                    @empty
                                    <option disabled>Data Masih Kosong</option>
                                    @endforelse
                                </select>
                            <label for="nama_kk">Kompetensi Keahlian</label>
                                <select name="nama_kk" id="nama_kk" class="form-control">
                                    <option disabled selected>---Pilih Salah Satu---</option>
                                    @forelse ($kks as $kk)
                                    <option value="{{ $kk->id }}">{{ $kk->nama_kk }}</option>
                                    @empty
                                    <option disabled>Data Masih Kosong</option>
                                    @endforelse
                                </select>
                            <div class="form-group">
                                <label for="nama_sk">Standar Kompetensi</label>
                                <input type="number" name="nama_sk" id="nama_sk" class="form-control"
                                    placeholder="">
                                </div>
                                @error('nama_sk')
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