@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <a href="{{ route('news.index') }}" class="text-indigo-600 hover:underline mb-4 inline-block">&larr; Kembali ke Daftar Berita</a>
    
    <div class="bg-white rounded-lg shadow-lg p-6">
        @if($news->image_path)
            <img src="{{ asset('storage/' . $news->image_path) }}" alt="{{ $news->title }}" class="w-full h-64 object-cover rounded-lg mb-6">
        @endif
        
        <h1 class="text-4xl font-bold text-indigo-600 mb-4">{{ $news->title }}</h1>
        <p class="text-gray-500 mb-6 italic">Dipublikasikan pada: {{ $news->created_at->format('d M Y') }}</p>
        
        <div class="prose max-w-none text-gray-800 leading-relaxed">
            {!! nl2br(e($news->content)) !!}
        </div>
    </div>
</div>
@endsection