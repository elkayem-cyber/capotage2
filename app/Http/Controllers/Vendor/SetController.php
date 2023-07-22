<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Chat;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SetController extends Controller
{
   public function store_annonce(Request $request){
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required|numeric',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'description' => 'required',
        'pictures' => 'required|image',
    ],[
        'name.required' => 'Champ Obligatoire',
        'price.required' => 'Champ Obligatoire',
        'quantity.required' => 'Champ Obligatoire',
        'start_date.required' => 'Champ Obligatoire',
        'start_date.date' => 'Champ Invalid',
        'end_date.required' => 'Champ Obligatoire',
        'end_date.date' => 'Champ Invalid',
        'end_date.after_or_equal' => 'Champ Invalid',
        'description.required' => 'Champ Obligatoire',
        'pictures.required' => 'Champ Obligatoire',
        'pictures.image' => 'Type Image autorisé',
    ]);
    $product=new Product;
    $product->name=$request->name;
    $product->price=$request->price;
    $product->start_date=$request->start_date;
    $product->end_date=$request->end_date;
    $product->description=$request->description;
    $product->vendor_id=Auth::guard('vendor')->user()->id;
    $product->quantity=$request->quantity;
if ($request->pictures) {
    $file = $request->file('pictures');
    $filename = uniqid() . '.' . $file->getClientOriginalExtension();
    $file_path='Uploads/Products/';
    $file->move(public_path($file_path), $filename);
    $product->pictures=$file_path.$filename;
}
$product->save();
return redirect()->back()->with('success', 'Ajout Annonce  avec succès.');

   }
   public function send_message(Request $request, $id)
   {
       $request->validate([
           'message' => 'required',

       ], [
           'message.required' => "Vous ne pouvez pas envoyer un message vide",
       ]);
       $chat=new Chat();
       $chat->vendor_id=Auth::guard('vendor')->user()->id;
       $chat->user_id=$id;
       $chat->message=$request->message;
       $chat->sender='v';
       $chat->save();
       return redirect()->back()->with('success', 'envoyé');

   }
}
