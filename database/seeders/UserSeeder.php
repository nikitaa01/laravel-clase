<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create user with Model user
        User::create([
            'name' => 'John Doe',
            'email' => 'jhondoe@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
