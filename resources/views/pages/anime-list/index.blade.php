@extends('layouts.app')

@section('title', 'My Anime List - OtakuPoi')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-gray-100 to-gray-200 py-12">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">My Anime Library</h1>
                <p class="text-gray-500 text-sm mt-1">Manage your personal collection and tracking progress.</p>
            </div>
            <div class="flex items-center bg-white rounded-2xl shadow-sm p-2 border border-gray-200">
                <span class="px-5 py-2 text-xs font-bold uppercase tracking-wider text-deep-purple bg-purple-50 rounded-xl">
                    Total Items: {{ $animeList->count() }}
                </span>
            </div>
        </div>

        @if($animeList->isEmpty())
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl p-16 text-center border border-white shadow-xl">
                <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-800 mb-2">No anime found</h2>
                <p class="text-gray-500 mb-8 max-w-xs mx-auto">Your list is currently empty. Start adding some favorites!</p>
                <a href="{{ route('anime.index') }}" class="inline-flex items-center px-8 py-3 bg-gray-900 text-white rounded-xl font-bold hover:bg-black transition-all shadow-lg hover:-translate-y-1">
                    Explore Anime
                </a>
            </div>
        @else
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-8">
                @foreach($animeList as $item)
                    <div class="flex flex-col group">
                        <div class="relative aspect-[3/4] rounded-2xl overflow-hidden shadow-md group-hover:shadow-2xl transition-all duration-500 bg-gray-200">
                            <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            
                            <!-- Minimalist Status Badge -->
                            <div class="absolute top-3 right-3">
                                <div class="w-3 h-3 rounded-full border-2 border-white shadow-sm
                                    {{ $item->status == 'Watching' ? 'bg-blue-500' : '' }}
                                    {{ $item->status == 'Completed' ? 'bg-green-500' : '' }}
                                    {{ $item->status == 'On Hold' ? 'bg-yellow-500' : '' }}
                                    {{ $item->status == 'Dropped' ? 'bg-red-500' : '' }}
                                    {{ $item->status == 'Plan to Watch' ? 'bg-gray-400' : '' }}
                                "></div>
                            </div>

                            <!-- Floating Actions -->
                            <div class="absolute inset-x-0 bottom-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-gradient-to-t from-black/80 to-transparent">
                                <div class="flex gap-2">
                                    <a href="{{ route('anime.show', $item->anime_id) }}" class="flex-1 bg-white/20 backdrop-blur-md hover:bg-white/40 text-white text-center py-2 rounded-lg text-xs font-bold transition-colors">
                                        Details
                                    </a>
                                    <form action="{{ route('anime-list.destroy', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Remove?')" class="p-2 bg-red-500/20 backdrop-blur-md hover:bg-red-500 text-white rounded-lg transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 px-1">
                            <h3 class="font-bold text-gray-900 text-sm truncate group-hover:text-deep-purple transition-colors">
                                {{ $item->title }}
                            </h3>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="text-[10px] font-bold uppercase tracking-tighter {{ $item->status == 'Watching' ? 'text-blue-600' : 'text-gray-400' }}">
                                    {{ $item->status }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
