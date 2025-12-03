<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Sistem Informasi Sekolah') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div
            class="min-h-screen flex items-center justify-center
                   bg-gradient-to-br from-sky-100 via-sky-50 to-indigo-100
                   dark:from-slate-950 dark:via-slate-900 dark:to-sky-950
                   relative overflow-hidden"
        >
            <!-- Ornamen biru di background -->
            <div class="pointer-events-none absolute -left-24 -top-24 h-64 w-64 rounded-full bg-sky-300/40 blur-3xl"></div>
            <div class="pointer-events-none absolute -right-32 bottom-0 h-72 w-72 rounded-full bg-indigo-400/30 blur-3xl"></div>
            <div class="pointer-events-none absolute inset-y-1/3 -right-10 h-40 w-40 rounded-full bg-blue-300/30 blur-3xl"></div>

            <!-- Grid utama -->
            <div class="relative w-full max-w-5xl px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

                    {{-- Panel kiri: info sekolah --}}
                    <div class="hidden md:flex flex-col gap-4">
                        <div class="inline-flex items-center gap-2 rounded-full bg-white/80 dark:bg-slate-800/70 px-3 py-1 shadow-sm ring-1 ring-sky-100 dark:ring-slate-700">
                            <span class="inline-block h-2 w-2 rounded-full bg-sky-500"></span>
                            <span class="text-xs font-medium text-sky-700 dark:text-sky-300 uppercase tracking-wide">
                                Portal Sekolah
                            </span>
                        </div>

                        <h1 class="text-3xl lg:text-4xl font-bold text-sky-900 dark:text-sky-100 leading-tight">
                            Sistem Informasi <span class="text-sky-600 dark:text-sky-400">Sekolah</span>
                        </h1>

                        <p class="text-sm lg:text-base text-slate-700 dark:text-slate-300">
                            Akses data siswa, guru, dan akademik dalam satu portal.
                            Tampilan bernuansa biru yang rapi dan profesional.
                        </p>

                        <div class="mt-4 grid grid-cols-3 gap-3 text-xs text-slate-700 dark:text-slate-300">
                            <div class="rounded-xl bg-white/85 dark:bg-slate-800/80 p-3 shadow-sm ring-1 ring-sky-100 dark:ring-slate-700">
                                <div class="text-[10px] uppercase tracking-wide text-sky-500 dark:text-sky-300">
                                    Siswa
                                </div>
                                <div class="font-semibold">Presensi & Nilai</div>
                            </div>
                            <div class="rounded-xl bg-white/85 dark:bg-slate-800/80 p-3 shadow-sm ring-1 ring-sky-100 dark:ring-slate-700">
                                <div class="text-[10px] uppercase tracking-wide text-sky-500 dark:text-sky-300">
                                    Guru
                                </div>
                                <div class="font-semibold">Jadwal Mengajar</div>
                            </div>
                            <div class="rounded-xl bg-white/85 dark:bg-slate-800/80 p-3 shadow-sm ring-1 ring-sky-100 dark:ring-slate-700">
                                <div class="text-[10px] uppercase tracking-wide text-sky-500 dark:text-sky-300">
                                    Admin
                                </div>
                                <div class="font-semibold">Manajemen Data</div>
                            </div>
                        </div>
                    </div>

                    {{-- Panel kanan: card auth --}}
                    <div
                        class="w-full max-w-md mx-auto
                               bg-white/95 dark:bg-slate-900/95
                               shadow-xl shadow-sky-200/70 dark:shadow-sky-900/40
                               ring-1 ring-sky-100/90 dark:ring-slate-700
                               rounded-2xl sm:rounded-3xl px-6 sm:px-8 py-6 sm:py-8"
                    >
                        <div class="flex flex-col items-center mb-5">
                            <a href="/" class="mb-3">
                                <x-application-logo class="w-16 h-16 fill-current text-sky-600 dark:text-sky-300" />
                            </a>
                            <div class="text-center">
                                <p class="text-xs font-medium tracking-wide text-sky-600 dark:text-sky-300 uppercase">
                                    {{ config('app.name', 'Portal Sekolah') }}
                                </p>
                                <p class="text-sm text-slate-600 dark:text-slate-300 mt-1">
                                    Silakan masuk untuk melanjutkan
                                </p>
                            </div>
                        </div>

                        {{-- Form / konten auth --}}
                        {{ $slot }}

                        <p class="mt-6 text-[11px] text-center text-slate-400 dark:text-slate-500">
                            &copy; {{ date('Y') }} {{ config('app.name', 'Sistem Informasi Sekolah') }}.
                            Seluruh hak cipta dilindungi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
