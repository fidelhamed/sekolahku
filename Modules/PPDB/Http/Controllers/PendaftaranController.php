<?php

namespace Modules\PPDB\Http\Controllers;

use App\Models\Bank;
use App\Models\DataMurid;
use App\Models\User;
use ErrorException;
use Modules\PPDB\Http\Requests\{BerkasMuridRequest, DataMuridRequest, DataOrtuRequest};
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\PPDB\Entities\BerkasMurid;
use Modules\PPDB\Entities\DataOrangTua;
use Illuminate\Support\Facades\Session;
use Modules\PPDB\Entities\PaymentRegistration;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{

    // Data Murid
    public function index()
    {
        $user = User::with('paymentRegis', 'muridDetail', 'dataOrtu')->where('status', 'Aktif')->where('id', Auth::id())->first();

        if ($user->paymentRegis->file == null || $user->paymentRegis->status == 'Unpaid') {
            return redirect('ppdb/payment-pendaftaran/' . $user->paymentRegis->id);
        }
        // Jika data murid sudah lengkap dan bukan proses perbaikan
        if ($user->muridDetail->jenis_kelamin !== null AND $user->muridDetail->proses !== 'Perbaikan') {
            return redirect('ppdb/form-data-orangtua');
        }
        return view('ppdb::backend.pendaftaran.index', compact('user'));
    }

    // Update Data Murid
    public function update(DataMuridRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $user = User::with('muridDetail')->where('id', $id)->first();
            $user->name     = $request->name;
            $user->email     = $request->email;
            $user->update();

            if ($user) {
                $murid = DataMurid::where('user_id', $id)->first();
                $murid->nama_panggilan  = $request->nama_panggilan;
                $murid->jenis_kelamin   = $request->jenis_kelamin;
                $murid->tempat_lahir    = $request->tempat_lahir;
                $murid->tgl_lahir       = $request->tgl_lahir;
                $murid->anak_ke         = $request->anak_ke;
                $murid->alamat          = $request->alamat;
                $murid->telp            = $request->telp;
                $murid->whatsapp        = $request->whatsapp;
                $murid->sakit           = $request->sakit;
                $murid->asal_sekolah    = $request->asal_sekolah;
                $murid->alamat_sekolah  = $request->alamat_sekolah;
                $murid->prestasi        = $request->prestasi;
                $murid->update();

                if ($murid) {          
                    $cek = DataOrangTua::where('user_id', Auth::id())->count();
                    if ($cek === 0){
                            $ortu = new DataOrangTua;
                            $ortu->user_id  = $id;
                            $ortu->save();
                    }
                }
            }
            DB::commit();
            Session::flash('success', 'Success, Data Berhasil dikirim !');
            return redirect('ppdb/form-data-orangtua');
        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }

    // Data Orang Tua
    public function dataOrtuView()
    {
        $user = User::with('paymentRegis', 'muridDetail', 'dataOrtu')->where('status', 'Aktif')->where('id', Auth::id())->first();
        $ortu = DataOrangTua::where('user_id', Auth::id())->first();

        // Jika data orang tua masih empty
        if (!$ortu) {
            Session::flash('error', 'Data kamu belum lengkap !');
            return redirect('ppdb/form-pendaftaran');
        }

        // jika data orang tua sudah terisi dan bukan proses perbaikan
        if ($ortu->telp_ayah !== null AND $user->muridDetail->proses !== 'Perbaikan') {
            Session::flash('success', 'Data kamu sudah lengkap !');
            return redirect('ppdb/form-berkas');
        }
        return view('ppdb::backend.pendaftaran.dataOrtu', compact('ortu'));
    }

    // Update Data Orang Tua
    public function updateOrtu(DataOrtuRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $ortu = DataOrangTua::where('user_id', $id)->first();
            // Data Ayah
            $ortu->nama_ayah        = $request->nama_ayah;
            $ortu->pekerjaan_ayah   = $request->pekerjaan_ayah;
            $ortu->pendidikan_ayah  = $request->pendidikan_ayah;
            $ortu->penghasilan_ayah = $request->penghasilan_ayah;
            $ortu->telp_ayah        = $request->telp_ayah;
            $ortu->alamat_ayah      = $request->nama_ayah;

            // Data Ibu
            $ortu->nama_ibu         = $request->nama_ibu;
            $ortu->pekerjaan_ibu    = $request->pekerjaan_ibu;
            $ortu->pendidikan_ibu   = $request->pendidikan_ibu;
            $ortu->penghasilan_ibu  = $request->penghasilan_ibu;
            $ortu->telp_ibu         = $request->telp_ibu;
            $ortu->alamat_ibu       = $request->nama_ibu;

            // Data Wali
            $ortu->nama_wali        = $request->nama_wali;
            $ortu->telp_wali        = $request->telp_wali;
            $ortu->alamat_wali      = $request->alamat_wali;
            $ortu->update();

            if ($ortu) {
                $cek = BerkasMurid::where('user_id', Auth::id())->count();
                if ($cek === 0) {
                    $berkas = new BerkasMurid();
                    $berkas->user_id    = $id;
                    $berkas->save();
                }
            }

            DB::commit();
            Session::flash('success', 'Success, Data Berhasil dikirim !');
            return redirect('/ppdb/form-berkas');
        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }

    // Berkas View
    public function berkasView()
    {
        $user = User::with('paymentRegis', 'muridDetail', 'dataOrtu')->where('status', 'Aktif')->where('id', Auth::id())->first();
        $berkas = BerkasMurid::where('user_id', Auth::id())->first();
        // Jika data berkas sudah terisi dan bukan proses perbaikan
        if ($berkas->akte_kelahiran !== null AND $user->muridDetail->proses !== 'Perbaikan') {
            Session::flash('error', 'Data kamu sudah lengkap, tunggu proses verifikasi data !');
            return redirect('/home');
        }
        return view('ppdb::backend.pendaftaran.berkas', compact('berkas'));
    }

    // Berkas Store
    public function berkasStore(BerkasMuridRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $imageKk = $request->file('kartu_keluarga');
            $kartuKeluarga = time() . "_" . $imageKk->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/images/berkas_murid';
            $imageKk->storeAs($tujuan_upload, $kartuKeluarga);

            $imageakte = $request->file('akte_kelahiran');
            $akteKelahiran = time() . "_" . $imageakte->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/images/berkas_murid';
            $imageakte->storeAs($tujuan_upload, $akteKelahiran);

            if ($request->rapor) {
                $imagerapor = $request->file('rapor');
                $rapor = time() . "_" . $imagerapor->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'public/images/berkas_murid';
                $imagerapor->storeAs($tujuan_upload, $rapor);
            }

            $imagefoto = $request->file('foto');
            $foto = time() . "_" . $imagefoto->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/images/berkas_murid';
            $imagefoto->storeAs($tujuan_upload, $foto);

            if ($request->ijazah) {
                $imageijazah = $request->file('ijazah');
                $ijazah = time() . "_" . $imageijazah->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'public/images/berkas_murid';
                $imageijazah->storeAs($tujuan_upload, $ijazah);
            }

            $berkas = BerkasMurid::find($id);
            $berkas->kartu_keluarga         = $kartuKeluarga;
            $berkas->akte_kelahiran         = $akteKelahiran;
            $berkas->rapor                  = $rapor ?? null;
            $berkas->foto                   = $foto;
            $berkas->ijazah                 = $ijazah ?? null;
            $berkas->save();

            if ($berkas) {
                $data = DataMurid::where('user_id', Auth::id())->first();
                $data->proses = 'Input data';
                $data->update();
                
                DB::commit();
                Session::flash('success', 'Sukses, Data Berhasil dikirim !');
                return redirect('/home');
            }
        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }

    public function paymentPage()
    {
        $accountbanks = User::with('banks')->first();
        $user = User::with('paymentRegis')->where('status', 'Aktif')->where('id', Auth::id())->first();
        if ($user->paymentRegis->file != null) {
            Session::flash('error', 'Pembayaran kamu sedang di proses.');
            return redirect('/home');
        }
        return view('ppdb::backend.pendaftaran.paymentRegis', compact('accountbanks', 'user'));
    }

    public function paymentStore(Request $request)
    {
        $imagePayment = $request->file('file');
        $payments = time() . "_" . $imagePayment->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'public/images/payment_pendaftaran';
        $imagePayment->storeAs($tujuan_upload, $payments);

        $payment = PaymentRegistration::whereId($request->id)->first();
        $payment->sender            = $request->sender;
        $payment->destination_bank  = $request->destination_bank;
        $payment->file              = $payments;
        $payment->update();

        Session::flash('success', 'Bukti pembayaran registrasi berhasil dikirim, tunggu proses konfirmasi oleh admin  !');
        return redirect('/home');
    }
}
