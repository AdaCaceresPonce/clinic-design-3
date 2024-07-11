<?php

namespace Database\Seeders;

use App\Models\OurServicesPageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class OurServicesPageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        $content = [
            
            'cover_title' => 'Nuestros Servicios',
            'cover_img' => 'web_pages_images/our_services_page/' . $faker->image('public/storage/web_pages_images/our_services_page', 1200, 800, null, false),
    
            'our_services_title' => '<p><strong><span style="color: rgb(0, 117, 255);">Nuestros Servicios Dentales</span></strong></p>',
            'our_services_description'=>'<p>En nuestra clínica dental, ofrecemos una amplia gama de servicios diseñados para satisfacer todas tus necesidades de salud bucal. Desde limpiezas y exámenes regulares hasta tratamientos avanzados como implantes dentales, ortodoncia y estética dental, nuestro equipo de profesionales está comprometido a proporcionar una atención de alta calidad en un ambiente cómodo y acogedor. Utilizamos tecnología de vanguardia y las mejores prácticas clínicas para garantizar que recibas el cuidado más efectivo y personalizado posible. Tu sonrisa es nuestra prioridad, y nos esforzamos por ayudarte a mantenerla saludable y radiante.</p>',
            'our_services_img' => 'web_pages_images/our_services_page/' . $faker->image('public/storage/web_pages_images/our_services_page', 1200, 800, null, false),
            
            'services_we_offer_title'=>'<p><strong><span style="color: rgb(0, 117, 255);">Nuestros Servicios Dentales</span></strong></p>',
            'services_we_offer_description'=>'<p>Descubre los servicios que ponemos a tu disposici&oacute;n, siempre con la mejor atenci&oacute;n m&eacute;dica dental.</p>',

        ];

        OurServicesPageContent::create($content);
    }
}
