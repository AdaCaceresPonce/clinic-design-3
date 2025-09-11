<?php

namespace Database\Seeders;

use App\Models\OurServicesPageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Faker\Factory as Faker;

class OurServicesPageContentSeeder extends Seeder
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
        'our_services_img' => 'our_services.webp',
    ];

    public function run(): void
    {
        $faker = Faker::create();

        //Ubicacion publica de las imágenes base a copiar
        $sourceBasePath = public_path('base_images/web_pages_images/our_services_page');

        //Ruta de destino en storage para almacenar las imágenes copiadas
        $destinationPath = ('web_pages_images/our_services_page');

        // Crear directorio si no existe
        if (!Storage::disk('public')->exists($destinationPath)) {
            Storage::disk('public')->makeDirectory($destinationPath);
        }

        // Copiar solo las imágenes que necesitamos
        $this->copyRequiredImages($sourceBasePath, $destinationPath);

        $content = [

            'cover_title' => 'Nuestros Servicios',
            'cover_img' => $this->getImagePath('cover_img', $destinationPath),

            'our_services_title' => '<p><strong><span style="color: rgb(0, 117, 255);">Nuestros Servicios Dentales</span></strong></p>',
            'our_services_description' => '<p>En nuestra clínica dental, ofrecemos una amplia gama de servicios diseñados para satisfacer todas tus necesidades de salud bucal. Desde limpiezas y exámenes regulares hasta tratamientos avanzados como implantes dentales, ortodoncia y estética dental, nuestro equipo de profesionales está comprometido a proporcionar una atención de alta calidad en un ambiente cómodo y acogedor. Utilizamos tecnología de vanguardia y las mejores prácticas clínicas para garantizar que recibas el cuidado más efectivo y personalizado posible. Tu sonrisa es nuestra prioridad, y nos esforzamos por ayudarte a mantenerla saludable y radiante.</p>',
            'our_services_img' => $this->getImagePath('our_services_img', $destinationPath),

            'services_we_offer_title' => '<p><strong><span style="color: rgb(0, 117, 255);">Nuestros Servicios Dentales</span></strong></p>',
            'services_we_offer_description' => '<p>Descubre los servicios que ponemos a tu disposici&oacute;n, siempre con la mejor atenci&oacute;n m&eacute;dica dental.</p>',

        ];

        OurServicesPageContent::create($content);

        $this->command->info('✅ OurServicesPageContent seeded successfully!');

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
     * Obtiene la ruta de la imagen para un campo específico
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
