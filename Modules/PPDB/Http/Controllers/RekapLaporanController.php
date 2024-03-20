<?php

namespace Modules\PPDB\Http\Controllers;

use App\Models\User;
use App\Models\DataMurid;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Carbon\Carbon;
use PDF;

class RekapLaporanController extends Controller
{
    public function index() 
    {
        return view('ppdb::backend.rekapLaporan.index');
    }

    public function update(Request $request)
    {
        $jenjang = $request->jenjang;
        $status = $request->status;

        $murid = User::has('muridDetail')
        ->whereHas('muridDetail', function ($a) use ($jenjang) {
            $a->where('jenjang', $jenjang);
        })
        ->with('muridDetail')
        ->where('role', $status)
        ->get();

        $pdf = PDF::loadView('ppdb::backend.rekapLaporan.cetakLaporan', [
            'cetak' => $murid,
            'jenjang' => $jenjang,
            'status' => $status
            ])->setPaper('A4', 'portrait');

        return $pdf->stream(Carbon::now()->format('Ymd') . '_Rekap_Laporan_' . $jenjang . '_' . $status . '.pdf', array('Content-Type' => 'application/pdf'));
    }
}
