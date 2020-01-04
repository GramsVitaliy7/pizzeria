<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'price',
        'size',
    ];

    public function product() {
        return $this->belongsTo(ProductVariant::class, 'product_id', 'id');
    }
}
