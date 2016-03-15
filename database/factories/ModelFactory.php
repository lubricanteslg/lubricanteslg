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
    ];
});

$factory->define(App\Client::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'business_type' => 'J',
        'business_id' => $faker->randomNumber($nbDigits = 9) // 79907610,
        'address' =>$faker->address,
        'phone' =>$faker->phoneNumber,
        'email' => $faker->email,
        'zone' => $faker->randomNumber($nbDigits = 1),
        'zone2' => $faker->randomNumber($nbDigits = 2),
        'salesman' => $faker->name,
        'last_order' => $faker->date,
    ];
});
