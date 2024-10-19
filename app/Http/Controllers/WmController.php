<?php

namespace App\Http\Controllers;

use App\Models\Wm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $wms = DB::table('wms')->get();
        return view('wm.index', compact('wms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('wm.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama'              => 'required',
            'nisn'              => 'required',
            'ttl'               => 'required',
            'jk'                => 'required',
            'alamat'            => 'required',
            'nama_ayah'         => 'required',
            'nama_ibu'          => 'required',
            'pekerjaan_ayah'    => 'required',
            'pekerjaan_ibu'     => 'required',
            'alamat_wali'       => 'required',
            'no_telp_wali'      => 'required',
        ]);

        $query = DB::table('wms')->insert([
            'nama'              => $request['nama'],
            'nisn'              => $request['nisn'],
            'ttl'               => $request['ttl'],
            'jk'                => $request['jk'],
            'alamat'            => $request['alamat'],
            'nama_ayah'         => $request['nama_ayah'],
            'nama_ibu'          => $request['nama_ibu'],
            'pekerjaan_ayah'    => $request['pekerjaan_ayah'],
            'pekerjaan_ibu'     => $request['pekerjaan_ibu'],
            'alamat_wali'       => $request['alamat_wali'],
            'no_telp_wali'      => $request['no_telp_wali'],
        ]);

        return redirect()->route('wm.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wm $wm)
    {
        //
        $wms = DB::table('wms')->where('id', $wm->id)->get();
        return view('wm.show', compact('wms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wm $wm)
    {
        //
        $query = DB::table('wms')->where('id', $id)->delete();
        return redirect()->route('wm.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wm $wm)
    {
        //
        $request->validate([
            'nama'              => 'required',
            'nisn'              => 'required',
            'ttl'               => 'required',
            'jk'                => 'required',
            'alamat'            => 'required',
            'nama_ayah'         => 'required',
            'nama_ibu'          => 'required',
            'pekerjaan_ayah'    => 'required',
            'pekerjaan_ibu'     => 'required',
            'alamat_wali'       => 'required',
            'no_telp_wali'      => 'required',
        ]);

        $query = DB::table('wms')->where('id', $id)->update([
            'nama'              => $request['nama'],
            'nisn'              => $request['nisn'],
            'ttl'               => $request['ttl'],
            'jk'                => $request['jk'],
            'alamat'            => $request['alamat'],
            'nama_ayah'         => $request['nama_ayah'],
            'nama_ibu'          => $request['nama_ibu'],
            'pekerjaan_ayah'    => $request['pekerjaan_ayah'],
            'pekerjaan_ibu'     => $request['pekerjaan_ibu'],
            'alamat_wali'       => $request['alamat_wali'],
            'no_telp_wali'      => $request['no_telp_wali'],
        ]);

        return redirect()->route('wm.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $query = DB::table('wms')->where('id', $id)->delete();
        return redirect()->route('wm.index');
    }
}
