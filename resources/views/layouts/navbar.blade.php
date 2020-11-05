<header class="lg:px-4 px-6 bg-white dark:bg-gray-800 flex flex-wrap items-center lg:py-0 py-2">
    <div class="flex-1 flex justify-between items-center">
        <a href="{{ url('/dashboard') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
    </div>

    <label for="menu-toggle" class="pointer-cursor lg:hidden block"><svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
            <title>menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
        </svg></label>
    <input class="hidden" type="checkbox" id="menu-toggle" />

    <div class="hidden lg:flex lg:items-center lg:w-auto w-full" id="menu">
        <nav>
            <ul class="lg:flex items-center justify-between text-base text-gray-700 dark:text-gray-200 pt-4 lg:pt-0">
                @guest
                <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400 dark:hover:border-white" href="{{ route('login') }}">Login</a></li>
                @if (Route::has('register'))
                <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400 dark:hover:border-white" href="{{ route('register') }}">Register</a></li>
                @endif
                @else
                <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400 dark:hover:border-white" href="{{ route('device') }}">Devices</a></li>
                <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400 dark:hover:border-white" href="{{ route('maintenance') }}">Maintenances</a></li>
                @if (Auth::user()->group == 1)
                <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400 dark:hover:border-white lg:mb-0 mb-2" href="{{ route('users') }}">Users</a></li>
                @endif
                <li><a class="block lg:hidden lg:p-4 py-3 px-0 border-b-2 border-transparent hover:border-indigo-400 dark:hover:border-white lg:mb-0 mb-2" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
                <div class="relative">
                    <button class="hidden lg:block h-8 w-8 z-60 rounded-full bg-gray-200 text-gray-700 border-2 focus:outline-none focus:border-blue-900 hover:bg-gray-400 hover:text-white hover:border-blue-900"
                            onclick="document.getElementById('dropdown').hidden ? document.getElementById('dropdown').hidden = false: document.getElementById('dropdown').hidden = true">
                        <p class="block">{{ strtoupper(Auth::user()->name[0])}}</p>
                    </button>
                    <div id="dropdown" class="absolute z-40 right-0 mt-2 w-32 bg-white dark:bg-gray-300 text-gray-700 rounded-lg py-2 shadow-xl" hidden>
                        <p class="block text-gray-600 border-b border-gray-200 px-4 py-2">{{Auth::user()->name}}</p>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-400 hover:text-black">Account</a>
                        <a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-gray-400 hover:text-black" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hover:bg-gray-400 hover:text-black">
                            @csrf
                        </form>
                    </div>
                </div>
                @endguest
            </ul>
        </nav>
    </div>

</header>