<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'delivery_address'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function selected_products()
    {
        return $this->belongsToMany(
            SelectedProduct::class,
            'orders_selected_products',
            'order_id',
            'selected_product_id')
            ->withPivot('amount');
    }

    public function getOrderTotalPrice() {
        $total = 0;
        foreach ($this->selected_products as $product) {
            //calculate all dopings of the selected product
            foreach ($product->productDopings as $doping) {
                $total += $doping->price;
            }
            //sum with the product variant price
            $total += $product->productVariant->price;
            //multiply with count of such products
            $total *= $product->pivot->amount;
        }
        return $total;
    }
}
