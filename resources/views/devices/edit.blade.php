@extends('layouts.app')

@section('title', 'Edit device')

@section('content')
<div class="antialiased" onclick="document.getElementById('dropdown').hidden = true">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 my-4">
            <div class="border border-gray-200 dark:border-gray-600 rounded-xl p-6 shadow-2xl">
                <div class="font-black text-center border-b-2 border-gray-200 dark:border-gray-600 py-2">
                    Editando {{ $device->name }}
                </div>
                <form class="w-full max-w-lg p-2" action='/devices/{{$device->id}}' method="post">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full mb-6 md:mb-0">
                            <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold mb-2" for="serial">Serial</label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 dark:bg-gray-700 dark:border-gray-900 dark:text-gray-200 dark:focus:bg-gray-600 dark:focus:text-gray-800 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                                    type="text" name="serial" placeholder="000001" id="serial" required value="{{$device->serial}}">
                        </div>
                        <div class="w-full mb-6 md:mb-0">
                            <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold mb-2" for="name">Nome</label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 dark:bg-gray-700 dark:border-gray-900 dark:text-gray-200 dark:focus:bg-gray-600 dark:focus:text-gray-800 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                                    type="text" name="name" placeholder="PC-REI-18872" id="name" required value="{{$device->name}}">
                        </div>
                        <div class="w-full md:w-1/2 mb-6 pr-2 md:mb-0">
                            <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold mb-2" for="oem">Marca</label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 dark:bg-gray-700 dark:border-gray-900 dark:text-gray-200 dark:focus:bg-gray-600 dark:focus:text-gray-800 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                                    type="text" name="oem" placeholder="Lenovo" id="oem" required value="{{$device->oem}}">
                        </div>
                        <div class="w-full md:w-1/2 mb-6 md:mb-0">
                            <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold mb-2" for="model">Modelo</label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 dark:bg-gray-700 dark:border-gray-900 dark:text-gray-200 dark:focus:bg-gray-600 dark:focus:text-gray-800 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                                    type="text" name="model" placeholder="M92p" id="model" required value="{{$device->model}}">
                        </div>
                        <div class="w-full md:w-1/2 mb-6 pr-2 md:mb-0">
                            <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold mb-2" for="cpu">CPU</label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 dark:bg-gray-700 dark:border-gray-900 dark:text-gray-200 dark:focus:bg-gray-600 dark:focus:text-gray-800 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                                    type="text" name="cpu" placeholder="i7 3700" id="cpu" required value="{{$device->cpu}}">
                        </div>
                        <div class="w-full md:w-1/2 mb-6 md:mb-0">
                            <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold mb-2" for="ram">RAM</label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 dark:bg-gray-700 dark:border-gray-900 dark:text-gray-200 dark:focus:bg-gray-600 dark:focus:text-gray-800 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                                    type="text" name="ram" placeholder="16GB DDR3 1333MHz" id="ram" required value="{{$device->ram}}">
                        </div>
                        <div class="w-full md:w-1/2 mb-6 pr-2 md:mb-0">
                            <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold mb-2" for="storage">Armazenamento</label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 dark:bg-gray-700 dark:border-gray-900 dark:text-gray-200 dark:focus:bg-gray-600 dark:focus:text-gray-800 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                                    type="text" name="storage" placeholder="1TB 7200RPM" id="storage" required value="{{$device->storage}}">
                        </div>
                        <div class="w-full md:w-1/2 mb-6 md:mb-0">
                            <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold mb-2" for="psu">Fonte</label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 dark:bg-gray-700 dark:border-gray-900 dark:text-gray-200 dark:focus:bg-gray-600 dark:focus:text-gray-800 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                                    type="text" name="psu" placeholder="400W" id="psu" required value="{{$device->psu}}">
                        </div>
                        <div class="w-full md:w-1/2 mb-6 pr-2 md:mb-0">
                            <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold mb-2" for="mac">MAC</label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 dark:bg-gray-700 dark:border-gray-900 dark:text-gray-200 dark:focus:bg-gray-600 dark:focus:text-gray-800 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                                    type="text" name="mac" placeholder="0000:0000:0000:0000" id="mac" required value="{{$device->mac}}">
                        </div>
                        <div class="w-full md:w-1/2 mb-6 md:mb-0">
                            <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold mb-2" for="os">OS</label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 dark:bg-gray-700 dark:border-gray-900 dark:text-gray-200 dark:focus:bg-gray-600 dark:focus:text-gray-800 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
                                    type="text" name="os" placeholder="Windows 10" id="os" required value="{{$device->os}}">
                        </div>
                        <button class="sm:w-full mt-2 bg-blue-500 hover:bg-blue-700 dark:bg-gray-400 dark:hover:bg-gray-600 dark:text-gray-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Criar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection