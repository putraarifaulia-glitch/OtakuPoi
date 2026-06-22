@extends('layouts.app')

@section('title', 'Anime by Genre - OtakuPoi')

@section('content')
    <main class="container mx-auto px-4 py-12">
        <div class="mb-12">
            <h2 class="text-4xl font-bold text-gray-900 dark:text-gray-100 mb-2">
                {{ $genreName }} Anime
            </h2>
            <p class="text-gray-500 dark:text-gray-400">Discover the latest and most popular anime in the {{ $genreName }} category.</p>
        </div>

        <!-- Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-8 mb-12">
            @forelse($animes as $anime)
                <x-anime-card :item="$anime" type="anime" />
            @empty
                <div class="col-span-full py-20 text-center bg-white dark:bg-dark-card rounded-3xl shadow-sm border border-gray-100 dark:border-dark-border transition-colors">
                    <div class="w-20 h-20 bg-purple-50 dark:bg-indigo-900/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="https://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 9.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <p class="text-xl font-bold text-gray-800 dark:text-gray-200">No anime found</p>
                    <p class="text-gray-500 dark:text-gray-400">Try checking another genre or coming back later.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if(isset($pagination['last_visible_page']) && $pagination['last_visible_page'] > 1)
            <nav class="flex justify-center items-center gap-2 py-12">
                @php
                    $currentPage = $pagination['current_page'] ?? 1;
                    $lastPage = $pagination['last_visible_page'];
                    $start = max(1, $currentPage - 2);
                    $end = min($lastPage, $currentPage + 2);
                @endphp

                @if($currentPage > 1)
                    <a href="{{ url()->current() }}?page={{ $currentPage - 1 }}" 
                        class="px-4 py-2 rounded-xl bg-white dark:bg-dark-card border border-gray-200 dark:border-dark-border hover:bg-purple-50 dark:hover:bg-indigo-900/20 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all text-gray-700 dark:text-gray-300 shadow-sm font-bold">Prev</a>
                @endif

                @for($i = $start; $i <= $end; $i++)
                    <a href="{{ url()->current() }}?page={{ $i }}" 
                        class="w-10 h-10 flex items-center justify-center rounded-xl font-bold transition-all shadow-sm {{ $i == $currentPage ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-200 dark:shadow-none' : 'bg-white dark:bg-dark-card border border-gray-200 dark:border-dark-border hover:bg-purple-50 dark:hover:bg-indigo-900/20 hover:text-indigo-600 dark:hover:text-indigo-400 text-gray-700 dark:text-gray-300' }}">
                        {{ $i }}
                    </a>
                @endfor

                @if($currentPage < $lastPage)
                    <a href="{{ url()->current() }}?page={{ $currentPage + 1 }}" 
                        class="px-4 py-2 rounded-xl bg-white dark:bg-dark-card border border-gray-200 dark:border-dark-border hover:bg-purple-50 dark:hover:bg-indigo-900/20 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all text-gray-700 dark:text-gray-300 shadow-sm font-bold">Next</a>
                @endif
            </nav>
        @endif
    </main>
@endsection
