<?php

$factory->define(App\Subject::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->title,
        'description' => $faker->text(150),
        'faculty_id' => 1,
    ];
});

$factory->defineAs(App\Subject::class, 'OOP', function (Faker\Generator $faker) {
    return [
        'name' => 'OOP',
        'description' => 'Interesting subject',
        'faculty_id'    => '1',
        'deleted_at'    => null,
    ];
});