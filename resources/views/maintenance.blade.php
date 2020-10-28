@extends('layouts.app')

@section('title', 'Maintenances')

@section('content')

<?php
    // $maintenance = \App\Models\Maintenance::create([
    //     'device_id' => 2,
    //     'type' => 'Hardware',
    //     'subtype' => 'Instalação',
    //     'description' => 'Instalação de um watercooler 360MM',
    //     'comments' => 'Instalação do watercooler devido a superaquecimento',
    //     'user_id' => '2',
    // ]);

    use App\Http\Controllers\MaintenanceController;

    $maintenanceController = new MaintenanceController();
?>

<x-table type="maintenance" name="Manutenções" :table-data='$maintenanceController->index()'/>
@endsection