<?php

namespace Database\Seeders;

use App\Models\ContactUsPageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ContactUsPageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $content = [
            
            'cover_title' => 'Contáctanos',
            'cover_img' => 'web_pages_images/contact_us_page/' . $faker->image('public/storage/web_pages_images/contact_us_page', 1200, 800, null, false),
    
            'contact_us_title' => '<p><strong>Comunícate con nosotros. Estamos a tu servicio.</strong></p>',
            'contact_us_description' => '<p><strong><span style="color: rgb(0, 117, 255);">Solicita una cita o envia una consulta. Nos contactaremos contigo lo mas antes posible.</span></strong></p>',
            'contact_us_img'=> 'web_pages_images/contact_us_page/' . $faker->image('public/storage/web_pages_images/contact_us_page', 1200, 800, null, false),

            'opinions_title' => '<p><strong>¡Comparte tu opinión con nosotros!</strong></p>',
            'opinions_description' => '<p><strong><span style="color: rgb(0, 117, 255);">En nuestra clínica, tu opinión es muy importante. Queremos saber cómo ha sido tu experiencia con nuestros servicios para poder mejorar y ofrecerte siempre lo mejor.</span></strong></p>',
            'opinions_img'=> 'web_pages_images/contact_us_page/' . $faker->image('public/storage/web_pages_images/contact_us_page', 1200, 800, null, false),
            
        ];

        ContactUsPageContent::create($content);
    }
}
