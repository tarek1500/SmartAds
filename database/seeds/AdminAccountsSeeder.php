<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Mostafa Ellethy',
            'email' => 'admin@domain.com',
            'password' => bcrypt('adminadmin'),
            'mobile' => 01116264673,
            'balance' => 1000000,
            'role' => 'admin',
            'confirmed' => true,
        ]);
    }
}
