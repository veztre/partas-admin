<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $options = (["Manila", "Pampanga", "Baguio", "La Union",
        "Benguet", "Tarlac", "Pangasinan", "Occidental Mindoro",
        "Laoag", "Vigan", "Pagudpud", "Bangued"]);
        return [
            'location' => fake()->unique()->randomElement($options),
        ];
    }
}
