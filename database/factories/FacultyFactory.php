<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Faculty::class, function (Faker\Generator $faker) {
    return [
        'name'          => $faker->title,
        'description'   => $faker->text,
        'avatar'        => '',
    ];
});

$factory->defineAs(App\Faculty::class, 'fotius', function () {
    return [
        'name'          => 'ФОТИУС',
        'description'   => 'Опис факультету ФОТИУС',
        'avatar'        => '',
        'slug'          => 'fotius',
        'examinations'  => '[]',
    ];
});