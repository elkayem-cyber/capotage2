<?php

namespace App\Models;

use App\Models\Chat;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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
    public function users()
    {
        return $this->belongsToMany(User::class, 'chats', 'vendor_id', 'user_id');
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
    public function nbmessages()
    {

        return $this->chats->where('user_id', Auth::guard('web')->user()->id)->count();
    }
}
