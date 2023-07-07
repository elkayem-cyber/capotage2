<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetController extends Controller
{
 public function index(){
    return view('Vendor.index');
 }
}
