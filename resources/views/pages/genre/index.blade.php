@extends('layouts.app')

@section('title', 'Explore Genres - OtakuPoi')

@section('content')
<div class="min-h-screen bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        <!-- Anime Genres Section -->
        <div class="mb-16">
            <h1 class="text-3xl font-black text-gray-900 mb-8 flex items-center gap-3">
                <span class="w-2 h-8 bg-indigo-600 rounded-full"></span>
                Anime Genres
            </h1>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-3">
                @foreach($animeGenres as $genre)
                    <a href="{{ route('genre.anime.show', $genre['mal_id']) }}" 
                       class="group relative bg-white p-3 rounded-xl shadow-sm border border-gray-200 hover:border-indigo-600 hover:shadow-md transition-all duration-300 flex flex-col items-center text-center overflow-hidden">
                        <h3 class="relative z-10 font-bold text-gray-900 group-hover:text-indigo-600 transition-colors text-xs line-clamp-1">
                            {{ $genre['name'] }}
                        </h3>
                        <p class="relative z-10 text-[9px] font-bold text-gray-400 mt-0.5 uppercase tracking-widest">
                            {{ $genre['count'] ?? 0 }} Titles
                        </p>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Manga Genres Section -->
        <div>
            <h1 class="text-3xl font-black text-gray-900 mb-8 flex items-center gap-3">
                <span class="w-2 h-8 bg-amber-500 rounded-full"></span>
                Manga Genres
            </h1>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 gap-3">
                @foreach($mangaGenres as $genre)
                    <a href="{{ route('genre.manga.show', $genre['mal_id']) }}" class="group relative bg-white p-3 rounded-xl shadow-sm border border-gray-200 hover:border-amber-500 hover:shadow-md transition-all duration-300 flex flex-col items-center text-center overflow-hidden">
                        <h3 class="relative z-10 font-bold text-gray-900 group-hover:text-amber-500 transition-colors text-xs line-clamp-1">
                            {{ $genre['name'] }}
                        </h3>
                        <p class="relative z-10 text-[9px] font-bold text-gray-400 mt-0.5 uppercase tracking-widest">
                            {{ $genre['count'] ?? 0 }} Titles
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
