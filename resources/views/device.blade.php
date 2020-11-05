@extends('layouts.app')

@section('title', 'Devices')

@section('content')
<div class="antialiased" onclick="document.getElementById('dropdown').hidden = true">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <x-table type="device" name="Dispositivos" :table-data='App\Http\Controllers\DeviceController::index()'/>
        </div>
    </div>
</div>
@endsection