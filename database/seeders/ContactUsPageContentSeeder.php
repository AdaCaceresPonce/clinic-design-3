<?php

namespace Database\Seeders;

use App\Models\ContactUsPageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Faker\Factory as Faker;

class ContactUsPageContentSeeder extends Seeder
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
        'contact_us_img' => 'contact_section.webp',
        'opinions_img' => 'opinions_section.webp',
    ];

    public function run(): void
    {
        $faker = Faker::create();

        //Ubicacion publica de las imágenes base a copiar
        $sourceBasePath = public_path('base_images/web_pages_images/contact_us_page');

        //Ruta de destino en storage para almacenar las imágenes copiadas
        $destinationPath = ('web_pages_images/contact_us_page');

        // Crear directorio si no existe
        if (!Storage::disk('public')->exists($destinationPath)) {
            Storage::disk('public')->makeDirectory($destinationPath);
        }

        // Copiar solo las imágenes que necesitamos
        $this->copyRequiredImages($sourceBasePath, $destinationPath);

        $content = [

            'cover_title' => 'Contáctanos',
            'cover_img' => $this->getImagePath('cover_img', $destinationPath),

            'contact_us_title' => '<p><strong>Comunícate con nosotros. Estamos a tu servicio.</strong></p>',
            'contact_us_description' => '<p><strong><span style="color: rgb(0, 117, 255);">Solicita una cita o envia una consulta. Nos contactaremos contigo lo mas antes posible.</span></strong></p>',
            'contact_us_img' => $this->getImagePath('contact_us_img', $destinationPath),

            'opinions_title' => '<p><strong>¡Comparte tu opinión con nosotros!</strong></p>',
            'opinions_description' => '<p><strong><span style="color: rgb(0, 117, 255);">En nuestra clínica, tu opinión es muy importante. Queremos saber cómo ha sido tu experiencia con nuestros servicios para poder mejorar y ofrecerte siempre lo mejor.</span></strong></p>',
            'opinions_img' => $this->getImagePath('opinions_img', $destinationPath),

        ];

        ContactUsPageContent::create($content);

        $this->command->info('✅ ContactUsPageContent seeded successfully!');

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
