<?php

use App\Http\Controllers\DeviceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/device', 'App\Http\Controllers\DeviceController@index')->name('device.index');
Route::get('/device/{device}', 'App\Http\Controllers\DeviceController@show')->name('device.show');
Route::post('/device', 'App\Http\Controllers\DeviceController@store')->name('device.store');
Route::put('/device/{device}', 'App\Http\Controllers\DeviceController@update')->name('device.update');
Route::delete('/device/{device}', 'App\Http\Controllers\DeviceController@delete')->name('device.delete');

Route::get('/maintenance', 'App\Http\Controllers\MaintenanceController@index')->name('maintenance.index');
Route::get('/maintenance/{maintenance}', 'App\Http\Controllers\MaintenanceController@show')->name('maintenance.show');
Route::post('/maintenance', 'App\Http\Controllers\MaintenanceController@store')->name('maintenance.store');
Route::put('/maintenance/{maintenance}', 'App\Http\Controllers\MaintenanceController@update')->name('maintenance.update');
Route::delete('/maintenance/{maintenance}', 'App\Http\Controllers\MaintenanceController@delete')->name('maintenance.delete');

Route::get('/user', 'App\Http\Controllers\UserController@index')->name('user.index');
Route::get('/user/{user}', 'App\Http\Controllers\UserController@show')->name('user.show');
Route::post('/user', 'App\Http\Controllers\UserController@store')->name('user.store');
Route::put('/user/{user}', 'App\Http\Controllers\UserController@update')->name('user.update');
Route::delete('/user/{user}', 'App\Http\Controllers\UserController@delete')->name('user.delete');