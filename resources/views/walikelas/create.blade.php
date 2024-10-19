@extends('master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Guru</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Guru</li>
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
                        <h3 class="card-title">Form Guru</h3>
                    </div>
                    <form action="{{ route('walikelas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_guru">Guru</label>
                                <select name="nama_guru" id="nama_guru" class="form-control">
                                    <option disabled>---Pilih Salah Satu---</option>
                                    @forelse ($gurus as $key => $value)
                                    <option value="{{ $value->id}}"> {{ $value->nama_guru}}</option>
                                    @empty
                                    <option disabled>Data Masih Kosong</option>
                                    @endforelse
                                </select>
                                <label for="nama_role">Role</label>
                                <select name="nama_role" id="nama_role" class="form-control">
                                    <option disabled>---Pilih Salah Satu---</option>
                                    @forelse ($roles as $key => $value)
                                    <option value="{{ $value->id}}"> {{ $value->nama_role}}</option>
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

@endsection