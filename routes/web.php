<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\UserController;
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
    return view('dashboard');
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::resource('devices', DeviceController::class);
Route::resource('maintenances', MaintenanceController::class);
Route::resource('users', UserController::class);
Route::get('users/{id}/edit-password', 'App\Http\Controllers\UserController@editPassword')->name('users.edit-password');
Route::put('users/{id}/update-password', 'App\Http\Controllers\UserController@updatePassword')->name('users.update-password');