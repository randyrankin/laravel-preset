<nav class="bg-blue-darkest shadow mb-8 py-6">
    <div class="container mx-auto px-6 md:px-0">
        <div class="flex items-center justify-center">
            <div class="mr-6">
                <a href="{{ url('/') }}" class="text-lg font-semibold text-white no-underline">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
            <div class="flex-1 text-right">
                @guest
                    <a class="no-underline hover:underline text-grey-lightest text-sm p-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                    <a class="no-underline hover:underline text-grey-lightest text-sm p-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                @else
                    <span class="text-grey-lightest text-sm pr-4">{{ Auth::user()->name }}</span>

                    <a href="{{ route('logout') }}"
                        class="no-underline hover:underline text-grey-lightest text-sm p-3"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                @endguest
            </div>
        </div>
    </div>
</nav>