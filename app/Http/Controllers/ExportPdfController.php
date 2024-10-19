<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\SiswaNilai;
use PDF;

class ExportPdfController extends Controller
{
    //
    public function exportPdfNilai($siswaId)
    {
        $dataNilai = Nilai::where('siswa_id', $siswaId)->get();
        
        // Contoh generate PDF dengan Dompdf
        $pdf = PDF::loadView('pdf.nilai', compact('dataNilai'));
        
        return $pdf->download('nilai_siswa_'.$siswaId.'.pdf');
    }
}
