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

use Illuminate\Support\Facades\DB;
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

    public function produits(Request $request)
    {
        $searchQuery = $request->input('search');

        $query = Product::where('is_actif', true)
            ->where('quantity', '>', 0);

        // Check if a search query is provided
        if ($searchQuery) {
            $query->where('name', 'like', '%' . $searchQuery . '%');
        }

        $products = $query->orderBy('id', 'desc')->paginate(9);

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
        $userLat = 48.8567; // Latitude de l'utilisateur (à remplacer par la latitude réelle obtenue via la géolocalisation)
        $userLng = 2.3523; // Longitude de l'utilisateur (à remplacer par la longitude réelle obtenue via la géolocalisation)

        $vendors = Vendor::select('*', DB::raw("(6371 * acos(cos(radians($userLat)) * cos(radians(lat)) * cos(radians(lng) - radians($userLng)) + sin(radians($userLat)) * sin(radians(lat)))) AS distance"))
            ->orderBy('distance', 'asc')
            ->get();


        return view('User.maps',compact('vendors', 'userLat', 'userLng'));
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
        return view('User.messages_by_id',compact('chats','vendor'));
        }else{
            return redirect()->route('user.index');
        }
    }
    public function commande_by_id($id)
    {
        $order=Order::find($id);
        if ($order) {
            $lignes=$order->olignes()->orderBy('id','desc')->paginate(6);

            return view('User.commande_by_id',compact('lignes'));
        }
        else {
            return redirect()->route('user.commandes');
        }


    }
    public function vendor_by_id($id){

        $vendor=Vendor::find($id);
        if ($vendor) {
            $products=Product::where('is_actif', true)->
            where('quantity', '>', 0)->
                    OrderBy('id', 'desc')
                    ->where('vendor_id',$vendor->id)
                    ->paginate(4);
            return view('User.details_vendor',compact('vendor','products'));
        }
        else{
            return redirect()->back();
        }
    }
}
