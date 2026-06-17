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
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 border-l-4 border-indigo-600 pl-4 mb-6">Currently Airing (Seasonal)</h2>
                        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                            @foreach(collect($seasonalAnime)->take(12) as $anime)
                                <x-anime-card :item="$anime" type="anime" />
                            @endforeach
                        </div>
                    </section>

                    <!-- Most Popular Manga -->
                    <section>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 border-l-4 border-indigo-600 pl-4 mb-6">Popular Manga</h2>
                        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                            @foreach(collect($topManga)->take(12) as $manga)
                                <x-anime-card :item="$manga" type="manga" />
                            @endforeach
                        </div>
                    </section>

                    <!-- Latest Episodes & Recent News -->
                    <section class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 border-l-4 border-indigo-600 pl-4 mb-4">Latest Episodes</h2>
                            <div class="bg-white dark:bg-dark-card p-4 rounded-xl shadow-sm border border-gray-100 dark:border-dark-border divide-y dark:divide-dark-border transition-colors">
                                @foreach(collect($latestEpisodes)->take(6) as $episode)
                                    <div class="py-3 flex justify-between items-center text-sm">
                                        <p class="font-bold truncate w-2/3 text-gray-800 dark:text-gray-200">{{ $episode['entry']['title'] }}</p>
                                        <span class="text-gray-400 dark:text-gray-500">{{ $episode['episodes'][0]['title'] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 border-l-4 border-indigo-600 pl-4 mb-4">Latest News</h2>
                            <div class="bg-white dark:bg-dark-card p-4 rounded-xl shadow-sm border border-gray-100 dark:border-dark-border divide-y dark:divide-dark-border transition-colors">
                                @forelse($latestNews as $news)
                                    <div class="py-3 group">
                                        <a href="{{ route('news.show', $news->slug) }}" class="flex items-start gap-4">
                                            @if($news->image_path)
                                                <img src="{{ asset('storage/' . $news->image_path) }}" alt="{{ $news->title }}" class="w-16 h-16 object-cover rounded-lg flex-shrink-0 shadow-sm">
                                            @else
                                                <div class="w-16 h-16 bg-gray-100 dark:bg-dark-bg rounded-lg flex items-center justify-center text-gray-400 dark:text-gray-500 flex-shrink-0 border dark:border-dark-border">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                            @endif
                                            <div class="flex flex-col">
                                                <p class="font-bold text-gray-800 dark:text-gray-200 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors line-clamp-2 leading-tight">{{ $news->title }}</p>
                                                <span class="text-xs text-gray-400 dark:text-gray-500 mt-1">{{ $news->created_at->format('M d, Y') }}</span>
                                            </div>
                                        </a>
                                    </div>
                                @empty
                                    <p class="py-3 text-sm text-gray-500 italic">No news updates available at the moment.</p>
                                @endforelse
                                @if($latestNews->isNotEmpty())
                                    <div class="pt-3">
                                        <a href="{{ route('news.index') }}" class="text-xs font-bold text-indigo-600 dark:text-indigo-400 hover:underline">View All News &rarr;</a>
                                    </div>
                                @endif
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
