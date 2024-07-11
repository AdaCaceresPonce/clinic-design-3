<?php

namespace Database\Seeders;

use App\Models\Inquiry;
use App\Models\Opinion;
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

        //Eliminar carpetas
        Storage::deleteDirectory('services/card_images');
        Storage::deleteDirectory('services/cover_images');
        Storage::deleteDirectory('professionals');

        Storage::deleteDirectory('clinic_information_images/navbar');
        Storage::deleteDirectory('clinic_information_images/footer');

        Storage::deleteDirectory('web_pages_images/welcome_page');
        Storage::deleteDirectory('web_pages_images/about_us_page');
        Storage::deleteDirectory('web_pages_images/our_services_page');
        Storage::deleteDirectory('web_pages_images/our_professionals_page');
        Storage::deleteDirectory('web_pages_images/contact_us_page');

        Storage::makeDirectory('services/card_images');
        Storage::makeDirectory('services/cover_images');
        Storage::makeDirectory('professionals');

        //Crear carpetas
        Storage::makeDirectory('clinic_information_images/navbar');
        Storage::makeDirectory('clinic_information_images/footer');

        Storage::makeDirectory('web_pages_images/welcome_page');
        Storage::makeDirectory('web_pages_images/about_us_page');
        Storage::makeDirectory('web_pages_images/our_services_page');
        Storage::makeDirectory('web_pages_images/our_professionals_page');
        Storage::makeDirectory('web_pages_images/contact_us_page');


        $this->call(WelcomePageContentSeeder::class);
        $this->call(AboutUsPageContentSeeder::class);
        $this->call(OurProfessionalsPageContentSeeder::class);
        $this->call(OurServicesPageContentSeeder::class);
        $this->call(ContactUsPageContentSeeder::class);

        Service::factory(12)->create();
        $this->call(ClinicInformationSeeder::class);
        $this->call(SpecialtySeeder::class);
        $this->call(ProfessionalSeeder::class);

        Inquiry::factory(30)->create();
        Opinion::factory(30)->create();

    }
}
