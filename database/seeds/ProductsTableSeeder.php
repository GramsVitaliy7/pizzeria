<?php

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductDoping;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, 50)->make()->each(function ($product) {
            factory(ProductVariant::class, 3)->create(['product_id'=>$product->id]);
            factory(ProductDoping::class, 3)->create(['product_id'=>$product->id]);
        });
    }
}
