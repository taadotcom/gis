<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = User::create([
            'name'     => 'Admin',
            'username'     => 'admin',
            'email'    => 'gisdev.rtp@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

    }
}
