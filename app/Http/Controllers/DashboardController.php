<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Busroute;
use App\Models\Bus;
use App\Models\BusSchedule;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $buses = Bus::orderBy('capacity')->get();
        $busTypes = $buses->groupBy('type')->map->count();
        $busCapacity = $buses->groupBy('capacity')->map->count();
        $busroutes = Busroute::orderBy('origin')->get();
        $busRoutes = $busroutes->groupBy('origin')->map->count();
        $price = BusSchedule::sum('price');
        $busCount = $buses->count();
        
        return Inertia::render('Dashboard', [
            'busTypes' => $busTypes->toArray(), 
            'busCapacity' => $busCapacity->toArray(), 
            'busRoutes' => $busRoutes->toArray(), 
            'price' => $price,
            'busCount' => $busCount
        ]);
    }
}
