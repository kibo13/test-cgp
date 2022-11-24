<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'last_name'   => $this->faker->lastName(),
            'first_name'  => $this->faker->firstName(),
            'middle_name' => $this->faker->firstName(),
            'number'      => $this->faker->unique()->numerify('############'),
            'address'     => $this->faker->address(),
            'phone'       => $this->faker->unique()->numerify('771#######'),
        ];
    }
}
