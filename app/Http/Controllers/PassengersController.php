<?php

namespace App\Http\Controllers;

use App\Models\Passengers;
use App\Http\Requests\StorePassengersRequest;
use App\Http\Requests\UpdatePassengersRequest;

class PassengersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePassengersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Passengers $passengers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Passengers $passengers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePassengersRequest $request, Passengers $passengers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Passengers $passengers)
    {
        //
    }
}
