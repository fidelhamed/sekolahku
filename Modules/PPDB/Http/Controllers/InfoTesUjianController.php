<?php

namespace Modules\PPDB\Http\Controllers;

use Illuminate\Http\Request;
use ErrorException;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\PPDB\Entities\InfoTesUjian;

class InfoTesUjianController extends Controller
{
    public function index()
    {
        try {
            DB::beginTransaction();
            $cekInfoSDIT = InfoTesUjian::where('jenjang', 'SD-IT')->count();
            $cekInfoSMPIT = InfoTesUjian::where('jenjang', 'SMP-IT')->count();
            $cekInfoSMAIT = InfoTesUjian::where('jenjang', 'SMA-IT')->count();
            $cekInfoMA = InfoTesUjian::where('jenjang', 'MA')->count();

            if ($cekInfoSDIT === 0) {
                $info = new InfoTesUjian();
                $info->jenjang = 'SD-IT';
                $info->save();
            } elseif ($cekInfoSMPIT === 0) {
                $info = new InfoTesUjian();
                $info->jenjang = 'SMP-IT';
                $info->save();
            } elseif ($cekInfoSMAIT === 0) {
                $info = new InfoTesUjian();
                $info->jenjang = 'SMA-IT';
                $info->save();
            } elseif ($cekInfoMA === 0) {
                $info = new InfoTesUjian();
                $info->jenjang = 'MA';
                $info->save();
            } else {
                $infoSDIT = InfoTesUjian::where('jenjang', 'SD-IT')->first();
                $infoSMPIT = InfoTesUjian::where('jenjang', 'SMP-IT')->first();
                $infoSMAIT = InfoTesUjian::where('jenjang', 'SMA-IT')->first();
                $infoMA = InfoTesUjian::where('jenjang', 'MA')->first();
                return view('ppdb::backend.infoTesUjian.index', compact('infoSDIT', 'infoSMPIT', 'infoSMAIT', 'infoMA'));          
            }
            DB::commit();
            Session::flash('success', 'Sukses, Data Berhasil dikirim !');
            return redirect('ppdb/info-tes-ujian');
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
            $cekInfo = InfoTesUjian::where('jenjang', $jenjang)->count();

            if ($cekInfo === 0) {
                $info = new InfoTesUjian();
                $info->jenjang = $jenjang;
                $info->waktu_tgl = $request->waktu_tgl;
                $info->jam_mulai = $request->jam_mulai;
                $info->jam_berakhir = $request->jam_berakhir;
                $info->lokasi = $request->lokasi;
                $info->deskripsi = $request->deskripsi;
                $info->save();
            } else {
                $info = InfoTesUjian::where('jenjang', $jenjang)->first();
                $info->waktu_tgl = $request->waktu_tgl;
                $info->jam_mulai = $request->jam_mulai;
                $info->jam_berakhir = $request->jam_berakhir;
                $info->lokasi = $request->lokasi;
                $info->deskripsi = $request->deskripsi;
                $info->update();
            }
            DB::commit();
            Session::flash('success', 'Sukses, Data Berhasil dikirim !');
            return redirect('ppdb/info-tes-ujian');
        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }

}
