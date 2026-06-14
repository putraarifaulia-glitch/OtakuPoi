@extends('layouts.app')

@section('title', $studioName . ' - OtakuPoi')

@section('content')
    <main class="container mx-auto px-4 py-12">
        <div class="mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-2">{{ $studioName }}</h2>
            <p class="text-gray-500">Discover anime produced by this studio.</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-8 mb-12">
            @forelse($animes as $anime)
                <x-anime-card :item="$anime" type="anime" />
            @empty
                <div class="col-span-full py-20 text-center bg-white rounded-3xl shadow-sm border border-gray-100">
                    <p class="text-xl font-bold text-gray-800">No anime found for this studio.</p>
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
                    <a href="{{ route('studio.show', ['id' => $studioId, 'page' => $currentPage - 1]) }}" 
                        class="px-4 py-2 rounded-xl bg-white border border-gray-200 hover:bg-purple-50 hover:text-indigo-600 transition-all text-gray-700 shadow-sm font-bold">Prev</a>
                @endif

                @for($i = $start; $i <= $end; $i++)
                    <a href="{{ route('studio.show', ['id' => $studioId, 'page' => $i]) }}" 
                        class="w-10 h-10 flex items-center justify-center rounded-xl font-bold transition-all shadow-sm {{ $i == $currentPage ? 'bg-indigo-600 text-white' : 'bg-white border border-gray-200 hover:bg-purple-50 hover:text-indigo-600 text-gray-700' }}">
                        {{ $i }}
                    </a>
                @endfor

                @if($currentPage < $lastPage)
                    <a href="{{ route('studio.show', ['id' => $studioId, 'page' => $currentPage + 1]) }}" 
                        class="px-4 py-2 rounded-xl bg-white border border-gray-200 hover:bg-purple-50 hover:text-indigo-600 transition-all text-gray-700 shadow-sm font-bold">Next</a>
                @endif
            </nav>
        @endif
    </main>
@endsection
