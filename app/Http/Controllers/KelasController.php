<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kelases = DB::table('kelases')->get();
        return view('kelas.index', compact('kelases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'kelas'             =>  'required',
            'nama_kelas'        =>  'required',
            'jumlah_siswa'      =>  'required',
        ]);

        $query = DB::table('kelases')->insert([
            'kelas'             =>  $request['kelas'],
            'nama_kelas'        =>  $request['nama_kelas'],
            'jumlah_siswa'      =>  $request['jumlah_siswa'],
        ]);

        return redirect()->route('kelas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
        $kelases = DB::table('kelases')->where('id', $kelas->id)->get();
        return view('kelas.show', compact('kelases'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);

        return view('kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kelas)
    {
        //
        $request->validate([
            'kelas' => 'required',
            'nama_kelas' => 'required',
            'jumlah_siswa' => 'required',
        ]);

        $kelas = Kelas::findOrFail($kelas);
        $kelas->nama_kelas = $request->input('nama_kelas');
        $kelas->jumlah_siswa = $request->input('jumlah_siswa');

        $kelas->save();

        return redirect()->route('kelas.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 
        DB::table('siswas')->where('kelas_id', $id)->delete();
        
        DB::table('kelases')->where('id', $id)->delete();

        return redirect()->route('kelas.index');
    }
}
