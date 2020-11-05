<div>
    <div class="text-center mb-4 font-extrabold text-xl">{{ $name }}</div>
    <table class="table-auto border-collapse">
        <thead>
            <tr class="border border-gray-600 rounded">
                @if ($type === 'device')
                <th class="px-4 py-2">Serial</th>
                <th class="px-4 py-2">Modelo</th>
                <th class="px-4 py-2">Nome</th>
                @elseif ($type === 'maintenance')
                <th class="px-4 py-2">Tipo</th>
                <th class="px-4 py-2">Criador</th>
                <th class="px-4 py-2">Data</th>
                @elseif ($type === 'user')
                <th class="px-4 py-2">Nome</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Grupo</th>
                @endif
                <th class="px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tableData as $data)
            <tr class="border border-gray-600 rounded">
                @if ($type === 'device')
                <td class="px-4 py-2">{{ $data->serial }}</td>
                <td class="px-4 py-2">{{ $data->oem.' '.$data->model }}</td>
                <td class="px-4 py-2">{{ $data->name }}</td>
                @elseif ($type === 'maintenance')
                <td class="px-4 py-2">{{ $data->type.' '.$data->subtype }}</td>
                <td class="px-4 py-2">{{ App\Models\User::find($data->user_id)->name }}</td>
                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y H:i') }}</td>
                @elseif ($type === 'user')
                <td class="px-4 py-2">{{ $data->name }}</td>
                <td class="px-4 py-2">{{ $data->email}}</td>
                <td class="px-4 py-2">{{ $data->group == 0 ? 'Usuário' : 'Administrador' }}</td>
                @endif
                <td class="text-right px-4 py-2">
                    <form action="/api/{{$type}}/{{ $data->id }}" method="post" class="inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="inline mt-1 text-xs bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded dark:text-gray-400 dark:border-gray-400 dark:hover:bg-gray-300 dark:hover:text-gray-700"><i class="fas fa-pen"></i></button>
                    </form>
                    <form action="/api/{{$type}}/{{ $data->id }}" method="post" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline mt-1 text-xs bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-3 rounded dark:text-gray-400 dark:border-gray-400 dark:hover:bg-gray-300 dark:hover:text-gray-700"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>