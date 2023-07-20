<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetController extends Controller
{
    public function index()
    {
        return view('User.index');
    }
    public function contact()
    {
        return view('User.contact');
    }
    public function about()
    {
        return view('User.about');
    }

    public function produits()
    {
        $products=Product::where('is_actif', true)->
where('quantity', '>', 0)->
        OrderBy('id', 'desc')->paginate(3);
        return view('User.produits', compact('products'));
    }
    public function show_produit($id)
    {
        $product=Product::where('is_actif', true)->
where('quantity', '>', 0)->
        OrderBy('id', 'desc')->where('id', '=', $id)->first();
        if ($product) {
            return view('User.show_produit', compact('product'));
        }
        return redirect()->back();

    }
    public function paniers()
    {
        $cartItems = \Cart::getContent();

        return view('User.paniers', compact('cartItems'));

    }
    public function mes_commandes()
    {
        return view('User.mes_commandes');
    }
    public function maps()
    {
        return view('User.maps');
    }
    public function mes_messages()
    {
        return view('User.mes_messages');
    }
    public function messages_by_id($id)
    {
        return view('User.messages_by_id');
    }
}
