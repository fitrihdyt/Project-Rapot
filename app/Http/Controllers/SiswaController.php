<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Kk;
use App\Models\Sk;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\SiswaNilai;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::all(); // Mengambil data siswa dari database atau query yang sesuai
        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kelases = kelas::all();
        $kks = kk::all();

        return view('siswa.create', compact('kelases', 'kks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_siswa'    => 'required',
            'nisn'          => 'required',
            'jk'            => 'required',
            'tgl_lahir'     => 'required',
            'alamat'        => 'required',
            'kelas_id'      => 'required', // sesuaikan validasi sesuai kebutuhan
            'kk_id'         => 'required', // sesuaikan validasi sesuai kebutuhan
        ]);

        Siswa::create([
            'nama_siswa'    => $request['nama_siswa'],
            'nisn'          => $request['nisn'],
            'jk'            => $request['jk'],
            'tgl_lahir'     => $request['tgl_lahir'],
            'alamat'        => $request['alamat'],
            'kelas_id'      => $request['kelas_id'], // disesuaikan dengan nama kolom yang ada di tabel siswas
            'kk_id'         => $request['kk_id'], // disesuaikan dengan nama kolom yang ada di tabel siswas
        ]);

        return redirect()->route('siswa.index');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        
        // Ambil data nilai siswa dari model Nilai berdasarkan siswa_id
        $nilaiSiswa = Nilai::where('siswa_id', $id)->get();

        return view('siswa.show', compact('siswa', 'nilaiSiswa'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $siswa = Siswa::findOrFail($id);
        $kelases = Kelas::all();
        $kks = Kk::all();

        return view('siswa.edit', compact('siswa', 'kelases', 'kks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama_siswa'    => 'required',
            'nisn'          => 'required',
            'jk'            => 'required',
            'tgl_lahir'     => 'required',
            'alamat'        => 'required',
            'kelas_id'      => 'required', // Validasi sesuaikan dengan kebutuhan, pastikan nama field benar
            'kk_id'         => 'required', // Validasi sesuaikan dengan kebutuhan, pastikan nama field benar
        ]);

        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            'nama_siswa' => $request->nama_siswa,
            'nisn' => $request->nisn,
            'jk' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'kelas_id' => $request->kelas_id, // Ubah ke kelas_id yang sesuai dengan field di tabel siswa
            'kk_id' => $request->kk_id, // Ubah ke kk_id yang sesuai dengan field di tabel siswa
        ]);

        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $query = DB::table('siswas')->where('id', $id)->delete();
        return redirect()->route('siswa.index');
    }

    public function exportPdfNilai($siswaId)
    {
        $siswa = Siswa::find($siswaId);
        $dataNilai = Nilai::where('siswa_id', $siswaId)->get();
        
        $pdf = PDF::loadView('siswa_nilai_pdf', compact('siswa', 'dataNilai'));
        
        return $pdf->download('nilai_siswa_'.$siswaId.'.pdf');
    }
}
