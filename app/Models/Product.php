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
        'category_id',
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

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

    public function scopeFilter($query)
    {
        //filter product category
        if (request('category')) {
            $query->where('category_id', '=', request('category'));
        }
        return $query;
    }
}
