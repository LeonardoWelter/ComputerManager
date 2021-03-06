@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')

<div class="antialiased" onclick="document.getElementById('dropdown').hidden = true">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 lg:mt-0 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 {{ Auth::user()->group == 1 ? 'md:grid-cols-3' : 'md:grid-cols-2' }}">
                    <div class="p-6">
                        <div class="flex items-center">
                            <i class="h-8 w-8 text-3xl text-gray-800 dark:text-gray-300 fas fa-desktop"></i>
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <a href="{{ route('devices.index') }}" class="underline text-gray-900 dark:text-white">Devices</a>
                            </div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 font-semibold text-justify text-sm">
                                Está buscando algum computador? nessa lista encontram-se todos os computadores cadastrados no sistema.
                            </div>
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                <a href="{{ route('devices.index') }}" class="block mt-1 bg-transparent 
                                                hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 
                                                border border-blue-500 hover:border-transparent rounded
                                               dark:text-gray-400 dark:border-gray-400 dark:hover:bg-gray-300 dark:hover:text-gray-700">
                                    <i class="fas fa-list-ul mr-2"></i>Listar dispositivos
                                </a>
                                <a href="{{ route('devices.create') }}" class="block mt-1 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded dark:text-gray-400 dark:border-gray-400 dark:hover:bg-gray-300 dark:hover:text-gray-700">
                                    <i class="fas fa-plus mr-2"></i>Criar dispositivo
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <i class="h-8 w-8 text-3xl text-gray-800 dark:text-gray-300 fas fa-tools"></i>
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <a href="{{ route('maintenances.index') }}" class="underline text-gray-900 dark:text-white">Maintenances</a>
                            </div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 font-semibold text-justify text-sm">
                                Quer encontrar uma manutenção realizada em um computador específico? aqui é o lugar certo.
                            </div>
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                <a href="{{ route('maintenances.index') }}" class="block mt-1 bg-transparent 
                                                hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 
                                                border border-blue-500 hover:border-transparent rounded
                                               dark:text-gray-400 dark:border-gray-400 dark:hover:bg-gray-300 dark:hover:text-gray-700">
                                    <i class="fas fa-list-ul mr-2"></i>Listar manutenções
                                </a>
                                <a href="{{ route('maintenances.create') }}" class="block mt-1 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded dark:text-gray-400 dark:border-gray-400 dark:hover:bg-gray-300 dark:hover:text-gray-700">
                                    <i class="fas fa-plus mr-2"></i>Criar manutenção
                                </a>
                            </div>
                        </div>
                    </div>
                    @if (Auth::user()->group == 1)
                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <i class="h-8 w-8 text-3xl text-gray-800 dark:text-gray-300 far fa-user"></i>
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <a href="{{ route('users.index') }}" class="underline text-gray-900 dark:text-white">Users</a>
                            </div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 font-semibold text-justify text-sm">
                                Lista dos usuários cadastrados no sistema, somente acessível por usuários Administradores.
                            </div>
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                <a href="{{ route('users.index') }}" class="block mt-1 bg-transparent 
                                                hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 
                                                border border-blue-500 hover:border-transparent rounded
                                               dark:text-gray-400 dark:border-gray-400 dark:hover:bg-gray-300 dark:hover:text-gray-700">
                                    <i class="fas fa-list-ul mr-2"></i>Listar usuários
                                </a>
                                <a href="{{ route('users.create') }}" class="block mt-1 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded dark:text-gray-400 dark:border-gray-400 dark:hover:bg-gray-300 dark:hover:text-gray-700">
                                    <i class="fas fa-plus mr-2"></i>Criar usuário
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection