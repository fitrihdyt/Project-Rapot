<?php

namespace App\Http\Controllers;

use App\Models\Kk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kks = DB::table('kks')->get();
        return view('kk.index', compact('kks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('kk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_kk'             =>  'required',
        ]);

        $query = DB::table('kks')->insert([
            'nama_kk'             =>  $request['nama_kk'],
        ]);

        return redirect()->route('kk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kk $kk)
    {
        //
        $kks = DB::table('kks')->where('id', $kk->id)->get();
        return view('kk.show', compact('kks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kk $kk)
    {
        //
        $query = DB::table('kks')->where('id', $id)->delete();
        return redirect()->route('kk.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kk $kk)
    {
        //
        $request->validate([
            'nama_kk'  => 'required',
        ]);

        $query = DB::table('kks')->where('id', $id)->update([
            'nama_kk'  => $request['nama_kk'],
        ]);

        return redirect()->route('kk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $query = DB::table('kks')->where('id', $id)->delete();
        return redirect()->route('kk.index');
    }
}
