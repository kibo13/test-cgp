<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\ClientCompany;
use App\Models\Company;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
        ]);

        Client::factory(10000)->create();
        Company::factory(10000)->create();
        ClientCompany::factory(10000)->create();
    }
}
