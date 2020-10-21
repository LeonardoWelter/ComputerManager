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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/device', 'App\Http\Controllers\DeviceController@index')->name('device.index');
Route::get('/device/{device}', 'App\Http\Controllers\DeviceController@show')->name('device.show');
Route::post('/device', 'App\Http\Controllers\DeviceController@store')->name('device.store');
Route::put('/device/{device}', 'App\Http\Controllers\DeviceController@update')->name('device.update');
Route::delete('/device/{device}', 'App\Http\Controllers\DeviceController@delete')->name('device.delete');