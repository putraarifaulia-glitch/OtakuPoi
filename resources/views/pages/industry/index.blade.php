@extends('layouts.app')

@section('title', 'Industry News - OtakuPoi')

@section('content')
<div class="container mx-auto px-4 py-16">
    <h2 class="text-4xl font-bold text-gray-900 mb-12">Latest Industry News</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @for ($i = 1; $i <= 4; $i++)
            <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition">
                <div class="h-48 bg-gray-200"></div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Industry News Article #{{ $i }}</h3>
                    <p class="text-gray-600 mb-4">Stay updated with the latest trends, studio announcements, and industry news in the world of anime and manga.</p>
                    <a href="#" class="text-indigo-600 font-semibold hover:underline">Read More</a>
                </div>
            </div>
        @endfor
    </div>
</div>
@endsection
