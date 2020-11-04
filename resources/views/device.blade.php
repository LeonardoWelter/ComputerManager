@extends('layouts.app')

@section('title', 'Devices')

@section('content')

<?php
    // $device = \App\Models\Device::create([
    //     'serial' => 25700,
    //     'oem' => 'Dell',
    //     'model' => 'Heatmaker',
    //     'cpu' => 'i9 10900°C',
    //     'ram' => '32GB DDR4',
    //     'storage' => '1TB 5400 RPM',
    //     'psu' => '2500W Seasonic',
    //     'mac' => '01:11:22:AA:BB:CC',
    //     'name' => 'Shintel goes BRR',
    //     'os' => 'Windows 10',
    // ]);

    use App\Http\Controllers\DeviceController;

    $deviceController = new DeviceController();

?>
<div class="antialiased" onclick="document.getElementById('dropdown').hidden = true">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <x-table type="device" name="Dispositivos" :table-data='$deviceController->index()'/>
        </div>
    </div>
</div>
@endsection