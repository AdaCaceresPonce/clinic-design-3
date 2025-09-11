<?php

namespace Database\Seeders;

use App\Models\AboutUsPageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Faker\Factory as Faker;

class AboutUsPageContentSeeder extends Seeder
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
        'about_us_img' => 'clinic_about.webp',
        'free_img' => 'free_image.webp',
    ];

    public function run(): void
    {
        $faker = Faker::create();

        //Ubicacion publica de las imágenes base a copiar
        $sourceBasePath = public_path('base_images/web_pages_images/about_us_page');

        //Ruta de destino en storage para almacenar las imágenes copiadas
        $destinationPath = ('web_pages_images/about_us_page');

        // Crear directorio si no existe
        if (!Storage::disk('public')->exists($destinationPath)) {
            Storage::disk('public')->makeDirectory($destinationPath);
        }

        // Copiar solo las imágenes que necesitamos
        $this->copyRequiredImages($sourceBasePath, $destinationPath);


        $content = [

            'cover_title' => 'Sobre Nosotros',
            'cover_img' => $this->getImagePath('cover_img', $destinationPath),

            'about_us_title' => '<p><strong><span style="color: rgb(0, 117, 255);">¿Quienes somos?</span></strong></p>',
            'about_us_description' => 'En nuestra clínica dental, nos dedicamos a brindarte la mejor atención y cuidado dental. Con años de experiencia en el sector, nuestro equipo de profesionales altamente calificados se esfuerza por ofrecerte tratamientos personalizados y de alta calidad, adaptados a tus necesidades específicas. Nos enorgullece contar con tecnología de vanguardia y técnicas innovadoras que nos permiten garantizarte resultados óptimos y una experiencia cómoda y segura. Desde limpiezas dentales de rutina hasta procedimientos más complejos, estamos aquí para ayudarte a mantener una sonrisa saludable y radiante. Creemos en la importancia de la educación y la prevención, por lo que nos comprometemos a proporcionarte toda la información y los consejos necesarios para el cuidado de tu salud bucal. Nuestro objetivo es que te sientas cómodo y confiado cada vez que nos visites, sabiendo que estás en buenas manos.',
            'about_us_img' => $this->getImagePath('about_us_img', $destinationPath),

            'free_title_1' => '<p><strong><span style="color: rgb(0, 117, 255);">Nuestra Misión</span></strong></p>',
            'free_description_1' => 'En nuestra clínica dental, estamos comprometidos con tu salud bucal y bienestar. Nuestra misión es proporcionarte una atención dental integral, utilizando las técnicas más avanzadas y materiales de alta calidad para garantizar resultados duraderos y satisfactorios. Nos esforzamos por crear un ambiente acogedor y profesional donde cada paciente se sienta valorado y cuidado.',

            'free_title_2' => '<p><strong><span style="color: rgb(0, 117, 255);">Nuestra Visión</span></strong></p>',
            'free_description_2' => 'Aspiramos a ser la clínica dental de referencia en la comunidad, reconocida por nuestra excelencia en el servicio y dedicación a la innovación. Queremos que cada visita sea una experiencia positiva y transformadora, donde nuestros pacientes sientan confianza y satisfacción. Trabajamos continuamente para mejorar y adaptarnos a las necesidades cambiantes, siempre con el objetivo de mantener y mejorar la salud bucal de quienes confían en nosotros.',

            'free_img' => $this->getImagePath('free_img', $destinationPath),
        ];

        AboutUsPageContent::create($content);

        $this->command->info('✅ AboutUsPageContent seeded successfully!');

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
