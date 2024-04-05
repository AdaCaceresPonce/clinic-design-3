<?php

namespace Database\Seeders;

use App\Models\ClinicInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClinicInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $info = [
            'phone' => '225533',
            'cellphone' => '999 999 999',
            'schedule' => 'Lunes a Viernes: 7:00 am - 8:00 pm / Sabados y Domingos: 7:00 am - 3:00pm',
            'email' => 'clinicadental@mail.com',
            'address'=>'Calle 123 lote 12',
            'navbar_clinic_logo' => 'img/navbar_logo.png',
            'footer_clinic_logo' => 'img/footer_logo.jpg',
            'facebook_link'=>'https://www.facebook.com/',
            'twitter_link'=>'https://www.twitter.com/',
            'instagram_link'=>'https://www.instagram.com/',
        ];

        ClinicInformation::create($info);
    }
}
