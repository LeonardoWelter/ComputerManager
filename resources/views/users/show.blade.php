@extends('layouts.app')

@section('title', $user->name)

@section('content')
<div class="antialiased" onclick="document.getElementById('dropdown').hidden = true">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 my-4">
            <div class="border border-gray-200 dark:border-gray-600 rounded-xl p-6 shadow-2xl">
                <div class="font-black text-center border-b-2 border-gray-200 dark:border-gray-600 py-2">
                    Usuário ID {{$user->id}}
                </div>
                <div class="flex justify-evenly">
                    <a href="/users/{{$user->id}}/edit" type="submit" class="inline ml-1 mt-1 text-sm bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded dark:text-gray-400 dark:border-gray-400 dark:hover:bg-gray-300 dark:hover:text-gray-700"><i class="fas fa-pen"></i></a>
                    <a href="/users/{{$user->id}}/edit-password" type="submit" class="inline ml-1 mt-1 text-sm bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded dark:text-gray-400 dark:border-gray-400 dark:hover:bg-gray-300 dark:hover:text-gray-700"><i class="fas fa-key"></i></a>

                    <form action="/users/{{ $user->id }}" method="post" class="inline ml-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline mt-1 text-sm bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-3 rounded dark:text-gray-400 dark:border-gray-400 dark:hover:bg-gray-300 dark:hover:text-gray-700"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">Nome</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{$user->name}}">

                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">Email</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{ucfirst($user->email)}}">

                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">Grupo</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{ $user->group == 0 ? 'Usuário' : 'Administrador' }}">

                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">Data criação</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{\Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i')}}">

                <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold" for="serial">Última atualização</label>
                <input class="block w-full text-gray-700 bg-gray-100 dark:bg-gray-900 dark:text-gray-200 mb-1 leading-tight" type="text" id="serial" disabled value="{{\Carbon\Carbon::parse($user->updated_at)->format('d/m/Y H:i')}}">
            </div>
        </div>
    </div>
</div>
@endsection