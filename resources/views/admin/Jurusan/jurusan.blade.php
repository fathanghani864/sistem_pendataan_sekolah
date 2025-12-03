<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- HEADER --}}
            <div class="bg-white shadow-md rounded-xl p-4 sm:p-6 mb-6 flex flex-col sm:flex-row sm:items-center gap-3">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-600" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12h6m-3-3v6m5-9h.01M4 6h.01M4 18h.01M20 6h.01M20 18h.01M9 3h6a2 2 0 012 2v2H7V5a2 2 0 012-2zM7 19v-2h10v2a2 2 0 01-2 2H9a2 2 0 01-2-2z" />
                    </svg>
                    <h1 class="text-xl sm:text-2xl font-semibold text-gray-700">
                        Jurusan / Admin
                    </h1>
                </div>
            </div>

            {{-- CARD --}}
            <div class="bg-white shadow-md rounded-xl p-4 sm:p-6">

                {{-- SEARCH + BUTTON --}}
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-5 gap-4">

                    {{-- FORM SEARCH --}}
                    <form method="GET" action="{{ route('jurusan.index') }}"
                          class="flex flex-col sm:flex-row sm:items-center gap-3 w-full sm:w-2/3">

                        <div class="relative w-full">
                            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                                <i class="fa fa-search"></i>
                            </span>
                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                class="w-full rounded-full pl-10 pr-4 py-2 border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                                placeholder="Cari kode / nama jurusan..."
                            >
                        </div>

                        <div class="flex gap-2">
                            <button
                                type="submit"
                                class="flex-1 sm:flex-none px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded-full text-sm text-center">
                                Cari
                            </button>

                            <a
                                href="{{ route('jurusan.index') }}"
                                class="flex-1 sm:flex-none px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-full text-gray-800 text-sm text-center">
                                Clear
                            </a>
                        </div>
                    </form>

                    <a href="{{ route('jurusan.create') }}"
                       class="w-full sm:w-auto text-center px-5 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded-full text-sm">
                        + Tambah Data
                    </a>
                </div>

                {{-- MOBILE LIST (CARD) --}}
                <div class="space-y-3 md:hidden">
                    @forelse ($jurusans as $jurusan)
                        <div class="border rounded-lg p-3 shadow-sm flex flex-col gap-2 text-sm">
                            <div class="flex justify-between">
                                <span class="font-semibold text-gray-700">
                                    {{ $jurusan->nama_jurusan }}
                                </span>
                                <span class="text-xs text-gray-500">
                                    #{{ $loop->iteration }}
                                </span>
                            </div>
                            <div class="text-xs text-gray-600">
                                Kode: <span class="font-medium">{{ $jurusan->kode_jurusan }}</span>
                            </div>
                            <div class="flex gap-2 mt-1">
                                <a href="{{ route('jurusan.edit', $jurusan->id) }}"
                                   class="flex-1 px-3 py-1 rounded-full text-blue-700 bg-blue-100 hover:bg-blue-200 text-xs text-center">
                                    Edit
                                </a>

                                <form action="{{ route('jurusan.destroy', $jurusan->id) }}"
                                      method="POST"
                                      class="flex-1"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="w-full px-3 py-1 rounded-full text-red-700 bg-red-100 hover:bg-red-200 text-xs">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500 text-sm py-4">
                            Tidak ada data jurusan.
                        </p>
                    @endforelse
                </div>

                {{-- TABLE DESKTOP/TABLET --}}
                <div class="overflow-x-auto hidden md:block mt-2">
                    <table class="min-w-full border-collapse text-sm">
                        <thead>
                            <tr class="bg-gray-100 text-gray-600">
                                <th class="px-4 py-3 text-left">No</th>
                                <th class="px-4 py-3 text-left">Kode Jurusan</th>
                                <th class="px-4 py-3 text-left">Nama Jurusan</th>
                                <th class="px-4 py-3 text-left">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($jurusans as $jurusan)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3">{{ $jurusan->kode_jurusan }}</td>
                                    <td class="px-4 py-3">{{ $jurusan->nama_jurusan }}</td>

                                    <td class="px-4 py-3">
                                        <div class="flex gap-3">
                                            <a href="{{ route('jurusan.edit', $jurusan->id) }}"
                                               class="px-3 py-1 rounded-full text-blue-700 bg-blue-100 hover:bg-blue-200 text-sm">
                                                Edit
                                            </a>

                                            <form action="{{ route('jurusan.destroy', $jurusan->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="px-3 py-1 rounded-full text-red-700 bg-red-100 hover:bg-red-200 text-sm">
                                                    Hapus
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                                        Tidak ada data jurusan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
