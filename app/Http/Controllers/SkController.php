<?php

namespace App\Http\Controllers;

use App\Models\Sk;
use App\Models\Kk;
use App\Models\Kelas;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sks = Sk::all(); // Fetch all Sk entities

        return view('sk.index', compact('sks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kks = Kk::all(); // Corrected: Use correct case for class name
        $kelases = Kelas::all(); // Corrected: Use correct case for class name

        return view('sk.create', compact('kks', 'kelases'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kk'   => 'required',
            'kelas'     => 'required',
            'nama_sk'   => 'required',
        ]);

        Sk::create([
            'kk_id'         => $request->input('nama_kk'), // Use input method of request
            'kelas_id'      => $request->input('kelas'), // Use input method of request
            'nama_sk'       => $request->input('nama_sk'), // Use input method of request
        ]);

        return redirect()->route('sk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sk $sk)
    {
        // You can add code to display the details of a specific Sk if needed
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sk $sk)
    {
        // You can add code to show the edit form for a specific Sk if needed
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kk'   => 'required',
            'kelas'     => 'required',
            'nama_sk'   => 'required',
        ]);

        DB::table('sks')->where('id', $id)->update([
            'kk_id'         => $request->input('nama_kk'), // Use input method of request
            'kelas_id'      => $request->input('kelas'), // Use input method of request
            'nama_sk'       => $request->input('nama_sk'), // Use input method of request
        ]);

        return redirect()->route('sk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('sks')->where('id', $id)->delete(); // Corrected: Use delete method instead of delet

        return redirect()->route('sk.index');
    }
}
