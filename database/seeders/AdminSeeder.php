<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'roles' => 'admin',
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(60)
        ]);
    }
}
