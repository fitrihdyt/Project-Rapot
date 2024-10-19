@extends('master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 text-center" style="background-color: #656d4a; border-radius: 20px; padding: 10px; color: white;">
                <h1 style="font-weight: bold;">Guru</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary" style="background-color: #a3b18a; border-radius: 10px;">
                    <form action="{{ route('guru.update', ['guru' => $guru->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_guru">Nama</label>
                                <input type="text" name="nama_guru" id="nama_guru" class="form-control" value="{{ $guru->nama_guru }}">
                            </div>
                            @error('nama_guru')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="number" name="nip" id="nip" class="form-control" value="{{ $guru->nip }}">
                            </div>
                            @error('nip')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="nama_md">Mata Diklat</label>
                                <select name="nama_md" id="nama_md" class="form-control">
                                    <option disabled>---Pilih Salah Satu---</option>
                                    @forelse ($mds as $key => $value)
                                        <option value="{{ $value->id }}" @if($value->id === $guru->nama_md) selected @endif>{{ $value->nama_md }}</option>
                                    @empty
                                        <option disabled>Data Masih Kosong</option>
                                    @endforelse
                                </select>
                            </div>
                            @error('md')
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
