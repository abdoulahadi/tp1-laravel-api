<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnneeAcademiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('annee_academiques')->insert([
            [
                'annee_academique' => '2021-2022',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'annee_academique' => '2022-2023',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
