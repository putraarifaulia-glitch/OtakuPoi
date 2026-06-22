@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl transition-colors duration-300">
    <a href="{{ route('news.index') }}" class="text-indigo-600 dark:text-indigo-400 hover:underline mb-4 inline-block font-bold">&larr; Kembali ke Daftar Berita</a>
    
    <div class="bg-white dark:bg-dark-card rounded-3xl shadow-lg border dark:border-dark-border p-8 transition-colors">
        @if($news->image_path)
            <img src="{{ asset('storage/' . $news->image_path) }}" alt="{{ $news->title }}" class="w-full h-80 object-cover rounded-2xl mb-8 shadow-sm">
        @endif
        
        <h1 class="text-4xl font-bold text-indigo-600 dark:text-indigo-400 mb-4 leading-tight">{{ $news->title }}</h1>
        <p class="text-gray-500 dark:text-gray-400 mb-8 italic">Dipublikasikan pada: {{ $news->created_at->format('d M Y') }}</p>
        
        <div class="prose prose-lg dark:prose-invert max-w-none text-gray-800 dark:text-gray-200 leading-relaxed mb-12">
            {!! nl2br(e($news->content)) !!}
        </div>

        <!-- Comment Section -->
        <div class="mt-12 pt-8 border-t border-gray-100 dark:border-dark-border transition-colors">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-8">Komentar ({{ $news->comments->count() }})</h2>

            @auth
                <form action="{{ route('comments.store') }}" method="POST" class="mb-10">
                    @csrf
                    <input type="hidden" name="news_id" value="{{ $news->id }}">
                    <div class="bg-gray-50 dark:bg-dark-bg rounded-2xl p-4 border border-gray-100 dark:border-dark-border focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600 transition-all">
                        <textarea name="content" rows="3" required placeholder="Tulis komentar Anda..." 
                            class="w-full bg-transparent border-none focus:ring-0 text-gray-700 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-600 resize-none"></textarea>
                        <div class="flex justify-end mt-2">
                            <button type="submit" class="px-6 py-2 bg-indigo-600 hover:bg-purple-800 text-white font-bold rounded-xl transition-all shadow-md active:scale-95">
                                Kirim Komentar
                            </button>
                        </div>
                    </div>
                </form>
            @else
                <div class="bg-indigo-50 dark:bg-indigo-900/20 rounded-2xl p-6 text-center mb-10 border border-indigo-100 dark:border-indigo-500/20">
                    <p class="text-indigo-900 dark:text-indigo-300 font-medium">Silakan <a href="{{ route('login') }}" class="text-indigo-600 dark:text-indigo-400 font-bold hover:underline">Login</a> untuk memberikan komentar.</p>
                </div>
            @endauth

            <div class="space-y-6">
                @forelse($news->comments as $comment)
                    <div class="flex gap-4">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 rounded-full bg-indigo-100 dark:bg-indigo-900/30 flex items-center justify-center text-indigo-600 dark:text-indigo-400 font-bold">
                                {{ substr($comment->user->name, 0, 1) }}
                            </div>
                        </div>
                        <div class="flex-grow">
                            <div class="bg-white dark:bg-dark-card rounded-2xl p-4 border border-gray-100 dark:border-dark-border shadow-sm relative group transition-colors">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <span class="font-bold text-gray-900 dark:text-gray-100 text-sm">{{ $comment->user->name }}</span>
                                        <span class="text-xs text-gray-400 dark:text-gray-500 ml-2">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    @if(Auth::check() && (Auth::id() === $comment->user_id || Auth::user()->is_admin))
                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="opacity-0 group-hover:opacity-100 transition-opacity">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Hapus komentar ini?')" class="text-gray-400 hover:text-red-500 transition-colors">
                                                <svg xmlns="https://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1-1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                                <p class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed">
                                    {{ $comment->content }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-10">
                        <p class="text-gray-400 dark:text-gray-500 italic">Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
