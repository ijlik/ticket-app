<?php

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

Route::get('/page4', function () {
    return view('page4');
});
Route::get('/page2', function () {
    return view('page2');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/product', function () {
    return view('product');
});
Route::get('/user', function () {
    return view('user');
});

Route::get('/page1', function () {
    return view('page1');
});

Route::get('/page3', function () {
    return view('page3');
});
