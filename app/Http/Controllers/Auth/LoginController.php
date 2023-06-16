<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\TimeTracker;
use Auth;
use DB;

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
        protected $redirectTo;

        public function redirectTo(){
            if (!Auth::check()) {
                return $this->redirectTo = '/login';
            }

            if (Auth::user()->role_id == 1) {
                return $this->redirectTo = '/admin/dashboard';
            }

            if (Auth::user()->role_id == 2) {

                return $this->redirectTo = '/emp/dashboard';
            }

            if (Auth::user()->role_id == 3) {

                return $this->redirectTo = '/manager/dashboard';
            }

            if (Auth::user()->role_id == 4) {

                return $this->redirectTo = '/hr/dashboard';
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
        // $this->middleware('guest:client_login')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'exists:users,' . $this->username() . ',status,1',
            'password' => 'required|string',
        ]);
    }

    public function logout()
    {
        // $checkinDone = TimeTracker::whereNull('checkout')
        //     ->whereHas('employee', function ($query) {
        //         $query->where('id', Auth::user()->employee->id);
        //     })
        //     ->first();

        // $checkinDone = TimeTracker::whereNull('checkout')
        // ->where('employee_id', Auth::user()->employee->id)
        // ->where('date', date('Y-m-d'))
        // ->first();

        // if(!$checkinDone || $checkinDone != Auth::user()->employee->id){
            Auth::logout();
            return redirect('/login');
        // }
        // else{
            // return redirect('/user_account')->with('logout', 'First Checkout your current time then logout');
        // }
    }


    public function showClientLoginForm()
    {
        return view('auth.client_login');
    }

    public function clientLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('client_login')->attempt(
            [
                'email' => $request->email,
                'password' => $request->password,
                'status' => 1
            ],
            $request->get('remember')
        )){
            return redirect()->intended('/ClientDashboard');
        }

        return back()->withErrors([
            'email' => 'Your credentials do not match our records.',
        ]);
    }

    public function clientLogout(Request $request)
    {
        Auth::guard('client_login')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/ClientLogin');
    }


}
