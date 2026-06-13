<footer class="bg-deep-purple mt-12">
    <!-- Upper Footer Grid -->
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
            <p class="text-white text-sm md:text-base">
                It's time to ditch the text file. Keep track of your anime easily by creating your own list.
            </p>
            <div class="flex justify-end space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="px-6 py-2 rounded-full bg-white text-deep-purple font-medium hover:bg-purple-50 transition-colors duration-300">
                        Log In
                    </a>
                    <a href="{{ route('register') }}" class="px-6 py-2 rounded-full bg-transparent border-2 border-white text-white font-medium hover:bg-white hover:text-deep-purple transition-colors duration-300">
                        Sign Up
                    </a>
                @endguest
            </div>
        </div>
    </div>

    <!-- Middle Footer Grid -->
    <div class="container mx-auto px-4 py-6 border-t border-purple-700">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
            <!-- Follow Us -->
            <div class="flex items-center space-x-4">
                <span class="text-white font-medium">Follow Us</span>
                <div class="flex space-x-3">
                    <a href="#" class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-colors duration-300">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <!-- ... rest of social icons ... -->
                </div>
            </div>
            
            <!-- Get The App -->
            <div class="flex items-center justify-end space-x-4">
                <span class="text-white font-medium">Get The App</span>
                <div class="flex space-x-3">
                    <!-- App store links -->
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Footer Row -->
    <div class="container mx-auto px-4 py-6 border-t border-purple-700 flex flex-col items-center">
        <img src="{{ asset('assets/image/logoOtakuPoi.png') }}" alt="OtakuPoi Logo" class="w-24 h-24 mb-4 object-contain">
        <p class="text-center text-purple-200 text-sm">
            OtakuPoi.com is a property of Kelompok 02, TI. ©2026 All Rights Reserved.
        </p>
    </div>
</footer>
