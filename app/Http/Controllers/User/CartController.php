<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CartController extends Controller
{



    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'pictures' => $request->pictures,
            )
        ]);
        return redirect()->back()->with('success', 'Produit Ajouté au Panier  avec succès.');
       /*  return redirect()->route('cart.list'); */
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );



        return redirect()->back()->with('success', 'Modification de Panier Avec Suceess!');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->back()->with('success', 'Suppression Produit de Panier Avec Suceess!');

    }

    public function clearAllCart()
    {
        \Cart::clear();

        return redirect()->back()->with('success', 'Panier Vide');

    }
}
