<?php

use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class ProductVariantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductVariant::class, 100)->create();
    }
}
