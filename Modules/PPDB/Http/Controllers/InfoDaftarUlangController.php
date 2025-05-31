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
            $cekInfo = InfoDaftarUlang::whereIn('jenjang', ['TKTQ', 'TKTQ-2', 'SD-IT', 'SD-IT-2', 'SMP-IT', 'SMA-IT', 'MA'])->count();
            $jenjangs = ['TKTQ', 'TKTQ-2', 'SD-IT', 'SD-IT-2', 'SMP-IT', 'SMA-IT', 'MA'];

            if ($cekInfo === 0) {

                foreach ($jenjangs as $jnjg) {
                    $info = new InfoDaftarUlang();
                    $info->jenjang = $jnjg;
                    $info->save();
                }

            } else {
                $infoData = [];
                
                foreach ($jenjangs as $jnjg) {
                        $cleanjnjg = str_replace('-', '', $jnjg);
                        $infoData["info{$cleanjnjg}"] = InfoDaftarUlang::where('jenjang', $jnjg)->first();
                }

                return view('ppdb::backend.infoDaftarUlang.index', $infoData);
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
                $info->tgl_buka = $request->tgl_buka;
                $info->tgl_tutup = $request->tgl_tutup;
                $info->lokasi_laki_laki = $request->lokasi_laki_laki;
                $info->lokasi_perempuan = $request->lokasi_perempuan;
                $info->deskripsi = $request->deskripsi;
                $info->save();
            } else {
                $info = InfoDaftarUlang::where('jenjang', $jenjang)->first();
                $info->tgl_buka = $request->tgl_buka;
                $info->tgl_tutup = $request->tgl_tutup;
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
