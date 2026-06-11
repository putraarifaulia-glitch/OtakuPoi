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

                <!-- Technical Info & Streaming Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 pt-8 border-t border-gray-100">
                    <div>
                        <h4 class="font-bold text-gray-900 mb-3">Technical Info</h4>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <li><span class="font-semibold text-gray-800">Type:</span> {{ $anime['type'] ?? 'N/A' }}</li>
                            <li><span class="font-semibold text-gray-800">Source:</span> {{ $anime['source'] ?? 'N/A' }}</li>
                            <li><span class="font-semibold text-gray-800">Studio:</span> {{ collect($anime['studios'] ?? [])->pluck('name')->join(', ') }}</li>
                            <li><span class="font-semibold text-gray-800">Producers:</span> {{ collect($anime['producers'] ?? [])->pluck('name')->take(3)->join(', ') }}</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 mb-3">Streaming Platforms</h4>
                        <div class="flex flex-wrap gap-2">
                            @forelse($anime['streaming'] ?? [] as $stream)
                                <a href="{{ $stream['url'] }}" target="_blank" class="px-3 py-1 bg-gray-100 hover:bg-deep-purple hover:text-white rounded text-xs font-bold transition">
                                    {{ $stream['name'] }}
                                </a>
                            @empty
                                <p class="text-sm text-gray-500 italic">No streaming info available</p>
                            @endforelse
                        </div>
                    </div>
                </div>
                <!-- Characters & Voice Actors -->
                <div class="pt-8 border-t border-gray-100">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Characters & Voice Actors</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach(collect($characters)->take(8) as $char)
                            <div class="flex items-center gap-4 bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                                <!-- Character Photo -->
                                @if(isset($char['character']['images']['jpg']['image_url']))
                                    <img src="{{ $char['character']['images']['jpg']['image_url'] }}" class="w-16 h-16 rounded object-cover shadow-sm">
                                @endif
                                
                                <div class="flex-1">
                                    <h5 class="font-bold text-gray-900">{{ $char['character']['name'] ?? 'Unknown' }}</h5>
                                    <p class="text-sm text-gray-500 italic">{{ $char['role'] ?? '' }}</p>
                                    
                                    @php
                                        $jaVa = collect($char['voice_actors'] ?? [])->firstWhere('language', 'Japanese');
                                    @endphp
                                    
                                    @if($jaVa)
                                        <div class="flex items-center gap-2 mt-2">
                                            @if(isset($jaVa['person']['images']['jpg']['image_url']))
                                                <img src="{{ $jaVa['person']['images']['jpg']['image_url'] }}" class="w-8 h-8 rounded-full object-cover border border-gray-200">
                                            @endif
                                            <p class="text-xs font-semibold text-deep-purple">{{ $jaVa['person']['name'] ?? '' }} (JP)</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
