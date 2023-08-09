<?php

namespace Database\Factories;

use App\Models\BusSchedule;
use App\Models\Passenger;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservatioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Reservation::class;

    public function definition()
    {
        $passenger = Passenger::factory()->create();
        $schedule = BusSchedule::factory()->create();

        return [
            'passenger_id' => $passenger->id,
            'bus_schedule_id' => $schedule->id,
            'seat_number' => fake()->randomNumber(2),
        ];
    }
}
