@extends('layouts.app')

@section('title', 'New maintenance')

@section('content')
<div class="antialiased" onclick="document.getElementById('dropdown').hidden = true">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 my-4">
            <div class="border border-gray-200 dark:border-gray-600 rounded-xl p-6 shadow-2xl">
                <div class="font-black text-center border-b-2 border-gray-200 dark:border-gray-600 py-2">
                    Nova manutenção
                </div>
                <form class="w-full max-w-lg p-2" action='/maintenances/' method="post">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" required>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full mb-6 md:mb-0">
                            <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold mb-2" for="serial">Serial</label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 dark:bg-gray-700 dark:border-gray-900 dark:text-gray-200 dark:focus:bg-gray-600 dark:focus:text-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="device_id" placeholder="000001" id="serial" required>
                        </div>
                        <div class="relative w-full mb-6 md:mb-0">
                            <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold mb-2" for="type">Tipo</label>
                            <select class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 dark:bg-gray-700 dark:border-gray-900 dark:text-gray-200 dark:focus:bg-gray-600 dark:focus:text-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="type" id="type" required>
                                <option value="" selected disabled>Selecione o tipo</option>
                                <optgroup label="Hardware">
                                    <option value="hardware/remoção">Remoção</option>
                                    <option value="hardware/software">Adição</option>
                                    <option value="hardware/rede">Substituição</option>
                                </optgroup>
                                <optgroup label="Software">
                                    <option value="software/instalação">Instalação</option>
                                    <option value="software/atualização">Atualização</option>
                                    <option value="software/desinstalação">Desinstalação</option>
                                    <option value="software/configuração">Configuração</option>
                                    <option value="software/imageação">Imageação</option>
                                </optgroup>
                                <optgroup label="Outro">
                                    <option value="outro/outro">Outro</option>
                                </optgroup>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 align-middle right-0 flex items-center px-2 mt-3 text-gray-900">
                                <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                        <div class="w-full mb-6 md:mb-0">
                            <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold mb-2" for="description">Descrição</label>
                            <textarea class="appearance-none resize-none block w-full bg-gray-200 text-gray-700 border border-gray-200 dark:bg-gray-700 dark:border-gray-900 dark:text-gray-200 dark:focus:bg-gray-600 dark:focus:text-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="description" placeholder="Descreva o que foi feito" id="description" required></textarea>
                        </div>
                        <div class="w-full mb-6 md:mb-0">
                            <label class="uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold mb-2" for="comments">Comentários</label>
                            <textarea class="appearance-none resize-none block w-full bg-gray-200 text-gray-700 border border-gray-200 dark:bg-gray-700 dark:border-gray-900 dark:text-gray-200 dark:focus:bg-gray-600 dark:focus:text-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="comments" placeholder="Comentários sobre a manutenção" id="comments" required></textarea>
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