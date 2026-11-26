<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Student Management') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#0b0b12] text-white">
    <div class="min-h-screen flex flex-col md:flex-row bg-[#0b0b12]">

        <!-- Sidebar -->
        <aside class="flex w-full md:w-64 md:shrink-0 flex-col bg-[#11111b] border-b md:border-b-0 md:border-r border-white/10 md:min-h-screen overflow-y-auto">
            @include('layouts.navigation')
        </aside>

        <!-- Main Content -->
        <div class="flex-1 min-w-0">
            @isset($header)
                <header class="bg-[#11111b] border-b border-white/5 px-4 py-5 sm:px-6 sm:py-6 lg:px-10">
                    {{ $header }}
                </header>
            @endisset

            <main class="min-h-screen p-4 sm:p-6 lg:p-10">
                {{ $slot }}
            </main>
        </div>

    </div>
</body>
</html>
