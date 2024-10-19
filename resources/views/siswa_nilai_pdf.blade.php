<!DOCTYPE html>
<html>
<head>
    <title>PDF Export - Data Siswa Nilai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h4>Nama: {{ $siswa->nama_siswa }}</h4>
    <h4>Kelas: {{ $siswa->kelas->nama_kelas }}</h4>
    <h4>Jurusan: {{ $siswa->kk->nama_kk }}</h4>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Mata Pelajaran</th>
                <th>Nilai Angka</th>
                <th>Nilai Huruf</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataNilai as $key => $nilai)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $nilai->md->nama_md }}</td>
                <td>{{ $nilai->nilai_angka }}</td>
                <td>{{ $nilai->nilai_huruf }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
