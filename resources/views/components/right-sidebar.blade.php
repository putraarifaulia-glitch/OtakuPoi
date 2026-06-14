<div class="space-y-6">
    <!-- Card 1: Top Airing -->
    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-200">
        <h2 class="text-lg font-black text-gray-900 mb-5 px-1 flex items-center gap-2">
            <span class="w-1.5 h-6 bg-indigo-600 rounded-full"></span>
            Top Airing
        </h2>
        <div class="flex flex-col space-y-3">
            @foreach ($topAiringAnimes as $anime)
                <a href="{{ url('/anime/' . $anime->id) }}" class="flex items-center gap-4 p-2 hover:bg-gray-50 rounded-xl transition-all duration-200 group border border-transparent hover:border-gray-200">
                    <div class="relative flex-shrink-0">
                        <img src="{{ $anime->poster_url }}" 
                             alt="{{ $anime->title }}" 
                             class="w-12 h-16 object-cover rounded-lg shadow-sm border border-gray-100">
                        <span class="absolute -top-2 -left-2 w-6 h-6 bg-indigo-600 text-white text-[10px] font-black flex items-center justify-center rounded-lg shadow-lg border border-white/20">
                            {{ $loop->iteration }}
                        </span>
                    </div>
                    <div class="flex flex-col overflow-hidden">
                        <p class="text-sm font-bold text-gray-900 group-hover:text-indigo-600 transition-colors truncate">
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
    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-200">
        <h2 class="text-lg font-black text-gray-900 mb-5 px-1 flex items-center gap-2">
            <span class="w-1.5 h-6 bg-amber-500 rounded-full"></span>
            Top Characters
        </h2>
        <div class="flex flex-col space-y-3">
            @foreach ($topCharacters as $character)
                <a href="{{ url('/character/' . $character->id) }}" class="flex items-center gap-4 p-2 hover:bg-gray-50 rounded-xl transition-all duration-200 group border border-transparent hover:border-gray-200">
                    <img src="{{ $character->image_url }}" 
                         alt="{{ $character->name }}" 
                         class="w-10 h-10 rounded-full object-cover flex-shrink-0 border-2 border-gray-100 shadow-sm group-hover:border-indigo-600/30 transition-all">
                    <div class="flex flex-col overflow-hidden">
                        <p class="text-sm font-bold text-gray-900 group-hover:text-indigo-600 transition-colors truncate">
                            {{ $character->name }}
                        </p>
                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Character</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Card 3: Top Upcoming -->
    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-200">
        <h2 class="text-lg font-black text-gray-900 mb-5 px-1 flex items-center gap-2">
            <span class="w-1.5 h-6 bg-blue-500 rounded-full"></span>
            Top Upcoming
        </h2>
        <div class="flex flex-col space-y-3">
            @foreach ($upcomingAnimes as $upcoming)
                <a href="{{ url('/anime/' . $upcoming->id) }}" class="flex items-center gap-4 p-2 hover:bg-gray-50 rounded-xl transition-all duration-200 group border border-transparent hover:border-gray-200">
                    <img src="{{ $upcoming->poster_url }}" 
                         alt="{{ $upcoming->title }}" 
                         class="w-12 h-16 object-cover rounded-lg shadow-sm border border-gray-100">
                    <div class="flex flex-col overflow-hidden">
                        <p class="text-sm font-bold text-gray-900 group-hover:text-indigo-600 transition-colors truncate">
                            {{ $upcoming->title }}
                        </p>
                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-1">Coming Soon</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
