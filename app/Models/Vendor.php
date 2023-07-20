<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Vendor extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'first_name','last_name', 'email', 'password','phone_number',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
