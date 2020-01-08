<?php

/** @var Factory $factory */

use App\Models\ProductDoping;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(ProductDoping::class, function (Faker $faker) {
    return [
        'product_id' => random_int(2,30),
        'name' => $faker->text(10),
        'price' => $faker->randomFloat(2, 200, 1000),
    ];
});
