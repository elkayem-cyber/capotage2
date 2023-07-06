<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
        $this->middleware('guest:vendor')->except('logout');
    }
    public function ShowloginVendor()
    {
        return view('auth.login_vendor');
    }
    public function loginVendor(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('vendor')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
          /*   return redirect()->route('vendor.index'); */
        }
        return back()->withInput($request->only('email'));
    }
    public function logout(Request $request)
    {


        if(Auth::guard('vendor')->check()) { // this means that the admin was logged in.
            Auth::guard('vendor')->logout();
            return redirect()->route('Vendor.login.show');

        } else {
            Auth::guard('web')->logout();
            return redirect()->route('login');

        }
        $this->guard()->logout();
        $request->session()->invalidate();




    }
}
