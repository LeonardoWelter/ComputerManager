<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/device', function () {
    return view('device');
})->name('device')->middleware('auth');

Route::get('/maintenance', function () {
    return view('maintenance');
})->name('maintenance')->middleware('auth');

Route::get('/json', function () {
    return view('json');
})->name('json')->middleware('auth');

Route::get('/users', function () {
    return view('users');
})->name('users')->middleware('auth', 'group:1');