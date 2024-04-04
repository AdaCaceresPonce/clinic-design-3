<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialties = [
            [
                'name' => 'Dentista',
            ],
            [
                'name' => 'Ortodoncista',
            ],
            [
                'name' => 'Periodontista',
            ],
            [
                'name' => 'Odontopediatra',
            ],
            [
                'name' => 'Endodoncista',
            ],
        ];

        foreach($specialties as $specialty){
            Specialty::create($specialty);
        };
    }
}
