@extends('layouts.app')

@section('title', 'Reset Password - OtakuPoi')

@section('content')
<main class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50 dark:bg-dark-bg transition-colors duration-300">
    <div class="max-w-md w-full space-y-8 bg-white dark:bg-dark-card p-10 rounded-3xl shadow-sm border border-gray-100 dark:border-dark-border transition-colors duration-300">
        <div>
            <div class="flex justify-center">
                <img src="{{ asset('assets/image/logoOtakuPoi.png') }}" alt="OtakuPoi Logo" class="w-20 h-20 object-contain">
            </div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900 dark:text-gray-100">
                Set new password
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-400">
                Please enter your new password below.
            </p>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 dark:bg-red-900/20 border-l-4 border-red-400 p-4 text-red-700 dark:text-red-400 text-sm rounded-r-xl font-medium">
                {{ $errors->first() }}
            </div>
        @endif

        <form class="mt-8 space-y-6" action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            
            <div class="space-y-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email address</label>
                    <input id="email" name="email" type="email" value="{{ old('email', $email) }}" required readonly
                        class="appearance-none rounded-xl block w-full px-4 py-3 border border-gray-300 dark:border-dark-border bg-gray-50 dark:bg-dark-bg text-gray-500 dark:text-gray-400 sm:text-sm transition-colors">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">New Password</label>
                    <input id="password" name="password" type="password" required 
                        class="appearance-none rounded-xl block w-full px-4 py-3 border border-gray-300 dark:border-dark-border placeholder-gray-500 dark:placeholder-gray-600 text-gray-900 dark:text-gray-100 bg-white dark:bg-dark-bg focus:outline-none focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm transition-colors" 
                        placeholder="••••••••">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Confirm New Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required 
                        class="appearance-none rounded-xl block w-full px-4 py-3 border border-gray-300 dark:border-dark-border placeholder-gray-500 dark:placeholder-gray-600 text-gray-900 dark:text-gray-100 bg-white dark:bg-dark-bg focus:outline-none focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm transition-colors" 
                        placeholder="••••••••">
                </div>
            </div>

            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-indigo-600 hover:bg-purple-800 transition-all transform hover:scale-105 shadow-lg shadow-indigo-200 dark:shadow-none">
                Reset Password
            </button>
        </form>
    </div>
</main>
@endsection
