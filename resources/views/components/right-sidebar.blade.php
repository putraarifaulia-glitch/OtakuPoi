<div class="space-y-6">
    <!-- Card 1: Top Airing -->
    <div class="bg-white dark:bg-dark-card p-5 rounded-2xl shadow-sm border border-gray-200 dark:border-dark-border transition-colors duration-300">
        <h2 class="text-lg font-black text-gray-900 dark:text-gray-100 mb-5 px-1 flex items-center gap-2">
            <span class="w-1.5 h-6 bg-indigo-600 rounded-full"></span>
            Top Airing
        </h2>
        <div class="flex flex-col space-y-3">
            @foreach ($topAiringAnimes as $anime)
                <a href="{{ url('/anime/' . $anime->id) }}" class="flex items-center gap-4 p-2 hover:bg-gray-50 dark:hover:bg-dark-bg/50 rounded-xl transition-all duration-200 group border border-transparent hover:border-gray-200 dark:hover:border-dark-border">
                    <div class="relative flex-shrink-0">
                        <img src="{{ $anime->poster_url }}" 
                             alt="{{ $anime->title }}" 
                             class="w-12 h-16 object-cover rounded-lg shadow-sm border border-gray-100 dark:border-dark-border">
                        <span class="absolute -top-2 -left-2 w-6 h-6 bg-indigo-600 text-white text-[10px] font-black flex items-center justify-center rounded-lg shadow-lg border border-white/20">
                            {{ $loop->iteration }}
                        </span>
                    </div>
                    <div class="flex flex-col overflow-hidden">
                        <p class="text-sm font-bold text-gray-900 dark:text-gray-100 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors truncate">
                            {{ $anime->title }}
                        </p>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-[10px] font-black text-amber-500">⭐ {{ $anime->score }}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Card 2: Top Characters -->
    <div class="bg-white dark:bg-dark-card p-5 rounded-2xl shadow-sm border border-gray-200 dark:border-dark-border transition-colors duration-300">
        <h2 class="text-lg font-black text-gray-900 dark:text-gray-100 mb-5 px-1 flex items-center gap-2">
            <span class="w-1.5 h-6 bg-amber-500 rounded-full"></span>
            Top Characters
        </h2>
        <div class="flex flex-col space-y-3">
            @foreach ($topCharacters as $character)
                <div class="flex items-center gap-4 p-2 rounded-xl border border-transparent">
                    <img src="{{ $character->image_url }}" 
                         alt="{{ $character->name }}" 
                         class="w-10 h-10 rounded-full object-cover flex-shrink-0 border-2 border-gray-100 dark:border-dark-border shadow-sm">
                    <div class="flex flex-col overflow-hidden">
                        <p class="text-sm font-bold text-gray-900 dark:text-gray-100 truncate">
                            {{ $character->name }}
                        </p>
                        <span class="text-[10px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest">Character</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Card 3: Top Upcoming -->
    <div class="bg-white dark:bg-dark-card p-5 rounded-2xl shadow-sm border border-gray-200 dark:border-dark-border transition-colors duration-300">
        <h2 class="text-lg font-black text-gray-900 dark:text-gray-100 mb-5 px-1 flex items-center gap-2">
            <span class="w-1.5 h-6 bg-blue-500 rounded-full"></span>
            Top Upcoming
        </h2>
        <div class="flex flex-col space-y-3">
            @foreach ($upcomingAnimes as $upcoming)
                <a href="{{ url('/anime/' . $upcoming->id) }}" class="flex items-center gap-4 p-2 hover:bg-gray-50 dark:hover:bg-dark-bg/50 rounded-xl transition-all duration-200 group border border-transparent hover:border-gray-200 dark:hover:border-dark-border">
                    <img src="{{ $upcoming->poster_url }}" 
                         alt="{{ $upcoming->title }}" 
                         class="w-12 h-16 object-cover rounded-lg shadow-sm border border-gray-100 dark:border-dark-border">
                    <div class="flex flex-col overflow-hidden">
                        <p class="text-sm font-bold text-gray-900 dark:text-gray-100 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors truncate">
                            {{ $upcoming->title }}
                        </p>
                        <span class="text-[10px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest mt-1">Coming Soon</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
