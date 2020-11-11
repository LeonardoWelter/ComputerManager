@extends('layouts.app')

@section('title', 'Users')

@section('content')
<div class="antialiased" onclick="document.getElementById('dropdown').hidden = true">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="text-center mb-4 font-extrabold text-xl">Usuários</div>
    <table class="table-auto border-collapse">
        <thead>
            <tr class="border border-gray-600 rounded">
                <th class="px-4 py-2">Nome</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Grupo</th>
                <th class="px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $data)
            <tr class="border border-gray-600 rounded">
                <td class="px-4 py-2">{{ $data->name }}</td>
                <td class="px-4 py-2">{{ $data->email}}</td>
                <td class="px-4 py-2">{{ $data->group == 0 ? 'Usuário' : 'Administrador' }}</td>
                <td class="text-right px-4 py-2">
                    <form action="/users/{{ $data->id }}" method="post" class="inline">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="inline mt-1 text-xs bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded dark:text-gray-400 dark:border-gray-400 dark:hover:bg-gray-300 dark:hover:text-gray-700"><i class="fas fa-pen"></i></button>
                    </form>
                    <form action="/users/{{ $data->id }}" method="post" class="inline">
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
    </div>
</div>
@endsection