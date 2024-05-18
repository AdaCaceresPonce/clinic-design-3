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

            'about_title' => '<p><strong>Una Cl&iacute;nica Dental en la que puedes <span style="color: rgb(0, 117, 255);">confiar.</span></strong></p>',
            'about_description'=>'<p>En nuestra cl&iacute;nica dental, nos enorgullecemos de ofrecer cuidado dental excepcional con un enfoque centrado en nuestros pacientes. Nuestro equipo de profesionales altamente capacitados est&aacute; comprometido con brindarle una experiencia c&oacute;moda y efectiva en cada visita. Desde limpiezas regulares hasta procedimientos m&aacute;s complejos, estamos aqu&iacute; para cuidar de su salud bucal de manera integral y personalizada.</p>',
            'about_we_offer_you' => 'Equipamiento moderno, Monitoreo continuo, Equipo de Profesionales capacitado',
            'about_image' => '',

            'our_services_title'=>'<p><strong><span style="color: rgb(0, 117, 255);">Nuestros Servicios Dentales</span></strong></p>',
            'our_services_description'=>'<p>Descubre los servicios que ponemos a tu disposici&oacute;n, siempre con la mejor atenci&oacute;n m&eacute;dica dental.</p>',

            'our_professionals_title'=>'<p><span style="color: rgb(0, 117, 255);"><strong>Nuestros Profesionales</strong></span></p>',
            'our_professionals_description'=>'<p>Disponemos de un equipo de profesionales altamente capacitados.</p>',

            'testimonials_title'=>'<p><span style="color: rgb(0, 117, 255);"><strong>Nuestros Profesionales</strong></span></p>',
            'testimonials_description'=>'<p>Pacientes de diferentes lugares nos dejan sus opiniones.</p>',
            
        ];

        WelcomePageContent::create($content);
    }
}
