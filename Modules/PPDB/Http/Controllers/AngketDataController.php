<?php

namespace Modules\PPDB\Http\Controllers;

use App\Models\User;
use Illuminate\Routing\Controller;
// use App\Models\DataMurid;
// use ErrorException;
// use Illuminate\Http\Request;
// use Modules\PPDB\Entities\Angket;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Session;
// use Modules\PPDB\Entities\AngketAnswer;
// use Modules\PPDB\Entities\AngketResponse;

class AngketDataController extends Controller
{
    public function index()  
    {  
        $users = User::where('role', 'Lulus')
            ->with(['angketResponses.answers.angket', 'muridDetail'])
            ->get();  
        return view('ppdb::backend.angket.angketData', compact('users'));  
    }
}
