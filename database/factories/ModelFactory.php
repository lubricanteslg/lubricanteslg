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
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\Client::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'code' => $faker->unique()->randomNumber($nbDigits = 4),
        'business_type' => 'J',
        'business_id' => $faker->randomNumber($nbDigits = 9), // 79907610,
        'address' =>$faker->address,
        'phone' =>$faker->phoneNumber,
        'email' => $faker->email,
        'zone' => $faker->randomNumber($nbDigits = 1),
        'zone2' => $faker->randomNumber($nbDigits = 2),
        'salesman_id' => $faker->randomElement($array = [1,2,3,4]),
        'last_order' => $faker->date
    ];
});

$factory->define(App\Order::class, function (Faker\Generator $faker) {
    return [
            'date' => $faker->date,
            'client_id' => $faker->randomNumber($nbDigits = 1),
            'lines' => $faker->randomNumber($nbDigits = 1),
            'subtotal' => $faker->randomNumber($nbDigits = 5),
            'tax' => $faker->randomNumber($nbDigits = 3),
            'total' => $faker->randomNumber($nbDigits = 5),
            'salesman_id' => $faker->randomElement($array = [1,2,3,4])

    ];
});

$factory->define(App\OrderDetail::class, function (Faker\Generator $faker) {
    return [
             'order_id' => $faker->randomNumber($nbDigits = 1),
             'product_code' => $faker->uuid,
             'product_desc' => $faker->colorName,
             'line' => $faker->randomNumber($nbDigits = 1),
             'qty' => $faker->randomNumber($nbDigits = 1),
             'price' => $faker->randomNumber($nbDigits = 5)

    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
             'code' => $faker->unique()->randomNumber($nbDigits = 4),
             'description' => $faker->domainWord,
             'stock' => $faker->randomNumber($nbDigits = 3),
             'price' => $faker->randomNumber($nbDigits = 5),
             'department_id' => $faker->randomElement($array = [1,2,3,4,5,6]),
             'category' => $faker->colorName,
             'brand' => $faker->colorName,
             'img_url' => $faker->imageUrl($width = 640, $height = 480),

    ];
});
