<?php

namespace App\Http\Controllers\User;

use App\Models\Chat;
use App\Models\Order;
use App\Models\Vendor;
use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $orders=Order::where('user_id',Auth::guard('web')->user()->id)
        ->orderBy('id','desc')
        ->paginate('6');
        return view('User.mes_commandes',compact('orders'));
    }
    public function maps()
    {
        return view('User.maps');
    }
    public function mes_messages()
    {
        $user=Auth::guard('web')->user();
        $vendors=$user->vendors()->
        orderBy('id','asc')
        ->distinct()
        ->paginate(4);
        return view('User.mes_messages',compact('vendors'));
    }
    public function messages_by_id($id)
    {
        $vendor=Vendor::find($id);
        if ($vendor) {
            $chats=Chat::where('user_id',Auth::guard('web')->user()->id)
        ->where('vendor_id',$id)
        ->orderBy('id','desc')
        ->paginate(4);
        return view('User.messages_by_id',compact('chats','id'));
        }else{
            return redirect()->route('user.index');
        }
    }
    public function commande_by_id($id)
    {
        $order=Order::find($id);
$lignes=$order->olignes()->orderBy('id','desc')->paginate(6);

return view('User.commande_by_id',compact('lignes'));

    }
}
