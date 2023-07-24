<?php

namespace App\Http\Controllers\Vendor;

use App\Models\OLigne;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    public function update_quantity_cmd(Request $request, $id)
    {

        $request->validate([
            'quantity_accepted' => 'required|numeric',
        ], [
            'quantity_accepted.required' => 'Champ Obligatoire',
            'quantity_accepted.numeric' => 'Champ Invalid',

        ]);
        $ligne=OLigne::find($id);
        if ($ligne) {
            $product= $ligne->product;
            $product->quantity+=$ligne->quantity_accepted;
            $ligne->quantity_accepted=$request->quantity_accepted;
            $product->quantity-=$request->quantity_accepted;
            $ligne->save();
            $product->save();
            return redirect()->back()->with('success', 'Modification  avec succès.');

        } else {
            return redirect()->route('vendor.commandes');
        }
    }
    public function update_state_cmd($id)
    {
        /* acquired */
        $ligne=OLigne::find($id);
        if ($ligne) {
            if ($ligne->quantity_accepted ==0) {
                return redirect()->back()->with('errs', 'Quantité Accepté est égale a 0 .');
            } else {
                $ligne->acquired=true;

                $ligne->save();

                return redirect()->back()->with('success', 'Modification  avec succès.');
            }


        } else {
            return redirect()->route('vendor.commandes');
        }
    }

    public function update_state_product($id)
    {
        $product=Product::find($id);
        if ($product) {
            $product->is_actif=!$product->is_actif;

            $product->save();
            return redirect()->back()->with('success', 'Changement de Visibilié Produit  avec succès.');
        }
    }
    public function update_product(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'required',
            'pictures' => 'image',
        ], [
            'name.required' => 'Champ Obligatoire',
            'price.required' => 'Champ Obligatoire',
            'quantity.required' => 'Champ Obligatoire',
            'start_date.required' => 'Champ Obligatoire',
            'start_date.date' => 'Champ Invalid',
            'end_date.required' => 'Champ Obligatoire',
            'end_date.date' => 'Champ Invalid',
            'end_date.after_or_equal' => 'Champ Invalid',
            'description.required' => 'Champ Obligatoire',
            'pictures.image' => 'Type Image autorisé',
        ]);
        $product=Product::find($id);
        if ($product) {
            $product->name=$request->name;
            $product->price=$request->price;
            $product->start_date=$request->start_date;
            $product->end_date=$request->end_date;
            $product->description=$request->description;
            $product->vendor_id=Auth::guard('vendor')->user()->id;
            $product->quantity=$request->quantity;
            if ($request->pictures) {
                if ($product->pictures) {
                    unlink($product->pictures);
                }
                $file = $request->file('pictures');
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $file_path='Uploads/Products/';
                $file->move(public_path($file_path), $filename);
                $product->pictures=$file_path.$filename;
            }
            $product->save();
            return redirect()->back()->with('success', 'Modification Produits  avec succès.');

        }
    }
    public function update_profile(Request $request)
    {
        $vendor=Auth::guard('vendor')->user();
        $this->validate($request, [
            'email'=>"required|unique:vendors,email,$vendor->id|email",
            'first_name'=>'required|alpha',
            'last_name'=>'required|alpha',
            'phone_number'=>'required|numeric',
            'avatar'=>'image',
            ], [
                'email.required'=>'Champ Obligatoire',
                'email.unique'=>'email exist deja',
                'first_name.required'=>'Champ Obligatoire',
                'first_name.alpha'=>'Champ Invalid',
                'last_name.required'=>'Champ Obligatoire',
                'last_name.alpha'=>'Champ Invalid',
                'phone_number.required'=>'Champ Obligatoire',
                'phone_number.numeric'=>'Champ Invalid',
                'avatar.image'=>'il faut choisir une image',

            ]);

        $vendor->first_name = $request->first_name;
        $vendor->last_name = $request->last_name;
        $vendor->phone_number = $request->phone_number;
        $vendor->email = $request->email;
        $vendor->bio = $request->bio;
        if ($request->avatar) {
            if ($vendor->avatar) {
                unlink($vendor->avatar);
            }
            $file = $request->file('avatar');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file_path='Uploads/Avatar/';
            $file->move(public_path($file_path), $filename);
            $vendor->avatar=$file_path.$filename;
        }

        $vendor->save();

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
            $vendor=Auth::guard('vendor')->user();

        $vendor->password = Hash::make($request->password);
        $vendor->save();

        return redirect()->back()->with('success', 'Mot de passe Changé  avec succès.');

    }
    public function update_position(Request $request){
        $vendor=Auth::guard('vendor')->user();
        $vendor->lat=$request->latitude;
        $vendor->lng=$request->longitude;
        $vendor->save();
        return redirect()->back()->with('success', 'Changement Position avec succès.');


    }
}
