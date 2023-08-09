<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bus>
 */
class BusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Bus::class;

    public function definition()
    {
        $options = (["Luxury", "De Luxe", "Super De Luxe", "Express",
        "Standard Bus"]);
        return [
            'code' => fake()->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            'capacity' => fake()->numberBetween(30, 45),
            'type'=>fake()->randomElement($options),

        ];
    }
}
