<?php

namespace Modules\PPDB\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
// use App\Models\DataMurid;
// use ErrorException;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
// use Modules\PPDB\Entities\Angket;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Session;
// use Modules\PPDB\Entities\AngketAnswer;
// use Modules\PPDB\Entities\AngketResponse;

class AngketDataController extends Controller
{
    public function index()  
    {  
        $users = User::whereIn('role', ['Terverifikasi', 'Lulus', 'Tidak Lulus'])
            ->with(['angketResponses.answers.angket', 'muridDetail'])
            ->get();  
        return view('ppdb::backend.angket.angketData', compact('users'));  
    }

    public function Cetak(Request $request)
    {
        $jenjang = $request->jenjang;

        $users = User::has('muridDetail')
            ->whereHas('muridDetail', function ($a) use ($jenjang) {
                $a->where('jenjang', $jenjang);
            })
            ->whereIn('role', ['Terverifikasi', 'Lulus', 'Tidak Lulus'])
            ->with(['angketResponses.answers.angket', 'muridDetail'])
            ->get();

        $pdf = PDF::loadView('ppdb::backend.angket.cetakAngket', [
            'users' => $users,
            'jenjang' => $jenjang,
            ])->setPaper('A4', 'portrait');

        return $pdf->stream(Carbon::now()->format('Ymd') . '_Rekap_Laporan_' . $jenjang . '_' . '.pdf', array('Content-Type' => 'application/pdf'));
    }

}
