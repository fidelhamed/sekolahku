<?php

namespace Modules\PPDB\Http\Controllers;

use ErrorException;
use App\Models\User;
use App\Models\dataMurid;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\SPP\Entities\PaymentSpp;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Modules\SPP\Entities\DetailPaymentSpp;
use Illuminate\Contracts\Support\Renderable;
use Modules\PPDB\Entities\paymentRegistration;

class DataMuridController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $jenjang    = $request['jenjang'];
        $murid = User::has('muridDetail')
            ->whereHas('muridDetail', function ($a) use ($jenjang) {
                $a->where('jenjang', $jenjang);
            })
            ->with('muridDetail')
            ->where('role', 'Guest')
            ->get();
        return view('ppdb::backend.dataMurid.index', compact('murid'));
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
        $murid = User::with('muridDetail', 'dataOrtu', 'berkas')->where('role', 'Guest')->find($id);
        if (!$murid->muridDetail->agama || !$murid->dataOrtu->nama_ayah || !$murid->berkas->kartu_keluarga) {
            Session::flash('error', 'Calon Siswa Belum Input Biodata Diri !');
            if ($murid->muridDetail->jenjang == 'SMP-IT') {
                return redirect('/ppdb/data-murid?jenjang=SMP-IT');
            } elseif ($murid->muridDetail->jenjang == 'SMA-IT') {
                return redirect('/ppdb/data-murid?jenjang=SMA-IT');
            } elseif ($murid->muridDetail->jenjang == 'MAN-IT') {
                return redirect('/ppdb/data-murid?jenjang=MAN-IT');
            }
        }
        return view('ppdb::backend.dataMurid.show', compact('murid'));
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
            // $validator = Validator::make(
            //     $request->all(),
            //     [
            //         'nis'   => 'required|numeric|unique:data_murids',
            //         'nisn'  => 'required|numeric|unique:data_murids',
            //     ],
            //     [
            //         'nis.required'      => 'NIS tidak boleh kosong.',
            //         'nisn.required'     => 'NISN tidak boleh kosong.',
            //         'nis.numeric'       => 'NIS hanya mendukung angka.',
            //         'nis.unique'        => 'NIS sudah pernah digunakan.',
            //         'nisn.numeric'      => 'NISN hanya mendukung angka.',
            //         'nisn.unique'       => 'NISN sudah pernah digunakan.',
            //     ]
            // );

            // if ($validator->fails()) {
            //     return redirect()->back()
            //         ->withErrors($validator)
            //         ->withInput();
            // }

            $murid = User::find($id);
            $murid->role = 'Terverifikasi';
            $murid->update();

            if ($murid) {
                $data = dataMurid::where('user_id', $id)->first();
                // $data->nis      = $request->nis;
                // $data->nisn     = $request->nisn;
                $data->proses   = $murid->role;
                $data->update();

                // // create data payment
                // $this->payment($murid->id);
            }

            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $murid->assignRole($murid->role);

            DB::commit();
            Session::flash('success', 'Sukses, Data Berhasil diverifikasi !');
            return redirect()->route('data-murid.index');
        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    // Create Data Payment
    public function payment($murid)
    {
        try {
            DB::beginTransaction();
            $payment = PaymentSpp::create([
                'user_id'   => $murid,
                'year'      => date('Y'),
                'is_active' =>  1
            ]);

            if ($payment) {
                $generate = rand(10, 100);
                DetailPaymentSpp::create([
                    'payment_id'  => $payment->id,
                    'user_id'     => $murid,
                    'month'       => date('F'),
                    'amount'      => 300 . $murid . $generate,
                    'status'      => 'unpaid',
                    'file'        => null,
                ]);
            }
            DB::commit();
        } catch (\ErrorException $e) {
            DB::rollBack();
            throw new ErrorException($e->getMessage());
        }
    }

    // Konfirm Payment Regis Page
    public function confirmPayment(Request $request)
    {
        $payment = paymentRegistration::find($request->id);
        $payment->update([
            'status'        => 'Paid',
            'approve_date'  => Carbon::now()
        ]);
        Session::flash('success', 'Sukses, Pembayaran diterima !');
        return back();
    }
}
