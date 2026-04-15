<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('user')->insert([
            [
                'id_level'   => 1, // Admin
                'name'       => 'Administrator',
                'email'      => 'admin@gmail.com',
                'password'   => Hash::make('admin123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_level'   => 2, // Pimpinan
                'name'       => 'Raja Terakhir Last Final Boss',
                'email'      => 'pimpinan@gmail.com',
                'password'   => Hash::make('pimpinan123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_level'   => 3, // Operator
                'name'       => 'Operator Satu',
                'email'      => 'operator@gmail.com',
                'password'   => Hash::make('operator123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}