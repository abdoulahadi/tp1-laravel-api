<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 1; $i <= 5; $i++) {
            DB::table('inscriptions')->insert([
                'etudiant_id' => rand(1, 5), 
                'formation_id' => rand(1, 3), 
                'niveau_id' => rand(1, 5), 
                'annee_academique_id' => rand(1, 2), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
