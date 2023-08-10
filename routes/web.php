<?php

use App\Http\Controllers\BusrouteController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\BusScheduleController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationsController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('MainPage', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),

    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Bus Route
    Route::get('busroutes', [BusrouteController::class, 'index'])->name('busroutes');
    Route::get('create_busroute', [BusrouteController::class, 'create'])->name('busroutes.create');
    Route::post('store_busroute', [BusrouteController::class, 'store'])->name('busroutes.store');
    Route::get('edit_busroute', [BusrouteController::class, 'edit'])->name('busroutes.edit');
    Route::put('busroute/{busroute}', [BusrouteController::class, 'update'])->name('busroutes.update');
    Route::delete('destroy_busroute/{busroute}', [BusrouteController::class, 'destroy'])->name('busroutes.destroy');
    // Bus
    Route::get('buses', [BusController::class, 'index'])->name('buses');
    Route::get('create_bus', [BusController::class, 'create'])->name('bus.create');
    Route::post('store_bus', [BusController::class, 'store'])->name('bus.store');
    Route::get('edit_bus', [BusController::class, 'edit'])->name('bus.edit');
    Route::put('bus/{bus}', [BusController::class, 'update'])->name('bus.update');
    Route::delete('destroy_bus/{bus}', [BusController::class, 'destroy'])->name('bus.destroy');

    // Bus Schedule
    Route::get('schedules', [BusScheduleController::class, 'index'])->name('schedules');
    Route::get('create_schedule', [BusScheduleController::class, 'create'])->name('schedule.create');
    Route::get('show_schedule', [BusScheduleController::class, 'show'])->name('schedule.show');
    Route::post('store_schedule', [BusScheduleController::class, 'store'])->name('schedule.store');
    Route::get('edit_schedule', [BusScheduleController::class, 'edit'])->name('schedule.edit');
    Route::put('schedule/{busSchedule}', [BusScheduleController::class, 'update'])->name('schedule.update');
    Route::delete('destroy_schedule/{busSchedule}', [BusScheduleController::class, 'destroy'])->name('schedule.destroy');
    Route::post('reserve/{busSchedule}', [BusScheduleController::class, 'reserve_schedule'])->name('schedule.reserve');


     // Reservation
     Route::get('reservations', [ReservationsController::class, 'index'])->name('reservations');
     Route::get('create_reservation', [ReservationsController::class, 'create'])->name('reservation.create');
     Route::get('view_reservation', [ReservationsController::class, 'show'])->name('reservation.view');
     Route::get('pay_reservations', [ReservationsController::class, 'edit'])->name('reservations.pay');
     Route::get('show_all_reservations', [ReservationsController::class, 'show_all'])->name('reservations.show_all');
    //Route::post('reservation/{schedule}', [ReservationsController::class, 'update'])->name('schedule.update');
    //  Route::delete('destroy_schedule/{busSchedule}', [BusScheduleController::class, 'destroy'])->name('schedule.destroy');


    //locations
    Route::get('locations', [LocationController::class, 'index'])->name('locations');
    Route::get('create_location', [LocationController::class, 'create'])->name('location.create');
    Route::get('show_location', [LocationController::class, 'show'])->name('location.show');
    Route::post('store_location', [LocationController::class, 'store'])->name('location.store');
    Route::get('edit_location', [LocationController::class, 'edit'])->name('location.edit');
    Route::put('location/{location}', [LocationController::class, 'update'])->name('location.update');
    Route::delete('destroy_location/{location}', [LocationController::class, 'destroy'])->name('location.destroy');

    // Payment
    Route::get('payments', [PaymentsController::class, 'index'])->name('payments');
    Route::get('create_reservation', [ReservationsController::class, 'create'])->name('reservation.create');
    Route::get('view_reservation', [ReservationsController::class, 'show'])->name('reservation.view');
    Route::get('pay_reservations', [ReservationsController::class, 'edit'])->name('reservations.pay');
    Route::get('show_all_reservations', [ReservationsController::class, 'show_all'])->name('reservations.show_all');
    //Route::post('reservation/{schedule}', [ReservationsController::class, 'update'])->name('schedule.update');
    //  Route::delete('destroy_schedule/{busSchedule}', [BusScheduleController::class, 'destroy'])->name('schedule.destroy');




});



require __DIR__.'/auth.php';
