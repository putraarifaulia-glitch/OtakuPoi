@extends('layouts.app')

@section('title', 'OtakuPoi - Anime & Manga Hub')

@section('content')
    <div class="bg-gray-50 min-h-screen py-8">
        <main class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                
                <!-- Kolom Utama (70%) -->
                <div class="lg:col-span-9 space-y-12">
                    
                    <!-- Seasonal Anime (Data-Rich) -->
                    <section>
                        <h2 class="text-2xl font-bold text-gray-900 border-l-4 border-deep-purple pl-4 mb-6">Currently Airing (Seasonal)</h2>
                        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
                            @foreach(collect($seasonalAnime)->take(10) as $anime)
                                @php
                                    $item = [
                                        'title' => $anime['title'],
                                        'images' => ['jpg' => ['image_url' => $anime['images']['jpg']['image_url']]],
                                        'score' => $anime['score'] ?? 'N/A'
                                    ];
                                @endphp
                                <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden group">
                                    <div class="relative aspect-[2/3]">
                                        <img src="{{ $item['images']['jpg']['image_url'] }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover">
                                        <div class="absolute top-2 left-2 bg-black/70 text-white text-xs px-2 py-1 rounded">⭐ {{ $item['score'] }}</div>
                                    </div>
                                    <div class="p-3">
                                        <h4 class="font-bold text-sm truncate">{{ $item['title'] }}</h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>

                    <!-- Most Popular Manga -->
                    <section>
                        <h2 class="text-2xl font-bold text-gray-900 border-l-4 border-deep-purple pl-4 mb-6">Popular Manga</h2>
                        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
                            @foreach(collect($topManga)->take(10) as $manga)
                                <x-anime-card :item="$manga" type="manga" />
                            @endforeach
                        </div>
                    </section>

                    <!-- Latest Episodes & Recent News -->
                    <section class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 border-l-4 border-deep-purple pl-4 mb-4">Latest Episodes</h2>
                            <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 divide-y">
                                @foreach(collect($latestEpisodes)->take(6) as $episode)
                                    <div class="py-3 flex justify-between items-center text-sm">
                                        <p class="font-bold truncate w-2/3">{{ $episode['entry']['title'] }}</p>
                                        <span class="text-gray-400">{{ $episode['episodes'][0]['title'] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 border-l-4 border-deep-purple pl-4 mb-4">Latest News</h2>
                            <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                                <p class="text-sm text-gray-500 italic">News updates regarding major studio announcements...</p>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- Sidebar (30%) -->
                <aside class="lg:col-span-3 space-y-8">
                    
                    <!-- Top Rankings Widget -->
                    <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                        <h3 class="text-lg font-bold mb-4 text-gray-800 border-b pb-2">Top Airing</h3>
                        <div class="space-y-4 text-sm">
                            @foreach(collect($topAiring)->take(8) as $index => $anime)
                                <div class="flex items-center gap-3">
                                    <span class="font-bold text-gray-400">#{{ $index + 1 }}</span>
                                    <p class="truncate">{{ $anime['title'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Characters Widget -->
                    <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                        <h3 class="text-lg font-bold mb-4 text-gray-800 border-b pb-2">Top Characters</h3>
                        <div class="space-y-4 text-sm">
                            <p class="flex items-center gap-3"><span>1.</span> Eren Yeager</p>
                            <p class="flex items-center gap-3"><span>2.</span> Gojo Satoru</p>
                            <p class="flex items-center gap-3"><span>3.</span> Frieren</p>
                        </div>
                    </div>

                    <!-- Statistics Widget -->
                    <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                        <h3 class="text-lg font-bold mb-4 text-gray-800 border-b pb-2">OtakuPoi Stats</h3>
                        <div class="text-sm space-y-2">
                            <p class="flex justify-between"><span>Total Anime:</span> <span class="font-bold">15,400</span></p>
                            <p class="flex justify-between"><span>Total Manga:</span> <span class="font-bold">22,100</span></p>
                            <p class="flex justify-between"><span>Total Users:</span> <span class="font-bold">85,300</span></p>
                            <p class="flex justify-between"><span>Status:</span> <span class="font-bold text-green-500">Online</span></p>
                        </div>
                    </div>
                </aside>
            </div>
        </main>
    </div>
@endsection
