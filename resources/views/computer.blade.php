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
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Computadores') }}</div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-responsive-sm">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Name</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (\App\Models\Device::all() as $device) : ?>
                                <tr>
                                    <td><?= $device['serial'] ?></td>
                                    <td><?= $device['oem'] ?></td>
                                    <td><?= $device['model'] ?></td>
                                    <td><?= $device['name'] ?></td>
                                    <td class="text-right">
                                        <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-pen">Editar</i></a>
                                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash">Excluir</i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection