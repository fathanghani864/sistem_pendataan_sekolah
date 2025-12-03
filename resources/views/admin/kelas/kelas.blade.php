<x-app-layout>
    <div class="py-4 md:py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- HEADER --}}
            <div class="bg-white shadow-md rounded-xl p-4 md:p-6 mb-6 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-7 md:w-7 text-gray-600" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A3 3 0 017 17h10a3 3 0 011.879.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <h1 class="text-xl md:text-2xl font-semibold text-gray-700">Kelas / Admin</h1>
            </div>

            {{-- CARD UTAMA --}}
            <div class="bg-white shadow-md rounded-xl p-4 md:p-6">

                {{-- SEARCH + BUTTON --}}
              {{-- SEARCH + BUTTON --}}
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-5 gap-4">

    {{-- FORM SEARCH AREA --}}
    <form method="GET" action="{{ route('kelas.index') }}"
          class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full sm:w-1/2">

        <div class="relative w-full">
            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                <i class="fa fa-search"></i>
            </span>
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                class="w-full rounded-full pl-10 pr-4 py-2 border-gray-300 text-sm md:text-base
                       focus:ring-indigo-500 focus:border-indigo-500"
                placeholder="Cari nama kelas / jurusan / level..."
            >
        </div>

        <button
            type="submit"
            class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded-full text-sm md:text-base w-full sm:w-auto">
            Cari
        </button>

        <a href="{{ route('kelas.index') }}"
           class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-full text-gray-800 text-sm md:text-base w-full sm:w-auto text-center">
            Clear
        </a>
    </form>

    {{-- BUTTON TAMBAH --}}
    <a href="{{ route('kelas.create') }}"
        class="px-4 md:px-5 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded-full text-sm md:text-base text-center w-full sm:w-auto">
        + Tambah Data
    </a>
</div>


                {{-- =========================
                     DESKTOP / TABLET: TABEL
                ========================== --}}
                <div class="hidden md:block overflow-x-auto">
                    <table class="min-w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100 text-gray-600 text-sm">
                                <th class="px-4 py-3 text-left">No</th>
                                <th class="px-4 py-3 text-left">Nama Kelas</th>
                                <th class="px-4 py-3 text-left">Level Kelas</th>
                                <th class="px-4 py-3 text-left">Nama Jurusan</th>
                                <th class="px-4 py-3 text-left">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($kelas as $i => $item)
                                <tr class="border-b">
                                    <td class="px-4 py-3">{{ $i + 1 }}</td>
                                    <td class="px-4 py-3">{{ $item->nama_kelas }}</td>
                                    <td class="px-4 py-3">{{ $item->level_kelas }}</td>
                                    <td class="px-4 py-3">{{ $item->jurusan->nama_jurusan ?? '-' }}</td>

                                    <td class="px-4 py-3">
                                        <div class="flex flex-wrap gap-2">
                                            {{-- EDIT --}}
                                            <a href="{{ route('kelas.edit', $item->id) }}"
                                                class="px-3 py-1 rounded-full text-blue-700 bg-blue-100 hover:bg-blue-200 text-xs md:text-sm">
                                                Edit
                                            </a>

                                            {{-- DELETE --}}
                                            <form action="{{ route('kelas.destroy', $item->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="px-3 py-1 rounded-full text-red-700 bg-red-100 hover:bg-red-200 text-xs md:text-sm">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

                {{-- =========================
                     MOBILE: CARD PER KELAS
                ========================== --}}
                <div class="space-y-3 md:hidden mt-2">
                    @forelse ($kelas as $i => $item)
                        <div class="border border-gray-200 rounded-lg p-3 shadow-sm">

                            <div class="flex items-center justify-between mb-1">
                                <span class="text-xs text-gray-400">#{{ $i + 1 }}</span>
                                <span class="text-xs px-2 py-0.5 rounded-full bg-indigo-50 text-indigo-600">
                                    {{ $item->level_kelas }}
                                </span>
                            </div>

                            <div class="font-semibold text-gray-900 text-sm">
                                {{ $item->nama_kelas }}
                            </div>

                            <div class="text-xs text-gray-600 mt-1">
                                <span class="font-semibold">Jurusan:</span>
                                {{ $item->jurusan->nama_jurusan ?? '-' }}
                            </div>

                            {{-- AKSI --}}
                            <div class="mt-3 flex flex-wrap gap-2">
                                {{-- EDIT --}}
                                <a href="{{ route('kelas.edit', $item->id) }}"
                                    class="flex-1 min-w-[80px] text-center px-3 py-1 rounded-full text-blue-700 bg-blue-100 hover:bg-blue-200 text-xs">
                                    Edit
                                </a>

                                {{-- DELETE --}}
                                <form action="{{ route('kelas.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                                    class="w-full">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="w-full text-center px-3 py-1 rounded-full text-red-700 bg-red-100 hover:bg-red-200 text-xs">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500 text-sm py-4">
                            Tidak ada data kelas.
                        </p>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
