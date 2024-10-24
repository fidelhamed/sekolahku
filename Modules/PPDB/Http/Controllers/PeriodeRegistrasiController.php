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
            $cekperiodeSDIT = PeriodeRegistrasi::where('jenjang', 'SD-IT')->count();
            $cekperiodeSMPIT = PeriodeRegistrasi::where('jenjang', 'SMP-IT')->count();
            $cekperiodeSMAIT = PeriodeRegistrasi::where('jenjang', 'SMA-IT')->count();
            $cekperiodeMA = PeriodeRegistrasi::where('jenjang', 'MA')->count();

            if ($cekperiodeSDIT === 0) {
                $periode = new PeriodeRegistrasi();
                $periode->jenjang = 'SD-IT';
                $periode->save();
            } elseif ($cekperiodeSMPIT === 0) {
                $periode = new PeriodeRegistrasi();
                $periode->jenjang = 'SMP-IT';
                $periode->save();
            } elseif ($cekperiodeSMAIT === 0) {
                $periode = new PeriodeRegistrasi();
                $periode->jenjang = 'SMA-IT';
                $periode->save();
            } elseif ($cekperiodeMA === 0) {
                $periode = new PeriodeRegistrasi();
                $periode->jenjang = 'MA';
                $periode->save();
            } else {
                $periodeSDIT = PeriodeRegistrasi::where('jenjang', 'SD-IT')->first();
                $periodeSMPIT = PeriodeRegistrasi::where('jenjang', 'SMP-IT')->first();
                $periodeSMAIT = PeriodeRegistrasi::where('jenjang', 'SMA-IT')->first();
                $periodeMA = PeriodeRegistrasi::where('jenjang', 'MA')->first();
                return view('ppdb::backend.periodeRegistrasi.index', compact('periodeSDIT', 'periodeSMPIT', 'periodeSMAIT', 'periodeMA'));          
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
            $jenjang = $request->jenjang;
            $cekPeriode = PeriodeRegistrasi::where('jenjang', $jenjang)->count();

            if ($cekPeriode === 0) {
                $periode = new PeriodeRegistrasi();
                $periode->jenjang = $jenjang;
                $periode->tgl_buka = $request->tgl_buka;
                $periode->tgl_tutup = $request->tgl_tutup;
                $periode->save();
            } else {
                $periode = PeriodeRegistrasi::where('jenjang', $jenjang)->first();
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
