<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name'          => $this->faker->sentence(2),
            'number'        => $this->faker->unique()->numerify('############'),
            'director'      => $this->faker->name(),
            'registered_at' => $this->faker->date(),
            'account'       => $this->faker->unique()->numerify('####################'),
            'address'       => $this->faker->address(),
        ];
    }
}
