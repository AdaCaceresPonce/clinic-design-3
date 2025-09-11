<?php

namespace Database\Seeders;

use App\Models\WelcomePageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class WelcomePageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    /**
     * Mapeo específico de imágenes para cada campo
     */
    private array $imageMapping = [

        // 'nombre_campo_bd' => 'archivo.jpg',
        'cover_img' => 'cover_image.webp',
        'about_image' => 'about_image.webp',
    ];
    

    public function run(): void
    {
        $faker = Faker::create();

        //Ubicacion publica de las imágenes base a copiar
        $sourceBasePath = public_path('base_images/web_pages_images/welcome_page');

        //Ruta de destino en storage para almacenar las imágenes copiadas
        $destinationPath = ('web_pages_images/welcome_page');

        // Crear directorio si no existe
        if (!Storage::disk('public')->exists($destinationPath)) {
            Storage::disk('public')->makeDirectory($destinationPath);
        }

        // Copiar solo las imágenes que necesitamos
        $this->copyRequiredImages($sourceBasePath, $destinationPath);


        $content = [

            'cover_title' => '<p><strong>Prep&aacute;rate para una <span style="color: rgb(0, 117, 255);">grandiosa experiencia dental.</span></strong></p>',
            'cover_description' => '<p>En Cl&iacute;nica Dental utilizamos las mejores herramientas y materiales para brindarte un servicio y atenci&oacute;n de calidad velando siempre por tu comodidad.</p>',
            'cover_img' => $this->getImagePath('cover_img', $destinationPath),

            'about_title' => '<p><strong>Una Cl&iacute;nica Dental en la que puedes <span style="color: rgb(0, 117, 255);">confiar.</span></strong></p>',
            'about_description' => '<p>En nuestra cl&iacute;nica dental, nos enorgullecemos de ofrecer cuidado dental excepcional con un enfoque centrado en nuestros pacientes. Nuestro equipo de profesionales altamente capacitados est&aacute; comprometido con brindarle una experiencia c&oacute;moda y efectiva en cada visita. Desde limpiezas regulares hasta procedimientos m&aacute;s complejos, estamos aqu&iacute; para cuidar de su salud bucal de manera integral y personalizada.</p>',
            'about_we_offer_you' => 'Equipamiento moderno, Monitoreo continuo, Equipo de Profesionales capacitado',
            'about_image' => $this->getImagePath('about_image', $destinationPath),

            'our_services_title' => '<p><strong><span style="color: rgb(0, 117, 255);">Nuestros Servicios Dentales</span></strong></p>',
            'our_services_description' => '<p>Descubre los servicios que ponemos a tu disposici&oacute;n, siempre con la mejor atenci&oacute;n m&eacute;dica dental.</p>',

            'our_professionals_title' => '<p><span style="color: rgb(0, 117, 255);"><strong>Nuestros Profesionales</strong></span></p>',
            'our_professionals_description' => '<p>Disponemos de un equipo de profesionales altamente capacitados.</p>',

            'testimonials_title' => '<p><span style="color: rgb(0, 117, 255);"><strong>Lo que nuestros pacientes opinan</strong></span></p>',
            'testimonials_description' => '<p>Pacientes de diferentes lugares nos dejan sus opiniones.</p>',

        ];

        WelcomePageContent::create($content);

        $this->command->info('✅ WelcomePageContent seeded successfully!');
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
