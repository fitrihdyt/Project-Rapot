@extends('master')

@section('content')
    <style>
        /* Gaya untuk card (luar tabel) */
        .outer-card {
            background-color: #9e2a2b;
            border: none;
        }

        /* Gaya untuk tabel di dalam card */
        .inner-table {
            background-color: #ffffff; /* Warna putih untuk latar belakang tabel */
        }
    </style>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 text-center" style="background-color: #540b0e; border-radius: 20px; padding: 10px; color: white;">
                <h1 style="font-weight: bold;">Nilai</h1>
            </div>
        </div>
    </div>
</section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card outer-card">
                        <div class="card-header" style="color: white;">
                            <h2 style="font-weight: bold;">{{ $siswa->nama_siswa }}</h2>
                        </div>
                        <div class="card-body">
                            @can('isGuru')
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                    <a href="{{ route('nilai.create', $siswa->id) }}" class="btn btn-sm btn-primary">
                                        Add More
                                    </a>
                                </div>
                                @endcan
                            <table id="dataTables" class="table table-bordered table-hover inner-table">
                            @can('isAdmin')
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Mata Diklat</th>
                                        <th>KKM</th>
                                        <th>Nilai Angka</th>
                                        <th>Nilai Huruf</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            @endcan

                            @can('isGuru')
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Mata Diklat</th>
                                        <th>KKM</th>
                                        <th>Nilai Angka</th>
                                        <th>Nilai Huruf</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            @endcan

                            @can('isWalikelas')
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Mata Diklat</th>
                                        <th>KKM</th>
                                        <th>Nilai Angka</th>
                                        <th>Nilai Huruf</th>
                                    </tr>
                                </thead>
                            @endcan
                                <tbody>
                                    @foreach($nilaiSiswa as $key => $nilai)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $nilai->md->nama_md }}</td>
                                            <td>{{ $nilai->sk->nama_sk }}</td>
                                            <td>{{ $nilai->nilai_angka }}</td>
                                            <td>{{ $nilai->nilai_huruf }}</td>
                                            @can('isAdmin')
                                            <td class="d-flex" style="gap: 5px;">
                                                    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            @endcan

                                            @can('isGuru')
                                            <td class="d-flex" style="gap: 5px;">
                                                    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                            </td>
                                            @endcan
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-small">Back</a>
                            @can('isAdmin')
                                <a href="{{ route('siswa.exportPdfNilai', $siswa->id) }}" class="btn btn-primary">Export to PDF</a>
                            @endcan
                            @can('isWalikelas')
                                <a href="{{ route('siswa.exportPdfNilai', $siswa->id) }}" class="btn btn-primary">Export to PDF</a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
