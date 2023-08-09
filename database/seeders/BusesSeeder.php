<?php

namespace Database\Seeders;

use App\Models\Bus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        Bus::create ([
            'code' => fake()->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            'capacity' => fake()->numberBetween(30, 60),
            'type'=>fake()->randomElement(['first class', 'de luxe', 'super de luxe','luxury']),
        ]);


    }
}
