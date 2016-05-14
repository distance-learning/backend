<?php

$factory->define(\App\Course::class, function (Faker\Generator $faker) {
    return [
        'teacher_id' => null,
        'subject_id' => null,
        'group_id'   => null,
    ];
});