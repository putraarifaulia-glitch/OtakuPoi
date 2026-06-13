@extends('layouts.app')

@section('title', 'OtakuPoi - Anime & Manga Hub')

@section('content')
    <div class="py-8">
        <main class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                
                <!-- Kolom Utama (70%) -->
                <div class="lg:col-span-9 space-y-12">
                    
                    <!-- Seasonal Anime (Data-Rich) -->
                    <section>
                        <h2 class="text-2xl font-bold text-gray-900 border-l-4 border-deep-purple pl-4 mb-6">Currently Airing (Seasonal)</h2>
                        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                            @foreach(collect($seasonalAnime)->take(12) as $anime)
                                @php
                                    $item = [
                                        'id' => $anime['mal_id'],
                                        'title' => $anime['title'],
                                        'images' => ['jpg' => ['image_url' => $anime['images']['jpg']['image_url']]],
                                        'score' => $anime['score'] ?? 'N/A'
                                    ];
                                @endphp
                                <a href="{{ url('/anime/' . $item['id']) }}" class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden group hover:shadow-md transition-shadow">
                                    <div class="relative aspect-[2/3]">
                                        <img src="{{ $item['images']['jpg']['image_url'] }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                        <div class="absolute bottom-2 left-2 bg-black/70 text-white text-xs px-2 py-1 rounded">⭐ {{ $item['score'] }}</div>
                                    </div>
                                    <div class="p-3">
                                        <h4 class="font-bold text-sm truncate group-hover:text-deep-purple transition-colors">{{ $item['title'] }}</h4>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </section>

                    <!-- Most Popular Manga -->
                    <section>
                        <h2 class="text-2xl font-bold text-gray-900 border-l-4 border-deep-purple pl-4 mb-6">Popular Manga</h2>
                        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                            @foreach(collect($topManga)->take(12) as $manga)
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
                <aside class="lg:col-span-3">
                    <x-right-sidebar 
                        :topAiringAnimes="$topAiringAnimes" 
                        :topCharacters="$topCharacters" 
                        :upcomingAnimes="$upcomingAnimes" 
                    />
                </aside>
            </div>
        </main>
    </div>
@endsection
