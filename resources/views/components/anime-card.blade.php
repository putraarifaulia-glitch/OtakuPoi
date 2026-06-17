@props(['item', 'type' => 'anime'])

@php
    $id = $item['mal_id'] ?? ($item['id'] ?? 1);
    $title = $item['title'] ?? 'Unknown';
    $imageUrl = $item['images']['jpg']['image_url'] ?? ($item['images']['webp']['image_url'] ?? 'https://via.placeholder.com/300x450?text=No+Image');
    $score = $item['score'] ?? 'N/A';
@endphp

<a href="{{ url($type . '/' . $id) }}" class="bg-white dark:bg-dark-card rounded-xl shadow-sm border border-gray-200 dark:border-dark-border overflow-hidden group hover:shadow-xl hover:border-indigo-600/30 dark:hover:border-indigo-500/30 transition-all duration-300 flex flex-col h-full">
    <div class="relative aspect-[2/3] overflow-hidden">
        <img src="{{ $imageUrl }}" alt="{{ $title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
        @if(isset($item['score']))
            <div class="absolute bottom-3 left-3 bg-gray-900/90 dark:bg-black/80 backdrop-blur-sm text-white text-xs font-black px-2.5 py-1.5 rounded-lg shadow-lg border border-white/10 dark:border-white/5">
                ⭐ {{ $score }}
            </div>
        @endif
    </div>
    <div class="p-4 flex-grow flex flex-col justify-between transition-colors duration-300">
        <h4 class="font-extrabold text-sm text-gray-900 dark:text-gray-100 line-clamp-2 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors leading-tight">{{ $title }}</h4>
    </div>
</a>
