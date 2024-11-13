<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'verify' => true
]);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('/events', EventController::class, [
        'only' => ['index', 'create', 'store', 'show']
    ]);
    Route::get('/events/{event}/participant', [EventController::class, 'getParticipant'])->name('events.getParticipant');
});


Route::get('/dashboard', function () {
    return view('main');
});

Route::get('/participant_tickets', function () {
    return view('participant_tickets');
});
