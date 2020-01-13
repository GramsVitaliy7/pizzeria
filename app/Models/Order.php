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
    public function selectedProducts()
    {
        return $this->belongsToMany(
            SelectedProduct::class,
            'orders_selected_products',
            'order_id',
            'selected_product_id')
            ->withPivot('amount');
    }

    public function getTotalAttribute() {
        $total = 0;
        foreach ($this->selectedProducts as $selectedProduct) {
            //calculate all dopings of the selected product
            foreach ($selectedProduct->productDopings as $doping) {
                $total += $doping->price;
            }
            //sum with the product variant price
            $total += $selectedProduct->productVariant->price;
            //multiply with count of such products
            $total *= $selectedProduct->pivot->amount;
        }
        return $total;
    }
}
