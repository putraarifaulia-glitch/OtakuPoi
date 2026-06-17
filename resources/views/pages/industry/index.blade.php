@extends('layouts.app')

@section('title', 'Industry News - OtakuPoi')

@section('content')
<div class="container mx-auto px-4 py-16">
    <h2 class="text-4xl font-bold text-gray-900 dark:text-gray-100 mb-12">Latest Industry News</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @for ($i = 1; $i <= 4; $i++)
            <div class="bg-white dark:bg-dark-card border border-gray-200 dark:border-dark-border rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
                <div class="h-48 bg-gray-200 dark:bg-dark-bg"></div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-2">Industry News Article #{{ $i }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">Stay updated with the latest trends, studio announcements, and industry news in the world of anime and manga.</p>
                    <a href="#" class="text-indigo-600 dark:text-indigo-400 font-semibold hover:underline">Read More</a>
                </div>
            </div>
        @endfor
    </div>
</div>
@endsection
