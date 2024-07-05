<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->sentence(4);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'small_description' => $this->faker->text(200),
            'long_description' => $this->faker->text(1550),
            'card_img_path' => 'services/card_images/' . $this->faker->image('public/storage/services/card_images', 640, 480, null, false),
            'cover_img_path' => 'services/cover_images/' . $this->faker->image('public/storage/services/cover_images', 1000, 350, null, false),
            'additional_info' => $this->faker->text(225),
        ];
    }
}
