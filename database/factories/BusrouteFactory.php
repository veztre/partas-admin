<?php

namespace Database\Factories;

use App\Models\Busroute;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    protected $model = Busroute::class;



    public function definition()

    {
    $options = (["Manila", "Pampanga", "Baguio", "La Union",
                "Benguet", "Tarlac", "Pangasinan", "Occidental Mindoro",
                "Laoag", "Vigan", "Pagudpud", "Bangued"]);
                
    $randomOption = fake()->randomElement($options);
        return [
            'origin' => $randomOption,
            'destination' => $randomOption,
        ];
    }
}
