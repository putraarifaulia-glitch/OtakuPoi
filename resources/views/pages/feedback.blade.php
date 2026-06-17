@extends('layouts.app')

@section('title', 'Feedback - OtakuPoi')

@section('content')
    <main class="container mx-auto px-4 py-16">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 dark:text-gray-100 mb-4">We'd Love to Hear From You</h2>
                <p class="text-xl text-gray-600 dark:text-gray-400">Have a suggestion, bug report, or just want to say hi? Send us a message!</p>
            </div>

            @if(session('success'))
                <div class="mb-8 p-4 bg-green-100 dark:bg-emerald-900/20 border border-green-400 dark:border-emerald-500 text-green-700 dark:text-emerald-400 rounded-xl flex items-center gap-3 font-medium">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-dark-card rounded-3xl shadow-sm border border-gray-100 dark:border-dark-border overflow-hidden grid grid-cols-1 md:grid-cols-2 transition-colors duration-300">
                <!-- Contact Info -->
                <div class="bg-indigo-600 dark:bg-indigo-900 p-12 text-white">
                    <h3 class="text-2xl font-bold mb-8">Contact Information</h3>
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <span>support@otakupoi.com</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <span>Kelompok 02, TI - Jakarta, Indonesia</span>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <div class="p-12">
                    <form action="{{ url('/feedback') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Full Name</label>
                            <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-dark-border bg-gray-50 dark:bg-dark-bg text-gray-900 dark:text-gray-100 focus:border-indigo-600 focus:ring-0 transition-all placeholder-gray-400 dark:placeholder-gray-600" placeholder="John Doe">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Email Address</label>
                            <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-dark-border bg-gray-50 dark:bg-dark-bg text-gray-900 dark:text-gray-100 focus:border-indigo-600 focus:ring-0 transition-all placeholder-gray-400 dark:placeholder-gray-600" placeholder="john@example.com">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Subject</label>
                            <select name="subject" class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-dark-border bg-gray-50 dark:bg-dark-bg text-gray-900 dark:text-gray-100 focus:border-indigo-600 focus:ring-0 transition-all">
                                <option>General Inquiry</option>
                                <option>Bug Report</option>
                                <option>Feature Request</option>
                                <option>Collaboration</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Message</label>
                            <textarea name="message" rows="4" required class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-dark-border bg-gray-50 dark:bg-dark-bg text-gray-900 dark:text-gray-100 focus:border-indigo-600 focus:ring-0 transition-all placeholder-gray-400 dark:placeholder-gray-600" placeholder="Tell us what's on your mind..."></textarea>
                        </div>
                        <button type="submit" class="w-full py-4 rounded-xl bg-indigo-600 text-white font-bold shadow-lg hover:bg-purple-800 transition-all active:scale-[0.98]">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
