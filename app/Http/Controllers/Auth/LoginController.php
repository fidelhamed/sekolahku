<?php

namespace App\Http\Controllers\Auth;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'identifier' => 'required|string',
            'password'   => 'required'
        ]);
    
        $field = filter_var($request->identifier, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    
        if (Auth::attempt([$field => $request->identifier, 'password' => $request->password])) {
            // Login berhasil
            return redirect()->intended('home');
        }
    
        // Jika login gagal
        return back()->withErrors([
            'identifier' => 'Email atau Username dan Password tidak cocok.',
        ]);
    }

    protected function authenticated()
    {
        if(Auth::User()->status == 'Tidak Aktif') {
            Auth::logout();
            Session::flash('error', "Akun yang kamu gunakan sudah Tidak Aktif !");
            return redirect('login');
        }
    }

    }
