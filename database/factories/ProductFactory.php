<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
App\Product::truncate();
$factory->define(App\Product::class, function (Faker $faker) {
	$name=$faker->randomElement(['Anillos','Pulseras','Collares','Cadenas','Colgantes','Pendientes']).' '.$faker->citySuffix      .' '.$faker->state.' '.$faker->citySuffix.' '.$faker->state;
    return [
        'title' => $name,
        'slug' => str_slug($name),
        'content'=>$faker->text($maxNbChars = 500)  ,
		'price'=>$faker->numberBetween($min = 300, $max = 5000), // 8567
		'quantity'=>$faker->numberBetween($min = 30, $max = 100), // 8567		
		'quantity_min'=>$faker->numberBetween($min = 1, $max = 10), // 8567
		'activo'=>1,
		'so_categories_id'=>$faker->numberBetween($min = 1, $max = 6)
    ];
});
