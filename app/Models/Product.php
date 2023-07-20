<?php

namespace App\Models;

use App\Models\OLigne;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    /**
     * Get the olignes that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function olignes()
    {
        return $this->HasMany(OLigne::class);
    }

public function vendor()
{
    return $this->belongsTo(Vendor::class);
}
}
