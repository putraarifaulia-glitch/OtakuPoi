@extends('layouts.app')

@section('title', $anime['title'] . ' - OtakuPoi')

@section('content')
    <main class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-12">
            
            <!-- Left: Poster & Basic Info -->
            <div class="md:col-span-1 space-y-6">
                <img src="{{ $anime['images']['jpg']['large_image_url'] ?? '' }}" alt="{{ $anime['title'] }}" class="w-full rounded-2xl shadow-2xl">
                
                <div class="bg-gray-50 p-6 rounded-2xl space-y-4">
                    <div>
                        <p class="text-sm text-gray-500 font-bold uppercase">Score</p>
                        <p class="text-3xl font-bold text-deep-purple">{{ $anime['score'] ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-bold uppercase">Rank</p>
                        <p class="text-xl font-bold">#{{ $anime['rank'] ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-bold uppercase">Status</p>
                        <p class="text-lg">{{ $anime['status'] ?? 'Unknown' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 font-bold uppercase">Episodes</p>
                        <p class="text-lg">{{ $anime['episodes'] ?? '?' }}</p>
                    </div>
                </div>

                @auth
                    <button class="w-full py-4 rounded-xl bg-deep-purple text-white font-bold shadow-lg hover:bg-purple-800 transition-all transform hover:scale-105">
                        Add to List
                    </button>
                @endauth
            </div>

            <!-- Right: Synopsis & Details -->
            <div class="md:col-span-2 lg:col-span-3 space-y-8">
                <div>
                    <h2 class="text-5xl font-bold text-gray-900 mb-4">{{ $anime['title'] }}</h2>
                    <div class="flex flex-wrap gap-2">
                        @foreach($anime['genres'] ?? [] as $genre)
                            <span class="px-3 py-1 bg-purple-100 text-deep-purple rounded-full text-sm font-bold">{{ $genre['name'] }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="prose prose-lg max-w-none text-gray-700">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Synopsis</h3>
                    <p class="leading-relaxed">{{ $anime['synopsis'] ?? 'No synopsis available.' }}</p>
                </div>

                <!-- Additional Info Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 pt-8 border-t border-gray-100">
                    <div>
                        <h4 class="font-bold text-gray-900 mb-2">Details</h4>
                        <ul class="space-y-2 text-gray-600">
                            <li><span class="font-semibold">Type:</span> {{ $anime['type'] ?? 'N/A' }}</li>
                            <li><span class="font-semibold">Source:</span> {{ $anime['source'] ?? 'N/A' }}</li>
                            <li><span class="font-semibold">Studio:</span> {{ $anime['studios'][0]['name'] ?? 'N/A' }}</li>
                            <li><span class="font-semibold">Aired:</span> {{ $anime['aired']['string'] ?? 'N/A' }}</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 mb-2">Theme Songs</h4>
                        <p class="text-sm text-gray-600">Openings: {{ count($anime['theme']['openings'] ?? []) }}</p>
                        <p class="text-sm text-gray-600">Endings: {{ count($anime['theme']['endings'] ?? []) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
