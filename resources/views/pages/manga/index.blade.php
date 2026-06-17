@extends('layouts.app')

@section('title', 'Browse Manga - OtakuPoi')

@section('content')
    <main class="container mx-auto px-4 py-8">
        <div class="mb-12">
            <h2 class="text-4xl font-bold text-gray-900 dark:text-gray-100 mb-6">
                {{ $query ? 'Search Results for "' . $query . '"' : 'Explore Manga' }}
            </h2>
            
            <!-- Search & Filters -->
            <div class="bg-white dark:bg-dark-card p-6 rounded-3xl shadow-sm border border-gray-100 dark:border-dark-border transition-colors duration-300">
                <form action="{{ url('/manga') }}" method="GET" class="space-y-6">
                    <!-- Search Input -->
                    <div class="relative">
                        <input type="text" name="q" value="{{ $query }}" placeholder="Search for manga..." 
                            class="w-full px-6 py-4 rounded-2xl bg-gray-50 dark:bg-dark-bg border-transparent dark:border-dark-border focus:bg-white dark:focus:bg-dark-bg focus:border-indigo-600 focus:ring-0 text-lg transition-all dark:text-gray-100">
                        <button type="submit" class="absolute right-3 top-3 px-8 py-2 rounded-xl bg-indigo-600 text-white font-bold hover:bg-purple-800 transition-all shadow-md active:scale-95">
                            Search
                        </button>
                    </div>

                    <!-- Filters Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                        <!-- Genre -->
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 dark:text-gray-500 mb-2 px-1">Genre</label>
                            <select name="genre" class="w-full bg-gray-50 dark:bg-dark-bg border-gray-100 dark:border-dark-border rounded-xl text-sm focus:ring-indigo-600 focus:border-indigo-600 dark:text-gray-300">
                                <option value="">All Genres</option>
                                @foreach($genres as $g)
                                    <option value="{{ $g['mal_id'] }}" {{ $selectedGenre == $g['mal_id'] ? 'selected' : '' }}>{{ $g['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Type -->
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 dark:text-gray-500 mb-2 px-1">Format</label>
                            <select name="type" class="w-full bg-gray-50 dark:bg-dark-bg border-gray-100 dark:border-dark-border rounded-xl text-sm focus:ring-indigo-600 focus:border-indigo-600 dark:text-gray-300">
                                <option value="">All Types</option>
                                <option value="manga" {{ $selectedType == 'manga' ? 'selected' : '' }}>Manga</option>
                                <option value="novel" {{ $selectedType == 'novel' ? 'selected' : '' }}>Novel</option>
                                <option value="lightnovel" {{ $selectedType == 'lightnovel' ? 'selected' : '' }}>Light Novel</option>
                                <option value="oneshot" {{ $selectedType == 'oneshot' ? 'selected' : '' }}>One-shot</option>
                                <option value="doujin" {{ $selectedType == 'doujin' ? 'selected' : '' }}>Doujin</option>
                                <option value="manhwa" {{ $selectedType == 'manhwa' ? 'selected' : '' }}>Manhwa</option>
                                <option value="manhua" {{ $selectedType == 'manhua' ? 'selected' : '' }}>Manhua</option>
                            </select>
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 dark:text-gray-500 mb-2 px-1">Status</label>
                            <select name="status" class="w-full bg-gray-50 dark:bg-dark-bg border-gray-100 dark:border-dark-border rounded-xl text-sm focus:ring-indigo-600 focus:border-indigo-600 dark:text-gray-300">
                                <option value="">All Status</option>
                                <option value="publishing" {{ $selectedStatus == 'publishing' ? 'selected' : '' }}>Publishing</option>
                                <option value="complete" {{ $selectedStatus == 'complete' ? 'selected' : '' }}>Complete</option>
                                <option value="hiatus" {{ $selectedStatus == 'hiatus' ? 'selected' : '' }}>Hiatus</option>
                                <option value="discontinued" {{ $selectedStatus == 'discontinued' ? 'selected' : '' }}>Discontinued</option>
                                <option value="upcoming" {{ $selectedStatus == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                            </select>
                        </div>

                        <!-- Score -->
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 dark:text-gray-500 mb-2 px-1">Min Score</label>
                            <select name="min_score" class="w-full bg-gray-50 dark:bg-dark-bg border-gray-100 dark:border-dark-border rounded-xl text-sm focus:ring-indigo-600 focus:border-indigo-600 dark:text-gray-300">
                                <option value="">Any Score</option>
                                @for($i = 9; $i >= 1; $i--)
                                    <option value="{{ $i }}" {{ $selectedMinScore == $i ? 'selected' : '' }}>{{ $i }}+</option>
                                @endfor
                            </select>
                        </div>

                        <!-- Year -->
                        <div>
                            <label class="block text-[10px] font-black uppercase tracking-widest text-gray-400 dark:text-gray-500 mb-2 px-1">Year</label>
                            <input type="number" name="year" value="{{ $selectedYear }}" placeholder="e.g. 2024" min="1950" max="{{ date('Y') + 2 }}"
                                class="w-full bg-gray-50 dark:bg-dark-bg border-gray-100 dark:border-dark-border rounded-xl text-sm focus:ring-indigo-600 focus:border-indigo-600 dark:text-gray-300">
                        </div>
                    </div>

                    @if($selectedGenre || $selectedType || $selectedStatus || $selectedMinScore || $selectedYear || $query)
                        <div class="flex justify-end">
                            <a href="{{ url('/manga') }}" class="text-sm font-bold text-red-500 hover:text-red-600 transition-colors flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                                Clear All Filters
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>

        <!-- Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-8 mb-12">
            @forelse($mangas as $manga)
                <x-anime-card :item="$manga" type="manga" />
            @empty
                <div class="col-span-full py-20 text-center">
                    <div class="w-20 h-20 bg-gray-100 dark:bg-dark-card rounded-3xl flex items-center justify-center mx-auto mb-6 border dark:border-dark-border">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <p class="text-xl font-bold text-gray-400">No manga found matching your criteria.</p>
                </div>
            @endforelse
        </div>

        <!-- Improved Pagination -->
        @if(isset($pagination['last_visible_page']) && $pagination['last_visible_page'] > 1)
            <nav class="flex justify-center items-center gap-2 py-12">
                @php
                    $currentPage = $pagination['current_page'] ?? 1;
                    $lastPage = $pagination['last_visible_page'];
                    $lastPage = min($lastPage, 50);
                    $start = max(1, $currentPage - 2);
                    $end = min($lastPage, $currentPage + 2);
                @endphp

                @if($currentPage > 1)
                    <a href="{{ url()->current() }}?{{ http_build_query(request()->except('page')) }}&page={{ $currentPage - 1 }}" 
                        class="px-4 py-2 rounded-xl bg-gray-100 dark:bg-dark-card hover:bg-gray-200 dark:hover:bg-dark-border text-gray-700 dark:text-gray-300 font-bold transition-all">Prev</a>
                @endif

                @for($i = $start; $i <= $end; $i++)
                    <a href="{{ url()->current() }}?{{ http_build_query(request()->except('page')) }}&page={{ $i }}" 
                        class="px-4 py-2 rounded-xl font-bold transition-all {{ $i == $currentPage ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-200 dark:shadow-none' : 'bg-gray-100 dark:bg-dark-card hover:bg-gray-200 dark:hover:bg-dark-border text-gray-700 dark:text-gray-300' }}">
                        {{ $i }}
                    </a>
                @endfor

                @if($currentPage < $lastPage)
                    <a href="{{ url()->current() }}?{{ http_build_query(request()->except('page')) }}&page={{ $currentPage + 1 }}" 
                        class="px-4 py-2 rounded-xl bg-gray-100 dark:bg-dark-card hover:bg-gray-200 dark:hover:bg-dark-border text-gray-700 dark:text-gray-300 font-bold transition-all">Next</a>
                @endif
            </nav>
        @endif
    </main>
@endsection
