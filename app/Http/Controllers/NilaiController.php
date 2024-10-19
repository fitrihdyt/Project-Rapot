<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Md;
use App\Models\Nilai;
use App\Models\Sk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($siswa)
    {
        $datasiswa = Siswa::findOrFail($siswa);
        $sks = Sk::all();
        $mds = Md::all();
        $gurus = Guru::all();

        return view('nilai.create', compact('datasiswa', 'mds', 'gurus', 'sks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $siswa_id)
    {
        $request->validate([
            'sk_id'         => 'required',
            'md_id'         => 'required',
            'guru_md'       => 'required',
            'nilai_angka'   => 'required',
            'nilai_huruf'   => 'required', // Pastikan input nilai huruf ada di form
        ]);
    
        Nilai::create([
            'siswa_id'      => $siswa_id,
            'sk_id'         => $request->sk_id,
            'md_id'         => $request->md_id,
            'guru_id'       => $request->guru_md,
            'nilai_angka'   => $request->nilai_angka,
            'nilai_huruf'   => $request->nilai_huruf, // Pastikan nilai huruf disimpan dari input form
        ]);
    
        return redirect()->route('siswa.show', $siswa_id)->with('success', 'Nilai siswa berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nilai $nilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nilai $nilai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nilai $nilai)
    {
        //
    }

    public function showBySiswa($siswaId)
    {
        $dataNilai = Nilai::where('siswa_id', $siswaId)->get();
        return view('show.siswa', compact('dataNilai'));
    }
}