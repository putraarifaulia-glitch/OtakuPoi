@extends('layouts.app')

@section('title', 'Explore Genres - OtakuPoi')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-dark-bg py-16 transition-colors duration-300">
    <div class="container mx-auto px-4">
        <!-- Anime Genres Section -->
        <div class="mb-16">
            <h1 class="text-3xl font-black text-gray-900 dark:text-gray-100 mb-8 flex items-center gap-3">
                <span class="w-2 h-8 bg-indigo-600 rounded-full"></span>
                Anime Genres
            </h1>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-3">
                @foreach($animeGenres as $genre)
                    <a href="{{ route('genre.anime.show', $genre['mal_id']) }}" 
                       class="group relative bg-white dark:bg-dark-card p-3 rounded-xl shadow-sm border border-gray-200 dark:border-dark-border hover:border-indigo-600 dark:hover:border-indigo-500 hover:shadow-md transition-all duration-300 flex flex-col items-center text-center overflow-hidden">
                        <h3 class="relative z-10 font-bold text-gray-900 dark:text-gray-100 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors text-xs line-clamp-1">
                            {{ $genre['name'] }}
                        </h3>
                        <p class="relative z-10 text-[9px] font-bold text-gray-400 dark:text-gray-500 mt-0.5 uppercase tracking-widest">
                            {{ $genre['count'] ?? 0 }} Titles
                        </p>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Manga Genres Section -->
        <div>
            <h1 class="text-3xl font-black text-gray-900 dark:text-gray-100 mb-8 flex items-center gap-3">
                <span class="w-2 h-8 bg-amber-500 rounded-full"></span>
                Manga Genres
            </h1>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-3">
                @foreach($mangaGenres as $genre)
                    <a href="{{ route('genre.manga.show', $genre['mal_id']) }}" class="group relative bg-white dark:bg-dark-card p-3 rounded-xl shadow-sm border border-gray-200 dark:border-dark-border hover:border-amber-500 dark:hover:border-amber-400 hover:shadow-md transition-all duration-300 flex flex-col items-center text-center overflow-hidden">
                        <h3 class="relative z-10 font-bold text-gray-900 dark:text-gray-100 group-hover:text-amber-500 dark:group-hover:text-amber-400 transition-colors text-xs line-clamp-1">
                            {{ $genre['name'] }}
                        </h3>
                        <p class="relative z-10 text-[9px] font-bold text-gray-400 dark:text-gray-500 mt-0.5 uppercase tracking-widest">
                            {{ $genre['count'] ?? 0 }} Titles
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
