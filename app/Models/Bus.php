<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'type',
        'capacity'

    ];
    protected $table="buses";

    public function bus_schedules(){
        return $this->hasMany(BusSchedule::class);
    }

}
