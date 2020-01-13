<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelectedProduct extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_variant_id',
    ];

    public function productVariant() {
        return $this->belongsTo(ProductVariant::class,'product_variant_id');
    }

    public function productDopings() {
        return $this->belongsToMany(ProductDoping::class,'product_dopings_selected_products');
    }

    public function orders()
    {
        return $this->belongsToMany(
            Order::class,
            'orders_selected_products',
            'selected_product_id',
            'order_id')
            ->withPivot('amount');
    }
}
