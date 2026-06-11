@extends('layouts.app')

@section('title', 'Browse Anime - OtakuPoi')

@section('content')
    <main class="container mx-auto px-4 py-8">
        <div class="mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                {{ $query ? 'Search Results for "' . $query . '"' : 'Top Anime' }}
            </h2>
            
            <!-- Search Bar -->
            <form action="{{ url('/anime') }}" method="GET" class="relative max-w-2xl">
                <input type="text" name="q" value="{{ $query }}" placeholder="Search for anime..." 
                    class="w-full px-6 py-4 rounded-full bg-gray-100 border-transparent focus:bg-white focus:border-deep-purple focus:ring-0 text-lg transition-all shadow-inner">
                <button type="submit" class="absolute right-3 top-3 px-6 py-2 rounded-full bg-deep-purple text-white font-bold hover:bg-purple-800 transition-colors">
                    Search
                </button>
            </form>
        </div>

        <!-- Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-8 mb-12">
            @forelse($animes as $anime)
                <x-anime-card :item="$anime" type="anime" />
            @empty
                <div class="col-span-full py-20 text-center">
                    <p class="text-2xl text-gray-400">No anime found matching your criteria.</p>
                </div>
            @endforelse
        </div>

        <!-- Improved Pagination -->
        @if(isset($pagination['last_visible_page']) && $pagination['last_visible_page'] > 1)
            <nav class="flex justify-center items-center gap-2 py-12">
                @php
                    $currentPage = $pagination['current_page'] ?? 1;
                    $lastPage = $pagination['last_visible_page'];
                    $start = max(1, $currentPage - 2);
                    $end = min($lastPage, $currentPage + 2);
                @endphp

                @if($currentPage > 1)
                    <a href="{{ url()->current() }}?{{ http_build_query(request()->except('page')) }}&page={{ $currentPage - 1 }}" 
                        class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 text-gray-700">Prev</a>
                @endif

                @for($i = $start; $i <= $end; $i++)
                    <a href="{{ url()->current() }}?{{ http_build_query(request()->except('page')) }}&page={{ $i }}" 
                        class="px-4 py-2 rounded {{ $i == $currentPage ? 'bg-deep-purple text-white' : 'bg-gray-100 hover:bg-gray-200 text-gray-700' }}">
                        {{ $i }}
                    </a>
                @endfor

                @if($currentPage < $lastPage)
                    <a href="{{ url()->current() }}?{{ http_build_query(request()->except('page')) }}&page={{ $currentPage + 1 }}" 
                        class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 text-gray-700">Next</a>
                @endif
            </nav>
        @endif
    </main>
@endsection
