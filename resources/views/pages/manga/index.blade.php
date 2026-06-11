@extends('layouts.app')

@section('title', 'Browse Manga - OtakuPoi')

@section('content')
    <main class="container mx-auto px-4 py-8">
        <div class="mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">
                {{ $query ? 'Search Results for "' . $query . '"' : 'Top Manga' }}
            </h2>
            
            <!-- Search Bar -->
            <form action="{{ url('/manga') }}" method="GET" class="relative max-w-2xl">
                <input type="text" name="q" value="{{ $query }}" placeholder="Search for manga..." 
                    class="w-full px-6 py-4 rounded-full bg-gray-100 border-transparent focus:bg-white focus:border-deep-purple focus:ring-0 text-lg transition-all shadow-inner">
                <button type="submit" class="absolute right-3 top-3 px-6 py-2 rounded-full bg-deep-purple text-white font-bold hover:bg-purple-800 transition-colors">
                    Search
                </button>
            </form>
        </div>

        <!-- Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-8 mb-12">
            @forelse($mangas as $manga)
                <x-anime-card :item="$manga" type="manga" />
            @empty
                <div class="col-span-full py-20 text-center">
                    <p class="text-2xl text-gray-400">No manga found matching your criteria.</p>
                </div>
            @endforelse
        </div>

        <!-- Simple Pagination -->
        @if(isset($pagination['has_next_page']) && $pagination['has_next_page'])
            <div class="flex justify-center py-8">
                <a href="{{ url()->current() }}?q={{ $query }}&page={{ ($pagination['current_page'] ?? 1) + 1 }}" 
                    class="px-8 py-3 rounded-full bg-deep-purple text-white font-bold hover:bg-purple-800 transition-all">
                    Load More
                </a>
            </div>
        @endif
    </main>
@endsection
