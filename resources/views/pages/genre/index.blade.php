@extends('layouts.app')

@section('title', 'Genres - OtakuPoi')

@section('content')
<div class="container mx-auto px-4 py-16">
    <h2 class="text-4xl font-bold text-gray-900 mb-8">Browse by Genre</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
        @foreach([
            ['id' => 1, 'name' => 'Action'], ['id' => 2, 'name' => 'Adventure'], ['id' => 4, 'name' => 'Comedy'], 
            ['id' => 8, 'name' => 'Drama'], ['id' => 10, 'name' => 'Fantasy'], ['id' => 14, 'name' => 'Horror'], 
            ['id' => 7, 'name' => 'Mystery'], ['id' => 22, 'name' => 'Romance'], ['id' => 24, 'name' => 'Sci-Fi'], 
            ['id' => 36, 'name' => 'Slice of Life'], ['id' => 30, 'name' => 'Sports'], ['id' => 37, 'name' => 'Supernatural']
        ] as $genre)
            <a href="{{ route('anime.index', ['genre' => $genre['id']]) }}" class="bg-gray-100 p-4 rounded-lg text-center hover:bg-deep-purple hover:text-white transition">
                {{ $genre['name'] }}
            </a>
        @endforeach
    </div>
</div>
@endsection
