@extends('layouts.app')

@section('title', 'OtakuPoi - Anime & Manga Hub')

@section('content')
    <div class="py-4 md:py-8">
        <main class="container mx-auto px-2 md:px-4">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 md:gap-8">
                
                <!-- Kolom Utama -->
                <div class="lg:col-span-9 space-y-8 md:space-y-12">
                    
                    <!-- Seasonal Anime -->
                    <section>
                        <h2 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-gray-100 border-l-4 border-indigo-600 pl-3 md:pl-4 mb-4 md:mb-6">Currently Airing</h2>
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3 md:gap-6">
                            @foreach(collect($seasonalAnime)->take(10) as $anime)
                                <x-anime-card :item="$anime" type="anime" />
                            @endforeach
                        </div>
                    </section>

                    <!-- Popular Manga -->
                    <section>
                        <h2 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-gray-100 border-l-4 border-indigo-600 pl-3 md:pl-4 mb-4 md:mb-6">Popular Manga</h2>
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3 md:gap-6">
                            @foreach(collect($topManga)->take(10) as $manga)
                                <x-anime-card :item="$manga" type="manga" />
                            @endforeach
                        </div>
                    </section>

                    <!-- Latest Episodes & Recent News -->
                    <section class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8">
                        <div>
                            <h2 class="text-lg md:text-xl font-bold text-gray-900 dark:text-gray-100 border-l-4 border-indigo-600 pl-3 md:pl-4 mb-3 md:mb-4">Latest Episodes</h2>
                            <div class="bg-white dark:bg-dark-card p-3 md:p-4 rounded-xl shadow-sm border border-gray-100 dark:border-dark-border divide-y dark:divide-dark-border transition-colors">
                                @foreach(collect($latestEpisodes)->take(6) as $episode)
                                    <div class="py-3 flex justify-between items-center text-xs md:text-sm">
                                        <p class="font-bold truncate w-2/3 text-gray-800 dark:text-gray-200">{{ $episode['entry']['title'] }}</p>
                                        <span class="text-gray-400 dark:text-gray-500">{{ $episode['episodes'][0]['title'] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <h2 class="text-lg md:text-xl font-bold text-gray-900 dark:text-gray-100 border-l-4 border-indigo-600 pl-3 md:pl-4 mb-3 md:mb-4">Latest News</h2>
                            <div class="bg-white dark:bg-dark-card p-3 md:p-4 rounded-xl shadow-sm border border-gray-100 dark:border-dark-border divide-y dark:divide-dark-border transition-colors">
                                @forelse($latestNews as $news)
                                    <div class="py-3">
                                        <a href="{{ route('news.show', $news->slug) }}" class="flex items-center gap-3 md:gap-4">
                                            @if($news->image_path)
                                                <img src="{{ asset('storage/' . $news->image_path) }}" alt="{{ $news->title }}" class="w-16 h-16 md:w-20 md:h-20 object-cover rounded-lg flex-shrink-0 shadow-sm">
                                            @endif
                                            <div class="flex flex-col min-w-0">
                                                <p class="font-bold text-sm md:text-base text-gray-800 dark:text-gray-200 line-clamp-2 leading-tight">{{ $news->title }}</p>
                                                <span class="text-[10px] md:text-xs text-gray-400 dark:text-gray-500 mt-1">{{ $news->created_at->format('M d, Y') }}</span>
                                            </div>
                                        </a>
                                    </div>
                                @empty
                                    <p class="py-3 text-sm text-gray-500 italic">No news updates.</p>
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

                <!-- Sidebar -->
                <aside class="hidden lg:block lg:col-span-3">
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
