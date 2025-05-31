<?php

namespace Modules\PPDB\Http\Controllers;

use Illuminate\Http\Request;
use ErrorException;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\PPDB\Entities\PeriodeRegistrasi;


class PeriodeRegistrasiController extends Controller
{
    public function index()
    {
        try {
            DB::beginTransaction();
            $cekPeriode = PeriodeRegistrasi::whereIn('jenjang', ['TKTQ', 'TKTQ-2', 'SD-IT', 'SD-IT-2', 'SMP-IT', 'SMA-IT', 'MA'])->count();
            $jalurs = ['Reguler', 'Prestasi'];
            $jenjangs = ['TKTQ', 'TKTQ-2', 'SD-IT', 'SD-IT-2', 'SMP-IT', 'SMA-IT', 'MA'];

            if ($cekPeriode === 0) {

                foreach ($jenjangs as $jnjg) {
                    foreach ($jalurs as $jlr) {
                        $info = new PeriodeRegistrasi();
                        $info->jalur = $jlr;
                        $info->jenjang = $jnjg;
                        $info->save();
                    }
                }

            } else {
                $periodeData = [];
                
                foreach ($jenjangs as $jnjg) {
                    foreach ($jalurs as $jlr) {
                        $cleanjnjg = str_replace('-', '', $jnjg);
                        $periodeData["periode{$cleanjnjg}{$jlr}"] = PeriodeRegistrasi::where('jenjang', $jnjg)
                                                                 ->where('jalur', $jlr)
                                                                 ->first();
                    }
                }
                
                return view('ppdb::backend.periodeRegistrasi.index', $periodeData);
            }
            DB::commit();
            Session::flash('success', 'Sukses, Data Berhasil dikirim !');
            return redirect('ppdb/periode-registrasi');
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
            $cekPeriode = PeriodeRegistrasi::where('jenjang', $jenjang)->where('jalur', $jalur)->count();

            if ($cekPeriode === 0) {
                $periode = new PeriodeRegistrasi();
                $periode->jalur = $jalur;
                $periode->jenjang = $jenjang;
                $periode->tgl_buka = $request->tgl_buka;
                $periode->tgl_tutup = $request->tgl_tutup;
                $periode->save();
            } else {
                $periode = PeriodeRegistrasi::where('jenjang', $jenjang)->where('jalur', $jalur)->first();
                $periode->tgl_buka = $request->tgl_buka;
                $periode->tgl_tutup = $request->tgl_tutup;
                $periode->update();
            }
            DB::commit();
            Session::flash('success', 'Sukses, Data Berhasil dikirim !');
            return redirect('ppdb/periode-registrasi');
        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }

}
