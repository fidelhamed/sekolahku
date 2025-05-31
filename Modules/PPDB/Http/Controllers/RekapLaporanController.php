<?php

namespace Modules\PPDB\Http\Controllers;

use App\Models\User;
use App\Models\DataMurid;
use App\Exports\DataMuridsExport;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Carbon\Carbon;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use Modules\PPDB\Entities\BerkasMurid;
use Modules\PPDB\Entities\PaymentRegistration;

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
    
    public function downloadBerkas(Request $request)
    {
        $murids = DataMurid::where('jenjang', $request->jenjang)->pluck('user_id');
        $berkasMurids = BerkasMurid::whereIn('user_id', $murids)->get();
        $paymentMurids = PaymentRegistration::whereIn('user_id', $murids)->get();

        $zip = new \ZipArchive();
        $zipFileName = 'rekap_berkas_' . $request->jenjang . '.zip';
    
        if ($zip->open(public_path($zipFileName), \ZipArchive::CREATE) === TRUE) {
            // $berkasMurids = BerkasMurid::all();
            foreach ($berkasMurids as $berkas) {
                if ($berkas->kartu_keluarga && file_exists(public_path('storage/images/berkas_murid/' . $berkas->kartu_keluarga))) {
                    $zip->addFile(public_path('storage/images/berkas_murid/' . $berkas->kartu_keluarga), 'kartu_keluarga/' . basename('ID' . $berkas->user_id . '_' . $berkas->kartu_keluarga));
                }if ($berkas->akte_kelahiran && file_exists(public_path('storage/images/berkas_murid/' . $berkas->akte_kelahiran))) {
                    $zip->addFile(public_path('storage/images/berkas_murid/' . $berkas->akte_kelahiran), 'akte_kelahiran/' . basename('ID' . $berkas->user_id . '_' . $berkas->akte_kelahiran));
                }if ($berkas->rapor && file_exists(public_path('storage/images/berkas_murid/' . $berkas->rapor))) {
                    $zip->addFile(public_path('storage/images/berkas_murid/' . $berkas->rapor), 'rapor/' . basename('ID' . $berkas->user_id . '_' . $berkas->rapor));
                }if ($berkas->foto && file_exists(public_path('storage/images/berkas_murid/' . $berkas->foto))) {
                    $zip->addFile(public_path('storage/images/berkas_murid/' . $berkas->foto), 'foto/' . basename('ID' . $berkas->user_id . '_' . $berkas->foto));
                }if ($berkas->ijazah && file_exists(public_path('storage/images/berkas_murid/' . $berkas->ijazah))) {
                    $zip->addFile(public_path('storage/images/berkas_murid/' . $berkas->ijazah), 'ijazah/' . basename('ID' . $berkas->user_id . '_' . $berkas->ijazah));
                }
                // Tambahkan berkas lainnya sesuai kebutuhan
            }
            foreach ($paymentMurids as $payment) {
                if ($payment->file && file_exists(public_path('storage/images/payment_pendaftaran/' . $payment->file))) {
                    $zip->addFile(public_path('storage/images/payment_pendaftaran/' . $payment->file), 'payment_pendaftaran/' . basename('ID' . $payment->user_id . '_' . $payment->file));
                }                
            }
            $zip->close();
        } else {
            session()->flash('error', 'Gagal membuat file ZIP.');
            return redirect()->back();
        }
    
        if (file_exists(public_path($zipFileName))) {
            return response()->download(public_path($zipFileName))->deleteFileAfterSend(true);
        } else {
            session()->flash('error', 'File berkas tidak ditemukan.');
            return redirect()->back();
        }
    }

    public function downloadExcel(Request $request)
    {
        $jenjang = $request->jenjang;

        return Excel::download(new DataMuridsExport($jenjang), 'data_murids_' . $jenjang . '.xlsx');
    }
}
