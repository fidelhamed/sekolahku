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

    protected function authenticated()
    {
        if(Auth::User()->status == 'Tidak Aktif') {
            Auth::logout();
            Session::flash('error', "Akun yang kamu gunakan sudah Tidak Aktif !");
            return redirect('login');
        }
    }

    // protected function authenticate(Request $request)
    // {
    //     // Determine if input is email or username
    //     $loginField = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        
    //     $credentials = [
    //         $loginField => $request->login,
    //         'password' => $request->password
    //     ];

    //     // Attempt authentication
    //     if (Auth::attempt($credentials)) {
    //         // Check user status after successful login
    //         if(Auth::user()->status == 'Tidak Aktif') {
    //             Auth::logout();
    //             Session::flash('error', "Akun yang kamu gunakan sudah Tidak Aktif !");
    //             return redirect('login');
    //         }
    //         return redirect()->intended('dashboard');
    //     }

    //     // If authentication fails
    //     return back()->withErrors([
    //         'login' => 'Email/username atau password salah.'
    //     ]);
    // }
}
