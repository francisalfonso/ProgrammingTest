<?php

namespace Database\Factories;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fname' => $this->faker->firstName(),
            'lname' => $this->faker->lastName(),
            'companyID' => $this->faker->numberBetween(1, Listing::count()),
            'email' => $this->faker->companyEmail(),
            'phone' => $this->faker->phoneNumber(),
        ];
    }
}
