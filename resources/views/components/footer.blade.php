<footer class="bg-indigo-600 dark:bg-indigo-950 mt-12 text-white transition-colors duration-300">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Brand Section -->
            <div class="space-y-4">
                <img src="{{ asset('assets/image/logoOtakuPoi.png') }}" alt="OtakuPoi Logo" class="w-20 h-20 object-contain bg-white rounded-lg p-1">
                <h2 class="text-xl font-bold">OtakuPoi</h2>
                <p class="text-purple-200 dark:text-purple-300/80 text-sm">
                    Your ultimate destination for tracking, discovering, and discussing your favorite anime and manga.
                </p>
            </div>

            <!-- Explore Links -->
            <div>
                <h3 class="font-semibold mb-4 text-purple-100 dark:text-white">Explore</h3>
                <ul class="space-y-2 text-sm text-purple-200 dark:text-purple-300/80">
                    <li><a href="{{ route('anime.index') }}" class="hover:text-white transition">Anime</a></li>
                    <li><a href="{{ route('genre.index') }}" class="hover:text-white transition">Genres</a></li>
                    <li><a href="{{ route('manga.index') }}" class="hover:text-white transition">Manga</a></li>
                    <li><a href="{{ route('studio.index') }}" class="hover:text-white transition">Studios</a></li>
                </ul>
            </div>

            <!-- Community/Account -->
            <div>
                <h3 class="font-semibold mb-4 text-purple-100 dark:text-white">Account</h3>
                <ul class="space-y-2 text-sm text-purple-200 dark:text-purple-300/80">
                    @auth
                        <li><a href="{{ route('anime-list.index') }}" class="hover:text-white transition">My List</a></li>
                        <li><a href="{{ route('feedback.index') }}" class="hover:text-white transition">Feedback</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="hover:text-white transition">Log In</a></li>
                        <li><a href="{{ route('register') }}" class="hover:text-white transition">Sign Up</a></li>
                    @endauth
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="font-semibold mb-4 text-purple-100 dark:text-white">Contact</h3>
                <p class="text-sm text-purple-200 dark:text-purple-300/80 mb-2">Have suggestions or found a bug?</p>
                <a href="{{ route('feedback.index') }}" class="inline-block px-4 py-2 bg-white/20 dark:bg-white/10 rounded text-sm hover:bg-white/30 dark:hover:bg-white/20 transition">
                    Send Feedback
                </a>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-purple-700 dark:border-indigo-900/50">
        <div class="container mx-auto px-4 py-6 text-center text-purple-300 dark:text-purple-400 text-sm">
            OtakuPoi © 2026. Built with passion by Kelompok 02, Sistem Web & Mobile.
        </div>
    </div>
</footer>
