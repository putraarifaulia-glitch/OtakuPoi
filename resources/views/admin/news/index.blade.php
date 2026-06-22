@extends('layouts.app')

@section('title', 'Admin - News Management')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-dark-bg py-12 transition-colors duration-300">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">News Management</h1>
                <p class="text-gray-500 dark:text-gray-400">Create, edit, and manage news articles for OtakuPoi.</p>
            </div>
            <a href="{{ route('admin.news.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-indigo-600 hover:bg-purple-800 text-white font-bold rounded-xl transition-all shadow-lg hover:shadow-purple-200">
                <svg xmlns="https://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Create New Article
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 dark:bg-emerald-900/20 border-l-4 border-green-500 text-green-700 dark:text-emerald-400 rounded-r-xl font-medium transition-colors">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white dark:bg-dark-card rounded-2xl shadow-sm border border-gray-100 dark:border-dark-border overflow-hidden transition-colors">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-dark-bg/50 border-b border-gray-100 dark:border-dark-border">
                            <th class="px-6 py-4 text-sm font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Thumbnail</th>
                            <th class="px-6 py-4 text-sm font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Title & Date</th>
                            <th class="px-6 py-4 text-sm font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-sm font-bold text-gray-600 dark:text-gray-400 uppercase tracking-wider text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-dark-border">
                        @foreach($news as $item)
                        <tr class="hover:bg-gray-50/50 dark:hover:bg-dark-bg/20 transition-colors">
                            <td class="px-6 py-4">
                                @if($item->image_path)
                                    <img src="{{ asset('storage/' . $item->image_path) }}" class="w-20 h-12 object-cover rounded-lg shadow-sm border border-gray-100 dark:border-dark-border">
                                @else
                                    <div class="w-20 h-12 bg-gray-100 dark:bg-dark-bg rounded-lg flex items-center justify-center text-gray-400 dark:text-gray-500">
                                        <svg xmlns="https://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-900 dark:text-gray-100 line-clamp-1">{{ $item->title }}</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ $item->created_at->format('M d, Y • H:i') }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-100 dark:bg-emerald-900/20 text-green-700 dark:text-emerald-400">
                                    Published
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('news.show', $item->slug) }}" target="_blank" class="p-2 text-gray-400 dark:text-gray-500 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors" title="View Article">
                                        <svg xmlns="https://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.news.edit', $item->id) }}" class="p-2 text-gray-400 dark:text-gray-500 hover:text-amber-500 dark:hover:text-amber-400 transition-colors" title="Edit Article">
                                        <svg xmlns="https://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00-2 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this news article?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-gray-400 dark:text-gray-500 hover:text-red-500 dark:hover:text-red-400 transition-colors" title="Delete Article">
                                            <svg xmlns="https://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($news->isEmpty())
                <div class="py-20 text-center">
                    <div class="bg-gray-50 dark:bg-dark-bg w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4 border dark:border-dark-border">
                        <svg xmlns="https://www.w3.org/2000/svg" class="h-10 w-10 text-gray-300 dark:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 2v4a2 2 0 002 2h4" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 10h10M7 14h10" />
                        </svg>
                    </div>
                    <p class="text-gray-400 dark:text-gray-500 font-medium text-lg">No news articles found.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
