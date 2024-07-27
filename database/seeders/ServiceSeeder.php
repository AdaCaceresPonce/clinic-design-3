<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'name' => 'Ortodoncia',
                'short_description' => 'Logre la sonrisa que siempre ha deseado con nuestro servicio de ortodoncia. Nuestros expertos diseñan planes personalizados para alinear sus dientes de manera efectiva y cómoda.',
                'long_description' => 'Nuestro servicio de ortodoncia va más allá de la estética. Personalizamos cada tratamiento para corregir alineaciones dentales, mejorar la funcionalidad y promover una salud bucal integral. Desde opciones de brackets hasta alineadores invisibles, trabajamos en colaboración con usted para lograr la sonrisa que siempre ha deseado.',
                'card_image' => 'default/ortodoncia_card.jpg',
                'cover_image' => 'default/ortodoncia_cover.jpg',
            ],
            [
                'name' => 'Blanqueamiento Dental',
                'short_description' => 'Recupere la luminosidad de su sonrisa con nuestro tratamiento de blanqueamiento dental. Elimine manchas y decoloraciones para obtener una sonrisa más brillante y radiante.',
                'long_description' => 'Con nuestro tratamiento de blanqueamiento dental, eliminamos manchas superficiales y profundas, devolviéndole a sus dientes un brillo natural. Utilizamos técnicas avanzadas y productos de alta calidad para garantizar resultados duraderos y seguros, mientras usted disfruta de una experiencia cómoda y sin dolor.',
                'card_image' => 'default/blanqueamiento_dental_card.png',
                'cover_image' => 'default/blanqueamiento_dental_cover.jpg',
            ],
            [
                'name' => 'Limpieza Dental',
                'short_description' => ' Invierta en su salud bucal con nuestras limpiezas dentales. Elimine la placa y prevenga problemas dentales, disfrutando de una sensación de frescura y limpieza duradera.',
                'long_description' => 'Nuestro enfoque en la limpieza dental va más allá de lo rutinario. Nuestros higienistas dentales altamente capacitados realizan limpiezas minuciosas para eliminar la placa, prevenir la acumulación de sarro y promover una salud bucal óptima. Cada limpieza es una inversión en su bienestar dental a largo plazo.',
                'card_image' => 'default/limpieza_dental_card.jpg',
                'cover_image' => 'default/limpieza_dental_cover.jpg',
            ],
            [
                'name' => 'Anestésico Moderno',
                'short_description' => ' Garantizamos su comodidad con nuestro enfoque en la administración de anestesia moderna. Experimente tratamientos dentales sin dolor y sin ansiedad.',
                'long_description' => 'En nuestra clínica, entendemos que la ansiedad dental es común, y nos esforzamos por hacer que cada visita sea cómoda y sin estrés. Utilizamos técnicas de administración de anestesia moderna para garantizar tratamientos sin dolor y sin complicaciones.',
                'card_image' => 'default/anestesico_moderno_card.jpg',
                'cover_image' => 'default/anestesico_moderno_cover.jpg',
            ],
            [
                'name' => 'Soportes de Calidad',
                'short_description' => 'Obtenga soportes dentales duraderos y efectivos para correcciones ortodónticas o mejoras en la funcionalidad. Calidad que se ve y se siente.',
                'long_description' => 'Nuestros soportes dentales están diseñados con precisión y calidad para corregir problemas ortodónticos con eficacia. Ya sea para alinear dientes torcidos o mejorar la funcionalidad masticatoria, ofrecemos opciones de soportes personalizadas que se adaptan a sus necesidades específicas.',
                'card_image' => 'default/soportes_calidad_card.jpg',
                'cover_image' => 'default/soportes_calidad_cover.jpg',
            ],
            [
                'name' => 'Extracción Muelas de Juicio',
                'short_description' => 'Confíe en nuestro equipo especializado para extracciones de muelas de juicio seguras y expertas. Abordamos cada caso individualmente, minimizando molestias y optimizando la recuperación.',
                'long_description' => 'La extracción de muelas de juicio puede ser una experiencia preocupante, pero nuestro equipo especializado se asegurará de que se sienta cómodo y seguro. Evaluamos cada caso individualmente y realizamos extracciones con habilidad y cuidado, minimizando cualquier incomodidad y facilitando una recuperación sin problemas.',
                'card_image' => 'default/muelas_juicio_card.jpg',
                'cover_image' => 'default/muelas_juicio_cover.jpg',
            ],


        ]);
    }
}
