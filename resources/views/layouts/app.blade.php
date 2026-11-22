
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

    <div class="min-h-screen flex bg-[#0b0b12]">

        <!-- Sidebar -->
<aside class="flex w-64 shrink-0 h-screen flex-col bg-[#11111b] border-r border-white/10 overflow-y-auto">   
     @include('layouts.navigation')
</aside>
        

        <!-- Main Content -->
    <div class="flex-1 min-w-0">           
     @isset($header)
                <header class="bg-[#11111b] border-b border-white/5 px-6 py-6 lg:px-10">
                    {{ $header }}
                </header>
            @endisset

            <main class="min-h-screen p-6 lg:p-10">
                {{ $slot }}
            </main>

        </div>

    </div>

</body>
</html>
