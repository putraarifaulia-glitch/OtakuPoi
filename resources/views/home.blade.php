<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OtakuPoi - Your Anime & Manga Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'deep-purple': '#6B21A8',
                        'dark-charcoal': '#1E1E1E',
                    }
                }
            }
        }
    </script>
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="bg-white font-sans antialiased">

    <!-- 1. Header & Navigation Bar -->
    
    <!-- Top Header -->
    <header class="bg-white w-full">
        <div class="container mx-auto px-4 flex justify-between items-center py-4">
            <!-- Left: Logo & Branding -->
            <div class="flex items-center">
                <svg class="w-10 h-10 mr-3 text-deep-purple" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                </svg>
                <h1 class="text-2xl font-bold text-deep-purple">OtakuPoi</h1>
            </div>
            
            <!-- Right: Auth Buttons -->
            <div class="flex items-center space-x-3">
                <button class="px-6 py-2 rounded-full bg-deep-purple text-white font-medium hover:bg-purple-800 transition-colors duration-300">
                    Log In
                </button>
                <button class="px-6 py-2 rounded-full bg-white border-2 border-deep-purple text-deep-purple font-medium hover:bg-purple-50 transition-colors duration-300">
                    Sign up
                </button>
            </div>
        </div>
    </header>

    <!-- Navigation Bar -->
    <nav class="bg-deep-purple w-full">
        <div class="container mx-auto px-4">
            <ul class="flex flex-wrap justify-center lg:justify-start space-x-6 py-3">
                <li><a href="#" class="text-white hover:text-purple-200 transition-colors duration-300 font-medium">Anime</a></li>
                <li><a href="#" class="text-white hover:text-purple-200 transition-colors duration-300 font-medium">Manga</a></li>
                <li><a href="#" class="text-white hover:text-purple-200 transition-colors duration-300 font-medium">Community</a></li>
                <li><a href="#" class="text-white hover:text-purple-200 transition-colors duration-300 font-medium">Industry</a></li>
                <li><a href="#" class="text-white hover:text-purple-200 transition-colors duration-300 font-medium">Watch</a></li>
                <li><a href="#" class="text-white hover:text-purple-200 transition-colors duration-300 font-medium">Read</a></li>
                <li><a href="#" class="text-white hover:text-purple-200 transition-colors duration-300 font-medium">Help</a></li>
            </ul>
        </div>
    </nav>

    <!-- 2. Main Hero Banner Section -->
    <section class="relative w-full h-96 lg:h-[500px] overflow-hidden">
        <!-- Background Image with Gradient Overlay -->
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=1920&q=80');">
            <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-transparent"></div>
        </div>
        
        <!-- Content -->
        <div class="relative container mx-auto px-4 h-full flex flex-col justify-center">
            <h2 class="text-4xl lg:text-6xl font-bold text-white mb-2">Sousou no Frieren</h2>
            <p class="text-xl lg:text-2xl text-white/90 mb-6">2nd Season</p>
            <button class="w-fit px-8 py-3 rounded-full border-2 border-white text-white font-medium hover:bg-white hover:text-deep-purple transition-colors duration-300">
                View
            </button>
        </div>
        
        <!-- Navigation Controls -->
        <div class="absolute bottom-6 right-6 flex space-x-2">
            <button class="w-10 h-10 rounded-full bg-black/50 text-white flex items-center justify-center hover:bg-black/70 transition-colors duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button class="w-10 h-10 rounded-full bg-black/50 text-white flex items-center justify-center hover:bg-black/70 transition-colors duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
    </section>

    <!-- Main Content Layout -->
    <main class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            
            <!-- Left Column: Main Content (3/4 width) -->
            <div class="lg:col-span-3 space-y-8">
                
                <!-- 3A. Spring 2026 Anime Section -->
                <section class="bg-gradient-to-b from-purple-100 via-white to-white rounded-2xl p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Spring 2026 Anime</h3>
                    <div class="flex overflow-x-auto scroll-smooth snap-x snap-mandatory gap-4 -mx-2 px-2 scrollbar-hide">
                        <div class="relative group shrink-0 snap-start w-40">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1578632767115-351597cf2477?auto=format&fit=crop&w=300&q=80" alt="Chainsaw Man" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute bottom-2 left-2 bg-black/70 px-2 py-1 rounded text-yellow-400 text-sm font-medium">
                                    ⭐ 8.72
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Chainsaw Man</p>
                        </div>
                        <div class="relative group shrink-0 snap-start w-40">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1541963463532-d68292c34b19?auto=format&fit=crop&w=300&q=80" alt="Kaiju No. 8" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute bottom-2 left-2 bg-black/70 px-2 py-1 rounded text-yellow-400 text-sm font-medium">
                                    ⭐ 8.65
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Kaiju No. 8</p>
                        </div>
                        <div class="relative group shrink-0 snap-start w-40">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=300&q=80" alt="Jujutsu Kaisen" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute bottom-2 left-2 bg-black/70 px-2 py-1 rounded text-yellow-400 text-sm font-medium">
                                    ⭐ 8.91
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Jujutsu Kaisen</p>
                        </div>
                        <div class="relative group shrink-0 snap-start w-40">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1536440136628-849c177e76a1?auto=format&fit=crop&w=300&q=80" alt="Demon Slayer" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute bottom-2 left-2 bg-black/70 px-2 py-1 rounded text-yellow-400 text-sm font-medium">
                                    ⭐ 8.84
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Demon Slayer</p>
                        </div>
                        <div class="relative group shrink-0 snap-start w-40">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=300&q=80" alt="Spy x Family" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute bottom-2 left-2 bg-black/70 px-2 py-1 rounded text-yellow-400 text-sm font-medium">
                                    ⭐ 8.78
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Spy x Family</p>
                        </div>
                        <div class="relative group shrink-0 snap-start w-40">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1578632767115-351597cf2477?auto=format&fit=crop&w=300&q=80" alt="Boku no Hero Academia" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute bottom-2 left-2 bg-black/70 px-2 py-1 rounded text-yellow-400 text-sm font-medium">
                                    ⭐ 8.56
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Boku no Hero Academia</p>
                        </div>
                        <div class="relative group shrink-0 snap-start w-40">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1541963463532-d68292c34b19?auto=format&fit=crop&w=300&q=80" alt="Dandadan" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute bottom-2 left-2 bg-black/70 px-2 py-1 rounded text-yellow-400 text-sm font-medium">
                                    ⭐ 8.43
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Dandadan</p>
                        </div>
                        <div class="relative group shrink-0 snap-start w-40">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=300&q=80" alt="Solo Leveling" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute bottom-2 left-2 bg-black/70 px-2 py-1 rounded text-yellow-400 text-sm font-medium">
                                    ⭐ 8.89
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Solo Leveling</p>
                        </div>
                        <div class="relative group shrink-0 snap-start w-40">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1536440136628-849c177e76a1?auto=format&fit=crop&w=300&q=80" alt="One Piece" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute bottom-2 left-2 bg-black/70 px-2 py-1 rounded text-yellow-400 text-sm font-medium">
                                    ⭐ 8.95
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">One Piece</p>
                        </div>
                        <div class="relative group shrink-0 snap-start w-40">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1578632767115-351597cf2477?auto=format&fit=crop&w=300&q=80" alt="Mushoku Tensei" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute bottom-2 left-2 bg-black/70 px-2 py-1 rounded text-yellow-400 text-sm font-medium">
                                    ⭐ 8.67
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Mushoku Tensei</p>
                        </div>
                    </div>
                </section>

                <!-- 3B. New Release Manga Section -->
                <section class="bg-white rounded-2xl p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">New Release Manga</h3>
                    <div class="flex overflow-x-auto scroll-smooth snap-x snap-mandatory gap-4 -mx-2 px-2 scrollbar-hide">
                        <div class="relative group shrink-0 snap-start w-40">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1578632767115-351597cf2477?auto=format&fit=crop&w=300&q=80" alt="Chainsaw Man Vol. 15" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute top-2 left-2 bg-red-600 px-3 py-1 rounded text-white text-lg font-bold">
                                    15
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Chainsaw Man</p>
                        </div>
                        <div class="relative group shrink-0 snap-start w-40">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1541963463532-d68292c34b19?auto=format&fit=crop&w=300&q=80" alt="Kaiju No. 8 Vol. 12" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute top-2 left-2 bg-red-600 px-3 py-1 rounded text-white text-lg font-bold">
                                    12
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Kaiju No. 8</p>
                        </div>
                        <div class="relative group shrink-0 snap-start w-40">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=300&q=80" alt="Jujutsu Kaisen Vol. 27" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute top-2 left-2 bg-red-600 px-3 py-1 rounded text-white text-lg font-bold">
                                    27
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Jujutsu Kaisen</p>
                        </div>
                        <div class="relative group shrink-0 snap-start w-40">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1536440136628-849c177e76a1?auto=format&fit=crop&w=300&q=80" alt="Demon Slayer Vol. 24" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute top-2 left-2 bg-red-600 px-3 py-1 rounded text-white text-lg font-bold">
                                    24
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Demon Slayer</p>
                        </div>
                        <div class="relative group shrink-0 snap-start w-40">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=300&q=80" alt="Spy x Family Vol. 13" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute top-2 left-2 bg-red-600 px-3 py-1 rounded text-white text-lg font-bold">
                                    13
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Spy x Family</p>
                        </div>
                        <div class="relative group shrink-0 snap-start w-40">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1578632767115-351597cf2477?auto=format&fit=crop&w=300&q=80" alt="Boku no Hero Academia Vol. 42" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute top-2 left-2 bg-red-600 px-3 py-1 rounded text-white text-lg font-bold">
                                    42
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Boku no Hero Academia</p>
                        </div>
                        <div class="relative group shrink-0 snap-start w-40">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1541963463532-d68292c34b19?auto=format&fit=crop&w=300&q=80" alt="Dandadan Vol. 8" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute top-2 left-2 bg-red-600 px-3 py-1 rounded text-white text-lg font-bold">
                                    8
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Dandadan</p>
                        </div>
                        <div class="relative group shrink-0 snap-start w-40">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=300&q=80" alt="Solo Leveling Vol. 10" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute top-2 left-2 bg-red-600 px-3 py-1 rounded text-white text-lg font-bold">
                                    10
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Solo Leveling</p>
                        </div>
                        <div class="relative group shrink-0 snap-start w-40">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1536440136628-849c177e76a1?auto=format&fit=crop&w=300&q=80" alt="One Piece Vol. 109" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute top-2 left-2 bg-red-600 px-3 py-1 rounded text-white text-lg font-bold">
                                    109
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">One Piece</p>
                        </div>
                        <div class="relative group shrink-0 snap-start w-40">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1578632767115-351597cf2477?auto=format&fit=crop&w=300&q=80" alt="Mushoku Tensei Vol. 18" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute top-2 left-2 bg-red-600 px-3 py-1 rounded text-white text-lg font-bold">
                                    18
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Mushoku Tensei</p>
                        </div>
                    </div>
                </section>

                <!-- 3C. Top 3 Anime Section -->
                <section class="relative bg-gradient-to-b from-deep-purple via-purple-700 to-purple-600 rounded-2xl p-6 overflow-hidden">
                    <!-- Curved bottom decoration -->
                    <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-transparent to-purple-600/50 rounded-b-2xl"></div>
                    
                    <h3 class="text-2xl font-bold text-white text-center mb-8">Top 3 Anime</h3>
                    
                    <div class="flex justify-center items-end gap-4 md:gap-8 relative z-10">
                        <!-- Rank 2 (Left) -->
                        <div class="flex flex-col items-center">
                            <div class="w-24 md:w-32 h-36 md:h-48 rounded-lg overflow-hidden shadow-lg">
                                <img src="https://images.unsplash.com/photo-1578632767115-351597cf2477?auto=format&fit=crop&w=300&q=80" alt="Rank 2" class="w-full h-full object-cover">
                            </div>
                            <div class="mt-4 relative">
                                <div class="w-12 h-12 bg-gradient-to-b from-yellow-400 to-yellow-600 rounded-full flex items-center justify-center shadow-lg">
                                    <span class="text-white font-bold text-lg">2</span>
                                </div>
                                <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-1 h-6 bg-yellow-500"></div>
                            </div>
                        </div>
                        
                        <!-- Rank 1 (Center - Elevated) -->
                        <div class="flex flex-col items-center -translate-y-4 md:-translate-y-8">
                            <div class="w-28 md:w-40 h-40 md:h-56 rounded-lg overflow-hidden shadow-2xl ring-4 ring-yellow-400">
                                <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=400&q=80" alt="Rank 1" class="w-full h-full object-cover">
                            </div>
                            <div class="mt-4 relative">
                                <div class="w-14 h-14 bg-gradient-to-b from-yellow-300 to-yellow-500 rounded-full flex items-center justify-center shadow-xl ring-2 ring-yellow-300">
                                    <span class="text-white font-bold text-xl">1</span>
                                </div>
                                <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-1 h-8 bg-yellow-400"></div>
                            </div>
                        </div>
                        
                        <!-- Rank 3 (Right) -->
                        <div class="flex flex-col items-center">
                            <div class="w-24 md:w-32 h-36 md:h-48 rounded-lg overflow-hidden shadow-lg">
                                <img src="https://images.unsplash.com/photo-1541963463532-d68292c34b19?auto=format&fit=crop&w=300&q=80" alt="Rank 3" class="w-full h-full object-cover">
                            </div>
                            <div class="mt-4 relative">
                                <div class="w-12 h-12 bg-gradient-to-b from-yellow-500 to-yellow-700 rounded-full flex items-center justify-center shadow-lg">
                                    <span class="text-white font-bold text-lg">3</span>
                                </div>
                                <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-1 h-6 bg-yellow-600"></div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- 3D. Latest Updated Episode Videos Section -->
                <section class="bg-gradient-to-b from-white via-purple-50 to-purple-900/20 rounded-2xl p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Latest Updated Episode Videos</h3>
                    <div class="flex overflow-x-auto scroll-smooth snap-x snap-mandatory gap-4 -mx-2 px-2 scrollbar-hide">
                        <div class="relative group cursor-pointer shrink-0 snap-start w-64">
                            <div class="relative overflow-hidden rounded-lg aspect-video">
                                <img src="https://images.unsplash.com/photo-1536440136628-849c177e76a1?auto=format&fit=crop&w=400&q=80" alt="Chainsaw Man Episode 15" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Episode 15 - Chainsaw Man</p>
                        </div>
                        <div class="relative group cursor-pointer shrink-0 snap-start w-64">
                            <div class="relative overflow-hidden rounded-lg aspect-video">
                                <img src="https://images.unsplash.com/photo-1578632767115-351597cf2477?auto=format&fit=crop&w=400&q=80" alt="Kaiju No. 8 Episode 12" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Episode 12 - Kaiju No. 8</p>
                        </div>
                        <div class="relative group cursor-pointer shrink-0 snap-start w-64">
                            <div class="relative overflow-hidden rounded-lg aspect-video">
                                <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=400&q=80" alt="Jujutsu Kaisen Episode 48" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Episode 48 - Jujutsu Kaisen</p>
                        </div>
                        <div class="relative group cursor-pointer shrink-0 snap-start w-64">
                            <div class="relative overflow-hidden rounded-lg aspect-video">
                                <img src="https://images.unsplash.com/photo-1541963463532-d68292c34b19?auto=format&fit=crop&w=400&q=80" alt="Demon Slayer Episode 55" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Episode 55 - Demon Slayer</p>
                        </div>
                        <div class="relative group cursor-pointer shrink-0 snap-start w-64">
                            <div class="relative overflow-hidden rounded-lg aspect-video">
                                <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=400&q=80" alt="Spy x Family Episode 38" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Episode 38 - Spy x Family</p>
                        </div>
                        <div class="relative group cursor-pointer shrink-0 snap-start w-64">
                            <div class="relative overflow-hidden rounded-lg aspect-video">
                                <img src="https://images.unsplash.com/photo-1536440136628-849c177e76a1?auto=format&fit=crop&w=400&q=80" alt="Boku no Hero Academia Episode 142" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Episode 142 - Boku no Hero Academia</p>
                        </div>
                        <div class="relative group cursor-pointer shrink-0 snap-start w-64">
                            <div class="relative overflow-hidden rounded-lg aspect-video">
                                <img src="https://images.unsplash.com/photo-1578632767115-351597cf2477?auto=format&fit=crop&w=400&q=80" alt="Dandadan Episode 8" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Episode 8 - Dandadan</p>
                        </div>
                        <div class="relative group cursor-pointer shrink-0 snap-start w-64">
                            <div class="relative overflow-hidden rounded-lg aspect-video">
                                <img src="https://images.unsplash.com/photo-1541963463532-d68292c34b19?auto=format&fit=crop&w=400&q=80" alt="Solo Leveling Episode 12" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Episode 12 - Solo Leveling</p>
                        </div>
                        <div class="relative group cursor-pointer shrink-0 snap-start w-64">
                            <div class="relative overflow-hidden rounded-lg aspect-video">
                                <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=400&q=80" alt="One Piece Episode 1120" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Episode 1120 - One Piece</p>
                        </div>
                        <div class="relative group cursor-pointer shrink-0 snap-start w-64">
                            <div class="relative overflow-hidden rounded-lg aspect-video">
                                <img src="https://images.unsplash.com/photo-1536440136628-849c177e76a1?auto=format&fit=crop&w=400&q=80" alt="Mushoku Tensei Episode 24" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="mt-2 text-gray-800 font-medium text-sm truncate">Episode 24 - Mushoku Tensei</p>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Right Column: Sidebar (1/4 width) -->
            <div class="lg:col-span-1 space-y-6">
                
                <!-- 4A. Top Airing Anime Container -->
                <section class="bg-white rounded-xl p-4 shadow-md text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-gray-800">Top Airing Anime</h3>
                        <a href="#" class="text-sm text-deep-purple hover:underline">More</a>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3 p-2 rounded-lg transition-all duration-300 ease-in-out hover:bg-purple-50/80 hover:translate-x-1 cursor-pointer">
                            <span class="text-2xl font-bold text-purple-600 w-8">1</span>
                            <img src="https://images.unsplash.com/photo-1578632767115-351597cf2477?auto=format&fit=crop&w=100&q=80" alt="One Piece" class="w-12 h-16 object-cover rounded transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-sm">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-800 truncate">One Piece</p>
                            </div>
                            <button class="text-xs text-deep-purple hover:bg-purple-600 hover:text-white px-2 py-0.5 rounded-full transition-all duration-300 ease-in-out font-medium">+add</button>
                        </div>
                        <div class="flex items-center space-x-3 p-2 rounded-lg transition-all duration-300 ease-in-out hover:bg-purple-50/80 hover:translate-x-1 cursor-pointer">
                            <span class="text-2xl font-bold text-purple-600 w-8">2</span>
                            <img src="https://images.unsplash.com/photo-1541963463532-d68292c34b19?auto=format&fit=crop&w=100&q=80" alt="Jujutsu Kaisen" class="w-12 h-16 object-cover rounded transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-sm">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-800 truncate">Jujutsu Kaisen</p>
                            </div>
                            <button class="text-xs text-deep-purple hover:bg-purple-600 hover:text-white px-2 py-0.5 rounded-full transition-all duration-300 ease-in-out font-medium">+add</button>
                        </div>
                        <div class="flex items-center space-x-3 p-2 rounded-lg transition-all duration-300 ease-in-out hover:bg-purple-50/80 hover:translate-x-1 cursor-pointer">
                            <span class="text-2xl font-bold text-purple-600 w-8">3</span>
                            <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=100&q=80" alt="Demon Slayer" class="w-12 h-16 object-cover rounded transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-sm">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-800 truncate">Demon Slayer</p>
                            </div>
                            <button class="text-xs text-deep-purple hover:bg-purple-600 hover:text-white px-2 py-0.5 rounded-full transition-all duration-300 ease-in-out font-medium">+add</button>
                        </div>
                        <div class="flex items-center space-x-3 p-2 rounded-lg transition-all duration-300 ease-in-out hover:bg-purple-50/80 hover:translate-x-1 cursor-pointer">
                            <span class="text-2xl font-bold text-purple-600 w-8">4</span>
                            <img src="https://images.unsplash.com/photo-1536440136628-849c177e76a1?auto=format&fit=crop&w=100&q=80" alt="Chainsaw Man" class="w-12 h-16 object-cover rounded transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-sm">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-800 truncate">Chainsaw Man</p>
                            </div>
                            <button class="text-xs text-deep-purple hover:bg-purple-600 hover:text-white px-2 py-0.5 rounded-full transition-all duration-300 ease-in-out font-medium">+add</button>
                        </div>
                        <div class="flex items-center space-x-3 p-2 rounded-lg transition-all duration-300 ease-in-out hover:bg-purple-50/80 hover:translate-x-1 cursor-pointer">
                            <span class="text-2xl font-bold text-purple-600 w-8">5</span>
                            <img src="https://images.unsplash.com/photo-1578632767115-351597cf2477?auto=format&fit=crop&w=100&q=80" alt="Spy x Family" class="w-12 h-16 object-cover rounded transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-sm">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-800 truncate">Spy x Family</p>
                            </div>
                            <button class="text-xs text-deep-purple hover:bg-purple-600 hover:text-white px-2 py-0.5 rounded-full transition-all duration-300 ease-in-out font-medium">+add</button>
                        </div>
                    </div>
                </section>

                <!-- 4B. Top Upcoming Anime Container -->
                <section class="bg-white rounded-xl p-4 shadow-md text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-gray-800">Top Upcoming Anime</h3>
                        <a href="#" class="text-sm text-deep-purple hover:underline">More</a>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3 p-2 rounded-lg transition-all duration-300 ease-in-out hover:bg-purple-50/80 hover:translate-x-1 cursor-pointer">
                            <span class="text-2xl font-bold text-purple-600 w-8">1</span>
                            <img src="https://images.unsplash.com/photo-1578632767115-351597cf2477?auto=format&fit=crop&w=100&q=80" alt="Youjo Senki II" class="w-12 h-16 object-cover rounded transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-sm">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-800 truncate">Youjo Senki II</p>
                            </div>
                            <button class="text-xs text-deep-purple hover:bg-purple-600 hover:text-white px-2 py-0.5 rounded-full transition-all duration-300 ease-in-out font-medium">+add</button>
                        </div>
                        <div class="flex items-center space-x-3 p-2 rounded-lg transition-all duration-300 ease-in-out hover:bg-purple-50/80 hover:translate-x-1 cursor-pointer">
                            <span class="text-2xl font-bold text-purple-600 w-8">2</span>
                            <img src="https://images.unsplash.com/photo-1541963463532-d68292c34b19?auto=format&fit=crop&w=100&q=80" alt="Mushoku Tensei" class="w-12 h-16 object-cover rounded transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-sm">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-800 truncate">Mushoku Tensei</p>
                            </div>
                            <button class="text-xs text-deep-purple hover:bg-purple-600 hover:text-white px-2 py-0.5 rounded-full transition-all duration-300 ease-in-out font-medium">+add</button>
                        </div>
                        <div class="flex items-center space-x-3 p-2 rounded-lg transition-all duration-300 ease-in-out hover:bg-purple-50/80 hover:translate-x-1 cursor-pointer">
                            <span class="text-2xl font-bold text-purple-600 w-8">3</span>
                            <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=100&q=80" alt="Dandadan" class="w-12 h-16 object-cover rounded transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-sm">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-800 truncate">Dandadan</p>
                            </div>
                            <button class="text-xs text-deep-purple hover:bg-purple-600 hover:text-white px-2 py-0.5 rounded-full transition-all duration-300 ease-in-out font-medium">+add</button>
                        </div>
                        <div class="flex items-center space-x-3 p-2 rounded-lg transition-all duration-300 ease-in-out hover:bg-purple-50/80 hover:translate-x-1 cursor-pointer">
                            <span class="text-2xl font-bold text-purple-600 w-8">4</span>
                            <img src="https://images.unsplash.com/photo-1536440136628-849c177e76a1?auto=format&fit=crop&w=100&q=80" alt="Solo Leveling" class="w-12 h-16 object-cover rounded transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-sm">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-800 truncate">Solo Leveling</p>
                            </div>
                            <button class="text-xs text-deep-purple hover:bg-purple-600 hover:text-white px-2 py-0.5 rounded-full transition-all duration-300 ease-in-out font-medium">+add</button>
                        </div>
                        <div class="flex items-center space-x-3 p-2 rounded-lg transition-all duration-300 ease-in-out hover:bg-purple-50/80 hover:translate-x-1 cursor-pointer">
                            <span class="text-2xl font-bold text-purple-600 w-8">5</span>
                            <img src="https://images.unsplash.com/photo-1578632767115-351597cf2477?auto=format&fit=crop&w=100&q=80" alt="Kaiju No. 8" class="w-12 h-16 object-cover rounded transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-sm">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-800 truncate">Kaiju No. 8</p>
                            </div>
                            <button class="text-xs text-deep-purple hover:bg-purple-600 hover:text-white px-2 py-0.5 rounded-full transition-all duration-300 ease-in-out font-medium">+add</button>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <!-- 5. Platform Footer -->
    <footer class="bg-deep-purple mt-12">
        <!-- Upper Footer Grid -->
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                <p class="text-white text-sm md:text-base">
                    It's time to ditch the text file. Keep track of your anime easily by creating your own list.
                </p>
                <div class="flex justify-end space-x-4">
                    <button class="px-6 py-2 rounded-full bg-white text-deep-purple font-medium hover:bg-purple-50 transition-colors duration-300">
                        Log In
                    </button>
                    <button class="px-6 py-2 rounded-full bg-transparent border-2 border-white text-white font-medium hover:bg-white hover:text-deep-purple transition-colors duration-300">
                        Sign Up
                    </button>
                </div>
            </div>
        </div>

        <!-- Middle Footer Grid -->
        <div class="container mx-auto px-4 py-6 border-t border-purple-700">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                <!-- Follow Us -->
                <div class="flex items-center space-x-4">
                    <span class="text-white font-medium">Follow Us</span>
                    <div class="flex space-x-3">
                        <a href="#" class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-colors duration-300">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-colors duration-300">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-colors duration-300">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.317 4.3698a19.7913 19.7913 0 00-4.8851-1.5152.0741.0741 0 00-.0785.0371c-.211.3753-.4447.8648-.6083 1.2495-1.8447-.2762-3.68-.2762-5.4868 0-.1636-.3933-.4058-.8742-.6177-1.2495a.077.077 0 00-.0785-.037 19.7363 19.7363 0 00-4.8852 1.515.0699.0699 0 00-.0321.0277C.5334 9.0458-.319 13.5799.0992 18.0578a.0824.0824 0 00.0312.0561c2.0528 1.5076 4.0413 2.4228 5.9929 3.0294a.0777.0777 0 00.0842-.0276c.4616-.6304.8731-1.2952 1.226-1.9942a.076.076 0 00-.0416-.1057c-.6528-.2476-1.2743-.5495-1.8722-.8923a.077.077 0 01-.0076-.1277c.1258-.0943.2517-.1923.3718-.2914a.0743.0743 0 01.0776-.0105c3.9278 1.7933 8.18 1.7933 12.0614 0a.0739.0739 0 01.0785.0095c.1202.099.246.1981.3728.2924a.077.077 0 01-.0066.1276 12.2986 12.2986 0 01-1.873.8914.0766.0766 0 00-.0407.1067c.3604.698.7719 1.3628 1.225 1.9932a.076.076 0 00.0842.0286c1.961-.6067 3.9495-1.5219 6.0023-3.0294a.077.077 0 00.0313-.0552c.5004-5.177-.8382-9.6739-3.5485-13.6604a.061.061 0 00-.0312-.0286zM8.02 15.3312c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9555-2.4189 2.157-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.9555 2.4189-2.1569 2.4189zm7.9748 0c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9554-2.4189 2.1569-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.4189-2.1568 2.4189z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-colors duration-300">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Get The App -->
                <div class="flex items-center justify-end space-x-4">
                    <span class="text-white font-medium">Get The App</span>
                    <div class="flex space-x-3">
                        <a href="#" class="bg-black/30 px-4 py-2 rounded-lg flex items-center space-x-2 hover:bg-black/40 transition-colors duration-300">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M3,20.5V3.5C3,2.91 3.34,2.39 3.84,2.15L13.69,12L3.84,21.85C3.34,21.6 3,21.09 3,20.5M16.81,15.12L6.05,21.34L14.54,12.85L16.81,15.12M20.16,10.81C20.5,11.08 20.75,11.5 20.75,12C20.75,12.5 20.5,12.92 20.16,13.19L17.89,14.5L15.39,12L17.89,9.5L20.16,10.81M6.05,2.66L16.81,8.88L14.54,11.15L3.84,2.15C3.84,2.15 6.05,2.66 6.05,2.66Z"/>
                            </svg>
                            <div class="text-left">
                                <div class="text-xs text-white/70">GET IT ON</div>
                                <div class="text-sm text-white font-bold">Google Play</div>
                            </div>
                        </a>
                        <a href="#" class="bg-black/30 px-4 py-2 rounded-lg flex items-center space-x-2 hover:bg-black/40 transition-colors duration-300">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.71,19.5C17.88,20.74 17,21.95 15.66,21.97C14.32,22 13.89,21.18 12.37,21.18C10.84,21.18 10.37,21.95 9.1,22C7.79,22.05 6.8,20.68 5.96,19.47C4.25,17 2.94,12.45 4.7,9.39C5.57,7.87 7.13,6.91 8.82,6.88C10.1,6.86 11.32,7.75 12.11,7.75C12.89,7.75 14.37,6.68 15.92,6.84C16.57,6.87 18.39,7.1 19.56,8.82C19.47,8.88 17.39,10.1 17.41,12.63C17.44,15.65 20.06,16.66 20.09,16.67C20.06,16.74 19.67,18.11 18.71,19.5M13,3.5C13.73,2.67 14.94,2.04 15.94,2C16.07,3.17 15.6,4.35 14.9,5.19C14.21,6.04 13.07,6.7 11.95,6.61C11.8,5.46 12.36,4.26 13,3.5Z"/>
                            </svg>
                            <div class="text-left">
                                <div class="text-xs text-white/70">Download on the</div>
                                <div class="text-sm text-white font-bold">App Store</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Footer Row -->
        <div class="container mx-auto px-4 py-4 border-t border-purple-700">
            <p class="text-center text-purple-200 text-sm">
                OtakuPoi.com is a property of Kelompok 02, TI. ©2026 All Rights Reserved.
            </p>
        </div>
    </footer>

</body>
</html>