<?php

namespace Database\Seeders;

use App\Models\WelcomePageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WelcomePageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $content = [
            
            'cover_title' => '<p><strong>Prep&aacute;rate para una <span style="color: rgb(0, 117, 255);">grandiosa experiencia dental.</span></strong></p>',
            'cover_description' => '<p>En Cl&iacute;nica Dental utilizamos las mejores herramientas y materiales para brindarte un servicio y atenci&oacute;n de calidad velando siempre por tu comodidad.</p>',
            'cover_img' => '',

            'about_title' => 'Una Clínica Dental en la que puedes confiar.',
            'about_description'=>'En nuestra clínica dental, nos enorgullecemos de ofrecer cuidado dental excepcional con un enfoque centrado en nuestros pacientes. Nuestro equipo de profesionales altamente capacitados está comprometido con brindarle una experiencia cómoda y efectiva en cada visita. Desde limpiezas regulares hasta procedimientos más complejos, estamos aquí para cuidar de su salud bucal de manera integral y personalizada.',
            'about_we_offer_you' => 'Equipamiento moderno,Monitoreo continuo,Equipo de Profesionales capacitado',
            'about_image' => '',

            'our_services_title'=>'Nuestros Servicios Dentales',
            'our_services_description'=>'Descubre los servicios que ponemos a tu disposición, siempre con la mejor atención médica dental.',

            'our_professionals_title'=>'Nuestros Profesionales',
            'our_professionals_description'=>'Disponemos de un equipo de profesionales altamente capacitados.',

            'testimonials_title'=>'Lo que nuestros pacientes opinan',
            'testimonials_description'=>'Pacientes de diferentes lugares nos dejan sus opiniones.',
            
        ];

        WelcomePageContent::create($content);
    }
}
