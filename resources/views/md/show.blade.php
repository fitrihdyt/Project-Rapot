@extends('master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 text-center" style="background-color: #2d3142; border-radius: 20px; padding: 10px; color: white;">
                <h1 style="font-weight: bold;">{{ $md->nama_md }}</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('teaching.create', $md->id) }}" class="btn btn-sm btn-info">
                            <i class="fas fas-plus"></i> Add More
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <h2 style="background-color: #4f5d75; padding: 10px; text-align: center; color: white;">Guru yang Mengajar</h2>
                    <ul class="list-group">
                        @forelse ($md->guru()->get() as $guru)
                            <li class="list-group-item">{{ $guru->nama_guru }}</li>
                        @empty
                            <li class="list-group-item">Tidak ada guru yang mengajar mata diklat ini.</li>
                        @endforelse
                    </ul>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-secondary mr-2">Back</a>
            </div>
        </div>
    </div>
</section>
@endsection