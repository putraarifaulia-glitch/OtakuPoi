<header class="bg-white w-full">
    <div class="container mx-auto px-4 flex justify-between items-center py-4">
        <!-- Left: Logo & Branding -->
        <a href="{{ url('/') }}" class="flex items-center">
            <img src="{{ asset('assets/image/logoOtakuPoi.png') }}" alt="OtakuPoi Logo" class="w-16 h-16 mr-3 object-contain">
            <h1 class="text-2xl font-bold text-deep-purple">OtakuPoi</h1>
        </a>
        
        <!-- Right: Auth Buttons -->
        <div class="flex items-center space-x-3">
            @auth
                <a href="{{ url('/home') }}" class="px-6 py-2 rounded-full bg-deep-purple text-white font-medium hover:bg-purple-800 transition-colors duration-300">
                    {{ __('messages.dashboard') }}
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="px-6 py-2 rounded-full bg-white border-2 border-deep-purple text-deep-purple font-medium hover:bg-purple-50 transition-colors duration-300">
                        {{ __('messages.logout') }}
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="px-6 py-2 rounded-full bg-deep-purple text-white font-medium hover:bg-purple-800 transition-colors duration-300">
                    {{ __('messages.login') }}
                </a>
                <a href="{{ route('register') }}" class="px-6 py-2 rounded-full bg-white border-2 border-deep-purple text-deep-purple font-medium hover:bg-purple-50 transition-colors duration-300">
                    {{ __('messages.signup') }}
                </a>
            @endauth
        </div>
    </div>
</header>

<nav class="bg-deep-purple w-full">
    <div class="container mx-auto px-4">
        <ul class="flex flex-wrap justify-center lg:justify-start space-x-6 py-3">
            <li><a href="{{ url('/') }}" class="text-white hover:text-purple-200 transition-colors duration-300 font-medium">Home</a></li>
            @auth
                <li><a href="{{ route('anime-list.index') }}" class="text-white hover:text-purple-200 transition-colors duration-300 font-medium">My List</a></li>
            @endauth
            <li><a href="{{ url('/anime') }}" class="text-white hover:text-purple-200 transition-colors duration-300 font-medium">{{ __('messages.anime') }}</a></li>
            <li><a href="{{ url('/manga') }}" class="text-white hover:text-purple-200 transition-colors duration-300 font-medium">{{ __('messages.manga') }}</a></li>
            <li><a href="{{ route('genre.index') }}" class="text-white hover:text-purple-200 transition-colors duration-300 font-medium">{{ __('messages.genre') }}</a></li>
            <li><a href="{{ route('studio.index') }}" class="text-white hover:text-purple-200 transition-colors duration-300 font-medium">{{ __('messages.studio') }}</a></li>
            <li><a href="{{ url('/feedback') }}" class="text-white hover:text-purple-200 transition-colors duration-300 font-medium">{{ __('messages.feedback') }}</a></li>
        </ul>
    </div>
</nav>
