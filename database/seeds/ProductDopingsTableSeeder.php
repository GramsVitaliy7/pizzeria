<?php

use App\Models\ProductDoping;
use Illuminate\Database\Seeder;

class ProductDopingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductDoping::class, 100)->create();
    }
}
