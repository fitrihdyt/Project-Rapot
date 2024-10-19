@extends('master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 text-center" style="background-color: #973aa8; border-radius: 20px; padding: 10px; color: white;">
                <h1 style="font-weight: bold;">Nilai</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <div class="card card-primary" style="background-color: #b298dc; border-radius: 10px;">
                    @if($datasiswa)
                        <form action="{{ route('nilai.store', $datasiswa->id) }}" method="POST">
                        @csrf
                            <div class="card-body">
                                <label for="nama_sk">KKM</label>
                                <select name="sk_id" id="sk_id" class="form-control">
                                    <option disabled selected>---Pilih Salah Satu---</option>
                                    @forelse ($sks as $sk)
                                    <option value="{{ $sk->id }}">{{ $sk->nama_sk }}</option>
                                    @empty
                                    <option disabled>Data Masih Kosong</option>
                                    @endforelse
                                </select>
                                <label for="nama_md">Mata Diklat</label>
                                <select name="md_id" id="md_id" class="form-control">
                                    <option disabled selected>---Pilih Salah Satu---</option>
                                    @forelse ($mds as $md)
                                    <option value="{{ $md->id }}">{{ $md->nama_md }}</option>
                                    @empty
                                    <option disabled>Data Masih Kosong</option>
                                    @endforelse
                                </select>
                                <label for="nama_guru">Guru</label>
                                <select name="guru_md" id="guru_md" class="form-control">
                                    <option disabled selected>---Pilih Salah Satu---</option>
                                    @forelse ($gurus as $guru)
                                    <option value="{{ $guru->id }}">{{ $guru->nama_guru }}</option>
                                    @empty
                                    <option disabled>Data Masih Kosong</option>
                                    @endforelse
                                </select>
                                <div class="form-group">
                                    <label for="nilai_angka">Nilai Angka</label>
                                    <input type="number" name="nilai_angka" id="nilai_angka" class="form-control"
                                        placeholder="">
                                </div>
                                @error('nilai_angka')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="nilai_huruf">Nilai Huruf</label>
                                    <input type="text" name="nilai_huruf" id="nilai_huruf" class="form-control" readonly placeholder="">
                                </div>
                                @error('nilai_huruf')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group d-flex">
                                    <a href="{{ URL::previous() }}" class="btn btn-default mr-2">Back</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    @else
                        <p>Data siswa tidak ditemukan.</p>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nilaiAngkaInput = document.getElementById('nilai_angka');
            const nilaiHurufInput = document.getElementById('nilai_huruf');

            nilaiAngkaInput.addEventListener('change', function() {
                // Ambil nilai angka yang dimasukkan
                const nilaiAngka = parseInt(this.value);

                // Tentukan logika konversi dari nilai angka ke nilai huruf
                let nilaiHuruf = '';
                if (nilaiAngka >= 90 && nilaiAngka <= 100) {
                    nilaiHuruf = 'A';
                } else if (nilaiAngka >= 77 && nilaiAngka <= 89) {
                    nilaiHuruf = 'B';
                } else if (nilaiAngka >= 61 && nilaiAngka <= 76) {
                    nilaiHuruf = 'C';
                } else if (nilaiAngka >= 1 && nilaiAngka <= 60) {
                    nilaiHuruf = 'E';
                }

                // Tampilkan nilai huruf pada input nilai_huruf
                nilaiHurufInput.value = nilaiHuruf;
            });
        });
    </script>
</section>
</div>

@endsection