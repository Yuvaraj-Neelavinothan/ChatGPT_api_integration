<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- flowbite --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <title>{{ $title ?? 'Page Title' }}</title>
    @livewireStyles
</head>

<body>
    <div class="antialiased dark:bg-gray-900">
        @livewire('topic')
        <main class="p-4 md:mr-64 h-auto pt-20">
            {{ $slot }}
        </main>
    </div>
    {{-- flowbite --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    @livewireScripts
</body>

</html>
