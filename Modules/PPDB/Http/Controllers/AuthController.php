<?php

namespace Modules\PPDB\Http\Controllers;

use ErrorException;
use App\Models\User;
use App\Models\DataMurid;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\RegistersUsers;
use Modules\PPDB\Entities\PaymentRegistration;
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
        $periodeTKTQReguler = PeriodeRegistrasi::where('jenjang', 'TKTQ')->where('jalur', 'Reguler')->where('tgl_buka', '<=', $sekarang)->where('tgl_tutup', '>=', $sekarang)->count();
        $periodeTKTQPrestasi = PeriodeRegistrasi::where('jenjang', 'TKTQ')->where('jalur', 'Prestasi')->where('tgl_buka', '<=', $sekarang)->where('tgl_tutup', '>=', $sekarang)->count();
        $periodeTKTQ2Reguler = PeriodeRegistrasi::where('jenjang', 'TKTQ-2')->where('jalur', 'Reguler')->where('tgl_buka', '<=', $sekarang)->where('tgl_tutup', '>=', $sekarang)->count();
        $periodeTKTQ2Prestasi = PeriodeRegistrasi::where('jenjang', 'TKTQ-2')->where('jalur', 'Prestasi')->where('tgl_buka', '<=', $sekarang)->where('tgl_tutup', '>=', $sekarang)->count();
        $periodeSDITReguler = PeriodeRegistrasi::where('jenjang', 'SD-IT')->where('jalur', 'Reguler')->where('tgl_buka', '<=', $sekarang)->where('tgl_tutup', '>=', $sekarang)->count();
        $periodeSDITPrestasi = PeriodeRegistrasi::where('jenjang', 'SD-IT')->where('jalur', 'Prestasi')->where('tgl_buka', '<=', $sekarang)->where('tgl_tutup', '>=', $sekarang)->count();
        $periodeSDIT2Reguler = PeriodeRegistrasi::where('jenjang', 'SD-IT-2')->where('jalur', 'Reguler')->where('tgl_buka', '<=', $sekarang)->where('tgl_tutup', '>=', $sekarang)->count();
        $periodeSDIT2Prestasi = PeriodeRegistrasi::where('jenjang', 'SD-IT-2')->where('jalur', 'Prestasi')->where('tgl_buka', '<=', $sekarang)->where('tgl_tutup', '>=', $sekarang)->count();
        $periodeSMPITReguler = PeriodeRegistrasi::where('jenjang', 'SMP-IT')->where('jalur', 'Reguler')->where('tgl_buka', '<=', $sekarang)->where('tgl_tutup', '>=', $sekarang)->count();
        $periodeSMPITPrestasi = PeriodeRegistrasi::where('jenjang', 'SMP-IT')->where('jalur', 'Prestasi')->where('tgl_buka', '<=', $sekarang)->where('tgl_tutup', '>=', $sekarang)->count();
        $periodeSMAITReguler = PeriodeRegistrasi::where('jenjang', 'SMA-IT')->where('jalur', 'Reguler')->where('tgl_buka', '<=', $sekarang)->where('tgl_tutup', '>=', $sekarang)->count();
        $periodeSMAITPrestasi = PeriodeRegistrasi::where('jenjang', 'SMA-IT')->where('jalur', 'Prestasi')->where('tgl_buka', '<=', $sekarang)->where('tgl_tutup', '>=', $sekarang)->count();
        $periodeMAReguler = PeriodeRegistrasi::where('jenjang', 'MA')->where('jalur', 'Reguler')->where('tgl_buka', '<=', $sekarang)->where('tgl_tutup', '>=', $sekarang)->count();
        $periodeMAPrestasi = PeriodeRegistrasi::where('jenjang', 'MA')->where('jalur', 'Prestasi')->where('tgl_buka', '<=', $sekarang)->where('tgl_tutup', '>=', $sekarang)->count();
        return view('ppdb::auth.register', compact('periodeTKTQReguler',
                                                    'periodeTKTQPrestasi',
                                                    'periodeTKTQ2Reguler',
                                                    'periodeTKTQ2Prestasi',
                                                    'periodeSDITReguler',
                                                    'periodeSDITPrestasi',
                                                    'periodeSDIT2Reguler',
                                                    'periodeSDIT2Prestasi',
                                                    'periodeSMPITReguler',
                                                    'periodeSMPITPrestasi',
                                                    'periodeSMAITReguler',
                                                    'periodeSMAITPrestasi',
                                                    'periodeMAReguler',
                                                    'periodeMAPrestasi'));
    }

    // Register Store
    public function registerStore(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();

            // Pilih kalimat
            $kalimatKe  = "1";
            $randomNumber = rand(1, 9999);
            $username   = implode(" ", array_slice(explode(" ", $request->name), 0, $kalimatKe)) . $randomNumber; // ambil kalimat

            $register = new User();
            $register->name      = $request->name;
            $register->username  = strtolower($username);
            $register->email     = $request->email;
            $register->role      = 'Guest';
            $register->password  = bcrypt($request->password);
            $register->save();

            if ($register) {
                //Ambil nilai jenjangJalur
                $jenjangJalurValue = $request->jenjangJalur;
                
                //Memisahkan nilai jenjang dan jalur
                $pisah = explode(';', $jenjangJalurValue);
                $jenjangValue = $pisah[0];
                $jalurValue = $pisah[1];

                $murid = new DataMurid();
                $murid->user_id             =   $register->id;
                $murid->nik                 =   $request->nik;
                $murid->jalur               =   $jalurValue;
                $murid->jenjang             =   $jenjangValue;
                $murid->whatsapp            =   '+62' . $request->whatsapp;
                $murid->nama_sekolah_asal   =   $request->nama_sekolah_asal;

                // Generate dan simpan nomor registrasi di dataMurid
                $murid->noreg = $this->generateNomorRegistrasi($jenjangValue, $jalurValue);
                
                $murid->save();
            }

            if ($jenjangValue == 'TKTQ' AND $jalurValue == 'Reguler') {
                $amount = 150000;
            } elseif ($jenjangValue == 'TKTQ' AND $jalurValue == 'Prestasi') {
                $amount = 0;
            } elseif ($jenjangValue == 'TKTQ-2' AND $jalurValue == 'Reguler') {
                $amount = 150000;
            } elseif ($jenjangValue == 'TKTQ-2' AND $jalurValue == 'Prestasi') {
                $amount = 0;
            } elseif ($jenjangValue == 'SD-IT' AND $jalurValue == 'Reguler') {
                $amount = 250000;
            } elseif ($jenjangValue == 'SD-IT' AND $jalurValue == 'Prestasi') {
                $amount = 0;
            } elseif ($jenjangValue == 'SD-IT-2' AND $jalurValue == 'Reguler') {
                $amount = 250000;
            } elseif ($jenjangValue == 'SD-IT-2' AND $jalurValue == 'Prestasi') {
                $amount = 0;
            } elseif (($jenjangValue == 'SMP-IT' AND $jalurValue == 'Reguler') || ($jenjangValue == 'SMA-IT' AND $jalurValue == 'Reguler') || ($jenjangValue == 'MA' AND $jalurValue == 'Reguler')) {
                $amount = 350000;
            } elseif (($jenjangValue == 'SMP-IT' AND $jalurValue == 'Prestasi') || ($jenjangValue == 'SMA-IT' AND $jalurValue == 'Prestasi') || ($jenjangValue == 'MA' AND $jalurValue == 'Prestasi')) {
                $amount = 0;
            }

            $payment = new PaymentRegistration();
            $payment->user_id   = $register->id;
            $payment->jenjang   = $jenjangValue;
            $payment->amount    = $amount;
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
    protected function generateNomorRegistrasi($jenjang, $jalur)
    {
        // Sesuaikan logika penomoran sesuai kebutuhan
        // Contoh: RR-2023-001 (RR untuk "Registrasi", tahun, dan nomor urut)
        $tahun = date('Y');
        $lastRegistrasi = DataMurid::whereYear('created_at', $tahun)
            ->where('jenjang', $jenjang)
            ->where('jalur', $jalur)
            ->orderBy('id', 'desc')
            ->first();

        if ($lastRegistrasi) {
            $lastNumber = (int) substr($lastRegistrasi->noreg, -4);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return $tahun . '-' . $jenjang . '-' . $jalur[0] . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    }
}
