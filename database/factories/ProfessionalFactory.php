<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Professional>
 */
class ProfessionalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'lastname' => $this->faker->lastName(),
            'description' => $this->faker->text(225),
            'photo_path' => 'professionals/' . $this->faker->image('public/storage/professionals', 640, 480, null, false),
            'facebook_link' => $this->faker->numberBetween(0,1) === 0 ? NULL : 'https://www.facebook.com/',
            'linkedin_link' => $this->faker->numberBetween(0,1) === 0 ? NULL : 'https://www.linkedin.com/',
            'twitter_link' => $this->faker->numberBetween(0,1) === 0 ? NULL : 'https://www.twitter.com/',
            'instagram_link' => $this->faker->numberBetween(0,1) === 0 ? NULL : 'https://www.instagram.com/',
        ];
    }
}
