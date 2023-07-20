<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OLigne extends Model
{
    /* O:Order ==>Orders Lignes */
    use HasFactory;
    protected $table="olignes";
    protected $fillable = [
        'order_id','product_id','quantity_requested','quantity_accepted'
    ];
   /**
    * Get the user that owns the OLigne
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function order()
   {
       return $this->belongsTo(Order::class, 'order_id');
   }

   public function product()
   {
       return $this->belongsTo(Product::class, 'product_id');
   }


}
