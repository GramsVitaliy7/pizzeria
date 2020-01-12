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
        'name',
    ];
    public function product() {
        return $this->belongsTo(ProductVariant::class, 'product_id', 'id');
    }

    public function orders() {
        return $this->belongsToMany(Order::class,'orders_product_variants');
    }

    public function selectedProduct() {
        return $this->hasMany(Order::class,'product_variant_id');
    }
}
