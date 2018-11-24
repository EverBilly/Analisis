<?php

use Faker\Generator as Faker;

$factory->define(App\Categoria::class, function (Faker $faker) {
    $title = $faker->sentence(4);

    return [
    	'id'		=> rand(1,15),
        'categoria' => $faker->text(10),
    ];
});
