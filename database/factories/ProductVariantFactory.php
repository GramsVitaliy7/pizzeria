<?php

/** @var Factory $factory */

use App\Models\ProductVariant;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(ProductVariant::class, function (Faker $faker) {
    return [
        'size' => $faker->randomNumber(2),
        'price' => $faker->randomFloat(2, 200, 1000),
    ];
});
