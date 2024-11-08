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
            $cekInfo = InfoTesUjian::whereIn('jenjang', ['TKTQ', 'TKTQ-2', 'SD-IT', 'SD-IT-2', 'SMP-IT', 'SMA-IT', 'MA'])->count();
            $jalurs = ['Reguler', 'Prestasi'];
            $jenjangs = ['TKTQ', 'TKTQ-2', 'SD-IT', 'SD-IT-2', 'SMP-IT', 'SMA-IT', 'MA'];

            if ($cekInfo === 0) {

                foreach ($jenjangs as $jnjg) {
                    foreach ($jalurs as $jlr) {
                        $info = new InfoTesUjian();
                        $info->jalur = $jlr;
                        $info->jenjang = $jnjg;
                        $info->save();
                    }
                }

            } else {
                $infoData = [];
                
                foreach ($jenjangs as $jnjg) {
                    foreach ($jalurs as $jlr) {
                        $cleanjnjg = str_replace('-', '', $jnjg);
                        $infoData["info{$cleanjnjg}{$jlr}"] = InfoTesUjian::where('jenjang', $jnjg)
                                                                 ->where('jalur', $jlr)
                                                                 ->first();
                    }
                }
                
                return view('ppdb::backend.infoTesUjian.index', $infoData);
                // $infoTKTQReguler = InfoTesUjian::where('jenjang', 'TKTQ')->where('jalur', 'Reguler')->first();
                // $infoTKTQPrestasi = InfoTesUjian::where('jenjang', 'TKTQ')->where('jalur', 'Prestasi')->first();
                // $infoTKTQ2Reguler = InfoTesUjian::where('jenjang', 'TKTQ-2')->where('jalur', 'Reguler')->first();
                // $infoTKTQ2Prestasi = InfoTesUjian::where('jenjang', 'TKTQ-2')->where('jalur', 'Prestasi')->first();
                // $infoSDITReguler = InfoTesUjian::where('jenjang', 'SD-IT')->where('jalur', 'Reguler')->first();
                // $infoSDITPrestasi = InfoTesUjian::where('jenjang', 'SD-IT')->where('jalur', 'Prestasi')->first();
                // $infoSDIT2Reguler = InfoTesUjian::where('jenjang', 'SD-IT-2')->where('jalur', 'Reguler')->first();
                // $infoSDIT2Prestasi = InfoTesUjian::where('jenjang', 'SD-IT-2')->where('jalur', 'Prestasi')->first();
                // $infoSMPITReguler = InfoTesUjian::where('jenjang', 'SMP-IT')->where('jalur', 'Reguler')->first();
                // $infoSMPITPrestasi = InfoTesUjian::where('jenjang', 'SMP-IT')->where('jalur', 'Prestasi')->first();
                // $infoSMAITReguler = InfoTesUjian::where('jenjang', 'SMA-IT')->where('jalur', 'Reguler')->first();
                // $infoSMAITPrestasi = InfoTesUjian::where('jenjang', 'SMA-IT')->where('jalur', 'Prestasi')->first();
                // $infoMAReguler = InfoTesUjian::where('jenjang', 'MA')->where('jalur', 'Reguler')->first();
                // $infoMAPrestasi = InfoTesUjian::where('jenjang', 'MA')->where('jalur', 'Prestasi')->first();
                // return view('ppdb::backend.infoTesUjian.index', compact('infoTKTQReguler', 
                //                                                         'infoTKTQPrestasi',
                //                                                         'infoTKTQ2Reguler', 
                //                                                         'infoTKTQ2Prestasi', 
                //                                                         'infoSDITReguler', 
                //                                                         'infoSDITPrestasi', 
                //                                                         'infoSDIT2Reguler', 
                //                                                         'infoSDIT2Prestasi', 
                //                                                         'infoSMPITReguler', 
                //                                                         'infoSMPITPrestasi', 
                //                                                         'infoSMAITReguler', 
                //                                                         'infoSMAITPrestasi', 
                //                                                         'infoMAReguler', 
                //                                                         'infoMAPrestasi'));
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
            $jalur = $request->jalur;
            $jenjang = $request->jenjang;
            $cekInfo = InfoTesUjian::where('jenjang', $jenjang)->where('jalur', $jalur)->count();

            if ($cekInfo === 0) {
                $info = new InfoTesUjian();
                $info->jalur = $jalur;
                $info->jenjang = $jenjang;
                $info->waktu_tgl = $request->waktu_tgl;
                $info->jam_mulai = $request->jam_mulai;
                $info->jam_berakhir = $request->jam_berakhir;
                $info->lokasi_laki_laki = $request->lokasi_laki_laki;
                $info->lokasi_perempuan = $request->lokasi_perempuan;
                $info->deskripsi = $request->deskripsi;
                $info->save();
            } else {
                $info = InfoTesUjian::where('jenjang', $jenjang)->where('jalur', $jalur)->first();
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
            return redirect('ppdb/info-tes-ujian');
        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }

}
