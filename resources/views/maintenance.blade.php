@extends('layouts.app')

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
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Manutenções') }}</div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-responsive-sm">
                        <thead>
                            <tr>
                                <th>Device</th>
                                <th>Tipo</th>
                                <th>Subtipo</th>
                                <th>Descrição</th>
                                <th>Comentários</th>
                                <th>Responsável</th>
                                <th>Data</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (\App\Models\Maintenance::all() as $maintenance) : ?>
                                <tr>
                                    <td><?= App\Models\Device::find($maintenance['device_id'])->serial ?></td>
                                    <td><?= $maintenance['type'] ?></td>
                                    <td><?= $maintenance['subtype']  ?></td>
                                    <td><?= $maintenance['description']  ?></td>
                                    <td><?= $maintenance['comments']  ?></td>
                                    <td><?= App\Models\User::find($maintenance['user_id'])->name  ?></td>
                                    <td><?= \Carbon\Carbon::parse($maintenance['created_at'])->format('d/m/Y H:i') ?></td>
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