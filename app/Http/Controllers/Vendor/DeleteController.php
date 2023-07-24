<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Chat;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function delte_message($id)
    {
        $chat=Chat::find($id);
        if ($chat) {
            $chat->delete();
            return redirect()->back()->with('success', 'Message Supprimeé avce Success');
        } else {
            return redirect()->route('vendor.index');
        }
    }
    public function delete_product($id)
    {
        $product=Product::find($id);
        if ($product && $product->olignes->count()==0) {
            $product->delete();
            return redirect()->back()->with('success', 'Produit Supprimeé avce Success');
        } else {
            return redirect()->route('vendor.index');
        }
    }
}
