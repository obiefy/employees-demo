<?php

/** @var Factory $factory */

use App\Company;
use App\Employee;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->companyEmail,
        'phone' => $faker->phoneNumber,

        'company_id' => factory(Company::class)
    ];
});
