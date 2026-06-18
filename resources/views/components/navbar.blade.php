<div id="navbar-container" class="sticky top-0 z-50 w-full transition-transform duration-300 ease-in-out shadow-sm" x-data="{ mobileMenuOpen: false }">
    <!-- Top Header: Logo & Auth -->
    <header id="top-header" class="bg-white/95 dark:bg-dark-card/95 backdrop-blur-md w-full border-b border-gray-200 dark:border-dark-border transition-colors duration-300">
        <div class="container mx-auto px-4 flex justify-between items-center py-4">
            <a href="{{ url('/') }}" class="flex items-center group">
                <img src="{{ asset('assets/image/logoOtakuPoi.png') }}" alt="OtakuPoi Logo" class="w-12 h-12 md:w-16 md:h-16 mr-2 md:mr-3 object-contain transition-transform group-hover:scale-110">
                <h1 class="text-xl md:text-2xl font-black text-indigo-600 dark:text-indigo-400 tracking-tight">OtakuPoi</h1>
            </a>
            
            <div class="flex items-center space-x-2 md:space-x-4">
                <button id="theme-toggle" class="p-2.5 rounded-xl bg-gray-100 dark:bg-dark-bg text-gray-500 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-dark-border transition-all">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                </button>

                <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden p-2 text-gray-600 dark:text-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>

                <div class="hidden lg:flex items-center space-x-4">
                    @auth
                        <a href="{{ url('/home') }}" class="px-5 py-2 rounded-full bg-indigo-600 text-white font-bold text-sm hover:bg-purple-800 transition-all shadow-md hover:shadow-lg">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="px-5 py-2 rounded-full bg-white dark:bg-transparent border-2 border-indigo-600 text-indigo-600 dark:text-indigo-400 font-bold text-sm hover:bg-indigo-50 dark:hover:bg-indigo-900/20 transition-all">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="px-5 py-2 rounded-full border-2 border-indigo-600 text-indigo-600 dark:text-indigo-400 font-bold text-sm hover:bg-indigo-50 dark:hover:bg-indigo-900/20 transition-all">Login</a>
                        <a href="{{ route('register') }}" class="px-5 py-2 rounded-full bg-indigo-600 text-white font-bold text-sm hover:bg-purple-800 transition-all shadow-md hover:shadow-lg">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Main Navigation -->
    <nav id="main-nav" class="bg-indigo-600 dark:bg-indigo-900 w-full transition-all duration-300 shadow-lg">
        <div class="container mx-auto px-4">
            <ul :class="mobileMenuOpen ? 'flex flex-col py-4' : 'hidden lg:flex'" class="lg:flex flex-col lg:flex-row items-center justify-center lg:justify-start space-y-4 lg:space-y-0 lg:space-x-6 py-2">
                <li><a href="{{ url('/') }}" class="text-white hover:text-purple-200 font-medium text-sm px-3 py-1.5 rounded-lg hover:bg-indigo-500/50 transition-all">Home</a></li>
                <li><a href="{{ url('/anime') }}" class="text-white hover:text-purple-200 font-medium text-sm px-3 py-1.5 rounded-lg hover:bg-indigo-500/50 transition-all">{{ __('messages.anime') }}</a></li>
                <li><a href="{{ url('/manga') }}" class="text-white hover:text-purple-200 font-medium text-sm px-3 py-1.5 rounded-lg hover:bg-indigo-500/50 transition-all">{{ __('messages.manga') }}</a></li>
                <li><a href="{{ route('news.index') }}" class="text-white hover:text-purple-200 font-medium text-sm px-3 py-1.5 rounded-lg hover:bg-indigo-500/50 transition-all">News</a></li>
                <li><a href="{{ route('genre.index') }}" class="text-white hover:text-purple-200 font-medium text-sm px-3 py-1.5 rounded-lg hover:bg-indigo-500/50 transition-all">{{ __('messages.genre') }}</a></li>
                <li><a href="{{ route('studio.index') }}" class="text-white hover:text-purple-200 font-medium text-sm px-3 py-1.5 rounded-lg hover:bg-indigo-500/50 transition-all">{{ __('messages.studio') }}</a></li>
                <li><a href="{{ url('/feedback') }}" class="text-white hover:text-purple-200 font-medium text-sm px-3 py-1.5 rounded-lg hover:bg-indigo-500/50 transition-all">{{ __('messages.feedback') }}</a></li>
                
                @auth
                    @if(auth()->user()->is_admin)
                        <li class="lg:ml-auto"><a href="{{ route('admin.dashboard') }}" class="bg-indigo-500/30 text-white font-bold text-xs uppercase tracking-wider px-4 py-2 rounded-full border border-indigo-400/50 hover:bg-indigo-400/50 transition-all">Admin Panel</a></li>
                        <li><a href="{{ route('admin.news.create') }}" class="bg-green-500/30 text-white font-bold text-xs uppercase tracking-wider px-4 py-2 rounded-full border border-green-400/50 hover:bg-green-400/50 transition-all">+ News</a></li>
                        <li><a href="{{ route('admin.users.index') }}" class="bg-purple-500/30 text-white font-bold text-xs uppercase tracking-wider px-4 py-2 rounded-full border border-purple-400/50 hover:bg-purple-400/50 transition-all">Users</a></li>
                    @else
                        <li class="lg:ml-auto"><a href="{{ route('anime-list.index') }}" class="bg-pink-500/30 text-white font-bold text-xs uppercase tracking-wider px-4 py-2 rounded-full border border-pink-400/50 hover:bg-pink-400/50 transition-all">My List</a></li>
                    @endif

                    <!-- Mobile Auth Links -->
                    <li class="lg:hidden pt-4 mt-4 border-t border-indigo-500/50 flex flex-col space-y-3">
                        <a href="{{ url('/home') }}" class="text-center px-5 py-2 rounded-full bg-indigo-500 text-white font-bold text-sm">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit" class="w-full px-5 py-2 rounded-full bg-transparent border-2 border-white text-white font-bold text-sm">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="lg:hidden pt-4 mt-4 border-t border-indigo-500/50 flex flex-col space-y-3">
                        <a href="{{ route('login') }}" class="text-center px-5 py-2 rounded-full border-2 border-white text-white font-bold text-sm">Login</a>
                        <a href="{{ route('register') }}" class="text-center px-5 py-2 rounded-full bg-white text-indigo-600 font-bold text-sm">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
</div>

<script>
    // Theme Toggle Logic
    var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
    if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
    }

    var themeToggleBtn = document.getElementById('theme-toggle');
    themeToggleBtn.addEventListener('click', function() {
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');
        if (localStorage.getItem('theme') === 'light') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        }
    });

    // Fixed Navbar Scroll Logic
    const topHeader = document.getElementById('top-header');
    const navbarContainer = document.getElementById('navbar-container');

    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 10) {
            navbarContainer.style.transform = `translateY(-${topHeader.offsetHeight}px)`;
        } else {
            navbarContainer.style.transform = 'translateY(0)';
        }
    }, { passive: true });
</script>