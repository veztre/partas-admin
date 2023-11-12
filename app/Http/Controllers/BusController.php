<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Support\Facades\Request;

use Inertia\Inertia;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buses = Bus::orderBy('capacity')->get();
        return Inertia::render('Buses/List', [
            'buses' => $buses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Buses/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        Request::validate([
            'code' =>'required',
            'type' =>'required',
            'capacity' =>'required',
        ]);


        Bus::create([
            'code' =>Request::get('code'),
            'type' =>Request::get('type'),
            'capacity' =>Request::get('capacity'),

        ]);
        return to_route('buses')->with('success', 'New Bus  created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bus $buses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bus $bus)
    {
        $id=Request::get("id");
        $bus= Bus::find($id);
        return Inertia::render('Buses/Edit',['bus'=>$bus]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Bus $bus)
    {
        Request::validate([
            'code' =>'required',
            'type' =>'required',
            'capacity' =>'required',
        ]);


        Bus::where('id',$bus->id)
        ->update([
            'code' =>Request::get('code'),
            'type' =>Request::get('type'),
            'capacity' =>Request::get('capacity'),
        ]);
        return to_route('buses')->with('success', 'Route  edited.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bus $bus)
    {
        Bus::destroy($bus->id);
        to_route('busroutes');
    }
}
