@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Manutenções') }}</div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-responsive-sm">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Grupo</th>
                                <th>Data cadastro</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (\App\Models\User::all() as $user) : ?>
                                <tr>
                                    <td><?= $user['name'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['group'] == 0 ? 'Usuário' : 'Administrador' ?></td>
                                    <td><?= \Carbon\Carbon::parse($user['created_at'])->format('d/m/Y H:i') ?></td>
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