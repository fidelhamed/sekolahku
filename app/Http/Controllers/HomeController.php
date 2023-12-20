<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Events;
use App\Models\dataMurid;
use App\Models\dataPayment;
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

        if (Auth::check()) {
            // DASHBOARD ADMIN \\
            if ($role == 'Admin') {

              $murid = dataMurid::whereNotIn('proses',['Murid','Ditolak'])->whereYear('created_at', Carbon::now())->count();
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
                         DB::raw('COUNT(*) as total_pendaftar'),
                         DB::raw('SUM(CASE WHEN jenis_kelamin = "Laki-Laki" THEN 1 ELSE 0 END) AS jumlah_pendaftar_laki'),
                         DB::raw('SUM(CASE WHEN jenis_kelamin = "Perempuan" THEN 1 ELSE 0 END) AS jumlah_pendaftar_perempuan'))
                ->groupBy('jenjang')
                ->get();
                
              $biaya = DB::table('payment_registrations')
                ->select('jenjang', DB::raw('SUM(amount) as total_amount'))
                ->whereNotNull('approve_date')
                ->whereIn('jenjang', ['SMP-IT', 'SMA-IT', 'MA'])
                ->groupBy('jenjang')
                ->get();

              return view('backend.website.home', compact('murid','lulus','tidakLulus','event','acara', 'profit', 'pendaftar', 'pendaftar_jk', 'profit', 'biaya'));


            }
            // // DASHBOARD MURID \\
            // elseif ($role == 'Murid') {
            //   $auth = Auth::id();

            //   $event = Events::where('is_active','0')->first();
            //   $lateness = Borrowing::with('members')
            //   ->when(isset($auth), function($q) use($auth){
            //     $q->whereHas('members', function($a) use($auth){
            //       switch ($auth) {
            //         case $auth:
            //          $a->where('user_id', Auth::id());
            //           break;
            //       }
            //     });
            //   })
            //   ->whereNull('lateness')
            //   ->count();


            //   $pinjam = Borrowing::with('members')
            //   ->when(isset($auth), function($q) use($auth){
            //     $q->whereHas('members', function($a) use($auth){
            //       switch ($auth) {
            //         case $auth:
            //          $a->where('user_id', Auth::id());
            //           break;
            //       }
            //     });
            //   })
            //   ->count();

            //   return view('murid::index', compact('event','lateness','pinjam'));

            // }

            // elseif ($role == 'Guru' || $role == 'Staf') {

            //   $event = Events::where('is_active','0')->first();

            //   return view('backend.website.home', compact('event'));


            // }
            // DASHBOARD PPDB & PENDAFTAR \\
            elseif($role == 'PPDB') {

              $register = dataMurid::whereYear('created_at', Carbon::now())->count();
              $profit = dataPayment::whereNotNull('approve_date')->sum('amount');
              $needConfirmPaymentSMPIT = dataPayment::whereNotNull(['sender','destination_bank','file'])->whereNull('approve_date')->where('jenjang', 'SMP-IT')->count();
              $confirmedPaymentSMPIT = dataPayment::where('status','Paid')->where('jenjang', 'SMP-IT')->count();
              $needVerifSMPIT = dataMurid::whereNotNull(['tempat_lahir','tgl_lahir'])->whereNull('nisn')->where('proses', 'Input Data')->where('jenjang', 'SMP-IT')->count();
              $needConfirmPaymentSMAIT = dataPayment::whereNotNull(['sender','destination_bank','file'])->whereNull('approve_date')->where('jenjang', 'SMA-IT')->count();
              $confirmedPaymentSMAIT = dataPayment::where('status','Paid')->where('jenjang', 'SMA-IT')->count();
              $needVerifSMAIT = dataMurid::whereNotNull(['tempat_lahir','tgl_lahir'])->whereNull('nisn')->where('proses', 'Input Data')->where('jenjang', 'SMA-IT')->count();
              $needConfirmPaymentMA = dataPayment::whereNotNull(['sender','destination_bank','file'])->whereNull('approve_date')->where('jenjang', 'MA')->count();
              $confirmedPaymentMA = dataPayment::where('status','Paid')->where('jenjang', 'MA')->count();
              $needVerifMA = dataMurid::whereNotNull(['tempat_lahir','tgl_lahir'])->whereNull('nisn')->where('proses', 'Input Data')->where('jenjang', 'MA')->count();              
              
              $pendaftar = DB::table('data_murids')
                ->select('jenjang', DB::raw('COUNT(*) as jumlah_pendaftar'))
                ->groupBy('jenjang')
                ->get();
              
              $pendaftar_jk = DB::table('data_murids')
                ->select('jenjang',
                         DB::raw('COUNT(*) as total_pendaftar'),
                         DB::raw('SUM(CASE WHEN jenis_kelamin = "Laki-Laki" THEN 1 ELSE 0 END) AS jumlah_pendaftar_laki'),
                         DB::raw('SUM(CASE WHEN jenis_kelamin = "Perempuan" THEN 1 ELSE 0 END) AS jumlah_pendaftar_perempuan'))
                ->groupBy('jenjang')
                ->get();

              $biaya = DB::table('payment_registrations')
                ->select('jenjang', DB::raw('SUM(amount) as total_amount'))
                ->whereNotNull('approve_date')
                ->whereIn('jenjang', ['SMP-IT', 'SMA-IT', 'MA'])
                ->groupBy('jenjang')
                ->get();

              return view('ppdb::backend.index', compact('register','needConfirmPaymentSMPIT','confirmedPaymentSMPIT','profit','needVerifSMPIT','needConfirmPaymentSMAIT','confirmedPaymentSMAIT','needVerifSMAIT','needConfirmPaymentMA','confirmedPaymentMA','needVerifMA', 'pendaftar', 'pendaftar_jk', 'biaya'));


            } elseif ($role == 'Guest' || $role == 'Terverifikasi' ||  $role == 'Lulus' || $role == 'Tidak Lulus') {
              $infoTesUjian = InfoTesUjian::where('jenjang', Auth::user()->muridDetail->jenjang)->first();
              $infoDaftarUlang = InfoDaftarUlang::where('jenjang', Auth::user()->muridDetail->jenjang)->first();

              return view('ppdb::backend.index', compact('infoTesUjian', 'infoDaftarUlang'));
            }
            // // DASHBOARD PERPUSTAKAAN \\
            // elseif ($role == 'Perpustakaan') {

            //   $book = Book::sum('stock');
            //   $borrow = Borrowing::whereNull('lateness')->count();
            //   $member = Member::where('is_active',0)->count();
            //   $members = Member::count();
            //   return view('perpustakaan::index', compact('book','borrow','member','members'));
            // }

            // // DASHBOARD BENDAHARA \\
            // elseif ($role == 'Bendahara') {
            //   return view('spp::index');
            // }
        }
    }
}
