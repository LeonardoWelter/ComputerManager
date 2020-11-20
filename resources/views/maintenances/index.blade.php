@extends('layouts.app')

@section('title', 'Maintenances')

@section('content')
<div class="antialiased" onclick="document.getElementById('dropdown').hidden = true">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0 mt-10 md:mt-0">
        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8 pt-6 pb-10 rounded-lg shadow bg-white dark:bg-gray-800">
            <div class="grid grid-cols-6">
                <span class="mb-4 font-extrabold text-xl col-span-5 px-4">Manutenções</span>
                <a href="{{ route('maintenances.create')}}" class="text-xs text-center bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white border border-blue-500 dark:text-gray-400 dark:border-gray-400 dark:hover:bg-gray-300 dark:hover:text-gray-700 hover:border-transparent h-10 py-3 px-4 rounded">
                    Novo
                </a>
            </div>
            <table class="table-auto border-collapse">
                <thead>
                    <tr class="border border-gray-600 rounded">
                        <th class="px-4 py-4 md:py-2">Device</th>
                        <th class="px-4 py-4 md:py-2">Tipo</th>
                        <th class="px-4 py-4 md:py-2">Data</th>
                        <th class="hidden md:block px-4 py-4 md:py-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($maintenances as $data)
                    <tr class="border border-gray-600 rounded">
                        <td class="px-4 py-4 md:py-2">{{ App\Models\Device::find($data->device_id)->serial }}</td>
                        <td class="px-4 py-4 md:py-2">{{ ucfirst($data->type).' '.ucfirst($data->subtype) }}</td>
                        <td class="px-4 py-4 md:py-2">{{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y H:i') }}</td>
                        <td class="hidden md:block text-right px-4 py-4 md:py-2">
                            <a href="/maintenances/{{$data->id}}" type="submit" class="inline mt-1 text-sm bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded dark:text-gray-400 dark:border-gray-400 dark:hover:bg-gray-300 dark:hover:text-gray-700"><i class="fas fa-plus"></i></a>
                            <a href="/maintenances/{{$data->id}}/edit" type="submit" class="inline mt-1 text-sm bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded dark:text-gray-400 dark:border-gray-400 dark:hover:bg-gray-300 dark:hover:text-gray-700"><i class="fas fa-pen"></i></a>
                            <form action="/maintenances/{{ $data->id }}" method="post" class="inline">
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