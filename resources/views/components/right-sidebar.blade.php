<div class="space-y-6">
    <!-- Card 1: Top Airing -->
    <div class="bg-white p-5 rounded-xl shadow-sm">
        <h2 class="text-lg font-bold text-gray-800 mb-4 px-1">Top Airing</h2>
        <div class="flex flex-col space-y-2">
            @foreach ($topAiringAnimes as $anime)
                <a href="{{ url('/anime/' . $anime->id) }}" class="flex items-center gap-3 p-2 hover:bg-purple-50 rounded-lg transition-colors duration-200 group">
                    <img src="{{ $anime->poster_url }}" 
                         alt="{{ $anime->title }}" 
                         class="w-10 h-14 object-cover rounded flex-shrink-0 shadow-sm">
                    <div class="flex flex-col overflow-hidden">
                        <span class="text-xs font-bold text-deep-purple mb-0.5">#{{ $loop->iteration }}</span>
                        <p class="text-sm font-semibold text-gray-800 group-hover:text-deep-purple transition-colors truncate">
                            {{ $anime->title }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Card 2: Top Characters -->
    <div class="bg-white p-5 rounded-xl shadow-sm">
        <h2 class="text-lg font-bold text-gray-800 mb-4 px-1">Top Characters</h2>
        <div class="flex flex-col space-y-2">
            @foreach ($topCharacters as $character)
                <a href="{{ url('/character/' . $character->id) }}" class="flex items-center gap-3 p-2 hover:bg-purple-50 rounded-lg transition-colors duration-200 group">
                    <img src="{{ $character->image_url }}" 
                         alt="{{ $character->name }}" 
                         class="w-8 h-8 rounded-full object-cover flex-shrink-0">
                    <div class="flex items-center gap-2 overflow-hidden">
                        <span class="text-xs font-bold text-gray-400">{{ $loop->iteration }}.</span>
                        <p class="text-sm font-semibold text-gray-800 group-hover:text-deep-purple transition-colors truncate">
                            {{ $character->name }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Card 3: Top Upcoming -->
    <div class="bg-white p-5 rounded-xl shadow-sm">
        <h2 class="text-lg font-bold text-gray-800 mb-4 px-1">Top Upcoming</h2>
        <div class="flex flex-col space-y-2">
            @foreach ($upcomingAnimes as $upcoming)
                <a href="{{ url('/anime/' . $upcoming->id) }}" class="flex items-center gap-3 p-2 hover:bg-purple-50 rounded-lg transition-colors duration-200 group">
                    <img src="{{ $upcoming->poster_url }}" 
                         alt="{{ $upcoming->title }}" 
                         class="w-10 h-14 object-cover rounded flex-shrink-0 shadow-sm">
                    <div class="flex flex-col overflow-hidden">
                        <span class="text-xs font-bold text-deep-purple mb-0.5">#{{ $loop->iteration }}</span>
                        <p class="text-sm font-semibold text-gray-800 group-hover:text-deep-purple transition-colors truncate">
                            {{ $upcoming->title }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
