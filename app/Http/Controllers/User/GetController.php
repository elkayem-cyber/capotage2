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
    public function services()
    {
        return view('User.services');
    }
    public function produits()
    {
        $products=Product::where('is_actif', true)->
where('quantity', '>', 0)->
        OrderBy('id', 'desc')->paginate(3);
        return view('User.produits', compact('products'));
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
}
