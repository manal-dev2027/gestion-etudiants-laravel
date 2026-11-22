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
<body class="min-h-screen bg-[#0b0b12] font-sans text-white antialiased">
    <main class="flex min-h-screen items-center justify-center px-4 py-12">
        <section class="w-full max-w-md rounded-2xl border border-white/10 bg-[#11111b] p-8 shadow-2xl shadow-black/40">
            <div class="mb-8 text-center">
                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-purple-600/20 text-2xl font-extrabold text-purple-400">S</div>
                <h1 class="text-2xl font-bold tracking-tight text-white">Student Management</h1>
                <p class="mt-2 text-sm text-gray-400">Sign in to your account</p>
            </div>
            {{ $slot }}
        </section>
    </main>
</body>
</html>
