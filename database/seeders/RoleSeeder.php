<?php

namespace Database\Seeders;

use App\Models\role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        role::create([
            'role_name' => 'admin',
        ]);

        role::create([
            'role_name' => 'teacher',
        ]);

        role::create([
            'role_name' => 'student',
        ]);
    }
}
