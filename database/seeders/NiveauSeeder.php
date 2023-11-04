<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NiveauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('niveaux')->insert([
            [
                "nom" => "Licence 1",
                "description" => "Ceci est une description pour le niveau licence 1",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "nom" => "Licence 2",
                "description" => "Ceci est une description pour le niveau licence 2",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "nom" => "Licence 3",
                "description" => "Ceci est une description pour le niveau licence 3",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "nom" => "Master 1",
                "description" => "Ceci est une description pour le niveau Master 1",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "nom" => "Master 2",
                "description" => "Ceci est une description pour le niveau Master 2",
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
