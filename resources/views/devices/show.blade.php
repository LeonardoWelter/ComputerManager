@extends('layouts.app')

@section('title', $device->name)

@section('content')
<div class="antialiased" onclick="document.getElementById('dropdown').hidden = true">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 my-4">
            <div class="border border-gray-200 dark:border-gray-600 rounded-xl p-6 shadow-2xl">
                <div class="font-black text-center border-b-2 border-gray-200 dark:border-gray-600 py-2">
                    {{$device->name}}
                </div>
                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">Serial</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{$device->serial}}">

                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">Nome</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{$device->name}}">

                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">Marca</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{$device->oem}}">

                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">Modelo</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{$device->model}}">

                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">CPU</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{$device->cpu}}">

                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">RAM</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{$device->ram}}">

                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">Storage</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{$device->storage}}">
                
                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">Fonte</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{$device->psu}}">

                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">MAC</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{$device->mac}}">

                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">OS</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{$device->os}}">

                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">Data criação</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{\Carbon\Carbon::parse($device->created_at)->format('d/m/Y H:i')}}">
                
                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">Última atualização</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{\Carbon\Carbon::parse($device->updated_at)->format('d/m/Y H:i')}}">
            </div>
        </div>
    </div>
</div>
@endsection