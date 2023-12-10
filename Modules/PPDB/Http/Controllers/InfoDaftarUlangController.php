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
            $cekInfoSMPIT = InfoDaftarUlang::where('jenjang', 'SMP-IT')->count();
            $cekInfoSMAIT = InfoDaftarUlang::where('jenjang', 'SMA-IT')->count();
            $cekInfoMA = InfoDaftarUlang::where('jenjang', 'MA')->count();

            if ($cekInfoSMPIT === 0) {
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
                $infoSMPIT = InfoDaftarUlang::where('jenjang', 'SMP-IT')->first();
                $infoSMAIT = InfoDaftarUlang::where('jenjang', 'SMA-IT')->first();
                $infoMA = InfoDaftarUlang::where('jenjang', 'MA')->first();
                return view('ppdb::backend.infoDaftarUlang.index', compact('infoSMPIT', 'infoSMAIT', 'infoMA'));          
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
                $info->lokasi = $request->lokasi;
                $info->deskripsi = $request->deskripsi;
                $info->save();
            } else {
                $info = InfoDaftarUlang::where('jenjang', $jenjang)->first();
                $info->waktu_tgl = $request->waktu_tgl;
                $info->jam_mulai = $request->jam_mulai;
                $info->jam_berakhir = $request->jam_berakhir;
                $info->lokasi = $request->lokasi;
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
