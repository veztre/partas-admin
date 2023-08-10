<?php

use App\Http\Controllers\BusScheduleController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\UserController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('locations', [LocationController::class, 'indexAPI'])->name('locations');

Route::get('schedules', [BusScheduleController::class, 'indexAPI'])->name('schedules');


Route::get('user/{email}', [UserController::class, 'getUser'])->name('getUser');

Route::post('login', [UserController::class, 'login'])->name('login');

Route::post('saveUser', [UserController::class, 'saveUser'])->name('saveUser');
Route::post('reserve_schedule', [BusScheduleController::class, 'reserve'])->name('reserve_schedule');

Route::post('reservations', [ReservationsController::class, 'showAPI'])->name('reservations');




