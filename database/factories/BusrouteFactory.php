<?php

namespace Database\Factories;

use App\Models\Busroute;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Busroute>
 */
class BusrouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    //protected $model = Busroute::class;
    public function definition()
    {
        $options = [
            "Manila", "Pampanga", "Baguio", "La Union",
            "Benguet", "Tarlac", "Pangasinan", "Occidental Mindoro",
            "Laoag", "Vigan", "Pagudpud", "Bangued"
        ];

        $faker = Faker::create();

        $origin = $faker->unique()->randomElement($options);
        $destination = $origin;

        // Ensure the destination is different from the origin
        while ($destination === $origin) {
            $destination = $faker->unique()->randomElement($options);
        }

        return [
            'origin' => $origin,
            'destination' => $destination,
        ];
    }

}
