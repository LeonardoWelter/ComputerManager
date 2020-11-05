@extends('layouts.app')

@section('title', 'Maintenances')

@section('content')
<div class="antialiased" onclick="document.getElementById('dropdown').hidden = true">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <x-table type="maintenance" name="Manutenções" :table-data='App\Http\Controllers\MaintenanceController::index()'/>
        </div>
    </div>
</div>
@endsection