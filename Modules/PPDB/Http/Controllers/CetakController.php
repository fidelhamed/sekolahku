<?php

namespace Modules\PPDB\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use PDF;

class CetakController extends Controller
{
    // Cetak Kartu Ujian
    public function cetakKartu()
    {
        // // Ambil data murid
        $murid = User::with('muridDetail')->where('id',Auth::id())->first();

        $pdf = PDF::loadView('ppdb::backend.pendaftaran.cetakKartuUjian', ['cetak' => $murid])->setPaper('A4', 'portrait');
        // $user = User::find(Auth::user()->id);
        
        // $pdf = PDF::loadview('ppdb::backend.pendaftaran.cetakKartuUjian', [
        //     'user' => $user,
        //     'murid' => dataMurid::where('user_id', $user->id)->first(),
        //     'berkas' => BerkasMurid::where('user_id', $user->id)->first(),
        // ])->setPaper('A4', 'portrait');

        return $pdf->stream('Kartu-Ujian-' . Auth::id() . '-' . Auth::user()->username . '.pdf', array('Content-Type' => 'application/pdf'));    }

    // Cetak surat kelulusan
    public function cetakKelulusan()
    {
        // Ambil data murid
        $murid = User::with('muridDetail')->where('id',Auth::id())->first();

        $pdf = PDF::loadView('ppdb::backend.pendaftaran.cetakSuratKelulusan', ['cetak' => $murid])->setPaper('A4', 'portrait');

        return $pdf->stream(Carbon::now()->format('Ymd') . '_Surat_Kelulsan_' . Auth::id() . '_' . Auth::user()->username . '.pdf', array('Content-Type' => 'application/pdf'));
    }
}
