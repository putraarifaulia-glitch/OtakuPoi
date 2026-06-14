<header class="bg-white w-full border-b border-gray-200 shadow-sm">
    <div class="container mx-auto px-4 flex justify-between items-center py-4">
        <!-- Left: Logo & Branding -->
        <a href="{{ url('/') }}" class="flex items-center group">
            <img src="{{ asset('assets/image/logoOtakuPoi.png') }}" alt="OtakuPoi Logo" class="w-16 h-16 mr-3 object-contain transition-transform group-hover:scale-110">
            <h1 class="text-2xl font-black text-indigo-600 tracking-tight">OtakuPoi</h1>
        </a>
        
        <!-- Right: Auth Buttons -->
        <div class="flex items-center space-x-4">
            @auth
                <a href="{{ url('/home') }}" class="px-6 py-2.5 rounded-full bg-indigo-600 text-white font-bold hover:bg-purple-800 transition-all shadow-md hover:shadow-purple-200 active:scale-95">
                    {{ __('messages.dashboard') }}
                </a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="px-6 py-2.5 rounded-full bg-white border-2 border-indigo-600 text-indigo-600 font-bold hover:bg-purple-50 transition-all active:scale-95">
                        {{ __('messages.logout') }}
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="px-6 py-2.5 rounded-full bg-indigo-600 text-white font-bold hover:bg-purple-800 transition-all shadow-md hover:shadow-purple-200 active:scale-95">
                    {{ __('messages.login') }}
                </a>
                <a href="{{ route('register') }}" class="px-6 py-2.5 rounded-full bg-white border-2 border-indigo-600 text-indigo-600 font-bold hover:bg-purple-50 transition-all active:scale-95">
                    {{ __('messages.signup') }}
                </a>
            @endauth
        </div>
    </div>
</header>

<nav class="bg-indigo-600 w-full">
    <div class="container mx-auto px-4">
        <ul class="flex flex-wrap items-center justify-center lg:justify-start space-x-6 py-2">
            <li><a href="{{ url('/') }}" class="text-white hover:text-purple-200 transition-colors duration-300 font-medium">Home</a></li>
            <li><a href="{{ url('/anime') }}" class="text-white hover:text-purple-200 transition-colors duration-300 font-medium">{{ __('messages.anime') }}</a></li>
            <li><a href="{{ url('/manga') }}" class="text-white hover:text-purple-200 transition-colors duration-300 font-medium">{{ __('messages.manga') }}</a></li>
            <li><a href="{{ route('news.index') }}" class="text-white hover:text-purple-200 transition-colors duration-300 font-medium">News</a></li>
            <li><a href="{{ route('genre.index') }}" class="text-white hover:text-purple-200 transition-colors duration-300 font-medium">{{ __('messages.genre') }}</a></li>
            <li><a href="{{ route('studio.index') }}" class="text-white hover:text-purple-200 transition-colors duration-300 font-medium">{{ __('messages.studio') }}</a></li>
            <li><a href="{{ url('/feedback') }}" class="text-white hover:text-purple-200 transition-colors duration-300 font-medium">{{ __('messages.feedback') }}</a></li>
            
            @auth
                @if(auth()->user()->is_admin)
                    <li class="lg:ml-auto">
                        <a href="{{ route('admin.users.index') }}" class="flex items-center gap-2 px-4 py-2 bg-blue-500/20 hover:bg-blue-500/40 text-white rounded-lg transition-all duration-300 font-bold text-sm shadow-sm backdrop-blur-sm border border-blue-400/20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-200" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a7 7 0 00-7 7v1h11v-1a7 7 0 00-7-7z" />
                            </svg>
                            User List
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.news.index') }}" class="flex items-center gap-2 px-4 py-2 bg-red-500/20 hover:bg-red-500/40 text-white rounded-lg transition-all duration-300 font-bold text-sm shadow-sm backdrop-blur-sm border border-red-400/20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-200" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                            </svg>
                            Admin News
                        </a>
                    </li>
                    <li>
                @else
                    <li class="lg:ml-auto">
                @endif
                    <a href="{{ route('anime-list.index') }}" class="flex items-center gap-2 px-4 py-2 bg-white/20 hover:bg-white/30 text-white rounded-lg transition-all duration-300 font-bold text-sm shadow-sm backdrop-blur-sm border border-white/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-purple-200" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                        </svg>
                        My List
                    </a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
