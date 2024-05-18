<?php

namespace Database\Seeders;

use App\Models\OurProfessionalsPageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurProfessionalsPageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $content = [
            
            'cover_title' => 'Nuestros Profesionales',
            'cover_img' => '',
    
            'our_professionals_title' => '<p><strong><span style="color: rgb(0, 117, 255);">Conoce a Nuestros Profesionales</span></strong></p>',
            'our_professionals_description' => '<p>En nuestra clínica dental, contamos con un equipo de profesionales altamente calificados y dedicados a brindarte la mejor atención. Cada miembro de nuestro equipo trae consigo una combinación de experiencia, conocimientos y pasión por la odontología, asegurando que recibas el cuidado más adecuado y efectivo para tus necesidades. Nuestros especialistas están comprometidos con la educación continua y la adopción de las últimas tecnologías y técnicas dentales. Esto nos permite ofrecerte tratamientos innovadores y personalizados, manteniendo siempre los más altos estándares de calidad y seguridad. Además, nuestro personal de apoyo está siempre dispuesto a asistirte y hacer que tu experiencia en nuestra clínica sea cómoda y placentera.</p>',
            'our_professionals_img'=>'',
            
            'our_professionals_team_title' => '<p><strong><span style="color: rgb(0, 117, 255);">Nuestro Equipo de Profesionales</span></strong></p>',
            'our_professionals_team_description' => '<p>Disponemos de un equipo de profesionales altamente capacitados</p>',
            
        ];

        OurProfessionalsPageContent::create($content);
    }
}
