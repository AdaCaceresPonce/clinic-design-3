<?php

namespace Database\Seeders;

use App\Models\ContactUsPageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactUsPageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $content = [
            
            'cover_title' => 'Contáctanos',
            'cover_img' => '',
    
            'contact_us_title' => '<p><strong>Comunícate con nosotros. Estamos a tu servicio.</strong></p>',
            'contact_us_description' => '<p><strong><span style="color: rgb(0, 117, 255);">Solicita una cita o envia una consulta. Nos contactaremos contigo lo mas antes posible.</span></strong></p>',
            'contact_us_img'=>'',
            
        ];

        ContactUsPageContent::create($content);
    }
}
