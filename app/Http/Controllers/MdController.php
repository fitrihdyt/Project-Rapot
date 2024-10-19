<?php

namespace App\Http\Controllers;

use App\Models\Md;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $mds = DB::table('mds')->get();
        return view('md.index', compact('mds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('md.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_md'  => 'required',
        ]);

        $query = DB::table('mds')->insert([
            'nama_md'  => $request['nama_md'],
        ]);

        return redirect()->route('md.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Md $md)
    {
        return view('md.show', compact('md'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Md $md)
    {
        //
        $query = DB::table('mds')->where('id', $id)->delete();
        return redirect()->route('md.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Md $md)
    {
        //
        $request->validate([
            'nama_md'  => 'required',
        ]);

        $query = DB::table('mds')->where('id', $id)->update([
            'nama_md'  => $request['nama_md'],
        ]);

        return redirect()->route('md.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $query = DB::table('mds')->where('id', $id)->delete();
        return redirect()->route('md.index');
    }
}
