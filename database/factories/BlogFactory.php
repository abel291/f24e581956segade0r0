
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
App\Blog::truncate();
$factory->define(App\Blog::class, function (Faker $faker) {
		$title=$faker->sentence($nbWords = 6, $variableNbWords = true);
    return [
        'titulo' => $title,
        'slug' => str_slug($title),
        'contenido'=>$faker->text($maxNbChars = 2000),
        'entradilla'=>$faker->text($maxNbChars = 255),
        'main_img'=>'https://segadeoro.s3.us-east-2.amazonaws.com/segadeoro/thum/p'.rand(1,8).'.jpg',		
		'activo'=>1,
		'so_categories_id'=>$faker->numberBetween($min = 1, $max = 6)
        
    ];
});
