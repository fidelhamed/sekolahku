<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Events;
use App\Models\DataMurid;
use App\Models\dataPayment;
use App\Models\UsersDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Modules\PPDB\Entities\InfoTesUjian;
use Modules\PPDB\Entities\InfoDaftarUlang;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->role;
        $startDate = \Carbon\Carbon::create(2024, 11, 1);
        $endDate = \Carbon\Carbon::create(2025, 3, 1);


        if (Auth::check()) {
            // DASHBOARD ADMIN \\
            if ($role == 'Admin') {

              $totalPendaftar = User::whereNotIn('role',['admin','PPDB'])
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();
              $lulusAdm = User::where('role', 'Terverifikasi')->count();
              $lulus = User::where('role','Lulus')->count();
              $tidakLulus = User::where('role', 'Tidak Lulus')->count();
              $acara = Events::where('is_active','0')->count();
              $event = Events::where('is_active','0')->orderBy('created_at','desc')->first();
              $profit= dataPayment::whereNotNull('approve_date')->sum('amount');

              $pendaftar = DB::table('data_murids')
                ->select('jenjang', DB::raw('COUNT(*) as jumlah_pendaftar'))
                ->groupBy('jenjang')
                ->get();
              
              $pendaftar_jk = DB::table('data_murids')
                ->select('jenjang',
                        //  DB::raw('COUNT(*) as total_pendaftar'),
                         DB::raw('SUM(CASE WHEN jenis_kelamin = "Laki-Laki" THEN 1 ELSE 0 END) AS jumlah_pendaftar_laki'),
                         DB::raw('SUM(CASE WHEN jenis_kelamin = "Perempuan" THEN 1 ELSE 0 END) AS jumlah_pendaftar_perempuan'))
                ->groupBy('jenjang')
                ->get();
                
              $pendaftar_jlr = DB::table('data_murids')
                ->select('jenjang',
                         DB::raw('SUM(CASE WHEN jalur = "Reguler" THEN 1 ELSE 0 END) AS jumlah_pendaftar_reguler'),
                         DB::raw('SUM(CASE WHEN jalur = "Prestasi" THEN 1 ELSE 0 END) AS jumlah_pendaftar_prestasi'))
                ->groupBy('jenjang')
                ->get();
                
              $biaya = DB::table('payment_registrations')
                ->select('jenjang', DB::raw('SUM(amount) as total_amount'))
                ->whereNotNull('approve_date')
                ->whereIn('jenjang', ['TKTQ', 'TKTQ-2', 'SD-IT', 'SD-IT-2', 'SMP-IT', 'SMA-IT', 'MA'])
                ->groupBy('jenjang')
                ->get();
                
              return view('backend.website.home', compact('totalPendaftar','lulusAdm','lulus','tidakLulus','event','acara', 'pendaftar', 'pendaftar_jk', 'profit', 'biaya', 'pendaftar_jlr'));

            }

            // DASHBOARD PPDB & PENDAFTAR \\
            elseif($role == 'PPDB') {

              if (Auth::user()->userDetail->pj_jenjang == 'TKTQ') {
                $register = DataMurid::whereBetween('created_at', [$startDate, $endDate])
                  ->whereIn('jenjang', ['TKTQ', 'TKTQ-2'])      
                  ->count();
              } elseif (Auth::user()->userDetail->pj_jenjang == 'SD-IT') {
                $register = DataMurid::whereBetween('created_at', [$startDate, $endDate])
                  ->whereIn('jenjang', ['SD-IT', 'SD-IT-2'])      
                  ->count();
              } else {
                $register = DataMurid::whereBetween('created_at', [$startDate, $endDate])
                  ->where('jenjang', Auth::user()->userDetail->pj_jenjang)      
                  ->count();
              }

              if (Auth::user()->userDetail->pj_jenjang == 'TKTQ') {
                $profit = dataPayment::whereNotNull('approve_date')
                  ->whereIn('jenjang', ['TKTQ', 'TKTQ-2'])
                  ->sum('amount');
              } elseif (Auth::user()->userDetail->pj_jenjang == 'SD-IT') {
                $profit = dataPayment::whereNotNull('approve_date')
                  ->whereIn('jenjang', ['SD-IT', 'SD-IT-2'])
                  ->sum('amount');
              } else {
                $profit = dataPayment::whereNotNull('approve_date')
                  ->where('jenjang', Auth::user()->userDetail->pj_jenjang)
                  ->sum('amount');
              }
              // TKTQ
              $needConfirmPaymentTKTQ = dataPayment::whereNotNull(['file'])->whereNull('approve_date')->where('jenjang', 'TKTQ')->count();
              $confirmedPaymentTKTQ = dataPayment::where('status','Paid')->where('jenjang', 'TKTQ')->count();
              $needVerifTKTQ = dataMurid::whereNotNull(['tempat_lahir','tgl_lahir'])->where('proses', 'Input Data')->where('jenjang', 'TKTQ')->count();
              // TKTQ 2
              $needConfirmPaymentTKTQ2 = dataPayment::whereNotNull(['file'])->whereNull('approve_date')->where('jenjang', 'TKTQ-2')->count();
              $confirmedPaymentTKTQ2 = dataPayment::where('status','Paid')->where('jenjang', 'TKTQ-2')->count();
              $needVerifTKTQ2 = dataMurid::whereNotNull(['tempat_lahir','tgl_lahir'])->where('proses', 'Input Data')->where('jenjang', 'TKTQ-2')->count();
              // SDIT
              $needConfirmPaymentSDIT = dataPayment::whereNotNull(['file'])->whereNull('approve_date')->where('jenjang', 'SD-IT')->count();
              $confirmedPaymentSDIT = dataPayment::where('status','Paid')->where('jenjang', 'SD-IT')->count();
              $needVerifSDIT = dataMurid::whereNotNull(['tempat_lahir','tgl_lahir'])->where('proses', 'Input Data')->where('jenjang', 'SD-IT')->count();
              // SDIT 2
              $needConfirmPaymentSDIT2 = dataPayment::whereNotNull(['file'])->whereNull('approve_date')->where('jenjang', 'SD-IT-2')->count();
              $confirmedPaymentSDIT2 = dataPayment::where('status','Paid')->where('jenjang', 'SD-IT-2')->count();
              $needVerifSDIT2 = dataMurid::whereNotNull(['tempat_lahir','tgl_lahir'])->where('proses', 'Input Data')->where('jenjang', 'SD-IT-2')->count();
              // SMP IT
              $needConfirmPaymentSMPIT = dataPayment::whereNotNull(['file'])->whereNull('approve_date')->where('jenjang', 'SMP-IT')->count();
              $confirmedPaymentSMPIT = dataPayment::where('status','Paid')->where('jenjang', 'SMP-IT')->count();
              $needVerifSMPIT = dataMurid::whereNotNull(['tempat_lahir','tgl_lahir'])->where('proses', 'Input Data')->where('jenjang', 'SMP-IT')->count();
              // SMA IT
              $needConfirmPaymentSMAIT = dataPayment::whereNotNull(['file'])->whereNull('approve_date')->where('jenjang', 'SMA-IT')->count();
              $confirmedPaymentSMAIT = dataPayment::where('status','Paid')->where('jenjang', 'SMA-IT')->count();
              $needVerifSMAIT = dataMurid::whereNotNull(['tempat_lahir','tgl_lahir'])->where('proses', 'Input Data')->where('jenjang', 'SMA-IT')->count();
              // MA
              $needConfirmPaymentMA = dataPayment::whereNotNull(['file'])->whereNull('approve_date')->where('jenjang', 'MA')->count();
              $confirmedPaymentMA = dataPayment::where('status','Paid')->where('jenjang', 'MA')->count();
              $needVerifMA = dataMurid::whereNotNull(['tempat_lahir','tgl_lahir'])->where('proses', 'Input Data')->where('jenjang', 'MA')->count();              
              
              $pendaftar = DB::table('data_murids')
                ->select('jenjang', DB::raw('COUNT(*) as jumlah_pendaftar'))
                ->groupBy('jenjang')
                ->get();
              
              $pendaftar_jk = DB::table('data_murids')
                ->select('jenjang',
                        //  DB::raw('COUNT(*) as total_pendaftar'),
                         DB::raw('SUM(CASE WHEN jenis_kelamin = "Laki-Laki" THEN 1 ELSE 0 END) AS jumlah_pendaftar_laki'),
                         DB::raw('SUM(CASE WHEN jenis_kelamin = "Perempuan" THEN 1 ELSE 0 END) AS jumlah_pendaftar_perempuan'))
                ->groupBy('jenjang')
                ->get();
                
              $pendaftar_jlr = DB::table('data_murids')
                ->select('jenjang',
                         DB::raw('SUM(CASE WHEN jalur = "Reguler" THEN 1 ELSE 0 END) AS jumlah_pendaftar_reguler'),
                         DB::raw('SUM(CASE WHEN jalur = "Prestasi" THEN 1 ELSE 0 END) AS jumlah_pendaftar_prestasi'))
                ->groupBy('jenjang')
                ->get();

              $biaya = DB::table('payment_registrations')
                ->select('jenjang', DB::raw('SUM(amount) as total_amount'))
                ->whereNotNull('approve_date')
                ->whereIn('jenjang', ['TKTQ', 'TKTQ-2', 'SD-IT', 'SD-IT-2', 'SMP-IT', 'SMA-IT', 'MA'])
                ->groupBy('jenjang')
                ->get();

              return view('ppdb::backend.index', compact('register',
                                                          'needConfirmPaymentTKTQ',
                                                          'confirmedPaymentTKTQ',
                                                          'needVerifTKTQ',
                                                          'needConfirmPaymentTKTQ2',
                                                          'confirmedPaymentTKTQ2',
                                                          'needVerifTKTQ2',
                                                          'needConfirmPaymentSDIT',
                                                          'confirmedPaymentSDIT',
                                                          'needVerifSDIT',
                                                          'needConfirmPaymentSDIT2',
                                                          'confirmedPaymentSDIT2',
                                                          'needVerifSDIT2',
                                                          'needConfirmPaymentSMPIT',
                                                          'confirmedPaymentSMPIT',
                                                          'needVerifSMPIT',
                                                          'needConfirmPaymentSMAIT',
                                                          'confirmedPaymentSMAIT',
                                                          'needVerifSMAIT',
                                                          'needConfirmPaymentMA',
                                                          'confirmedPaymentMA',
                                                          'needVerifMA',
                                                          'pendaftar',
                                                          'pendaftar_jk',
                                                          'biaya',
                                                          'profit',
                                                          'pendaftar_jlr'));


            } elseif ($role == 'Guest' || $role == 'Terverifikasi' ||  $role == 'Lulus' || $role == 'Tidak Lulus') {
              $infoTesUjian = InfoTesUjian::where('jenjang', Auth::user()->muridDetail->jenjang)->first();
              $infoDaftarUlang = InfoDaftarUlang::where('jenjang', Auth::user()->muridDetail->jenjang)->first();
              $admins = UsersDetail::all();

              return view('ppdb::backend.index', compact('infoTesUjian', 'infoDaftarUlang', 'admins'));
            }
        }
    }
}
