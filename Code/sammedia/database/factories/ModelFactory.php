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
    ];
});


$factory->define(App\Mo::class, function (Faker\Generator $faker) {
    return [
        'msisdn'=>$faker->msisdn, 
        'operatorid'=>$faker->operatorid,
        'shortcodeid'=>$faker->shortcodeid,
        'text'=>$faker->text,
        'auth_token'=>$faker->auth_token,
        'created_at'=>$faker->created_at
    ];
});
