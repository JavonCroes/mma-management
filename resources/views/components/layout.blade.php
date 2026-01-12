<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'MMA Management' }}</title>

    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

{{-- navbar --}}
<nav class="bg-white border-b">
    <div class="max-w-7xl mx-auto px-6 h-14 flex items-center justify-between">

        <a href="{{ route('home') }}" class="font-bold text-lg">
            UFC Beheer
        </a>

        @php
            $linkClass = 'px-3 py-2 text-sm font-medium hover:text-black';
            $active = 'border-b-2 border-red-600 text-black';
        @endphp

        <div class="flex gap-6">
            <a href="{{ route('dashboard') }}"
               class="{{ $linkClass }} {{ request()->routeIs('dashboard') ? $active : '' }}">
                Dashboard
            </a>

            <a href="{{ route('fighters.index') }}"
               class="{{ $linkClass }} {{ request()->routeIs('fighters.*') ? $active : '' }}">
                Vechters
            </a>

            <a href="{{ route('events.index') }}"
               class="{{ $linkClass }} {{ request()->routeIs('events.*') ? $active : '' }}">
                Events
            </a>
        </div>


    </div>
</nav>


{{-- content --}}
<main class="flex-1 max-w-7xl mx-auto px-6 py-8">
    {{ $slot }}
</main>

{{-- footer --}}
<footer class="bg-white border-t">
    <div class="max-w-7xl mx-auto px-6 py-4 text-sm text-gray-500 flex justify-center">
        © {{ date('Y') }} MMA Management System
    </div>
</footer>



</body>
</html>
