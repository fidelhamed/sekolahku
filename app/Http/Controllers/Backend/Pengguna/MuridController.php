<?php

namespace App\Http\Controllers\Backend\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\dataMurid;
use App\Models\User;
use Modules\PPDB\Entities\paymentRegistration;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use ErrorException;
use Session;
use DB;
use Validator;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $murid = User::whereIn('role',['Guest','Murid','Terverifikasi','Lulus','Tidak Lulus'])->get();
        return view('backend.pengguna.murid.index', compact('murid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pengguna.murid.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users',
            ],
            [
                'name.required'     => 'Nama tidak boleh kosong.',
                'email.required'    => 'Email tidak boleh kosong.',
                'email.unique'      => 'Email sudah pernah digunakan.',
                'email.email'       => 'Email yang dimasukan tidak valid.'
            ]
            );

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $errors = $validator->errors();

            if ($request->foto_profile) {
                $image = $request->file('foto_profile');
                $nama_img = time()."_".$image->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'public/images/profile';
                $image->storeAs($tujuan_upload,$nama_img);
            }

            // Pilih kalimat
            $kalimatKe  = "1";
            $username   = implode(" ", array_slice(explode(" ", $request->name), 0, $kalimatKe)); // ambil kalimat

            $murid = new User();
            $murid->name            = $request->name;
            $murid->username        = $username;
            $murid->email           = $request->email;
            $murid->role            = 'Guest';
            $murid->foto_profile    = $nama_img ?? '';
            $murid->password        = bcrypt('12345678');
            $murid->save();

            if ($murid) {
                $detail = new dataMurid();
                $detail->user_id    = $murid->id;
                $detail->jenjang    = $request->jenjang;
                $detail->noreg      = $this->generateNomorRegistrasi($request->jenjang);
                $detail->save();
            }

            $payment = new paymentRegistration();
            $payment->user_id   = $murid->id;
            $payment->jenjang   = $request->jenjang;
            $payment->amount    = 350000;
            $payment->save();

            $murid->assignRole($murid->role);
            
            DB::commit();
            Session::flash('success','Calon Murid Berhasil disimpan !');
            return redirect()->route('backend-pengguna-murid.index');
        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }

    // Fungsi untuk menghasilkan nomor registrasi baru
    protected function generateNomorRegistrasi($jenjang)
    {
        // Sesuaikan logika penomoran sesuai kebutuhan
        $tahun = date('Y');
        $lastRegistrasi = dataMurid::whereYear('created_at', $tahun)
            ->orderBy('id', 'desc')
            ->first();

        if ($lastRegistrasi) {
            $lastNumber = (int) substr($lastRegistrasi->noreg, -4);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return $tahun . '-' . $jenjang . '-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $murid = User::with('muridDetail')->whereIn('role',['Guest','Murid','Terverifikasi','Lulus','Tidak Lulus'])->find($id);
        return view('backend.pengguna.murid.edit', compact('murid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'name'      => 'required|max:255',
                'email'     => 'required',
                'status'    => ['required',Rule::in(['Aktif','Tidak Aktif'])],
                'jenjang'      => ['required',Rule::in(['SMP-IT','SMA-IT','MA'])],
            ],
            [
                'name.required'     => 'Nama tidak boleh kosong.',
                'email.required'    => 'Email tidak boleh kosong.',
                'email.email'       => 'Email yang dimasukan tidak valid.',
                'status.required'   => 'Status Murid harus dipilih.',
                'status.in'         => 'Status yang dipilih tidak valid.',
                'jenjang.required'  => 'Jenjang Murid harus dipilih.',
                'jenjang.in'        => 'Jenjang yang dipilih tidak valid.'
            ]
            );

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $errors = $validator->errors();

            $murid = User::find($id);
            $dataMurid = dataMurid::where('user_id',$id)->first();
            $murid->name            = $request->name;
            $murid->email           = $request->email;
            $dataMurid->jenjang     = $request->jenjang;
            $murid->status          = $request->status;
            $murid->update();
            $dataMurid->update();

            DB::commit();
            Session::flash('success','Calon Murid Berhasil diupdate !');
            return redirect()->route('backend-pengguna-murid.index');
        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
