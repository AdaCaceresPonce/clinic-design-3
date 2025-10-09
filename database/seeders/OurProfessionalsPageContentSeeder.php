<?php

namespace Database\Seeders;

use App\Models\OurProfessionalsPageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Faker\Factory as Faker;

class OurProfessionalsPageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    /**
     * Mapeo específico de imágenes para cada campo
     */
    private array $imageMapping = [

        // 'nombre_campo_bd' => 'archivo.jpg',
        'cover_img' => 'cover.webp',
        'our_professionals_img' => 'our_professionals.webp',
    ];

    public function run(): void
    {
        $faker = Faker::create();

        //Ubicacion publica de las imágenes base a copiar
        $sourceBasePath = public_path('base_images/web_pages_images/our_professionals_page');

        //Ruta de destino en storage para almacenar las imágenes copiadas
        $destinationPath = ('web_pages_images/our_professionals_page');

        // Crear directorio si no existe
        if (!Storage::disk('public')->exists($destinationPath)) {
            Storage::disk('public')->makeDirectory($destinationPath);
        }

        // Copiar solo las imágenes que necesitamos
        $this->copyRequiredImages($sourceBasePath, $destinationPath);


        $content = [

            'cover_title' => 'Nuestros Profesionales',
            'cover_img' => $this->getImagePath('cover_img', $destinationPath),

            'our_professionals_title' => '<p><strong><span style="color: rgb(0, 117, 255);">Conoce a Nuestros Profesionales</span></strong></p>',
            'our_professionals_description' => '<p>En nuestra clínica dental, contamos con un equipo de profesionales altamente calificados y dedicados a brindarte la mejor atención. Cada miembro de nuestro equipo trae consigo una combinación de experiencia, conocimientos y pasión por la odontología, asegurando que recibas el cuidado más adecuado y efectivo para tus necesidades. Nuestros especialistas están comprometidos con la educación continua y la adopción de las últimas tecnologías y técnicas dentales. Esto nos permite ofrecerte tratamientos innovadores y personalizados, manteniendo siempre los más altos estándares de calidad y seguridad. Además, nuestro personal de apoyo está siempre dispuesto a asistirte y hacer que tu experiencia en nuestra clínica sea cómoda y placentera.</p>',
            'our_professionals_img' => $this->getImagePath('our_professionals_img', $destinationPath),

            'our_professionals_team_title' => '<p><strong><span style="color: rgb(0, 117, 255);">Nuestro Equipo de Profesionales</span></strong></p>',
            'our_professionals_team_description' => '<p>Disponemos de un equipo de profesionales altamente capacitados</p>',

        ];

        OurProfessionalsPageContent::create($content);

        $this->command->info('✅ OurProfessionalsPageContent seeded successfully!');

    }

    /**
     * Copia solo las imágenes requeridas según el mapeo
     */
    private function copyRequiredImages(string $sourcePath, string $destinationPath): void
    {

        //Recorre las imágenes de mapeo
        foreach ($this->imageMapping as $field => $fileName) {

            //Construye la ruta de la imagen que se encuentra en la carpeta base
            $sourceFile = $sourcePath . '/' . $fileName;

            //Comprueba si el archivo existe en la carpeta base
            if (File::exists($sourceFile)) {

                //Luego intenta obtener el archivo
                try {

                    $fileContents = File::get($sourceFile);

                    //Lo almacena en storage
                    Storage::disk('public')->put($destinationPath . '/' . $fileName, $fileContents);

                    $this->command->info("✓ Copiado: {$fileName} for {$field}");
                } catch (\Exception $e) {

                    $this->command->error("✗ Falló al copiar {$fileName}: " . $e->getMessage());
                }
            } else {
                $this->command->warn("⚠ Imagen no encontrada: {$sourceFile}");
            }
        }
    }

    /**
     * Obtiene la ruta de la imagen para un campo específico, recibe los parametros: campo_bd y la ruta de destino en storage, esta funcion se llama en los campos
     */
    private function getImagePath(string $field, string $destinationPath): string
    {

        // Busca en el array de mapeo qué archivo corresponde al campo de la bd indicado, ya que en el mapeo está como: 'nombre_campo_bd' => 'nombre_archivo.jpg',
        if (isset($this->imageMapping[$field])) {

            //Obtiene el nombre del archivo de acuerdo al campo
            $fileName = $this->imageMapping[$field];

            // Verificar si la imagen existe en storage
            if (Storage::disk('public')->exists($destinationPath . '/' . $fileName)) {
                return $destinationPath . '/' . $fileName;
            }
        }

        // Retornar una imagen por defecto si no existe
        return $destinationPath . '/null.jpg';
    }
}
