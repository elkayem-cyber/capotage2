<?php

namespace App\Models;

use App\Models\Chat;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password','phone_number','address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function vendors()
    {
        return $this->belongsToMany(Vendor::class, 'chats', 'user_id', 'vendor_id');
    }
    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
    public function nbmessages()
    {

        return $this->chats->where('vendor_id', Auth::guard('vendor')->user()->id)->count();
    }

}
