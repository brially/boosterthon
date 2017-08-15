<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Brian Allison',
            'email' => 'brially@gmail.com',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'name' => 'Jordan Hayes',
            'email' => 'JHayes@boosterthon.com',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'name' => 'Matthew Parker',
            'email' => 'MParker@boosterthon.com',
            'password' => bcrypt('password'),
        ]);
    }
}
