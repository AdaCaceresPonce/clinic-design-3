<?php

namespace Database\Seeders;

use App\Models\ClinicInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Faker\Factory as Faker;

class ClinicInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    /**
     * Mapeo de imágenes:
     * 'campo_bd' => ['origen_en_public', 'destino_en_storage']
     */
    private array $imageMapping = [

        'navbar_clinic_logo' => [
            'base_images/clinic_information_images/navbar/logo_navbar.jpg',
            'clinic_information_images/navbar/logo_navbar.jpg',
        ],

        'footer_clinic_logo' => [
            'base_images/clinic_information_images/footer/logo_footer.jpg',
            'clinic_information_images/footer/logo_footer.jpg',
        ],
        // si agregas más imágenes solo sumas aquí 👇
        // 'banner_home' => ['images/clinic_information/banner/home.png', 'clinic_information_images/banner/home.png'],
    ];

    public function run(): void
    {
        $faker = Faker::create();

        $info = [
            'phone' => '225533',
            'cellphone' => '999 999 999',
            'schedule' => 'Lunes a Viernes: 7:00 am - 8:00 pm / Sábados y Domingos: 7:00 am - 3:00 pm',
            'email' => 'clinicadental@mail.com',
            'address' => 'Calle Avenida 123 lote 123',
            // 'navbar_clinic_logo' => 'clinic_information_images/navbar/' . $faker->image('public/storage/clinic_information_images/navbar', 600, 600, null, false),
            // 'footer_clinic_logo' => 'clinic_information_images/footer/' . $faker->image('public/storage/clinic_information_images/footer', 600, 600, null, false),
            'facebook_link' => 'https://www.facebook.com/',
            'twitter_link' => 'https://www.twitter.com/',
            'instagram_link' => 'https://www.instagram.com/',
        ];

        // procesamos imágenes del mapping
        foreach ($this->imageMapping as $field => [$source, $dest]) {
            $info[$field] = $this->storeImage($source, $dest);
        }

        ClinicInformation::create($info);
    }

        /**
     * Copia la imagen de public/ a storage/app/public/
     * y retorna la ruta relativa para guardar en BD.
     */
    private function storeImage(string $sourceRelativePath, string $destRelativePath): string
    {
        $sourcePath = public_path($sourceRelativePath);

        if (!file_exists($sourcePath)) {
            // si no existe, devolvemos un placeholder
            return 'null.png';
        }

        if (!Storage::disk('public')->exists($destRelativePath)) {
            Storage::disk('public')->put($destRelativePath, File::get($sourcePath));
        }

        return $destRelativePath;
    }
}
