<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDoping extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'name',
        'price',
    ];

    public function product() {
        return $this->belongsTo(ProductDoping::class, 'product_id', 'id');
    }
}
