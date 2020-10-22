<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $name }}</div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-responsive-sm">
                            <thead>
                                <tr>
                                    @if ($type === 'device')
                                        <th>Serial</th>
                                        <th>Modelo</th>
                                        <th>Nome</th>
                                    @elseif ($type === 'maintenance')
                                        <th>Tipo</th>
                                        <th>Criador</th>
                                        <th>Data</th>
                                    @endif
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tableData as $data)
                                <tr>
                                    @if ($type === 'device')
                                    <td>{{ $data->serial }}</td>
                                    <td>{{ $data->oem.' '.$data->model }}</td>
                                    <td>{{ $data->name }}</td>
                                    @elseif ($type === 'maintenance')
                                    <td>{{ $data->type.' '.$data->subtype }}</td>
                                    <td>{{ App\Models\User::find($data->user_id)->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y H:i') }}</td>
                                    @endif
                                    <td class="text-right">
                                        <form action="/api/{{$type}}/{{ $data->id }}" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-pen">Editar</i></button>
                                        </form>
                                        <form action="/api/{{$type}}/{{ $data->id }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-pen">Excluir</i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>