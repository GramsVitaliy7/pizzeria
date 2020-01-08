<?php

/** @var Factory $factory */

use App\Models\ProductVariant;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(ProductVariant::class, function (Faker $faker) {
    return [
        'product_id' => random_int(2,30),
        'size' => $faker->randomNumber(2),
        'price' => $faker->randomFloat(2, 200, 1000),
    ];
});
