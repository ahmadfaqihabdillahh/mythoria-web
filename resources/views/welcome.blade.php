<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- App title resolved from config or fallback to Mythoria --}}
        <title>{{ config('app.name', 'Mythoria') }} - The Astral Realm of Fantasy Stories</title>

        <!-- Typography: Cinzel for majestic fantasy headings & Figtree for clean reading text -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=cinzel:700,900|figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Vite Assets (Tailwind CSS v4 & Alpine.js in Laravel 13) -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-constellation text-slate-100 antialiased min-h-screen flex flex-col relative selection:bg-amber-500 selection:text-black overflow-x-hidden">
        
        {{-- =========================================================================
             SHOOTING STARS (METEOR SHOWER BACKGROUND EFFECT)
             Komponen bintang jatuh yang sering melintas di langit malam Mythoria
             ========================================================================= --}}
        <div class="shooting-star-container" aria-hidden="true">
            <span class="shooting-star"></span>
            <span class="shooting-star"></span>
            <span class="shooting-star"></span>
            <span class="shooting-star"></span>
            <span class="shooting-star"></span>
            <span class="shooting-star"></span>
            <span class="shooting-star"></span>
            <span class="shooting-star"></span>
        </div>

        {{-- =========================================================================
             1. HEADER & NAVIGATION BAR
             ========================================================================= --}}
        <header class="border-b border-indigo-950/80 bg-slate-950/70 backdrop-blur-md sticky top-0 z-50 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
                
                {{-- Brand Logo --}}
                <a href="/" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 border-2 border-amber-400 bg-indigo-950 flex items-center justify-center shadow-[2px_2px_0px_#000]">
                        <span class="text-xl text-amber-400">✦</span>
                    </div>
                    <div>
                        <span class="text-2xl font-black tracking-widest text-amber-400 drop-shadow-[0_0_12px_rgba(245,158,11,0.5)]">
                            MYTHORIA
                        </span>
                        <span class="block text-[10px] uppercase tracking-widest text-sky-400 font-semibold">
                            Fantasy Web Novels
                        </span>
                    </div>
                </a>

                {{-- Authentication Navigation --}}
                <nav class="flex items-center gap-3">
                    @auth
                        {{-- Shown when user is logged in --}}
                        <a href="{{ url('/dashboard') }}" class="btn-pixel btn-pixel-gold text-xs">
                            ⚔️ Author Studio ({{ Auth::user()->name }})
                        </a>
                    @else
                        {{-- Shown for guests --}}
                        <a href="{{ route('login') }}" class="btn-pixel btn-pixel-dark text-xs">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-pixel btn-pixel-purple text-xs">
                                Join as Writer & Reader
                            </a>
                        @endif
                    @endauth
                </nav>
            </div>
        </header>

        {{-- =========================================================================
             2. HERO SECTION (Dark Fantasy Realm)
             ========================================================================= --}}
        <main class="flex-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 flex flex-col items-center text-center justify-center relative z-10">
            
            {{-- Constellation Astral Badge --}}
            <div class="inline-flex items-center gap-2 px-3 py-1 mb-6 border border-amber-400/30 bg-amber-950/40 text-amber-300 text-xs font-semibold uppercase tracking-widest shadow-[2px_2px_0px_#000]">
                <span>✨</span>
                <span>The Celestial Realm of Fantasy Stories</span>
                <span>✨</span>
            </div>

            {{-- Main Animated Hero Headline: "Where Readers & Storytellers Unite" --}}
            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-black tracking-tight text-white mb-6 max-w-4xl leading-tight">
                <span class="animate-celestial-float">
                    Where Readers &
                </span>
                <br/>
                <span class="animate-astral-shimmer text-transparent bg-clip-text bg-gradient-to-r from-amber-300 via-purple-300 to-sky-300">
                    Storytellers Unite
                </span>
            </h1>

            {{-- Dual-Role Concept Description --}}
            <p class="text-base sm:text-lg text-slate-300 max-w-2xl mb-10 leading-relaxed">
                At <strong>Mythoria</strong>, a single account unlocks both sides of the tapestry. Delve into epic fantasy sagas woven by creators worldwide, or ignite your own celestial quill and craft legendary tales.
            </p>

            {{-- Retro RPG Pixel Buttons --}}
            <div class="flex flex-wrap items-center justify-center gap-4 mb-16">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn-pixel btn-pixel-gold text-sm py-3 px-6">
                        📖 Enter Author Studio
                    </a>
                @else
                    <a href="{{ route('register') }}" class="btn-pixel btn-pixel-gold text-sm py-3 px-6">
                        🗡️ Start Writing & Reading
                    </a>
                    <a href="{{ route('login') }}" class="btn-pixel btn-pixel-dark text-sm py-3 px-6">
                        📜 Log in to Library
                    </a>
                @endauth
            </div>

            {{-- =====================================================================
                 3. SHOWCASE FANTASY SUB-GENRES
                 ===================================================================== --}}
            <div class="w-full max-w-5xl mt-6">
                <div class="flex items-center justify-between mb-6 border-b border-indigo-950 pb-3">
                    <h2 class="text-sm uppercase tracking-widest text-amber-400 font-bold flex items-center gap-2">
                        <span>✦</span> Explore Fantasy Realms
                    </h2>
                    <span class="text-xs text-slate-400">Filter by Language & Sub-Genre</span>
                </div>

                {{-- Pixel Panel Sub-Genre Cards with Floating Animation --}}
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
                    
                    {{-- Genre 1: Epic Fantasy --}}
                    <div class="panel-pixel p-4 text-center hover:border-amber-400 hover:shadow-[0_0_15px_rgba(245,158,11,0.4)] transition-all group animate-card-float card-delay-1 cursor-pointer">
                        <div class="text-2xl mb-2 group-hover:scale-125 transition-transform">🏰</div>
                        <h3 class="text-xs font-bold text-amber-200">Epic Fantasy</h3>
                        <p class="text-[10px] text-slate-400 mt-1">Kingdoms & Lore</p>
                    </div>

                    {{-- Genre 2: Dark Fantasy --}}
                    <div class="panel-pixel p-4 text-center hover:border-purple-400 hover:shadow-[0_0_15px_rgba(192,132,252,0.4)] transition-all group animate-card-float card-delay-2 cursor-pointer">
                        <div class="text-2xl mb-2 group-hover:scale-125 transition-transform">💀</div>
                        <h3 class="text-xs font-bold text-purple-200">Dark Fantasy</h3>
                        <p class="text-[10px] text-slate-400 mt-1">Grim Realms</p>
                    </div>

                    {{-- Genre 3: Isekai / Portal --}}
                    <div class="panel-pixel p-4 text-center hover:border-sky-400 hover:shadow-[0_0_15px_rgba(56,189,248,0.4)] transition-all group animate-card-float card-delay-3 cursor-pointer">
                        <div class="text-2xl mb-2 group-hover:scale-125 transition-transform">🌀</div>
                        <h3 class="text-xs font-bold text-sky-200">Isekai / Portal</h3>
                        <p class="text-[10px] text-slate-400 mt-1">Otherworldly Rebirth</p>
                    </div>

                    {{-- Genre 4: Magic Academy --}}
                    <div class="panel-pixel p-4 text-center hover:border-amber-400 hover:shadow-[0_0_15px_rgba(245,158,11,0.4)] transition-all group animate-card-float card-delay-4 cursor-pointer">
                        <div class="text-2xl mb-2 group-hover:scale-125 transition-transform">🔮</div>
                        <h3 class="text-xs font-bold text-amber-200">Magic Academy</h3>
                        <p class="text-[10px] text-slate-400 mt-1">Spellcraft & Lore</p>
                    </div>

                    {{-- Genre 5: Urban Fantasy --}}
                    <div class="panel-pixel p-4 text-center hover:border-purple-400 hover:shadow-[0_0_15px_rgba(192,132,252,0.4)] transition-all group animate-card-float card-delay-5 cursor-pointer">
                        <div class="text-2xl mb-2 group-hover:scale-125 transition-transform">🏙️</div>
                        <h3 class="text-xs font-bold text-purple-200">Urban Fantasy</h3>
                        <p class="text-[10px] text-slate-400 mt-1">Modern Sorcery</p>
                    </div>

                    {{-- Genre 6: Romance Fantasy --}}
                    <div class="panel-pixel p-4 text-center hover:border-pink-400 hover:shadow-[0_0_15px_rgba(244,114,182,0.4)] transition-all group animate-card-float card-delay-6 cursor-pointer">
                        <div class="text-2xl mb-2 group-hover:scale-125 transition-transform">✨</div>
                        <h3 class="text-xs font-bold text-pink-200">Romance Fantasy</h3>
                        <p class="text-[10px] text-slate-400 mt-1">Enchanted Hearts</p>
                    </div>

                </div>
            </div>

        </main>

        {{-- =========================================================================
             4. FOOTER
             ========================================================================= --}}
        <footer class="border-t border-indigo-950/80 bg-slate-950/90 py-8 text-center text-xs text-slate-400 relative z-10">
            <div class="max-w-7xl mx-auto px-4 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-2">
                    <span class="text-amber-400 font-bold">MYTHORIA</span>
                    <span>&copy; {{ date('Y') }} Mythoria. All rights reserved.</span>
                </div>
                <div class="text-slate-400">
                    Crafted for Seekers of Imagination & Weavers of Celestial Lore
                </div>
            </div>
        </footer>

    </body>
</html>
