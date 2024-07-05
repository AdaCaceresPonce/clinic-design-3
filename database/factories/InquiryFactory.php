<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inquiry>
 */
class InquiryFactory extends Factory
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
            'service_slug' => $service ? $service->slug : null,
            'contact_number' => $this->faker->phoneNumber,
            'message' => $this->faker->text(400),
            'state' => $this->faker->randomElement(['Nuevo', 'Pendiente', 'Atendido']),
            'created_at' => $createdAt,
            'updated_at' => $createdAt, // Mantener created_at y updated_at iguales si es necesario
        ];
    }
}