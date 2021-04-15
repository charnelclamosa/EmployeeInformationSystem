<?php

namespace Database\Factories;

use App\Models\Employee;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();

        return [
            'employee_code' => strtoupper(Str::random(2)) . $faker->numberBetween(1, 999),
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'birth_date' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
            'address' => $faker->address,
            'contact_no' => $faker->phoneNumber,
            'job_title_code' => $faker->numberBetween(1, 13),
            'contract_status' => $faker->numberBetween(1, 5),
            'department_code' => $faker->numberBetween(1, 5),
            'section_code' => $faker->numberBetween(1, 8),
            'team_code' => $faker->numberBetween(1, 13),
            'updated_by' => 'admin'
        ];
    }
}
