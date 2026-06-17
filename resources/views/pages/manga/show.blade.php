@extends('layouts.app')

@section('title', $manga['title'] . ' - OtakuPoi')

@section('content')
    <main class="container mx-auto px-4 py-12 transition-colors duration-300">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-12">
            
            <!-- Left: Poster & Basic Info -->
            <div class="md:col-span-1 space-y-6">
                <img src="{{ $manga['images']['jpg']['large_image_url'] ?? '' }}" alt="{{ $manga['title'] }}" class="w-full rounded-2xl shadow-2xl">
                
                <div class="bg-gray-50 dark:bg-dark-card p-6 rounded-2xl space-y-4 border dark:border-dark-border transition-colors">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 font-bold uppercase">Score</p>
                        <p class="text-3xl font-bold text-indigo-600 dark:text-indigo-400">{{ $manga['score'] ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 font-bold uppercase">Rank</p>
                        <p class="text-xl font-bold text-gray-900 dark:text-gray-100">#{{ $manga['rank'] ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 font-bold uppercase">Status</p>
                        <p class="text-lg text-gray-800 dark:text-gray-200">{{ $manga['status'] ?? 'Unknown' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 font-bold uppercase">Chapters</p>
                        <p class="text-lg text-gray-800 dark:text-gray-200">{{ $manga['chapters'] ?? '?' }}</p>
                    </div>
                </div>

                @auth
                    <button class="w-full py-4 rounded-xl bg-indigo-600 text-white font-bold shadow-lg hover:bg-purple-800 transition-all transform hover:scale-105">
                        Add to List
                    </button>
                @endauth
            </div>

            <!-- Right: Synopsis & Details -->
            <div class="md:col-span-2 lg:col-span-3 space-y-8">
                <div>
                    <h2 class="text-5xl font-bold text-gray-900 dark:text-gray-100 mb-4">{{ $manga['title'] }}</h2>
                    <div class="flex flex-wrap gap-2">
                        @foreach($manga['genres'] ?? [] as $genre)
                            <span class="px-3 py-1 bg-purple-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 rounded-full text-sm font-bold border dark:border-indigo-500/20">{{ $genre['name'] }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="prose prose-lg dark:prose-invert max-w-none text-gray-700 dark:text-gray-300">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Synopsis</h3>
                    <p class="leading-relaxed">{{ $manga['synopsis'] ?? 'No synopsis available.' }}</p>
                </div>

                <!-- Additional Info Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 pt-8 border-t border-gray-100 dark:border-dark-border transition-colors">
                    <div>
                        <h4 class="font-bold text-gray-900 dark:text-gray-100 mb-2">Details</h4>
                        <ul class="space-y-2 text-gray-600 dark:text-gray-400">
                            <li><span class="font-semibold text-gray-800 dark:text-gray-200">Type:</span> {{ $manga['type'] ?? 'N/A' }}</li>
                            <li><span class="font-semibold text-gray-800 dark:text-gray-200">Published:</span> {{ $manga['published']['string'] ?? 'N/A' }}</li>
                            <li><span class="font-semibold text-gray-800 dark:text-gray-200">Authors:</span> {{ $manga['authors'][0]['name'] ?? 'N/A' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
