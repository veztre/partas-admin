<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Busroute extends Model
{
    use HasFactory;
    protected $fillable = [
        'origin',
        'destination',

    ];

    protected $table="bus_routes";

    public function bus_schedules(){
        return $this->hasMany(BusSchedule::class);
    }

}
