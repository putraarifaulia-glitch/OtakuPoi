@extends('layouts.app')

@section('title', 'Admin - Create News')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-dark-bg py-12 transition-colors duration-300">
    <div class="container mx-auto px-4 max-w-3xl">
        <div class="mb-8 flex items-center gap-4">
            <a href="{{ route('admin.news.index') }}" class="p-2 bg-white dark:bg-dark-card rounded-xl shadow-sm border border-gray-100 dark:border-dark-border text-gray-400 hover:text-indigo-600 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">Create News Article</h1>
                <p class="text-gray-500 dark:text-gray-400">Draft a new story for the OtakuPoi community.</p>
            </div>
        </div>

        <div class="bg-white dark:bg-dark-card rounded-3xl shadow-sm border border-gray-100 dark:border-dark-border p-8 transition-colors">
            <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                
                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2 uppercase tracking-wide px-1">Article Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" required 
                        class="w-full px-5 py-4 bg-gray-50 dark:bg-dark-bg border-gray-100 dark:border-dark-border rounded-2xl focus:ring-2 focus:ring-indigo-600 focus:bg-white dark:focus:bg-dark-bg transition-all text-gray-900 dark:text-gray-100 placeholder-gray-400" 
                        placeholder="Enter a catchy title...">
                    @error('title') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2 uppercase tracking-wide px-1">Cover Image</label>
                    <div id="image-preview" class="hidden mb-4">
                        <img src="" alt="Preview" class="w-full h-48 object-cover rounded-xl shadow-sm border border-gray-100 dark:border-dark-border">
                    </div>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-200 dark:border-dark-border border-dashed rounded-xl hover:border-indigo-600 dark:hover:border-indigo-500 transition-colors bg-gray-50/30">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-600" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                <label for="image" class="relative cursor-pointer bg-white dark:bg-dark-bg rounded-md font-medium text-indigo-600 dark:text-indigo-400 hover:text-purple-500 focus-within:outline-none px-1">
                                    <span>Upload a file</span>
                                    <input id="image" name="image" type="file" class="sr-only" onchange="previewImage(event)">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-400 dark:text-gray-500">PNG, JPG, GIF up to 2MB</p>
                        </div>
                    </div>
                    @error('image') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2 uppercase tracking-wide px-1">Content</label>
                    <textarea name="content" rows="12" required 
                        class="w-full px-5 py-4 bg-gray-50 dark:bg-dark-bg border-gray-100 dark:border-dark-border rounded-2xl focus:ring-2 focus:ring-indigo-600 focus:bg-white dark:focus:bg-dark-bg transition-all text-gray-900 dark:text-gray-100 leading-relaxed placeholder-gray-400" 
                        placeholder="Write the article body here...">{{ old('content') }}</textarea>
                    @error('content') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center justify-end gap-4 pt-4">
                    <a href="{{ route('admin.news.index') }}" class="px-6 py-3 text-sm font-bold text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="px-8 py-3 bg-indigo-600 hover:bg-purple-800 text-white font-bold rounded-xl transition-all shadow-lg hover:shadow-purple-200 active:scale-95">
                        Publish Article
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('image-preview');
        const previewImg = preview.querySelector('img');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
