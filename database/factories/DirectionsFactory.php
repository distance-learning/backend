<?php

$factory->define(App\Direction::class, function (Faker\Generator $faker) {
    return [
        'name'          => $faker->title,
        'description'   => $faker->text,
        'faculty_id'    => 1
    ];
});

$factory->defineAs(App\Direction::class, 'active', function (Faker\Generator $faker) {
    return [
        'name'          =>  'Test',
        'description'   =>  'Big test',
        'faculty_id'    =>  '1',
        'deleted_at'    =>  null,
    ];
});