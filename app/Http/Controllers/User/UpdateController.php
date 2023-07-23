<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    public function update_profile(Request $request)
    {

        $user=Auth::guard('web')->user();
        $this->validate($request, [
            'email'=>"required|unique:vendors,email,$user->id|email",
            'first_name'=>'required|alpha',
            'last_name'=>'required|alpha',
            'phone_number'=>'required|numeric',
            'address'=>'required',

            ], [
                'email.required'=>'Champ Obligatoire',
                'email.unique'=>'email exist deja',
                'first_name.required'=>'Champ Obligatoire',
                'first_name.alpha'=>'Champ Invalid',
                'last_name.required'=>'Champ Obligatoire',
                'last_name.alpha'=>'Champ Invalid',
                'phone_number.required'=>'Champ Obligatoire',
                'address.required'=>'Champ Obligatoire',
                'phone_number.numeric'=>'Champ Invalid',


            ]);

      $user->first_name = $request->first_name;
      $user->last_name = $request->last_name;
      $user->phone_number = $request->phone_number;
      $user->email = $request->email;
      $user->address = $request->address;

      $user->save();

        return redirect()->back()->with('success', 'Modification Coordonnées  avec succès.');

    }


    public function update_password(Request $request)
    {
        $this->validate($request, [

            'password'=>'required|confirmed|min:8',
            ], [
            'password.required'=>'Champ Obligatoire',
                'password.confirmed'=>'Erreur de Confirmation mot de passe',
                'password.min'=>'Mot de passe contient au minimum 8 caractères ',

            ]);
        $vendor=Auth::guard('web')->user();

        $vendor->password = Hash::make($request->password);
        $vendor->save();

        return redirect()->back()->with('success', 'Mot de passe Changé  avec succès.');

    }
}
