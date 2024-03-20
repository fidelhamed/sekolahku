<?php

namespace Modules\PPDB\Http\Controllers;

use ErrorException;
use App\Models\User;
use App\Models\DataMurid;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\SPP\Entities\PaymentSpp;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Modules\SPP\Entities\DetailPaymentSpp;
use Illuminate\Contracts\Support\Renderable;
use Modules\PPDB\Entities\PaymentRegistration;

class KelulusanController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $jenjang    = $request['jenjangKelulusan'];
        $murid = User::has('muridDetail')
            ->whereHas('muridDetail', function ($a) use ($jenjang) {
                $a->where('jenjang', $jenjang);
            })
            ->with('muridDetail')
            ->where(function($query){
                $query->where('role', 'Lulus')
                    ->orWhere('role', 'Tidak Lulus');
            })
            ->get();
        return view('ppdb::backend.kelulusan.index', compact('murid','jenjang'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('ppdb::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $murid = User::with('muridDetail', 'dataOrtu', 'berkas')
            ->where(function($query){
                $query->where('role', 'Lulus')
                    ->orWhere('role', 'Tidak Lulus');
            })
            ->find($id);
        if (!$murid->muridDetail->jenis_kelamin || !$murid->dataOrtu->nama_ayah || !$murid->berkas->kartu_keluarga) {
            Session::flash('error', 'Calon Siswa Belum Input Biodata Diri !');
            if ($murid->muridDetail->jenjang == 'SMP-IT') {
                return redirect('/ppdb/data-kelulusan?jenjang=SMP-IT');
            } elseif ($murid->muridDetail->jenjang == 'SMA-IT') {
                return redirect('/ppdb/data-kelulusan?jenjang=SMA-IT');
            } elseif ($murid->muridDetail->jenjang == 'MAN-IT') {
                return redirect('/ppdb/data-kelulusan?jenjang=MAN-IT');
            }
        }
        return view('ppdb::backend.kelulusan.show', compact('murid'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('ppdb::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make(
                $request->all(),
                [
                    'nis'   => 'required|numeric|unique:data_murids',
                    'nisn'  => 'required|numeric|unique:data_murids',
                ],
                [
                    'nis.required'      => 'NIS tidak boleh kosong.',
                    'nisn.required'     => 'NISN tidak boleh kosong.',
                    'nis.numeric'       => 'NIS hanya mendukung angka.',
                    'nis.unique'        => 'NIS sudah pernah digunakan.',
                    'nisn.numeric'      => 'NISN hanya mendukung angka.',
                    'nisn.unique'       => 'NISN sudah pernah digunakan.',
                ]
            );

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $murid = User::find($id);

            if ($murid) {
                $data = DataMurid::where('user_id', $id)->first();
                $data->nis      = $request->nis;
                $data->nisn     = $request->nisn;
                $data->update();

            }

            DB::commit();
            Session::flash('success', 'Sukses, Data Berhasil disimpan !');
            return back();
        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }
    
}
