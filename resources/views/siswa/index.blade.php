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
            <div class="col-sm-12 text-center" style="background-color: #3a5a40; border-radius: 20px; padding: 10px; color: white;">
                <h1 style="font-weight: bold;">Siswa</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @can('isAdmin')
                    <div class="card-header">
                        <a href="{{ route('siswa.create') }}" class="btn btn-sm btn-primary">
                            Add More
                        </a>
                    </div>
                    @endcan
                    <div class="card-body">
                        <table id="dataTables" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kelas</th>
                                    <th>Nama Kelas</th>
                                    <th>Jurusan</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswas as $key => $value)
                                <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->kelas ? $value->kelas->kelas : 'Belum ada kelas' }}</td>
                                <td>{{ $value->kelas ? $value->kelas->nama_kelas : 'Belum ada kelas' }}</td>
                                <td>{{ $value->kk ? $value->kk->nama_kk : 'Belum ada KK' }}</td>
                                <td>{{ $value->nama_siswa }}</td>
                                <td>{{ $value->nisn }}</td>
                                <td>{{ $value->jk }}</td>
                                <td>{{ $value->tgl_lahir }}</td>
                                <td>{{ $value->alamat }}</td>
                                    <td class="d-flex" style="gap:10px">
                                        <a href="{{ route('siswa.show', $value->id) }}"
                                            class="btn btn-small btn-info">Nilai</a>
                                        @can('isAdmin')
                                        <a href="{{ route('siswa.edit', $value->id) }}"
                                            class="btn btn-small btn-warning">Edit</a>
                                        <td class="d-flex" style="gap: 5px;">
                                            <form action="{{ route('md.destroy', $value->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-small">Delete</button>
                                            </form>
                                        </td>    
                                        @endcan
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