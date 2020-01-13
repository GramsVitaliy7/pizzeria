<?php

/** @var Factory $factory */

use App\Models\ProductCategory;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(ProductCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10) .  random_int(2,100),
        'parent_id' => null
    ];
});
