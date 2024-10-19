@extends('master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 text-center" style="background-color: #656d4a; border-radius: 20px; padding: 10px; color: white;">
                <h1 style="font-weight: bold;">Mata Diklat</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <form action="{{ route('teaching.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="teacher">Nama Mata Diklat</label>
                                <select name="mapel" id="mapel" class="form-control" readonly>
                                    @foreach ($mapels as $key => $value)
                                        <option value="{{ $value->id }}" {{ $value->id == $md ? 'selected' : ''}}> {{ $value->nama_md }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('mapel')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group">
                                <label for="teacher">Nama Guru</label>
                                <select name="guru" id="guru" class="form-control">
                                    <option value="">--Pilih Guru--</option>
                                    @foreach ($gurus as $key => $value)
                                        <option value={{ $value->id }}> {{ $value->nama_guru }}</option>
                                    @endforeach

                                </select>
                            </div>
                            @error('guru')
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