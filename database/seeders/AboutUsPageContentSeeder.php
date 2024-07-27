<?php

namespace Database\Seeders;

use App\Models\AboutUsPageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class AboutUsPageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $content = [
            
            'cover_title' => 'Sobre Nosotros',
            'cover_img' => 'web_pages_images/about_us_page/' . $faker->image('public/storage/web_pages_images/about_us_page', 1280, 853, null, false),
    
            'about_us_title' => '<p><strong><span style="color: rgb(0, 117, 255);">¿Quienes somos?</span></strong></p>',
            'about_us_description' => 'En nuestra clínica dental, nos dedicamos a brindarte la mejor atención y cuidado dental. Con años de experiencia en el sector, nuestro equipo de profesionales altamente calificados se esfuerza por ofrecerte tratamientos personalizados y de alta calidad, adaptados a tus necesidades específicas. Nos enorgullece contar con tecnología de vanguardia y técnicas innovadoras que nos permiten garantizarte resultados óptimos y una experiencia cómoda y segura. Desde limpiezas dentales de rutina hasta procedimientos más complejos, estamos aquí para ayudarte a mantener una sonrisa saludable y radiante. Creemos en la importancia de la educación y la prevención, por lo que nos comprometemos a proporcionarte toda la información y los consejos necesarios para el cuidado de tu salud bucal. Nuestro objetivo es que te sientas cómodo y confiado cada vez que nos visites, sabiendo que estás en buenas manos.',
            'about_us_img'=> 'web_pages_images/about_us_page/' . $faker->image('public/storage/web_pages_images/about_us_page', 1280, 853, null, false),
            
            'free_title_1' => '<p><strong><span style="color: rgb(0, 117, 255);">Nuestra Misión</span></strong></p>',
            'free_description_1' => 'En nuestra clínica dental, estamos comprometidos con tu salud bucal y bienestar. Nuestra misión es proporcionarte una atención dental integral, utilizando las técnicas más avanzadas y materiales de alta calidad para garantizar resultados duraderos y satisfactorios. Nos esforzamos por crear un ambiente acogedor y profesional donde cada paciente se sienta valorado y cuidado.',

            'free_title_2'=>'<p><strong><span style="color: rgb(0, 117, 255);">Nuestra Visión</span></strong></p>',
            'free_description_2'=>'Aspiramos a ser la clínica dental de referencia en la comunidad, reconocida por nuestra excelencia en el servicio y dedicación a la innovación. Queremos que cada visita sea una experiencia positiva y transformadora, donde nuestros pacientes sientan confianza y satisfacción. Trabajamos continuamente para mejorar y adaptarnos a las necesidades cambiantes, siempre con el objetivo de mantener y mejorar la salud bucal de quienes confían en nosotros.',

            'free_img'=>'web_pages_images/about_us_page/' . $faker->image('public/storage/web_pages_images/about_us_page', 1280, 853, null, false),
            
        ];

        AboutUsPageContent::create($content);
    }
}
