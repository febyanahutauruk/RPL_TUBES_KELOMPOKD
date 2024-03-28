<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'Administrator',
            'email' => 'admin@localhost.com', 
            'role' => 'admin',
            'password' => bcrypt('password'),

        ]);
        Admin::create([
            'name' => 'pasien',
            'email' => 'pasien@localhost.com', 
            'role' => 'pasien',
            'password' => bcrypt('password'),

        ]);
    }
}
