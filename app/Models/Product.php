<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'price',
        'image_name',
        'description',
    ];

    public function productVariants() {
        return $this->hasMany(ProductVariant::class, 'product_id', 'id');
    }

    public function productDopings() {
        return $this->hasMany(ProductDoping::class, 'product_id', 'id');
    }
}
