<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('formations')->insert([
            [
                "nom" => "Mathématique",
                "description" => "Ceci est une description pour la formation Mathématique",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "nom" => "Informatique",
                "description" => "Ceci est une description pour la formation Informatique",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "nom" => "Physique",
                "description" => "Ceci est une description pour la formation Physique",
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
