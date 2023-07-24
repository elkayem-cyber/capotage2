<?php

namespace App\Http\Controllers\User;

use App\Models\Chat;
use App\Models\Order;
use App\Models\OLigne;
use App\Models\Contact;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SetController extends Controller
{
    public function checkout()
    {
        $order=new Order([
            "user_id"=>1,
            'date'=>date('Y-m-d'),
        ]);
        $order->save();
        $orders_lignes=[];
        $panier= \Cart::getContent();
        foreach ($panier as $p) {
            $orders_lignes[]= new OLigne([
                "product_id"=>$p->id,
                "price"=>$p->price,
                "quantity_requested"=>$p->quantity,
           ]);
        }
        $order->olignes()->saveMany($orders_lignes);
        \Cart::clear();
        return redirect()->route('user.commandes')->with('success', 'Demande Commande avec Sucees');
    }
    public function send_message(Request $request, $id)
    {
        $request->validate([
            'message' => 'required',

        ], [
            'message.required' => "Vous ne pouvez pas envoyer un message vide",
        ]);
        $chat=new Chat();
        $chat->user_id=Auth::guard('web')->user()->id;
        $chat->vendor_id=$id;
        $chat->message=$request->message;
        $chat->sender='u';
        $chat->save();
        return redirect()->back()->with('success', 'envoyé');

    }
    public function Sendcontact(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',

        ], [
            'name.required' => "Champ Obligatoire",
            'email.required' => "Champ Obligatoire",
            'email.required' => "Champ Obligatoire",
            'message.required' => "Vous ne pouvez pas envoyer un message vide",
        ]);
        $contact=new Contact;
        $contact->name =$request->name;
        $contact->email =$request->email;
        $contact->message =$request->message;
        $contact->subject =$request->subject;
        $contact->save();
        return redirect()->back()->with('success', 'Message envoyé avec succès');

    }
}
