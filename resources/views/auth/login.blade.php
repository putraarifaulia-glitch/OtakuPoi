@extends('layouts.app')

@section('title', 'Login - OtakuPoi')

@section('content')
<main class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50 dark:bg-dark-bg transition-colors duration-300">
    <div class="max-w-md w-full space-y-8 bg-white dark:bg-dark-card p-10 rounded-3xl shadow-sm border border-gray-100 dark:border-dark-border transition-colors duration-300">
        <div>
            <div class="flex justify-center">
                <img src="{{ asset('assets/image/logoOtakuPoi.png') }}" alt="OtakuPoi Logo" class="w-20 h-20 object-contain">
            </div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900 dark:text-gray-100">
                Log in to your account
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-400">
                Or
                <a href="{{ route('register') }}" class="font-medium text-indigo-600 dark:text-indigo-400 hover:text-purple-500">
                    create a new account
                </a>
            </p>
        </div>

        @if($errors->any())
            <div class="bg-red-50 dark:bg-red-900/20 border-l-4 border-red-400 p-4 rounded-r-xl">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700 dark:text-red-400 font-medium">
                            {{ $errors->first() }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <form class="mt-8 space-y-6" action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="rounded-md shadow-sm space-y-4">
                <div>
                    <label for="email-address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email address</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required 
                        class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 dark:border-dark-border placeholder-gray-500 dark:placeholder-gray-600 text-gray-900 dark:text-gray-100 bg-white dark:bg-dark-bg focus:outline-none focus:ring-indigo-600 focus:border-indigo-600 focus:z-10 sm:text-sm transition-colors" 
                        placeholder="Email address">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required 
                        class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 dark:border-dark-border placeholder-gray-500 dark:placeholder-gray-600 text-gray-900 dark:text-gray-100 bg-white dark:bg-dark-bg focus:outline-none focus:ring-indigo-600 focus:border-indigo-600 focus:z-10 sm:text-sm transition-colors" 
                        placeholder="Password">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-purple-500 border-gray-300 dark:border-dark-border rounded bg-white dark:bg-dark-bg">
                    <label for="remember-me" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">
                        Remember me
                    </label>
                </div>

                <div class="text-sm">
                    <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 dark:text-indigo-400 hover:text-purple-500">
                        Forgot your password?
                    </a>
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-indigo-600 hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 transition-all transform hover:scale-105 shadow-lg shadow-indigo-200 dark:shadow-none">
                    Sign in
                </button>
            </div>
        </form>
    </div>
</main>
@endsection
