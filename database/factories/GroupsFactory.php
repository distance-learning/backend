<?php

$factory->define(App\Group::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->title,
        'year_of_entry' => $faker->numberBetween(2010, 2016),
        'direction_id' => '1',
    ];
});