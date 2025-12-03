<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

{{-- FIX UTAMA DI SINI: TAMBAH overflow-x-hidden --}}
<body class="font-sans antialiased bg-gray-100 overflow-x-hidden">

    <div class="flex w-full">

        {{-- SIDEBAR --}}
        @include('layouts.navigation')

        {{-- WRAPPER KONTEN --}}
        <div 
            class="flex-1 flex flex-col 
                   md:ml-64           {{-- margin kiri hanya di desktop --}}
                   mt-16 md:mt-0      {{-- karena navbar mobile fixed --}}
        ">

            <main class="p-4 md:p-6">
                {{ $slot }}
            </main>

        </div>

    </div>

</body>
</html>
