<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Mythoria') }}</title>

        <!-- Typography -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700|cinzel:700&display=swap" rel="stylesheet" />

        <!-- Scripts & Stylesheet -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-slate-100 antialiased bg-constellation min-h-screen">
        {{-- Centered container layout --}}
        <div class="min-h-screen flex flex-col justify-center items-center px-4 py-8">
            
            {{-- Brand Logo and Title --}}
            <div class="text-center mb-6">
                <a href="/" class="group inline-flex flex-col items-center">
                    <span class="text-3xl sm:text-4xl font-extrabold tracking-widest text-amber-400 drop-shadow-[0_2px_12px_rgba(245,158,11,0.6)]">
                        ✦ MYTHORIA ✦
                    </span>
                    <span class="text-xs uppercase tracking-widest text-sky-400 mt-1 font-semibold">
                        The Astral Realm of Fantasy
                    </span>
                </a>
            </div>

            {{-- Pixel Art Panel for Login / Register Form --}}
            <div class="w-full sm:max-w-md panel-pixel p-6 sm:p-8">
                {{ $slot }}
            </div>

            {{-- Experience note --}}
            <p class="text-xs text-slate-400 text-center mt-6">
                ✦ Desktop experience recommended for optimal reading & writing adventures ✦
            </p>
        </div>
    </body>
</html>
