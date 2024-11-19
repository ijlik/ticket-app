<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipantsTicketController;
use App\Http\Controllers\RbacController;
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
        'only' => ['index', 'create', 'store', 'show', 'destroy', 'edit', 'update']
    ]);


    Route::get('/events/{event}/participant', [EventController::class, 'getParticipant'])->name('events.getParticipant');

    Route::get('/rbac', [RbacController::class, 'index']);

    Route::resource('/participants_ticket', ParticipantsTicketController::class);
});


Route::get('/dashboard', function () {
    return view('main');
});
