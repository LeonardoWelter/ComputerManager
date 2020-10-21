@extends('layouts.app')

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

<x-table type="device" name="Dispositivos" :table-data='$deviceController->index()'/>
@endsection