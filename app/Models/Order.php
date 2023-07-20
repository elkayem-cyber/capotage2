<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use App\Models\OLigne;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','date'
    ];
    protected $table='orders';
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function olignes(){
        return $this->hasMany(OLigne::class, 'order_id');
    }
    public function products(){
        return $this->belongsToMany(Product::class,OLigne::class);
    }

}
