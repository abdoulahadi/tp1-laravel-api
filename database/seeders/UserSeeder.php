<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 1; $i <= 5; $i++) {
            DB::table('users')->insert([
                'name' => 'user ' . $i,
                'email' => 'user' . $i . '@tp1-laravel.com',
                'password' => Hash::make('Passer@123'),
            ]);
        }
    }
}
