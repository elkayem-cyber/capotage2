<?php

namespace App\Http\Controllers\User;

use App\Models\Chat;
use App\Models\Order;
use App\Models\OLigne;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
   public function delte_message($id){
    $chat=Chat::find($id);
    if ($chat) {
       $chat->delete();
       return redirect()->back()->with('success', 'Message Supprimeé avce Success');
    }
    else {
        return redirect()->route('user.index');
    }
   }
   public function delete_ligne($id){

    $ligne=OLigne::find($id);
        if ($ligne && !$ligne->acquired) {
            if ($ligne->quantity_accepted>0) {
                $product= $ligne->product;
                $product->quantity+=$ligne->quantity_accepted;
                $product->save();
                $ligne->delete();
            }
            else{
                $ligne->delete();
            }
            return redirect()->back()->with('success', 'Suppression de demande  avec succès.');

        } else {
            return redirect()->route('user.commandes');
        }
   }
   public function delete_cmd($id){

    $order=Order::find($id);
    if ($order && $order->products->count()==0) {
       $order->delete();
       return redirect()->back()->with('success', 'Suppression de Coammnde  avec succès.');

    }
    else{
        return redirect()->route('user.commandes');
    }
   }
}
