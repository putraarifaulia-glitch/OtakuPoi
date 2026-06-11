@extends('layouts.app')

@section('title', 'Studios - OtakuPoi')

@section('content')
<div class="container mx-auto px-4 py-16">
    <h2 class="text-4xl font-bold text-gray-900 mb-8">Top Anime Studios</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach(['Kyoto Animation', 'Madhouse', 'MAPPA', 'Wit Studio', 'Production I.G', 'Bones', 'A-1 Pictures', 'Studio Ghibli'] as $studio)
            <div class="bg-white border p-6 rounded-lg shadow-sm hover:shadow transition text-center">
                <h3 class="font-bold text-lg">{{ $studio }}</h3>
            </div>
        @endforeach
    </div>
</div>
@endsection
