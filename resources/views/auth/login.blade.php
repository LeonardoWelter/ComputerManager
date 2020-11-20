@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="my-20 mx-auto w-full max-w-xs">
    <form method="POST" action="{{ route('login') }}" class="dark:bg-gray-800 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <h4 class="font-black text-2xl text-center text-gray-900 dark:text-gray-200 leading-tight">{{ __('Login')}}</h4>
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2" for="email">
                Email
            </label>
            <input class="shadow appearance-none border rounded dark:bg-gray-700 dark:border-gray-900 dark:text-gray-200 w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
                     id="email" type="text" placeholder="E-mail" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-2">
            <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input class="shadow appearance-none border rounded dark:bg-gray-700 dark:border-gray-900 dark:text-gray-200 w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror"
                     id="password" type="password" placeholder="******" name="password" required autocomplete="current-password">
            @error('password')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="w-2/3 block text-gray-500 dark:text-gray-200 font-bold" for="remember">
                <input class="mr-2 leading-tight" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <span class="text-sm">{{ __('Remember Me') }}</span>
            </label>
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 dark:bg-gray-400 dark:hover:bg-gray-600 dark:text-gray-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Sign In
            </button>
            @if (Route::has('password.request'))
            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('password.request') }}">
                Forgot Password?
            </a>
            @endif
        </div>
    </form>
    <p class="text-center text-gray-500 text-xs">
        &copy;2020 DeviceManager
    </p>
</div>
@endsection