<?php

namespace App\Http\Controllers\Vendor;

use App\Models\OLigne;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
}
