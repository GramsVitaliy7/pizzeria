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

    public function orders() {
        return $this->belongsToMany(Order::class,'orders_product_dopings');
    }

    public function selectedProducts() {
        return $this->belongsToMany(ProductDoping::class,'product_dopings_selected_products');
    }
}
