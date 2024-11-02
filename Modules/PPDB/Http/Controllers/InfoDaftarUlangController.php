<?php

namespace Modules\PPDB\Http\Controllers;

use Illuminate\Http\Request;
use ErrorException;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\PPDB\Entities\InfoDaftarUlang;

class InfoDaftarUlangController extends Controller
{
    public function index()
    {
        try {
            DB::beginTransaction();
            $cekInfoTKTQ = InfoDaftarUlang::where('jenjang', 'TKTQ')->count();
            $cekInfoTKTQ2 = InfoDaftarUlang::where('jenjang', 'TKTQ-2')->count();
            $cekInfoSDIT = InfoDaftarUlang::where('jenjang', 'SD-IT')->count();
            $cekInfoSDIT2 = InfoDaftarUlang::where('jenjang', 'SD-IT-2')->count();
            $cekInfoSMPIT = InfoDaftarUlang::where('jenjang', 'SMP-IT')->count();
            $cekInfoSMAIT = InfoDaftarUlang::where('jenjang', 'SMA-IT')->count();
            $cekInfoMA = InfoDaftarUlang::where('jenjang', 'MA')->count();

            if ($cekInfoTKTQ === 0) {
                $info = new InfoDaftarUlang();
                $info->jenjang = 'TKTQ';
                $info->save();
            } elseif ($cekInfoTKTQ2 === 0) {
                $info = new InfoDaftarUlang();
                $info->jenjang = 'TKTQ-2';
                $info->save();
            } elseif ($cekInfoSDIT === 0) {
                $info = new InfoDaftarUlang();
                $info->jenjang = 'SD-IT';
                $info->save();
            } elseif ($cekInfoSDIT2 === 0) {
                $info = new InfoDaftarUlang();
                $info->jenjang = 'SD-IT-2';
                $info->save();
            } elseif ($cekInfoSMPIT === 0) {
                $info = new InfoDaftarUlang();
                $info->jenjang = 'SMP-IT';
                $info->save();
            } elseif ($cekInfoSMAIT === 0) {
                $info = new InfoDaftarUlang();
                $info->jenjang = 'SMA-IT';
                $info->save();
            } elseif ($cekInfoMA === 0) {
                $info = new InfoDaftarUlang();
                $info->jenjang = 'MA';
                $info->save();
            } else {
                $infoTKTQ = InfoDaftarUlang::where('jenjang', 'TKTQ')->first();
                $infoTKTQ2 = InfoDaftarUlang::where('jenjang', 'TKTQ-2')->first();
                $infoSDIT = InfoDaftarUlang::where('jenjang', 'SD-IT')->first();
                $infoSDIT2 = InfoDaftarUlang::where('jenjang', 'SD-IT-2')->first();
                $infoSMPIT = InfoDaftarUlang::where('jenjang', 'SMP-IT')->first();
                $infoSMAIT = InfoDaftarUlang::where('jenjang', 'SMA-IT')->first();
                $infoMA = InfoDaftarUlang::where('jenjang', 'MA')->first();
                return view('ppdb::backend.infoDaftarUlang.index', compact('infoTKTQ', 'infoTKTQ2', 'infoSDIT', 'infoSDIT2', 'infoSMPIT', 'infoSMAIT', 'infoMA'));          
            }
            DB::commit();
            Session::flash('success', 'Sukses, Data Berhasil dikirim !');
            return redirect('ppdb/info-daftar-ulang');
        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $jenjang = $request->jenjang;
            $cekInfo = InfoDaftarUlang::where('jenjang', $jenjang)->count();

            if ($cekInfo === 0) {
                $info = new InfoDaftarUlang();
                $info->jenjang = $jenjang;
                $info->waktu_tgl = $request->waktu_tgl;
                $info->jam_mulai = $request->jam_mulai;
                $info->jam_berakhir = $request->jam_berakhir;
                $info->lokasi_laki_laki = $request->lokasi_laki_laki;
                $info->lokasi_perempuan = $request->lokasi_perempuan;
                $info->deskripsi = $request->deskripsi;
                $info->save();
            } else {
                $info = InfoDaftarUlang::where('jenjang', $jenjang)->first();
                $info->waktu_tgl = $request->waktu_tgl;
                $info->jam_mulai = $request->jam_mulai;
                $info->jam_berakhir = $request->jam_berakhir;
                $info->lokasi_laki_laki = $request->lokasi_laki_laki;
                $info->lokasi_perempuan = $request->lokasi_perempuan;
                $info->deskripsi = $request->deskripsi;
                $info->update();
            }
            DB::commit();
            Session::flash('success', 'Sukses, Data Berhasil dikirim !');
            return redirect('ppdb/info-daftar-ulang');
        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }

}
