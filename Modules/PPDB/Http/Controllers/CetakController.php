<?php

namespace Modules\PPDB\Http\Controllers;

use App\Models\dataMurid;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use PDF;

class CetakController extends Controller
{
    // Cetak Kartu Ujian
    public function cetakKartu()
    {
        // Ambil data murid
        $murid = User::with('muridDetail')->where('id',Auth::id())->first();

        $pdf = PDF::loadView('ppdb::backend.pendaftaran.cetakKartuUjian', ['cetak' => $murid]);

        return $pdf->stream('Kartu-Ujian-' . Auth::id() . '-' . Auth::user()->username . '.pdf');
    }

    // Preview surat kelulusan
    public function previewKelulusan()
    {
        // Ambil data murid
        $murid = User::with('muridDetail')->where('id',Auth::id())->first();

        // Render view ke HTML
        $html = View::make('ppdb::backend.pendaftaran.previewSuratKelulusan', ['cetak' => $murid])->render();

        // Tampilkan HTML ke browser
        return response($html);

    }

    // Cetak surat kelulusan
    public function cetakKelulusan()
    {
        // Ambil data murid
        $murid = User::with('muridDetail')->where('id',Auth::id())->first();

        $pdf = PDF::loadView('ppdb::backend.pendaftaran.cetakSuratKelulusan', ['cetak' => $murid]);

        return $pdf->stream('Surat-Kelulsan-' . Auth::id() . '-' . Auth::user()->username . '.pdf');
    }
}
