<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
      return  $user= User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        Auth::loginUsingId($user);

    }

    public function ShowRegsiterVendor(){
        return view('auth.register_vendor');
    }
    public function RegsiterVendor(Request $request){
        $this->validate($request, [
            'email'=>'required|unique:vendors,email|email',
            'first_name'=>'required|alpha',
            'last_name'=>'required|alpha',
            'phone_number'=>'required|numeric',
            'password'=>'required|confirmed|min:8',
            ],[
                'email.required'=>'Champ Obligatoire',
                'email.unique'=>'email exist deja',
                'first_name.required'=>'Champ Obligatoire',
                'first_name.alpha'=>'Champ Invalid',
                'last_name.required'=>'Champ Obligatoire',
                'last_name.alpha'=>'Champ Invalid',
                'phone_number.required'=>'Champ Obligatoire',
                'phone_number.numeric'=>'Champ Invalid',
                'password.required'=>'Champ Obligatoire',
                'password.confirmed'=>'Erreur de Confirmation mot de passe',
                'password.min'=>'Mot de passe contient au minimum 8 caractères ',


            ]);
          $vendor= new Vendor;
          $vendor->first_name = $request->first_name;
          $vendor->last_name = $request->last_name;
          $vendor->phone_number = $request->phone_number;
          $vendor->email = $request->email;
          $vendor->password = Hash::make($request->password);
          $vendor->save();
          Auth::guard('vendor')->login($vendor);
    /*     Auth::loginUsingId($vendor); */
     return redirect()->route('vendor.index');
    }


}
