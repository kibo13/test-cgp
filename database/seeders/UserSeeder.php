<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = config('constants.users');

        foreach ($users as $index => $user)
        {
            if ( ! User::query()->where('email', $user['email'])->exists())
            {
                User::query()->create([
                    'id'       => ++$index,
                    'name'     => $user['name'],
                    'email'    => $user['email'],
                    'password' => Hash::make('password'),
                ]);
            }
        }
    }
}
