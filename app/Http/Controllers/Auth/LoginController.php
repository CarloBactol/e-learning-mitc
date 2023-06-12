<?php

namespace App\Http\Controllers\Auth;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected function Authenticated()
    {
        if (Auth::check()) {
            if (Auth::user()->role_as == '1') { // 1 - admin login
                return redirect('admin/dashboard')->with('success', 'Welcome back Admin');
            } elseif (Auth::user()->role_as == '0') { // 0 - normal cashier
                return redirect('/dashstudents')->with('success', 'Welecome back Cashier');
            } elseif (Auth::user()->role_as == '2') { // 0 - normal cashier
                return redirect('/teacher/dashteachers')->with('success', 'Welecome back Cashier');
            } else {
                return abort(404);
            }
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected $maxAttempts = 3;
    protected $decayMinutes = 1;
}
