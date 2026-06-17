@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 transition-colors duration-300">
    <h1 class="text-3xl font-bold text-indigo-600 dark:text-indigo-400 mb-8 text-center">Berita Anime & Manga</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($news as $item)
            <div class="bg-white dark:bg-dark-card rounded-2xl shadow-md border dark:border-dark-border overflow-hidden hover:shadow-xl transition-all duration-300">
                @if($item->image_path)
                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 dark:bg-dark-bg flex items-center justify-center text-gray-500 dark:text-gray-400">No Image</div>
                @endif
                <div class="p-5">
                    <h3 class="text-xl font-bold mb-2 text-indigo-600 dark:text-indigo-400 line-clamp-2 leading-tight">{{ $item->title }}</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">{{ $item->created_at->format('d M Y') }}</p>
                    <p class="text-gray-700 dark:text-gray-300 mb-4 text-sm line-clamp-3 leading-relaxed">{{ Str::limit($item->content, 100) }}</p>
                    <a href="{{ route('news.show', $item->slug) }}" class="inline-block px-6 py-2 bg-indigo-600 text-white rounded-xl hover:bg-purple-800 transition-colors font-bold text-sm shadow-md">Baca Selengkapnya</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
