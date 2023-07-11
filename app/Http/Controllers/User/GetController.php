<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetController extends Controller
{
   public function index(){
    return view('User.index');
   }
   public function contact(){
    return view('User.contact');
   }
   public function about(){
    return view('User.about');
   }
   public function services(){
    return view('User.services');
   }
   public function produits(){
    return view('User.produits');
   }
   public function paniers(){
    return view('User.paniers');
   }
   public function maps(){
    return view('User.maps');
   }
}
