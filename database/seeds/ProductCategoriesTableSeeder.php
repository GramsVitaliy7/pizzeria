<?php

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductCategory::class, 20)->create()->each(function ($category) {
            factory(Product::class, 3)->create(['category_id'=>$category->id]);
        });
    }
}
