@extends('layouts.app')

@section('title', 'Change user password')

@section('content')
<div class="antialiased" onclick="document.getElementById('dropdown').hidden = true">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 my-4">
            <div class="border border-gray-200 dark:border-gray-600 rounded-xl p-6 shadow-2xl">
                <div class="font-black text-center border-b-2 border-gray-200 dark:border-gray-600 py-2">
                    Editando {{$user->name}}
                </div>
                <form class="w-full max-w-lg p-2" action='/users/{{$user->id}}/update-password' method="post">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full mb-6 md:mb-0">
                            <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold mb-2" for="password">Senha</label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 dark:bg-gray-700 dark:border-gray-900 dark:text-gray-200 dark:focus:bg-gray-600 dark:focus:text-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="password" name="password" placeholder="*****" id="password" required>
                        </div>
                        <div class="w-full mb-6 md:mb-0">
                            <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold mb-2" for="password_confirmation">Confirme sua senha</label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 dark:bg-gray-700 dark:border-gray-900 dark:text-gray-200 dark:focus:bg-gray-600 dark:focus:text-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="password" name="password_confirmation" placeholder="*****" id="password_confirmation" required>
                        </div>
                        <button class="sm:w-full mt-2 bg-blue-500 hover:bg-blue-700 dark:bg-gray-400 dark:hover:bg-gray-600 dark:text-gray-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Atualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection