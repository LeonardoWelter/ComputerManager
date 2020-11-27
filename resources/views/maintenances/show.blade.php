@extends('layouts.app')

@section('title', 'Maintenance #'.$maintenance->id)

@section('content')
<div class="antialiased" onclick="document.getElementById('dropdown').hidden = true">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 my-4">
            <div class="border border-gray-200 dark:border-gray-600 rounded-xl p-6 shadow-2xl">
                <div class="font-black text-center border-b-2 border-gray-200 dark:border-gray-600 py-2">
                    Manutenção ID {{$maintenance->id}}
                </div>
                <div class="flex justify-evenly">
                    <a href="/maintenances/{{$maintenance->id}}/edit" type="submit" class="inline mt-1 text-sm bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded dark:text-gray-400 dark:border-gray-400 dark:hover:bg-gray-300 dark:hover:text-gray-700"><i class="fas fa-pen"></i></a>
                    <form action="/maintenances/{{$maintenance->id}}" method="post" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline mt-1 text-sm bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-3 rounded dark:text-gray-400 dark:border-gray-400 dark:hover:bg-gray-300 dark:hover:text-gray-700"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">Serial</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{$serial}}">

                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">Tipo</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{ucfirst($maintenance->type)}}">

                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">Subtipo</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{ucfirst($maintenance->subtype)}}">

                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">Descrição</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{$maintenance->description}}">

                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">Comentários</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{$maintenance->comments}}">

                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">Criador</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{$user}}">

                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">Data criação</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{\Carbon\Carbon::parse($maintenance->created_at)->format('d/m/Y H:i')}}">
                
                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">Última atualização</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{\Carbon\Carbon::parse($maintenance->updated_at)->format('d/m/Y H:i')}}">
            </div>
        </div>
    </div>
</div>
@endsection