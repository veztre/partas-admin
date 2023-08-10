<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationsRequest;
use App\Http\Requests\UpdateReservationsRequest;
use App\Models\BusSchedule;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use PhpParser\Node\Expr\Cast\Object_;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query="SELECT  bus_schedules.id AS id,price,buses.type, buses.code,buses.capacity,
                        bus_routes.origin,bus_routes.destination,
                        departure_time,arrival_time
                FROM  bus_schedules
                INNER JOIN bus_routes on bus_routes.id = bus_schedules.route_id
                INNER JOIN buses on buses.id = bus_schedules.bus_id";

       $schedules= DB::select($query);
       $count_reservation = Reservation::where('user_id',auth()->user()->id)->count();
       return Inertia::render('Reservations/List',['schedules'=>$schedules,'count_reservation'=>$count_reservation]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user=User::where('email',Request::get('email'))->first();
        $reservations = Reservation::groupBy(['user_id', 'origin', 'destination','arrival_time','departure_time','price'])
        ->selectRaw('user_id,origin,destination,arrival_time,departure_time, count(seat_number)* price')
        ->join('bus_schedules','reservations.bus_schedule_id', '=', 'bus_schedules.id')
        ->join('bus_routes','bus_routes.id','=','bus_schedules.route_id')
        ->where('user_id',$user->id)
        ->get();
         return Inertia::render('Reservations/Show',['reservations'=>$reservations]);
    }
    public function showAPI()
    {

        $user=User::where('email',Request::get('email'))->first();
        $reservations = Reservation::groupBy(['user_id', 'origin', 'destination','arrival_time','departure_time','price'])
        ->selectRaw('user_id,origin,destination,arrival_time,departure_time, price, count(seat_number)* price AS total_price')
        ->join('bus_schedules','reservations.bus_schedule_id', '=', 'bus_schedules.id')
        ->join('bus_routes','bus_routes.id','=','bus_schedules.route_id')
        ->where('user_id',$user->id)
        ->get();
         return response()->json($reservations);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $reservations=Reservation::where(['user_id'=>auth()->user()->id,'bus_schedule_id'=>Request::get("id")])->get();
        $bus_schedule_price = BusSchedule::find(Request::get("id"));
        foreach ($reservations as $reservation){
             Payment::create([
                'amount'=>$bus_schedule_price->price,
                'reservation_id'=>$reservation->id,
                'payment_status'=>"Paid",
                'payment_date'=>now()
             ]);
        }

        $payments=Payment::join('reservations','reservation_id','=','reservations.id')
                ->select('payments.*','reservations.*')
                ->get();
      return to_route('payment.show');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Reservation $reservations)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservations)
    {
        //
    }

    public function show_all()
    {
        //
    }
}
