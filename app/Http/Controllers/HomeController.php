<?php

namespace App\Http\Controllers;

use App\Models\dataMurid;
use App\Models\Events;
use App\Models\User;
use App\Models\dataPayment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Perpustakaan\Entities\Book;
use Modules\Perpustakaan\Entities\Borrowing;
use Modules\Perpustakaan\Entities\Member;

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
              $acara = Events::where('is_active','0')->count();
              $event = Events::where('is_active','0')->orderBy('created_at','desc')->first();

              return view('backend.website.home', compact('murid','lulus','event','acara'));


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
            elseif($role == 'Guest' || $role == 'PPDB' || $role == 'Terverifikasi' || $role == 'Lulus' || $role == 'Tidak Lulus') {

              $register = dataMurid::whereNotIn('proses',['Murid','Ditolak'])->whereYear('created_at', Carbon::now())->count();
              $needConfirmPayment = dataPayment::whereNotNull(['sender','destination_bank','file'])->whereNull('approve_date')->count();
              $confirmedPayment = dataPayment::where('status','Paid')->count();
              $needVerif = dataMurid::whereNotNull(['tempat_lahir','tgl_lahir'])->whereNull('nisn')->where('proses', 'Input Data')->count();
              return view('ppdb::backend.index', compact('register','needConfirmPayment','confirmedPayment','needVerif'));


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
