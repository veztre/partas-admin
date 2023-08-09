<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Payment::class;

    public function definition()
    {
        $reservation = Reservation::factory()->create();

        return [
            'reservation_id' => $reservation->id,
            'amount' => fake()->randomFloat(2, 50, 200),
            'payment_date' => fake()->dateTimeBetween('-30 days', 'now'),
            'payment_status' => fake()->randomElement(['pending', 'paid', 'failed']),
        ];
    }
}
