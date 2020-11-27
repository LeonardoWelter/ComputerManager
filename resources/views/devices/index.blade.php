@extends('layouts.app')

@section('title', 'Devices')

@section('content')
<div class="antialiased" onclick="document.getElementById('dropdown').hidden = true">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0 mt-10 md:mt-0">
        <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8 pt-6 pb-10 rounded-lg shadow bg-white dark:bg-gray-800">
            <div class="grid grid-cols-4">
                <span class="mb-4 font-extrabold text-xl col-span-2">Dispositivos</span>
                <form class="w-32 max-w-xs col-span-1 ml-6">
                    <div class="flex items-center">
                        <input class="rounded-r-none border-r-0 h-10 appearance-none bg-transparent border border-blue-500 rounded dark:border-gray-400 dark:text-gray-200 w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="filter" placeholder="Filtrar" aria-label="Filtrar">
                        <button class="rounded-l-none border-l-0 text-xs text-center bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white border border-blue-500 dark:text-gray-400 dark:border-gray-400 dark:hover:bg-gray-300 dark:hover:text-gray-700 hover:border-transparent h-10 py-3 px-4 rounded" type="submit">
                        <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                <a href="{{ route('devices.create')}}" class="w-24 h-10 ml-12 text-xs text-center bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white border border-blue-500 dark:text-gray-400 dark:border-gray-400 dark:hover:bg-gray-300 dark:hover:text-gray-700 hover:border-transparent py-3 px-4 rounded">
                    Novo
                </a>
            </div>
            <table class="table-auto border-collapse w-full">
                <thead>
                    <tr class="border border-gray-600 rounded">
                        <th class="px-4 py-4 md:py-2">@sortablelink('serial', 'Serial')</th>
                        <th class="px-4 py-4 md:py-2">@sortablelink('model', 'Modelo')</th>
                        <th class="px-4 py-4 md:py-2">@sortablelink('name', 'Nome')</th>
                        <th class="hidden md:block px-4 py-4 md:py-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($devices as $data)
                    <tr class="border border-gray-600 rounded">
                        <td class="px-4 py-4 md:py-2">{{ $data->serial }}</td>
                        <td class="px-4 py-4 md:py-2">{{ $data->oem.' '.$data->model }}</td>
                        <td class="px-4 py-4 md:py-2">{{ $data->name }}</td>
                        <td class="hidden md:flex justify-evenly px-4 py-4 md:py-2">
                            <a href="/devices/{{$data->id}}" type="submit" class="inline ml-1 mt-1 text-sm bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded dark:text-gray-400 dark:border-gray-400 dark:hover:bg-gray-300 dark:hover:text-gray-700"><i class="fas fa-plus"></i></a>
                            <a href="/devices/{{$data->id}}/edit" type="submit" class="inline ml-1 mt-1 text-sm bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded dark:text-gray-400 dark:border-gray-400 dark:hover:bg-gray-300 dark:hover:text-gray-700"><i class="fas fa-pen"></i></a>
                            <form action="/devices/{{ $data->id }}" method="post" class="inline ml-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline mt-1 text-sm bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-3 rounded dark:text-gray-400 dark:border-gray-400 dark:hover:bg-gray-300 dark:hover:text-gray-700"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-2">
                {!! $devices->appends(\Request::except('page'))->links('layouts.pagination') !!}
            </div>
        </div>
    </div>
</div>
@endsection