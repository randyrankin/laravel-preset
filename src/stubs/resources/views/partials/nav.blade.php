<nav v-scroll="handleNavScroll" class="z-50 sticky top-0 left-0 flex items-center justify-between flex-wrap py-4 px-6 bg-gray-700 border-b">
    <div class="flex-no-shrink-0 mr-6">
        <a class="no-underline text-gray-300 font-bold text-2xl tracking-tight" href="/">{{ env('APP_NAME') }}</a>
    </div>
    <div class="block sm:hidden">
        <button @click="toggle" class="flex items-center px-3 py-2 border rounded text-gray-300 border-gray-300 hover:text-white hover:border-white">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
            </svg>
        </button>
    </div>
    <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
        <div class="sm:flex-grow">
            
        </div>
        <div>
            <a class="block sm:inline-block text-gray-400 hover:text-white mr-4 mt-2" href="{{ url('/') }}">Home</a>   
            
            @guest
            
            <a class="block sm:inline-block text-gray-400 hover:text-white mr-4 mt-2" href="{{ url('/login') }}">{{ __('Login') }}</a>
            <a class="block sm:inline-block text-gray-400 hover:text-white mr-4 mt-2" href="{{ url('/register') }}">{{ __('Register') }}</a>
            
            @else
            
            <a href="{{ route('home') }}" class="block sm:inline-block text-gray-400 hover:text-white mr-4 mt-2">Dashboard</a>
            <a href="{{ route('logout') }}"  class="block sm:inline-block text-gray-400 hover:text-white mr-4 mt-2"
                onclick="event.preventDefault(); 
                document.getElementById('logout-form').submit();">{{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                {{ csrf_field() }}
            </form>

            @endguest
        </div>
    </div>
</nav>