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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'avatar' => '',
        'birthday' => $faker->date(''),
        'phone' => $faker->phoneNumber,
    ];
});


$factory->defineAs(App\User::class, 'teachers', function (Faker\Generator $faker) {
    return [
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'avatar' => '',
        'birthday' => $faker->date('Y-m-d', '1990-09-01'),
        'phone' => $faker->phoneNumber,
        'role'  => 'teacher',
        'email' => $faker->email,
        'description' => $faker->text,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'status'    => true,
    ];
});

$factory->defineAs(App\User::class, 'teacher-active', function (Faker\Generator $faker) {
    return [
        'name' => 'Test',
        'surname' => 'User',
        'avatar' => '',
        'birthday' => $faker->date('Y-m-d', '1990-09-01'),
        'phone' => '0931212123',
        'role'  => 'teacher',
        'email' => 'test@gmail.com',
        'description' => 'Teacher description',
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'status'    => true
    ];
});

$factory->defineAs(App\User::class, 'teacher-not-active', function (Faker\Generator $faker) {
    return [
        'name' => 'Test',
        'surname' => 'User2',
        'avatar' => '',
        'birthday' => $faker->date('Y-m-d', '1990-09-01'),
        'phone' => '0931212124',
        'role'  => 'teacher',
        'email' => 'test2@gmail.com',
        'description' => 'Teacher description',
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'status'    => false
    ];
});