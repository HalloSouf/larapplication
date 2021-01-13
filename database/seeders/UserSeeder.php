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
        User::create([
            'firstname' => 'admin',
            'lastname' => 'administrator',
            'email' => 'admin@mail.com',
            'role' => 2,
            'password' => Hash::make('Adminpass10!')
        ]);
    }
}
