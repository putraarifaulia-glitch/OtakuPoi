@extends('layouts.app')

@section('title', 'Dashboard - OtakuPoi')

@section('content')
    <main class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            
            <!-- Main Content (Left) -->
            <div class="lg:col-span-3 space-y-12">
                
                <!-- Welcome Banner -->
                <section class="bg-gradient-to-r from-deep-purple to-purple-600 rounded-2xl p-8 text-white shadow-lg">
                    <h2 class="text-3xl font-bold mb-2">Welcome back, {{ auth()->user()->name ?? 'Otaku' }}!</h2>
                    <p class="text-purple-100">Check out what's trending this season.</p>
                </section>

                <!-- Top Anime -->
                <section>
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-2xl font-bold text-gray-900">Recommended Anime</h3>
                        <a href="{{ url('/anime') }}" class="text-deep-purple text-sm font-semibold hover:underline">See More</a>
                    </div>
                    <div class="flex overflow-x-auto gap-6 pb-4 scrollbar-hide">
                        @foreach($topAnime as $anime)
                            <x-anime-card :item="$anime" type="anime" />
                        @endforeach
                    </div>
                </section>

                <!-- Top Manga -->
                <section>
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-2xl font-bold text-gray-900">Popular Manga</h3>
                        <a href="{{ url('/manga') }}" class="text-deep-purple text-sm font-semibold hover:underline">See More</a>
                    </div>
                    <div class="flex overflow-x-auto gap-6 pb-4 scrollbar-hide">
                        @foreach($topManga as $manga)
                            <x-anime-card :item="$manga" type="manga" />
                        @endforeach
                    </div>
                </section>

            </div>

            <!-- Sidebar (Right) -->
            <div class="lg:col-span-1 space-y-8">
                
                <!-- Top Airing -->
                <section class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <h3 class="text-xl font-bold mb-6">Top Airing</h3>
                    <div class="space-y-4">
                        @foreach($topAiring as $index => $anime)
                            <div class="flex items-center gap-4">
                                <span class="text-2xl font-bold text-purple-200 w-6">#{{ $index + 1 }}</span>
                                <img src="{{ $anime['image_url'] ?? '' }}" alt="" class="w-12 h-16 object-cover rounded shadow-sm">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-bold truncate">{{ $anime['title'] }}</p>
                                    <p class="text-xs text-gray-500">{{ $anime['score'] ?? 'N/A' }} ⭐</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>

            </div>
        </div>
    </main>
@endsection
