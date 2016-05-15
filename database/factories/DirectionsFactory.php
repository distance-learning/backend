<?php

$factory->define(App\Direction::class, function (Faker\Generator $faker) {
    return [
        'name'          => $faker->title,
        'description'   => $faker->text,
        'faculty_id'    => 1
    ];
});