<?php

namespace Modules\PPDB\Http\Controllers;

use ErrorException;
use App\Models\User;
use App\Models\dataMurid;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\RegistersUsers;
use Modules\PPDB\Entities\paymentRegistration;
use Modules\PPDB\Entities\PeriodeRegistrasi;
use Modules\PPDB\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    // Register View
    public function registerView()
    {
        $sekarang = now();
        $periodeSMPIT = PeriodeRegistrasi::where('jenjang', 'SMP-IT')->where('tgl_buka', '<=', $sekarang)->where('tgl_tutup', '>=', $sekarang)->count();
        $periodeSMAIT = PeriodeRegistrasi::where('jenjang', 'SMA-IT')->where('tgl_buka', '<=', $sekarang)->where('tgl_tutup', '>=', $sekarang)->count();
        $periodeMA = PeriodeRegistrasi::where('jenjang', 'MA')->where('tgl_buka', '<=', $sekarang)->where('tgl_tutup', '>=', $sekarang)->count();
        return view('ppdb::auth.register', compact('periodeSMPIT', 'periodeSMAIT', 'periodeMA'));
    }

    // Register Store
    public function registerStore(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();

            // Pilih kalimat
            $kalimatKe  = "1";
            $username   = implode(" ", array_slice(explode(" ", $request->name), 0, $kalimatKe)); // ambil kalimat

            $register = new User();
            $register->name      = $request->name;
            $register->username  = $username;
            $register->email     = $request->email;
            $register->role      = 'Guest';
            $register->password  = bcrypt($request->password);
            $register->save();

            if ($register) {
                $murid = new dataMurid();
                $murid->user_id         =   $register->id;
                $murid->jenjang         =   $request->jenjang;
                $murid->whatsapp        =   $request->whatsapp;
                $murid->asal_sekolah    =   $request->asal_sekolah;

                // Generate dan simpan nomor registrasi di dataMurid
                $murid->noreg = $this->generateNomorRegistrasi($request->jenjang);
                
                $murid->save();
            }

            $payment = new paymentRegistration();
            $payment->user_id   = $register->id;
            $payment->jenjang   = $request->jenjang;
            $payment->amount    = 350000;
            $payment->save();

            $register->assignRole($register->role);

            DB::commit();
            Session::flash('success', 'Sukses, Kamu berhasil registrasi akun !');
            return redirect()->route('login');
        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }

    // Fungsi untuk menghasilkan nomor registrasi baru
    protected function generateNomorRegistrasi($jenjang)
    {
        // Sesuaikan logika penomoran sesuai kebutuhan
        // Contoh: RR-2023-001 (RR untuk "Registrasi", tahun, dan nomor urut)
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
}
