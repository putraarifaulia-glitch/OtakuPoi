@extends('layouts.app')

@section('title', 'Settings - OtakuPoi')

@section('content')
<main class="container mx-auto px-4 py-12">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
        <h2 class="text-3xl font-bold text-gray-900 mb-8">{{ __('messages.settings') }}</h2>
        
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 text-green-700 rounded-xl">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('settings.update') }}" method="POST" class="space-y-8">
            @csrf
            
            <!-- Language -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">{{ __('messages.language') }}</label>
                <select name="language" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-deep-purple focus:border-deep-purple">
                    <option value="en" {{ session('language') == 'en' ? 'selected' : '' }}>English</option>
                    <option value="id" {{ session('language') == 'id' ? 'selected' : '' }}>Bahasa Indonesia</option>
                    <option value="ja" {{ session('language') == 'ja' ? 'selected' : '' }}>日本語</option>
                </select>
            </div>

            <!-- Theme -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">{{ __('messages.theme') }}</label>
                <div class="grid grid-cols-2 gap-4">
                    <label class="flex items-center p-4 border rounded-xl cursor-pointer hover:bg-gray-50">
                        <input type="radio" name="theme" value="light" {{ session('theme', 'light') == 'light' ? 'checked' : '' }} class="text-deep-purple">
                        <span class="ml-3 font-medium">Light Mode</span>
                    </label>
                    <label class="flex items-center p-4 border rounded-xl cursor-pointer hover:bg-gray-50">
                        <input type="radio" name="theme" value="dark" {{ session('theme') == 'dark' ? 'checked' : '' }} class="text-deep-purple">
                        <span class="ml-3 font-medium">Dark Mode</span>
                    </label>
                </div>
            </div>

            <button type="submit" class="w-full py-4 rounded-xl bg-deep-purple text-white font-bold hover:bg-purple-800 transition-all">
                {{ __('messages.save') }}
            </button>
        </form>
    </div>
</main>
@endsection
