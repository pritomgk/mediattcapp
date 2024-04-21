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
            'email_verified' => 1,
            'verify_token' => 657434,
            'password' => Hash::make('Pritomgk@12#'),
        ]);

        admin_user::create([
            'name' => 'Holy It',
            'email' => 'holy.it01@gmail.com',
            'status' => 1,
            'email_verified' => 1,
            'verify_token' => 654434,
            'password' => Hash::make('Holyit@1990'),
        ]);
    }
}


