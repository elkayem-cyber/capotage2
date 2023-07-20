<?php

namespace App\Http\Controllers\Vendor;

use App\Models\OLigne;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GetController extends Controller
{
    public function index()
    {
        return view('Vendor.index');
    }

    public function profile()
    {
        return view('Vendor.profile');

    }
    public function nouvelle_vente()
    {
        return view('Vendor.nouvelle_vente');
    }
    public function ancienne_vente()
    {

        $products=Product::where('vendor_id', Auth::guard('vendor')->user()->id)->paginate(2);
        return view('Vendor.ancienne_vente', compact('products'));
    }
    public function commandes()
    {
        $orderLines = Auth::guard('vendor')->user()->products()->with('olignes')->get()->pluck('olignes')->flatten();

        return view('Vendor.commandes', compact('orderLines'));
    }
    public function Consulter_commandes($id)
    {
        $ligne=OLigne::find($id);
        if ($ligne) {
            return view('Vendor.Consulter_commande', compact('ligne'));
        } else {
            return redirect()->back();
        }
    }
    public function show_product($id)
    {
        $product=Product::find($id);
        if ($product) {
            return view('Vendor.Consulter_produit', compact('product'));
        } else {
            return redirect()->back();
        }
    }
}
