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

    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id', 'id');
    }

    public function productDopings()
    {
        return $this->hasMany(ProductDoping::class, 'product_id', 'id');
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

    public function scopeFilter($query)
    {
        dd(request()->all());
        //filter product category
        if (request('category')) {
            $query->where('products.category_id', '=', request('category'));
        }
        //price sort (asc/desc)
        if (request('priceSort')) {
            $query
                ->join('product_variants as pv', 'products.id', '=', 'pv.product_id')
                ->orderByRaw('MIN(pv.price) ' . request('priceSort'))
                ->groupBy('products.id');
        }
        //rating sort (1-5 start, step = 0.1)
        if (request('minRating') && request('maxRating')) {
            $query
                ->whereBetween('products.rating', [request('minRating'), request('maxRating')]);
        }
        return $query;
    }
}
