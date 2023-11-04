<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Etudiant;

class EtudiantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 1; $i <= 5; $i++) {
            DB::table('etudiants')->insert([
                'nom' => 'Nom' . $i,
                'prenom' => 'Prenom' . $i,
                'ine' => 'INE' . $i,
                'code_etudiant' => Etudiant::generateUniqueCode('32'), 
                'date_de_naissance' => now()->subYears(20)->addDays($i),
                'lieu_de_naissance' => 'Lieu'.$i,
                'adresse' => 'Adresse' . $i,
                'sexe' => rand(0, 1) === 0 ? 'M' : 'F',
                'email' => 'email' . $i . '@tp1-laravel.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
