<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'OtakuPoi - Your Anime & Manga Platform')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        'indigo-600': '#6B21A8',
                        'dark-charcoal': '#1E1E1E',
                        'dark-bg': '#0F172A',
                        'dark-card': '#1E293B',
                        'dark-border': '#334155',
                    }
                }
            }
        }
    </script>
    <script>
        // Check local storage or system preference
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('styles')
</head>
<body class="bg-gray-50 dark:bg-dark-bg font-sans antialiased min-h-screen text-gray-900 dark:text-gray-100 transition-colors duration-300">
    <x-navbar />

    <div class="min-h-screen">
        @yield('content')
    </div>

    <!-- Notification Toast -->
    @if(session('success') || session('error'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" 
            class="fixed bottom-10 right-10 z-[100] transform transition-all duration-500"
            x-transition:enter="translate-y-2 opacity-0"
            x-transition:enter-end="translate-y-0 opacity-100"
            x-transition:leave="translate-y-2 opacity-0">
            <div class="{{ session('success') ? 'bg-emerald-600' : 'bg-red-600' }} text-white px-6 py-4 rounded-2xl shadow-2xl flex items-center gap-3 border-4 border-white dark:border-dark-card">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    @if(session('success'))
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    @else
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    @endif
                </svg>
                <span class="font-bold">{{ session('success') ?? session('error') }}</span>
            </div>
        </div>
    @endif

    <x-footer />

    @stack('scripts')
</body>
</html>
