<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusSchedule extends Model
{
    use HasFactory;

    protected $dates = ['arrival_time','departure_time'];
    protected $fillable = [
        'arrival_time',
        'departure_time',
        'route_id',
        'bus_id',
        'price'

    ];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function getFormattedArrivalDateAttribute(): string
    {
        return $this->arrival_date->format('d M Y');
    }
}
