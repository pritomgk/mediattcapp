<?php

namespace Database\Seeders;

use App\Models\admin_user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        admin_user::create([
            'name' => 'Pritom GK',
            'email' => 'pritomguha62@gmail.com',
            'status' => 1,
            'password' => Hash::make('Pritomgk@12#'),
        ]);
    }
}
