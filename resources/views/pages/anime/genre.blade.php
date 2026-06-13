@extends('layouts.app')

@section('title', 'Anime by Genre - OtakuPoi')

@section('content')
    <main class="container mx-auto px-4 py-12">
        <div class="mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-2">
                Browse by Genre
            </h2>
            <p class="text-gray-500">Discover the latest and most popular anime in your favorite categories.</p>
        </div>

        <!-- Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-8 mb-12">
            @forelse($animes as $anime)
                <x-anime-card :item="$anime" type="anime" />
            @empty
                <div class="col-span-full py-20 text-center bg-white rounded-3xl shadow-sm border border-purple-50">
                    <div class="w-20 h-20 bg-purple-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-deep-purple" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 9.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <p class="text-xl font-bold text-gray-800">No anime found</p>
                    <p class="text-gray-500">Try checking another genre or coming back later.</p>
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
                        class="px-4 py-2 rounded-xl bg-white border border-gray-200 hover:bg-purple-50 hover:text-deep-purple transition-all text-gray-700 shadow-sm">Prev</a>
                @endif

                @for($i = $start; $i <= $end; $i++)
                    <a href="{{ url()->current() }}?page={{ $i }}" 
                        class="w-10 h-10 flex items-center justify-center rounded-xl font-bold transition-all shadow-sm {{ $i == $currentPage ? 'bg-deep-purple text-white' : 'bg-white border border-gray-200 hover:bg-purple-50 hover:text-deep-purple text-gray-700' }}">
                        {{ $i }}
                    </a>
                @endfor

                @if($currentPage < $lastPage)
                    <a href="{{ url()->current() }}?page={{ $currentPage + 1 }}" 
                        class="px-4 py-2 rounded-xl bg-white border border-gray-200 hover:bg-purple-50 hover:text-deep-purple transition-all text-gray-700 shadow-sm">Next</a>
                @endif
            </nav>
        @endif
    </main>
@endsection
