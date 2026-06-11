@props(['item', 'type' => 'anime'])

<div class="relative group shrink-0 snap-start w-40">
    <div class="relative overflow-hidden rounded-lg">
        <img src="{{ $item['images']['jpg']['image_url'] ?? ($item['images']['webp']['image_url'] ?? 'https://via.placeholder.com/300x450?text=No+Image') }}" alt="{{ $item['title'] }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
        @if(isset($item['score']))
            <div class="absolute bottom-2 left-2 bg-black/70 px-2 py-1 rounded text-yellow-400 text-sm font-medium">
                ⭐ {{ $item['score'] }}
            </div>
        @endif
        @if(isset($item['rank']))
             <div class="absolute top-2 left-2 bg-deep-purple px-2 py-1 rounded text-white text-xs font-bold">
                #{{ $item['rank'] }}
            </div>
        @endif
    </div>
    <a href="{{ url($type . '/' . ($item['mal_id'] ?? 1)) }}" class="mt-2 text-gray-800 font-medium text-sm truncate block hover:text-deep-purple transition-colors">
        {{ $item['title'] }}
    </a>
</div>
