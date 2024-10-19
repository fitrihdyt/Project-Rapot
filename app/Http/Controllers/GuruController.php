<?php

namespace App\Http\Controllers;

use App\Models\Md;
use App\Models\Guru;
use App\Models\GuruMapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $gurus = Guru::all();

        return view('guru.index', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $mds = md::all();

        return view('guru.create', compact('mds'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required',
            'nip'       => 'required',
            'nama_md'   => 'required',
        ]);

        Guru::create([
            'nama_guru' => $request['nama_guru'],
            'nip'       => $request['nip'],
            'nama_md'   => $request['nama_md'],
            'md_id'     => $request['nama_md'],
        ]);

        return redirect()->route('guru.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        //
        $gurus = DB::table('gurus')->where('id', $guru->id)->get();

        return view('guru.show', compact('gurus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $guru = Guru::findOrFail($id);

        $mds = Md::all();

        return view('guru.edit', compact('guru', 'mds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama_guru' => 'required',
            'nip' => 'required|numeric',
            'nama_md' => 'required',
        ]);

        $guru = Guru::findOrFail($id);

        $guru->nama_guru = $request->input('nama_guru');
        $guru->nip = $request->input('nip');
        $guru->nama_md = $request->input('nama_md');

        $guru->save();

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $guru = Guru::findOrFail($id);
            $guru->delete();

            return redirect()->route('guru.index')->with('success', 'Guru record deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('guru.index')->with('error', 'Failed to delete guru record: ' . $e->getMessage());
        }
    }

    public function guruMapelCreate(Md $mataDiklat, $md){
        $mapels = $mataDiklat::all();
        $gurus = Guru::all();
        return view('guru.creategurumd', compact('mapels', 'md', 'gurus'));
    }

    public function guruMapelStore(Request $request) {
        $request->validate([
            'guru' => 'required',
        ]);
        GuruMapel::create([
            'md_id'     => $request->mapel,
            'guru_id'   => $request->guru,
        ]);

        return redirect()->route('md.show', $request->mapel);
    }
}
