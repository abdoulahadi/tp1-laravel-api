<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\AnneeAcademiqueSeeder;
use Database\Seeders\InscriptionSeeder;
use Database\Seeders\NiveauSeeder;
use Database\Seeders\FormationSeeder;
use Database\Seeders\EtudiantSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(EtudiantSeeder::class);
        $this->call(AnneeAcademiqueSeeder::class);
        $this->call(NiveauSeeder::class);
        $this->call(FormationSeeder::class);
        $this->call(InscriptionSeeder::class);
        $this->call(UserSeeder::class);
    }
}
