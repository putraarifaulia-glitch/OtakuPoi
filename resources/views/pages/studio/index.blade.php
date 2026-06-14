@extends('layouts.app')

@section('title', 'Browse Studios - OtakuPoi')

@section('content')
<div class="min-h-screen bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mb-12">
            <h1 class="text-4xl font-black text-gray-900 mb-4 flex items-center gap-3">
                <span class="w-2 h-10 bg-indigo-600 rounded-full"></span>
                Animation Studios
            </h1>
            <p class="text-lg text-gray-600">Explore anime collections from your favorite animation studios.</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @foreach($studios as $studio)
                <a href="{{ route('studio.show', $studio['mal_id']) }}" 
                   class="group bg-white p-4 rounded-xl shadow-sm border border-gray-200 hover:border-indigo-600 hover:shadow-md transition-all duration-300 flex flex-col items-center text-center">
                    <h3 class="font-bold text-gray-900 group-hover:text-indigo-600 transition-colors text-sm line-clamp-1">
                        {{ $studio['titles'][0]['title'] ?? 'Unknown' }}
                    </h3>
                    <p class="text-[10px] font-bold text-gray-400 mt-1 uppercase tracking-widest">
                        {{ $studio['count'] ?? 0 }} Titles
                    </p>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
