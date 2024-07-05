<?php

namespace Database\Seeders;

use App\Models\ClinicInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class ClinicInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        $info = [
            'phone' => '225533',
            'cellphone' => '999 999 999',
            'schedule' => 'Lunes a Viernes: 7:00 am - 8:00 pm / Sábados y Domingos: 7:00 am - 3:00 pm',
            'email' => 'clinicadental@mail.com',
            'address'=>'Calle Avenida 123 lote 123',
            'navbar_clinic_logo' => 'clinic_information_images/navbar/' . $faker->image('public/storage/clinic_information_images/navbar', 600, 600, null, false),
            'footer_clinic_logo' => 'clinic_information_images/footer/' . $faker->image('public/storage/clinic_information_images/footer', 600, 600, null, false),
            'facebook_link'=>'https://www.facebook.com/',
            'twitter_link'=>'https://www.twitter.com/',
            'instagram_link'=>'https://www.instagram.com/',
        ];

        ClinicInformation::create($info);
    }
}
