@extends('layouts.app')

@section('title', 'Admin Dashboard - OtakuPoi')

@section('content')
<div class="min-h-screen bg-gray-50 dark:bg-dark-bg py-12 transition-colors duration-300">
    <div class="container mx-auto px-4">
        <div class="mb-10">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">Admin Dashboard</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1">Overview of OtakuPoi platform performance and statistics.</p>
        </div>

        <!-- Quick Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            @php
                $statCards = [
                    ['label' => 'Total Users', 'value' => $stats['total_users'], 'color' => 'indigo', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'],
                    ['label' => 'News Articles', 'value' => $stats['total_news'], 'color' => 'blue', 'icon' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z M14 2v4a2 2 0 002 2h4'],
                    ['label' => 'Total Comments', 'value' => $stats['total_comments'], 'color' => 'emerald', 'icon' => 'M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z'],
                    ['label' => 'Watchlist Items', 'value' => $stats['total_watchlist_items'], 'color' => 'amber', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01'],
                ];
            @endphp

            @foreach($statCards as $card)
                <div class="bg-white dark:bg-dark-card p-6 rounded-3xl shadow-sm border border-gray-100 dark:border-dark-border transition-all">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-{{ $card['color'] }}-50 dark:bg-{{ $card['color'] }}-900/20 flex items-center justify-center text-{{ $card['color'] }}-600 dark:text-{{ $card['color'] }}-400">
                            <svg xmlns="https://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $card['icon'] }}" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest">{{ $card['label'] }}</p>
                            <p class="text-2xl font-black text-gray-900 dark:text-gray-100">{{ number_format($card['value']) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
            <!-- Popular Anime -->
            <div class="bg-white dark:bg-dark-card rounded-3xl shadow-sm border border-gray-100 dark:border-dark-border overflow-hidden">
                <div class="p-6 border-b border-gray-100 dark:border-dark-border">
                    <h2 class="font-bold text-gray-900 dark:text-gray-100">Most Favorited Anime</h2>
                </div>
                <div class="divide-y dark:divide-dark-border">
                    @foreach($popularAnime as $anime)
                        <div class="p-4 flex items-center justify-between hover:bg-gray-50 dark:hover:bg-dark-bg/50 transition-colors">
                            <div class="flex items-center gap-4">
                                <img src="{{ $anime->image_url }}" class="w-10 h-14 object-cover rounded-lg shadow-sm">
                                <div>
                                    <p class="text-sm font-bold text-gray-900 dark:text-gray-100 line-clamp-1">{{ $anime->title }}</p>
                                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">{{ $anime->total }} Watchlists</p>
                                </div>
                            </div>
                            <a href="{{ route('anime.show', $anime->anime_id) }}" class="p-2 text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 rounded-xl transition-all">
                                <svg xmlns="https://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.523 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Top Rated Anime -->
            <div class="bg-white dark:bg-dark-card rounded-3xl shadow-sm border border-gray-100 dark:border-dark-border overflow-hidden">
                <div class="p-6 border-b border-gray-100 dark:border-dark-border">
                    <h2 class="font-bold text-gray-900 dark:text-gray-100">Highest Rated Anime (User Scores)</h2>
                </div>
                <div class="divide-y dark:divide-dark-border">
                    @foreach($topRatedAnime as $anime)
                        <div class="p-4 flex items-center justify-between hover:bg-gray-50 dark:hover:bg-dark-bg/50 transition-colors">
                            <div class="flex items-center gap-4">
                                <img src="{{ $anime->image_url }}" class="w-10 h-14 object-cover rounded-lg shadow-sm">
                                <div>
                                    <p class="text-sm font-bold text-gray-900 dark:text-gray-100 line-clamp-1">{{ $anime->title }}</p>
                                    <div class="flex items-center gap-1">
                                        <span class="text-amber-500">★</span>
                                        <span class="text-xs font-bold text-gray-900 dark:text-gray-100">{{ number_format($anime->avg_score, 1) }}</span>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('anime.show', $anime->anime_id) }}" class="p-2 text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 rounded-xl transition-all">
                                <svg xmlns="https://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.523 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Recent Users -->
        <div class="bg-white dark:bg-dark-card rounded-3xl shadow-sm border border-gray-100 dark:border-dark-border overflow-hidden">
            <div class="p-6 border-b border-gray-100 dark:border-dark-border flex justify-between items-center">
                <h2 class="font-bold text-gray-900 dark:text-gray-100">Recently Joined Users</h2>
                <a href="{{ route('admin.users.index') }}" class="text-xs font-bold text-indigo-600 dark:text-indigo-400 hover:underline">View All Users</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 dark:bg-dark-bg/50">
                        <tr>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">User</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Email</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400">Joined Date</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-400 text-right">Role</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y dark:divide-dark-border">
                        @foreach($recentUsers as $user)
                            <tr class="hover:bg-gray-50/50 dark:hover:bg-dark-bg/20 transition-colors">
                                <td class="px-6 py-4 flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-indigo-100 dark:bg-indigo-900/30 flex items-center justify-center text-indigo-600 dark:text-indigo-400 font-bold text-xs">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <span class="text-sm font-bold text-gray-900 dark:text-gray-100">{{ $user->name }}</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $user->created_at->format('M d, Y') }}</td>
                                <td class="px-6 py-4 text-right">
                                    <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest {{ $user->is_admin ? 'bg-red-50 text-red-600 dark:bg-red-900/20 dark:text-red-400' : 'bg-gray-50 text-gray-600 dark:bg-dark-bg dark:text-gray-400' }}">
                                        {{ $user->is_admin ? 'Admin' : 'User' }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
