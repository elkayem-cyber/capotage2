<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\OLigne;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SetController extends Controller
{
    public function checkout(){
        $order=new Order([
            "user_id"=>1,
            'date'=>'2023-03-09',
        ]);
        $order->save();
        $orders_lignes=[];
        $panier= \Cart::getContent();
        foreach ($panier as $p) {
            $orders_lignes[]= new OLigne([
                "product_id"=>$p->id,
                "quantity_requested"=>$p->quantity,
           ]);
        }
        $order->olignes()->saveMany($orders_lignes);
        \Cart::clear();
       return redirect()->route('user.commandes')->with('success','Demande Commande avec Sucees');
      }
}
