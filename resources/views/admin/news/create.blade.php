@extends('layouts.app')

@section('title', 'Admin - Create News')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="container mx-auto px-4 max-w-3xl">
        <div class="mb-8 flex items-center gap-4">
            <a href="{{ route('admin.news.index') }}" class="p-2 bg-white rounded-lg shadow-sm border border-gray-100 text-gray-400 hover:text-indigo-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Create News</h1>
                <p class="text-gray-500">Share the latest updates with the community.</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                @csrf
                
                <div>
                    <label for="title" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Article Title</label>
                    <input type="text" name="title" id="title" placeholder="e.g., New Seasonal Anime Lineup 2026" required
                        class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-indigo-600 focus:ring-indigo-600 transition-all bg-gray-50/50">
                    @error('title') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="content" class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Content Body</label>
                    <textarea name="content" id="content" rows="10" placeholder="Write your article content here..." required
                        class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-indigo-600 focus:ring-indigo-600 transition-all bg-gray-50/50"></textarea>
                    @error('content') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Cover Image</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-200 border-dashed rounded-xl hover:border-indigo-600 transition-colors bg-gray-50/30">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-purple-500 focus-within:outline-none">
                                    <span>Upload a file</span>
                                    <input id="image" name="image" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-400">PNG, JPG, GIF up to 2MB</p>
                        </div>
                    </div>
                    @error('image') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div class="pt-4 flex items-center justify-end gap-4 border-t border-gray-100">
                    <a href="{{ route('admin.news.index') }}" class="px-6 py-3 text-gray-600 font-bold hover:text-gray-900 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="px-8 py-3 bg-indigo-600 hover:bg-purple-800 text-white font-bold rounded-xl transition-all shadow-lg hover:shadow-purple-200">
                        Publish Article
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection