<?php

namespace Database\Factories;

use App\Models\Bus;
use App\Models\Busroute;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BusSchedule>
 */
class BusScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    //protected $model = BusSchedule::class;

    public function definition()
    {
        $bus = Bus::factory()->create();
        $route = Busroute::factory()->create();

        return [
            'bus_id' => $bus->id,
            'route_id' => $route->id,
            // 'start_time' => now(),
            // 'end_time' => now()->addHours(1),
            'price' => fake()->numberBetween(500, 1000),
            'departure_time' => fake()->dateTimeBetween('+1 days', '+30 days')->format('Y-m-d H:i'),
            'arrival_time' => fake()->dateTimeBetween('+30 days', '+60 days')->format('Y-m-d H:i'),
        ];
    }
}
