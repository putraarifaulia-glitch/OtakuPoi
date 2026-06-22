@extends('layouts.app')

@section('title', $anime['title'] . ' - OtakuPoi')

@section('content')
    <main class="container mx-auto px-4 py-12 transition-colors duration-300">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-12">
            
            <!-- Left: Poster & Basic Info -->
            <div class="md:col-span-1 space-y-6">
                <img src="{{ $anime['images']['jpg']['large_image_url'] ?? '' }}" alt="{{ $anime['title'] }}" class="w-full rounded-2xl shadow-md">
                
                <div class="bg-gray-50 dark:bg-dark-card p-6 rounded-2xl space-y-4 border dark:border-dark-border transition-colors">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 font-bold uppercase">Score</p>
                        <p class="text-3xl font-bold text-indigo-600 dark:text-indigo-400">{{ $anime['score'] ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 font-bold uppercase">Rank</p>
                        <p class="text-xl font-bold text-gray-900 dark:text-gray-100">#{{ $anime['rank'] ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 font-bold uppercase">Status</p>
                        <p class="text-lg text-gray-800 dark:text-gray-200">{{ $anime['status'] ?? 'Unknown' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 font-bold uppercase">Episodes</p>
                        <p class="text-lg text-gray-800 dark:text-gray-200">{{ $anime['episodes'] ?? '?' }}</p>
                    </div>
                </div>

                @auth
                    <!-- Fitur Add to List dengan Alpine.js -->
                    <div x-data="{ open: false, selectedStatus: '{{ $userListEntry->status ?? '' }}' }" class="relative w-full">
                        <button @click="open = !open" 
                                type="button"
                                class="w-full py-4 rounded-xl flex items-center justify-center gap-2 font-bold shadow-lg transition-all transform hover:scale-105 {{ $userListEntry ? 'bg-green-500 hover:bg-green-600 text-white' : 'bg-indigo-600 hover:bg-purple-800 text-white' }}">
                            <svg xmlns="https://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            <span>{{ $userListEntry ? $userListEntry->status : 'Tambah ke List' }}</span>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" 
                             @click.away="open = false"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             class="absolute z-50 mt-2 w-full rounded-xl bg-white dark:bg-dark-card shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden border border-purple-100 dark:border-dark-border">
                            
                            <form id="animeListForm" action="{{ route('anime-list.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="anime_id" value="{{ $anime['mal_id'] }}">
                                <input type="hidden" name="title" value="{{ $anime['title'] }}">
                                <input type="hidden" name="image_url" value="{{ $anime['images']['jpg']['image_url'] }}">
                                <input type="hidden" name="status" x-model="selectedStatus">

                                <div class="flex flex-col">
                                    @foreach(['Watching', 'Completed', 'On Hold', 'Dropped', 'Plan to Watch'] as $status)
                                        <button type="button" 
                                                @click="selectedStatus = '{{ $status }}'; $nextTick(() => $el.closest('form').submit())"
                                                class="w-full text-left px-5 py-3 text-sm font-semibold text-gray-700 dark:text-gray-200 hover:bg-purple-50 dark:hover:bg-indigo-900/20 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-200 border-b border-gray-50 dark:border-dark-border last:border-0">
                                            {{ $status }}
                                        </button>
                                    @endforeach
                                </div>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>

            <!-- Right: Synopsis & Details -->
            <div class="md:col-span-2 lg:col-span-3 space-y-8">
                <div>
                    <h2 class="text-5xl font-bold text-gray-900 dark:text-gray-100 mb-4">{{ $anime['title'] }}</h2>
                    <div class="flex flex-wrap gap-2">
                        @foreach($anime['genres'] ?? [] as $genre)
                            <span class="px-3 py-1 bg-purple-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 rounded-full text-sm font-bold border dark:border-indigo-500/20">{{ $genre['name'] }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="prose prose-lg dark:prose-invert max-w-none text-gray-700 dark:text-gray-300">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Synopsis</h3>
                    <p class="leading-relaxed">{{ $anime['synopsis'] ?? 'No synopsis available.' }}</p>
                </div>

                <!-- Technical Info & Streaming Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 pt-8 border-t border-gray-100 dark:border-dark-border transition-colors">
                    <div>
                        <h4 class="font-bold text-gray-900 dark:text-gray-100 mb-3">Technical Info</h4>
                        <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                            <li><span class="font-semibold text-gray-800 dark:text-gray-200">Type:</span> {{ $anime['type'] ?? 'N/A' }}</li>
                            <li><span class="font-semibold text-gray-800 dark:text-gray-200">Source:</span> {{ $anime['source'] ?? 'N/A' }}</li>
                            <li><span class="font-semibold text-gray-800 dark:text-gray-200">Studio:</span> {{ collect($anime['studios'] ?? [])->pluck('name')->join(', ') }}</li>
                            <li><span class="font-semibold text-gray-800 dark:text-gray-200">Producers:</span> {{ collect($anime['producers'] ?? [])->pluck('name')->take(3)->join(', ') }}</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 dark:text-gray-100 mb-3">Streaming Platforms</h4>
                        <div class="flex flex-wrap gap-2">
                            @forelse($anime['streaming'] ?? [] as $stream)
                                <a href="{{ $stream['url'] }}" target="_blank" class="px-3 py-1 bg-gray-100 dark:bg-dark-card hover:bg-indigo-600 hover:text-white dark:hover:bg-indigo-500 rounded text-xs font-bold transition-all border dark:border-dark-border">
                                    {{ $stream['name'] }}
                                </a>
                            @empty
                                <p class="text-sm text-gray-500 dark:text-gray-500 italic">No streaming info available</p>
                            @endforelse
                        </div>
                    </div>
                </div>
                <!-- Characters & Voice Actors -->
                <div class="pt-8 border-t border-gray-100 dark:border-dark-border transition-colors">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">Characters & Voice Actors</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach(collect($characters)->take(8) as $char)
                            <div class="flex items-center gap-4 bg-white dark:bg-dark-card p-4 rounded-xl border border-gray-100 dark:border-dark-border shadow-sm transition-colors">
                                <!-- Character Photo -->
                                @if(isset($char['character']['images']['jpg']['image_url']))
                                    <img src="{{ $char['character']['images']['jpg']['image_url'] }}" class="w-16 h-16 rounded object-cover shadow-sm">
                                @endif
                                
                                <div class="flex-1">
                                    <h5 class="font-bold text-gray-900 dark:text-gray-100">{{ $char['character']['name'] ?? 'Unknown' }}</h5>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 italic">{{ $char['role'] ?? '' }}</p>
                                    
                                    @php
                                        $jaVa = collect($char['voice_actors'] ?? [])->firstWhere('language', 'Japanese');
                                    @endphp
                                    
                                    @if($jaVa)
                                        <div class="flex items-center gap-2 mt-2">
                                            @if(isset($jaVa['person']['images']['jpg']['image_url']))
                                                <img src="{{ $jaVa['person']['images']['jpg']['image_url'] }}" class="w-8 h-8 rounded-full object-cover border border-gray-200 dark:border-dark-border">
                                            @endif
                                            <p class="text-xs font-semibold text-indigo-600 dark:text-indigo-400">{{ $jaVa['person']['name'] ?? '' }} (JP)</p>
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
