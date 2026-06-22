@extends('layouts.app')

@section('title', 'My Anime List - OtakuPoi')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">My Anime Library</h1>
                <p class="text-gray-500 text-sm mt-1">Manage your personal collection and tracking progress.</p>
            </div>
            <div class="flex items-center bg-white rounded-2xl shadow-sm p-2 border border-gray-200">
                <span class="px-5 py-2 text-xs font-bold uppercase tracking-wider text-indigo-600 bg-purple-50 rounded-xl">
                    Total Items: {{ $animeList->count() }}
                </span>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-r-xl">
                {{ session('success') }}
            </div>
        @endif

        @if($animeList->isEmpty())
            <div class="bg-white rounded-3xl p-16 text-center border border-gray-100 shadow-sm">
                <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="https://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($animeList as $item)
                    <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 group">
                        <div class="flex h-full">
                            <!-- Image Section -->
                            <div class="w-1/3 relative overflow-hidden">
                                <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute top-2 left-2">
                                    <div class="px-2 py-1 rounded-lg text-[10px] font-black uppercase tracking-widest text-white shadow-lg
                                        {{ $item->status == 'Watching' ? 'bg-blue-600' : '' }}
                                        {{ $item->status == 'Completed' ? 'bg-green-600' : '' }}
                                        {{ $item->status == 'On Hold' ? 'bg-amber-500' : '' }}
                                        {{ $item->status == 'Dropped' ? 'bg-red-600' : '' }}
                                        {{ $item->status == 'Plan to Watch' ? 'bg-gray-500' : '' }}
                                    ">
                                        {{ $item->status }}
                                    </div>
                                </div>
                            </div>

                            <!-- Content Section -->
                            <div class="w-2/3 p-4 flex flex-col justify-between">
                                <div>
                                    <h3 class="font-bold text-gray-900 text-sm line-clamp-2 leading-tight mb-2">
                                        {{ $item->title }}
                                    </h3>
                                    
                                    <div class="space-y-2">
                                        <div class="flex items-center justify-between text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                                            <span>Progress</span>
                                            <span class="text-indigo-600">{{ $item->progress_episode ?? 0 }} Eps</span>
                                        </div>
                                        <div class="flex items-center justify-between text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                                            <span>Your Score</span>
                                            <span class="text-amber-500">
                                                @if($item->score)
                                                    ★ {{ $item->score }}/10
                                                @else
                                                    No Score
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex gap-2 mt-4">
                                    <button onclick="openUpdateModal({{ json_encode($item) }})" class="flex-1 py-2 bg-indigo-50 text-indigo-600 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-indigo-600 hover:text-white transition-all">
                                        Update
                                    </button>
                                    <form action="{{ route('anime-list.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Remove from list?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-red-50 text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition-all">
                                            <svg xmlns="https://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1-1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Simple Modal for Update -->
            <div id="updateModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
                <div class="bg-white rounded-3xl w-full max-w-md overflow-hidden shadow-2xl">
                    <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                        <h2 class="text-xl font-bold text-gray-900">Update Progress</h2>
                        <button onclick="closeUpdateModal()" class="text-gray-400 hover:text-gray-600">
                            <svg xmlns="https://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <form id="updateForm" method="POST" class="p-6 space-y-4">
                        @csrf
                        @method('PUT')
                        
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Status</label>
                            <select name="status" id="modalStatus" class="w-full bg-gray-50 border-gray-100 rounded-xl focus:ring-indigo-600 focus:border-indigo-600">
                                <option value="Watching">Watching</option>
                                <option value="Completed">Completed</option>
                                <option value="On Hold">On Hold</option>
                                <option value="Dropped">Dropped</option>
                                <option value="Plan to Watch">Plan to Watch</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Episodes</label>
                                <input type="number" name="progress_episode" id="modalProgress" min="0" class="w-full bg-gray-50 border-gray-100 rounded-xl focus:ring-indigo-600 focus:border-indigo-600">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Score (1-10)</label>
                                <select name="score" id="modalScore" class="w-full bg-gray-50 border-gray-100 rounded-xl focus:ring-indigo-600 focus:border-indigo-600">
                                    <option value="">No Score</option>
                                    @for($i = 10; $i >= 1; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="w-full py-3 bg-indigo-600 text-white rounded-xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition-all">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <script>
                function openUpdateModal(item) {
                    const modal = document.getElementById('updateModal');
                    const form = document.getElementById('updateForm');
                    
                    form.action = `/anime-list/${item.id}`;
                    document.getElementById('modalStatus').value = item.status;
                    document.getElementById('modalProgress').value = item.progress_episode || 0;
                    document.getElementById('modalScore').value = item.score || "";
                    
                    modal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                }

                function closeUpdateModal() {
                    const modal = document.getElementById('updateModal');
                    modal.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                }

                // Close on escape
                window.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape') closeUpdateModal();
                });
            </script>
        @endif
    </div>
</div>
@endsection
