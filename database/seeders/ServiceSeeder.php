<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Ubicacion publica de las imágenes base a copiar
        $sourceBasePath = public_path('base_images/services');

        //Ruta de destino en storage para almacenar las imágenes copiadas
        $destinationPath = ('services');

        $services = [
            [
                'name' => 'Ortodoncia',
                'small_description' => 'Logre la sonrisa que siempre ha deseado con nuestro servicio de ortodoncia. Nuestros expertos diseñan planes personalizados para alinear sus dientes de manera efectiva y cómoda.',
                'long_description' => 'Nuestro servicio de ortodoncia va más allá de la estética. Personalizamos cada tratamiento para corregir alineaciones dentales, mejorar la funcionalidad y promover una salud bucal integral. Desde opciones de brackets hasta alineadores invisibles, trabajamos en colaboración con usted para lograr la sonrisa que siempre ha deseado.',
                'images' => [
                    'card_img_path' => 'card_images/ortodoncia_card.webp',
                    'cover_img_path' => 'cover_images/ortodoncia_cover.webp',
                ],
            ],
            [
                'name' => 'Blanqueamiento Dental',
                'small_description' => 'Recupere la luminosidad de su sonrisa con nuestro tratamiento de blanqueamiento dental. Elimine manchas y decoloraciones para obtener una sonrisa más brillante y radiante.',
                'long_description' => 'Con nuestro tratamiento de blanqueamiento dental, eliminamos manchas superficiales y profundas, devolviéndole a sus dientes un brillo natural. Utilizamos técnicas avanzadas y productos de alta calidad para garantizar resultados duraderos y seguros, mientras usted disfruta de una experiencia cómoda y sin dolor.',
                'images' => [
                    'card_img_path' => 'card_images/blanqueamiento_dental_card.webp',
                    'cover_img_path' => 'cover_images/blanqueamiento_dental_cover.webp',
                ],

            ],
            [
                'name' => 'Limpieza Dental',
                'small_description' => ' Invierta en su salud bucal con nuestras limpiezas dentales. Elimine la placa y prevenga problemas dentales, disfrutando de una sensación de frescura y limpieza duradera.',
                'long_description' => 'Nuestro enfoque en la limpieza dental va más allá de lo rutinario. Nuestros higienistas dentales altamente capacitados realizan limpiezas minuciosas para eliminar la placa, prevenir la acumulación de sarro y promover una salud bucal óptima. Cada limpieza es una inversión en su bienestar dental a largo plazo.',
                'images' => [
                    'card_img_path' => 'card_images/limpieza_dental_card.webp',
                    'cover_img_path' => 'cover_images/limpieza_dental_cover.webp',
                ],
            ],
            [
                'name' => 'Anestésico Moderno',
                'small_description' => ' Garantizamos su comodidad con nuestro enfoque en la administración de anestesia moderna. Experimente tratamientos dentales sin dolor y sin ansiedad.',
                'long_description' => 'En nuestra clínica, entendemos que la ansiedad dental es común, y nos esforzamos por hacer que cada visita sea cómoda y sin estrés. Utilizamos técnicas de administración de anestesia moderna para garantizar tratamientos sin dolor y sin complicaciones.',
                'images' => [
                    'card_img_path' => 'card_images/anestesico_moderno_card.webp',
                    'cover_img_path' => 'cover_images/anestesico_moderno_cover.webp',
                ],
            ],
            [
                'name' => 'Soportes de Calidad',
                'small_description' => 'Obtenga soportes dentales duraderos y efectivos para correcciones ortodónticas o mejoras en la funcionalidad. Calidad que se ve y se siente.',
                'long_description' => 'Nuestros soportes dentales están diseñados con precisión y calidad para corregir problemas ortodónticos con eficacia. Ya sea para alinear dientes torcidos o mejorar la funcionalidad masticatoria, ofrecemos opciones de soportes personalizadas que se adaptan a sus necesidades específicas.',
                'images' => [
                    'card_img_path' => 'card_images/soportes_calidad_card.webp',
                    'cover_img_path' => 'cover_images/soportes_calidad_cover.webp',
                ],
            ],
            [
                'name' => 'Extracción Muelas de Juicio',
                'small_description' => 'Confíe en nuestro equipo especializado para extracciones de muelas de juicio seguras y expertas. Abordamos cada caso individualmente, minimizando molestias y optimizando la recuperación.',
                'long_description' => 'La extracción de muelas de juicio puede ser una experiencia preocupante, pero nuestro equipo especializado se asegurará de que se sienta cómodo y seguro. Evaluamos cada caso individualmente y realizamos extracciones con habilidad y cuidado, minimizando cualquier incomodidad y facilitando una recuperación sin problemas.',
                'images' => [
                    'card_img_path' => 'card_images/muelas_juicio_card.webp',
                    'cover_img_path' => 'cover_images/muelas_juicio_cover.webp',
                ],
            ],


        ];

        foreach ($services as $service) {

            //Almacenar imagenes
            $imagesData = [];

            foreach ($service['images'] as $field => $filePath) {
                if ($filePath) {
                    $source = $sourceBasePath . '/' . $filePath;
                    if (File::exists($source)) {
                        $destPath = $destinationPath . '/' . $filePath;
                        Storage::disk('public')->put($destPath, File::get($source));
                        $imagesData[$field] = $destPath;
                    } else {
                        $imagesData[$field] = $destinationPath . '/null.jpg';
                    }
                } else {
                    $imagesData[$field] = $destinationPath . '/null.jpg';
                }
            }


            //Registrar el profesional
            Service::create(array_merge([
                'name' => $service['name'],
                'slug' => Str::slug($service['name']),
                'small_description' => $service['small_description'],
                'long_description' => $service['long_description'],
            ], $imagesData));
        }
    }
}
