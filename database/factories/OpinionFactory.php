<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Opinion>
 */
class OpinionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Probabilidad de tener información en service_id
        $hasService = $this->faker->boolean(70); // 70% de probabilidad de tener categoría
        $service = $hasService ? Service::inRandomOrder()->first() : null;

        // Generar fecha aleatoria entre hace 1 semana y ahora
        $createdAt = $this->faker->dateTimeBetween('-1 week', 'now');

        return [
            'name' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'service_id' => $service ? $service->id : null,
            'rating' => $this->faker->numberBetween(1, 5),
            'opinion' => $this->faker->text(400),
            'state' => $this->faker->randomElement(['Nuevo', 'Revisado']),
            'created_at' => $createdAt,
            'updated_at' => $createdAt, // Mantener created_at y updated_at iguales si es necesario
        ];
    }
}
