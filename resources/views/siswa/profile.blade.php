@extends('master')

@push('css')
<link rel="stylesheet" href="{{ asset('/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endpush

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Siswa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Profile Siswa</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('wm.create') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-plus"></i>
                            Data
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="dataTables" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama</td>
                                    <td>Nomor Induk Siswa Nasional</td>
                                    <td>Tempat, tanggal lahir</td>
                                    <td>Jenis Kelamin</td>
                                    <td>Alamat Siswa</td>
                                    <td>Nama Ayah</td>
                                    <td>Nama Ibu</td>
                                    <td>Pekerjaan Ayah</td>
                                    <td>Pekerjaan Ibu</td>
                                    <td>Alamat Wali</td>
                                    <td>Nomor Telepon Rumah</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswas as $key => $value)
                                <tr>
                                <th>{{ $key + 1 }}</th>
                                <th>{{ $value->nama }}</th>
                                <th>{{ $value->nisn }}</th>
                                <th>{{ $value->ttl }}</th>
                                <th>{{ $value->jk }}</th>
                                <th>{{ $value->alamat }}</th>
                                <th>{{ $value->nama_ayah }}</th>
                                <th>{{ $value->nama_ibu }}</th>
                                <th>{{ $value->pekerjaan_ayah }}</th>
                                <th>{{ $value->pekerjaan_ibu }}</th>
                                <th>{{ $value->alamat_wali }}</th>
                                <th>{{ $value->no_telp_wali }}</th>
                                    <td class="d-flex" style="gap:10px">
                                        <a href="{{ route('siswa.show', $value->id) }}"
                                            class="btn btn-small btn-info">Nilai</a>
                                        <a href="{{ route('siswa.edit', $value->id) }}"
                                            class="btn btn-small btn-warning">Edit</a>
                                        <form action="{{ route('siswa.destroy', $value->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="sumbit" class="btn btn-small btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('script')
<!-- DataTables  & Plugins -->
<script src="{{ asset('/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
$(function() {
    $('#dataTables').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>
@endpush