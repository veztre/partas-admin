<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bus;
use App\Models\Busroute;
use App\Models\BusSchedule;
use App\Models\Location;
use App\Models\Passenger;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Busroute::factory(10)->create();
        //Bus::factory(5)->create();
        //BusSchedule::factory(20)->create();
       // Passenger::factory(15)->create();
       // Reservation::factory(25)->create();
       // Payment::factory(25)->create();
        Location::factory(10)->create();
        User::factory(3)->create();
    }
}
