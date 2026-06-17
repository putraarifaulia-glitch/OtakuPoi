<div id="navbar-container" class="sticky top-0 z-50 w-full transition-transform duration-300 ease-in-out shadow-sm">
    <!-- Top Header: Logo & Auth -->
    <header id="top-header" class="bg-white/95 dark:bg-dark-card/95 backdrop-blur-md w-full border-b border-gray-200 dark:border-dark-border transition-colors duration-300">
        <div class="container mx-auto px-4 flex justify-between items-center py-4">
            <!-- Left: Logo & Branding -->
            <a href="{{ url('/') }}" class="flex items-center group">
                <img src="{{ asset('assets/image/logoOtakuPoi.png') }}" alt="OtakuPoi Logo" class="w-16 h-16 mr-3 object-contain transition-transform group-hover:scale-110">
                <h1 class="text-2xl font-black text-indigo-600 dark:text-indigo-400 tracking-tight">OtakuPoi</h1>
            </a>
            
            <!-- Right: Auth Buttons & Dark Mode Toggle -->
            <div class="flex items-center space-x-4">
                <!-- Dark Mode Toggle -->
                <button id="theme-toggle" class="p-2.5 rounded-xl bg-gray-100 dark:bg-dark-bg text-gray-500 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-dark-border transition-all">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                </button>

                @auth
                    <a href="{{ url('/home') }}" class="px-6 py-2.5 rounded-full bg-indigo-600 text-white font-bold hover:bg-purple-800 transition-all shadow-md hover:shadow-purple-200 active:scale-95">
                        {{ __('messages.dashboard') }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-6 py-2.5 rounded-full bg-white dark:bg-transparent border-2 border-indigo-600 text-indigo-600 dark:text-indigo-400 font-bold hover:bg-purple-50 dark:hover:bg-indigo-900/20 transition-all active:scale-95">
                            {{ __('messages.logout') }}
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="px-6 py-2.5 rounded-full bg-indigo-600 text-white font-bold hover:bg-purple-800 transition-all shadow-md hover:shadow-purple-200 active:scale-95 text-sm">
                        {{ __('messages.login') }}
                    </a>
                    <a href="{{ route('register') }}" class="px-6 py-2.5 rounded-full bg-white dark:bg-transparent border-2 border-indigo-600 text-indigo-600 dark:text-indigo-400 font-bold hover:bg-purple-50 dark:hover:bg-indigo-900/20 transition-all active:scale-95 text-sm">
                        {{ __('messages.signup') }}
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Main Navigation -->
    <nav id="main-nav" class="bg-indigo-600 dark:bg-indigo-900 w-full transition-all duration-300 shadow-lg">
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
                            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-4 py-2 bg-indigo-500/20 hover:bg-indigo-500/40 text-white rounded-lg transition-all duration-300 font-bold text-sm shadow-sm backdrop-blur-sm border border-indigo-400/20">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-200" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
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
        if (localStorage.getItem('theme')) {
            if (localStorage.getItem('theme') === 'light') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            }
        } else {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }
    });

    // Dynamic Navbar Scroll Logic (Show only at the very top)
    const topHeader = document.getElementById('top-header');
    const navbarContainer = document.getElementById('navbar-container');

    window.addEventListener('scroll', function() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        let headerHeight = topHeader.offsetHeight;

        // Jika scroll lebih dari 10px, sembunyikan navbar atas
        if (scrollTop > 10) {
            navbarContainer.style.transform = `translateY(-${headerHeight}px)`;
        } else {
            // Munculkan kembali hanya saat sudah di posisi paling atas (mentok)
            navbarContainer.style.transform = 'translateY(0)';
        }
    }, { passive: true });
</script>