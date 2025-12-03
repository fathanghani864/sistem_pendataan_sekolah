{{-- NAVIGATION FULL RESPONSIVE --}}
<nav x-data="{ open: false }" class="select-none">

    {{-- ========== MOBILE TOP BAR (HAMBURGER DI KIRI) ========== --}}
    <div class="md:hidden fixed top-0 left-0 right-0 z-50 bg-white border-b border-gray-200 px-4 py-3
                flex items-center justify-between shadow-sm">

        {{-- HAMBURGER --}}
        <button @click="open = true"
                class="flex flex-col justify-center items-center gap-1.5 w-9 h-9 rounded-md border border-gray-300">
            <span class="block w-5 h-0.5 bg-gray-800 rounded"></span>
            <span class="block w-5 h-0.5 bg-gray-800 rounded"></span>
            <span class="block w-5 h-0.5 bg-gray-800 rounded"></span>
        </button>

        {{-- LOGO & TEXT --}}
        <div class="flex items-center gap-2">
            <x-application-logo class="h-7 w-auto text-indigo-600" />
            <span class="text-lg font-bold text-gray-700">Sistem Sekolah</span>
        </div>

    </div>



    {{-- ========== DESKTOP SIDEBAR ========== --}}
    <div class="hidden md:flex bg-white dark:bg-gray-800 h-screen w-64 fixed top-0 left-0 border-r border-gray-200
                dark:border-gray-700 shadow-md z-40 flex-col">

        {{-- LOGO --}}
        <div class="h-20 flex items-center px-6 border-b border-gray-200 dark:border-gray-700">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <x-application-logo class="h-10 w-auto text-indigo-600" />
                <span class="text-lg font-bold text-gray-700 dark:text-gray-200">Sistem Sekolah</span>
            </a>
        </div>

        {{-- MENU LIST --}}
        <div class="flex-1 overflow-y-auto mt-4 pb-6">
            <ul class="space-y-1 px-4">
                <li>
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home.*')"
                        class="w-full block text-[15px] py-3 rounded-lg !font-semibold">
                        Dashboard
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('tahun-ajar.index')" :active="request()->routeIs('tahun-ajar.*')"
                        class="w-full block text-[15px] py-3 rounded-lg !font-semibold">
                        Tahun Ajar
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('jurusan.index')" :active="request()->routeIs('jurusan.*')"
                        class="w-full block text-[15px] py-3 rounded-lg !font-semibold">
                        Jurusan
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('kelas.index')" :active="request()->routeIs('kelas.*')"
                        class="w-full block text-[15px] py-3 rounded-lg !font-semibold">
                        Kelas
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('siswa.index')" :active="request()->routeIs('siswa.*')"
                        class="w-full block text-[15px] py-3 rounded-lg !font-semibold">
                        Siswa
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.*')"
                        class="w-full block text-[15px] py-3 rounded-lg !font-semibold">
                        User Management
                    </x-nav-link>
                </li>
            </ul>
        </div>

        {{-- USER FOOTER --}}
        <div class="border-t border-gray-200 dark:border-gray-700 p-4">
            <div class="px-4 py-2 font-semibold text-gray-700">
                {{ Auth::user()->name }}
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-100 rounded-lg">
                    Log Out
                </button>
            </form>
        </div>

    </div>



    {{-- ========== MOBILE OVERLAY ========== --}}
    <div 
        x-show="open"
        @click="open = false"
        class="fixed inset-0 bg-black bg-opacity-40 z-40 md:hidden">
    </div>



    {{-- ========== MOBILE SIDEBAR SLIDE ========== --}}
    <div 
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="-translate-x-64 opacity-0"
        x-transition:enter-end="translate-x-0 opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="translate-x-0 opacity-100"
        x-transition:leave-end="-translate-x-64 opacity-0"
        class="fixed top-0 left-0 h-full w-64 bg-white dark:bg-gray-800 shadow-lg z-50 md:hidden overflow-y-auto">

        {{-- MOBILE HEADER --}}
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <div class="flex items-center gap-3">
                <x-application-logo class="h-9 w-auto text-indigo-600" />
                <span class="text-lg font-bold text-gray-700">Sistem Sekolah</span>
            </div>

            <button @click="open = false" class="text-gray-600">
                ✕
            </button>
        </div>

        {{-- MOBILE MENU --}}
        <ul class="mt-4 space-y-2 px-4 pb-6">
            <li>
                <x-nav-link :href="route('home')" :active="request()->routeIs('home.*')"
                    class="block text-[15px] py-3 rounded-lg">
                    Dashboard
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('tahun-ajar.index')" :active="request()->routeIs('tahun-ajar.*')"
                    class="block text-[15px] py-3 rounded-lg">
                    Tahun Ajar
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('jurusan.index')" :active="request()->routeIs('jurusan.*')"
                    class="block text-[15px] py-3 rounded-lg">
                    Jurusan
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('kelas.index')" :active="request()->routeIs('kelas.*')"
                    class="block text-[15px] py-3 rounded-lg">
                    Kelas
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('siswa.index')" :active="request()->routeIs('siswa.*')"
                    class="block text-[15px] py-3 rounded-lg">
                    Siswa
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.*')"
                    class="block text-[15px] py-3 rounded-lg">
                    User Management
                </x-nav-link>
            </li>
        </ul>

        {{-- MOBILE FOOTER --}}
        <div class="border-t mt-2 p-4">
            <div class="font-semibold text-gray-700 mb-2">
                {{ Auth::user()->name }}
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button 
                    class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-100 rounded-lg">
                    Log Out
                </button>
            </form>
        </div>

    </div>

</nav>
