<?php

use App\Models\Event;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BookingController;
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
    $events = Event::take(3)->latest()->get();
    return view('welcome',compact('events'));
});

Route::resource('events', EventController::class)->middleware('auth');
Auth::routes();

Route::resource('booking', BookingController::class, ['except'=>['create','show','update','edit']]);

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
