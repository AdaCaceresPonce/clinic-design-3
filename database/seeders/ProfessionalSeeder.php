<?php

namespace Database\Seeders;

use App\Models\Professional;
use App\Models\Specialty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfessionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Professional::factory(10)->create()->each(function(Professional $professional){
            $specialties = Specialty::all();
            $randomSpecialty = $specialties->random();
            $professional->specialties()->attach($randomSpecialty);
        });
    }
}
