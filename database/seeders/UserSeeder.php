<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'Ikhlas',
            'role' => 'user',
            'email' => 'Ikhlas@gmail.com',
            'password' => 'password12345', // Password akan otomatis di-hash
        ]);
    }
}
