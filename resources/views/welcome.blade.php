@extends('layouts.app')

@section('title', 'Welcome to OtakuPoi - Your Ultimate Anime & Manga Hub')

@section('content')
    <!-- Hero Section -->
    <section class="relative w-full h-[600px] overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=1920&q=80');">
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/50 to-transparent"></div>
        </div>
        
        <div class="relative container mx-auto px-4 h-full flex flex-col justify-center text-white">
            <h2 class="text-5xl lg:text-7xl font-bold mb-4">Discover Your Next Favorite Anime</h2>
            <p class="text-xl lg:text-2xl mb-8 max-w-2xl text-gray-200">
                Track your progress, explore new releases, and join a community of enthusiasts. Everything you need for your anime and manga journey in one place.
            </p>
            <div class="flex space-x-4">
                <a href="{{ route('register') }}" class="px-8 py-3 rounded-full bg-deep-purple text-white font-bold hover:bg-purple-800 transition-all transform hover:scale-105">
                    Join Now - It's Free
                </a>
                <a href="{{ url('/anime') }}" class="px-8 py-3 rounded-full border-2 border-white text-white font-bold hover:bg-white hover:text-deep-purple transition-all transform hover:scale-105">
                    Browse Anime
                </a>
            </div>
        </div>
    </section>

    <!-- Top Anime Section -->
    <main class="container mx-auto px-4 py-16">
        <section class="mb-16">
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-3xl font-bold text-gray-900">Trending Now</h3>
                <a href="{{ url('/anime') }}" class="text-deep-purple font-semibold hover:underline">View All</a>
            </div>
            <div class="flex overflow-x-auto gap-6 pb-4 scrollbar-hide">
                @forelse($topAnime as $anime)
                    <x-anime-card :item="$anime" type="anime" />
                @empty
                    <p class="text-gray-500">No trending anime found.</p>
                @endforelse
            </div>
        </section>

        <!-- Features Section -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <div class="bg-purple-50 p-8 rounded-2xl text-center">
                <div class="w-16 h-16 bg-deep-purple rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                    </svg>
                </div>
                <h4 class="text-xl font-bold mb-2">Track Your Progress</h4>
                <p class="text-gray-600">Keep a detailed list of what you've watched and read.</p>
            </div>
            <div class="bg-purple-50 p-8 rounded-2xl text-center">
                <div class="w-16 h-16 bg-deep-purple rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <h4 class="text-xl font-bold mb-2">Smart Search</h4>
                <p class="text-gray-600">Find any anime or manga with our advanced search filters.</p>
            </div>
            <div class="bg-purple-50 p-8 rounded-2xl text-center">
                <div class="w-16 h-16 bg-deep-purple rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                    </svg>
                </div>
                <h4 class="text-xl font-bold mb-2">Share Feedback</h4>
                <p class="text-gray-600">Help us improve by sharing your thoughts and suggestions.</p>
            </div>
        </section>
    </main>
@endsection
