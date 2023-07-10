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
   public function maps(){
    return view('User.maps');
   }
}
