@extends('layouts.app')

@section('title', 'Register - OtakuPoi')

@section('content')
<main class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-50 dark:bg-dark-bg transition-colors duration-300">
    <div class="max-w-md w-full space-y-8 bg-white dark:bg-dark-card p-10 rounded-3xl shadow-sm border border-gray-100 dark:border-dark-border transition-colors duration-300">
        <div>
            <div class="flex justify-center">
                <img src="{{ asset('assets/image/logoOtakuPoi.png') }}" alt="OtakuPoi Logo" class="w-20 h-20 object-contain">
            </div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900 dark:text-gray-100">
                Create your account
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-400">
                Or
                <a href="{{ route('login') }}" class="font-medium text-indigo-600 dark:text-indigo-400 hover:text-purple-500">
                    log in to existing account
                </a>
            </p>
        </div>

        @if($errors->any())
            <div class="bg-red-50 dark:bg-red-900/20 border-l-4 border-red-400 p-4 rounded-r-xl">
                <div class="flex">
                    <div class="ml-3">
                        <ul class="list-disc list-inside text-sm text-red-700 dark:text-red-400 font-medium">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <form class="mt-8 space-y-6" action="{{ route('register.post') }}" method="POST">
            @csrf
            <div class="rounded-md shadow-sm space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Full Name</label>
                    <input id="name" name="name" type="text" required 
                        class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 dark:border-dark-border placeholder-gray-500 dark:placeholder-gray-600 text-gray-900 dark:text-gray-100 bg-white dark:bg-dark-bg focus:outline-none focus:ring-indigo-600 focus:border-indigo-600 focus:z-10 sm:text-sm transition-colors" 
                        placeholder="John Doe">
                </div>
                <div>
                    <label for="email-address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email address</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required 
                        class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 dark:border-dark-border placeholder-gray-500 dark:placeholder-gray-600 text-gray-900 dark:text-gray-100 bg-white dark:bg-dark-bg focus:outline-none focus:ring-indigo-600 focus:border-indigo-600 focus:z-10 sm:text-sm transition-colors" 
                        placeholder="john@example.com">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Password</label>
                    <input id="password" name="password" type="password" required 
                        class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 dark:border-dark-border placeholder-gray-500 dark:placeholder-gray-600 text-gray-900 dark:text-gray-100 bg-white dark:bg-dark-bg focus:outline-none focus:ring-indigo-600 focus:border-indigo-600 focus:z-10 sm:text-sm transition-colors" 
                        placeholder="Password">
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required 
                        class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 dark:border-dark-border placeholder-gray-500 dark:placeholder-gray-600 text-gray-900 dark:text-gray-100 bg-white dark:bg-dark-bg focus:outline-none focus:ring-indigo-600 focus:border-indigo-600 focus:z-10 sm:text-sm transition-colors" 
                        placeholder="Confirm Password">
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-indigo-600 hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 transition-all transform hover:scale-105 shadow-lg shadow-indigo-200 dark:shadow-none">
                    Register
                </button>
            </div>
        </form>
    </div>
</main>
@endsection
