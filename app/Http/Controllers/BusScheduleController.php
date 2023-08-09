<?php

namespace App\Http\Controllers;

use App\Models\BusSchedule;
use App\Http\Requests\StoreBusScheduleRequest;
use App\Http\Requests\UpdateBusScheduleRequest;
use App\Models\Bus;
use App\Models\Busroute;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class BusScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $query="SELECT  bus_schedules.id AS id,type, code, origin,destination,
               DATE_FORMAT(departure_time,'%M %d %Y - %r') AS departure_time,
               DATE_FORMAT(arrival_time,' %M %d %Y - %r') AS arrival_time
               FROM  bus_schedules
               INNER JOIN bus_routes on bus_routes.id = bus_schedules.route_id
               INNER JOIN buses on buses.id = bus_schedules.bus_id";

       $schedules= DB::select($query);
       return Inertia::render('Schedules/List',['schedules'=>$schedules]);
    }

    public function indexAPI()
    {
       $query="SELECT  bus_schedules.id AS id,code, origin,destination,
                       departure_time,arrival_time,price
               FROM    bus_schedules
               INNER JOIN bus_routes on bus_routes.id = bus_schedules.route_id
               INNER JOIN buses on buses.id = bus_schedules.bus_id";

       $schedules= DB::select($query);
       return response()->json($schedules);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $routes= Busroute::all();
        $buses=Bus::all();
        return Inertia::render('Schedules/Create',
                        ['buses'=>$buses,'routes'=> $routes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        BusSchedule::create([
            "arrival_time"=> Request::get("arrival_time"),
            "departure_time"=> Request::get("departure_time"),
            "route_id"=> Request::get("route_id"),
            "bus_id"=> Request::get("bus_id"),
            "price"=> Request::get("price"),

        ]);
        return to_route('schedules')->with('success', 'New  created.');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

        $schedule = BusSchedule::find(Request::get("id"));
        $count_reserve=Reservation::where('bus_schedule_id',$schedule->id)->count();
        $bus=Bus::find($schedule->bus_id);
        $total_reserve = $bus->capacity - $count_reserve;
        $busroute = Busroute::find($schedule->route_id);
        return Inertia::render('Schedules/Show',['total_reserve'=>$total_reserve,
            'busroute'=>$busroute,'bus'=>$bus,'schedule'=>$schedule]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $routes= Busroute::all();
        $buses=Bus::all();
        $busSchedule= BusSchedule::find(Request::get("id"));
        return Inertia::render('Schedules/Edit',['busSchedule'=>$busSchedule,'buses'=>$buses,'routes'=>$routes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusSchedule $busSchedule)
    {

        Request::validate([
            "arrival_time"=> 'required',
            "departure_time"=> 'required',
            "route_id"=> 'required',
            "bus_id"=> 'required'
        ]);

        BusSchedule::where('id',$busSchedule->id)
        ->update([
            "arrival_time"=> Request::get("arrival_time"),
            "departure_time"=> Request::get("departure_time"),
            "route_id"=> Request::get("route_id"),
            "bus_id"=> Request::get("bus_id")
        ]);
        return to_route('schedules')->with('success', 'Schedule  Updated.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusSchedule $busSchedule)
    {

        BusSchedule::destroy($busSchedule->id);
        return to_route('schedules');
    }

    public function reserve_schedule(BusSchedule $busSchedule){

      $reserve_count=(Request::get("reserve_count"));
      $max_seat_number =  Reservation::where('bus_schedule_id', $busSchedule->id)->max('seat_number') + 1;
      $total_insert = $max_seat_number + ($reserve_count-1);
      for ( $counter=$max_seat_number;$counter<=$total_insert;$counter++){
          Reservation::create([
            "user_id" => auth()->user()->id,
            "bus_schedule_id"=> $busSchedule->id,
            "seat_number"=> $counter,
          ]);
      }
      return to_route('reservations');

    }

    public function reserve(){

        $reserve_count=(Request::get("reserve_count"));

        $user= User::where('email',Request::get("email"))->first();

        $busScheduleID = Request::get("schedule_id");
        $max_seat_number =  Reservation::where('bus_schedule_id', $busScheduleID)->max('seat_number') + 1;
        $total_insert = $max_seat_number + ($reserve_count-1);

        for ( $counter=$max_seat_number;$counter<=$total_insert;$counter++){
            Reservation::create([
              "user_id" => $user->id,
              "bus_schedule_id"=> $busScheduleID,
              "seat_number"=> $counter,
            ]);
        }
        $busSchedule = BusSchedule::find($busScheduleID)->first();
        return response()->json($busSchedule);

      }

}
