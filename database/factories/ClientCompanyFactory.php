<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientCompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'company_id' => rand(Company::query()->min('id'), Company::query()->max('id')),
            'client_id'  => rand(Client::query()->min('id'), Client::query()->max('id')),
//            'client_id'  => function () { return Client::all()->random()->id; },
        ];
    }
}
