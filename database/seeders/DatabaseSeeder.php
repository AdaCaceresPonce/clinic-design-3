<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('12345678'),
        ]);

        Storage::deleteDirectory('services/card_images');
        Storage::deleteDirectory('services/cover_images');
        Storage::deleteDirectory('professionals');

        Storage::makeDirectory('services/card_images');
        Storage::makeDirectory('services/cover_images');
        Storage::makeDirectory('professionals');

        $this->call(WelcomePageContentSeeder::class);
        $this->call(AboutUsPageContentSeeder::class);
        $this->call(OurProfessionalsPageContentSeeder::class);
        $this->call(ContactUsPageContentSeeder::class);

        Service::factory(12)->create();
        $this->call(ClinicInformationSeeder::class);
        $this->call(SpecialtySeeder::class);
        $this->call(ProfessionalSeeder::class);

    }
}
