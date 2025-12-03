{{-- resources/views/admin/siswa/siswa.blade.php --}}
<x-app-layout>
    <div class="py-4 md:py-6">

        <!-- Header -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-xl p-4 md:p-6">
                <h2 class="text-xl md:text-2xl font-semibold flex items-center gap-2 text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-7 md:w-7 text-gray-600" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5.121 17.804A3 3 0 017 17h10a3 3 0 011.879.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Siswa / Admin
                </h2>
            </div>
        </div>

        <!-- Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 md:mt-6">
            <div class="bg-white shadow-md rounded-xl p-4 md:p-6">

                <!-- Search + Add Button -->
              <!-- Search + Add Button -->
<!-- Search + Add Button -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-5 gap-4">

    {{-- FORM SEARCH --}}
    <form method="GET" action="{{ route('siswa.index') }}"
          class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full sm:w-1/2">

        <div class="relative w-full">
            <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                <i class="fa fa-search"></i>
            </span>
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                class="w-full rounded-full pl-10 pr-4 py-2 border border-gray-300
                       focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                placeholder="Cari NISN / nama / jurusan / kelas..."
            >
        </div>

        <button
            type="submit"
            class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 rounded-full text-white text-sm">
            Cari
        </button>

        <a href="{{ route('siswa.index') }}"
           class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-full text-gray-800 text-sm text-center">
            Clear
        </a>
    </form>

    <a href="{{ route('siswa.create') }}"
       class="px-4 md:px-5 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded-full
              text-sm text-center">
        + Tambah Data
    </a>
</div>



                {{-- ============== DESKTOP / TABLET: TABLE ============== --}}
                <div class="hidden md:block overflow-x-auto">
                    <table class="min-w-full border-collapse text-sm">
                        <thead>
                        <tr class="bg-gray-100 text-gray-600">
                            <th class="px-4 py-3 text-left">No</th>
                            <th class="px-4 py-3 text-left">NISN</th>
                            <th class="px-4 py-3 text-left">Nama Lengkap</th>
                            <th class="px-4 py-3 text-left">Jenis Kelamin</th>
                            <th class="px-4 py-3 text-left">Jurusan</th>
                            <th class="px-4 py-3 text-left">Kelas</th>
                            <th class="px-4 py-3 text-left">Tahun Ajar</th>
                            <th class="px-4 py-3 text-left">Aksi</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($siswa as $s)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2">{{ $s->nisn }}</td>
                                <td class="px-4 py-2">{{ $s->nama_lengkap }}</td>
                                <td class="px-4 py-2">{{ $s->jenis_kelamin }}</td>
                                <td class="px-4 py-2">{{ $s->jurusan->nama_jurusan }}</td>
                                <td class="px-4 py-2">{{ $s->kelas->nama_kelas }}</td>
                                <td class="px-4 py-2">
                                    {{ $s->tahunAjar?->nama_tahun_ajar ?? '-' }}
                                </td>

                                <td class="px-4 py-2">
                                    <div class="flex flex-wrap gap-2">
                                        <!-- DETAIL BUTTON -->
                                        <a href="{{ route('siswa.show', $s->id) }}"
                                           class="px-3 py-1 rounded-full text-green-700 bg-green-100 hover:bg-green-200 text-xs font-semibold">
                                            Detail
                                        </a>

                                        <!-- EDIT BUTTON -->
                                        <a href="{{ route('siswa.edit', $s->id) }}"
                                           class="px-3 py-1 rounded-full text-blue-700 bg-blue-100 hover:bg-blue-200 text-xs font-semibold">
                                            Edit
                                        </a>

                                        <!-- DELETE BUTTON -->
                                        <form action="{{ route('siswa.destroy', $s->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="px-3 py-1 rounded-full text-red-700 bg-red-100 hover:bg-red-200 text-xs font-semibold">
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

                {{-- ============== MOBILE: CARD PER SISWA ============== --}}
                <div class="md:hidden space-y-3 mt-2">
                    @forelse ($siswa as $s)
                        <div class="border border-gray-200 rounded-lg p-3 shadow-sm bg-white">

                            <div class="flex items-center justify-between mb-1">
                                <span class="text-xs text-gray-400">#{{ $loop->iteration }}</span>
                                <span class="text-xs px-2 py-0.5 rounded-full bg-indigo-50 text-indigo-600">
                                    {{ $s->nisn }}
                                </span>
                            </div>

                            <div class="font-semibold text-gray-900 text-sm">
                                {{ $s->nama_lengkap }}
                            </div>

                            <div class="text-xs text-gray-600 mt-1">
                                <span class="font-semibold">JK:</span>
                                {{ $s->jenis_kelamin }}
                            </div>

                            <div class="text-xs text-gray-600 mt-1">
                                <span class="font-semibold">Jurusan:</span>
                                {{ $s->jurusan->nama_jurusan }}
                            </div>

                            <div class="text-xs text-gray-600 mt-1">
                                <span class="font-semibold">Kelas:</span>
                                {{ $s->kelas->nama_kelas }}
                            </div>

                            <div class="text-xs text-gray-600 mt-1">
                                <span class="font-semibold">Tahun Ajar:</span>
                                {{ $s->tahunAjar?->nama_tahun_ajar ?? '-' }}
                            </div>

                            <div class="mt-3 flex flex-wrap gap-2">
                                <a href="{{ route('siswa.show', $s->id) }}"
                                   class="px-3 py-1 rounded-full text-green-700 bg-green-100 hover:bg-green-200 text-xs font-semibold">
                                    Detail
                                </a>
                                <a href="{{ route('siswa.edit', $s->id) }}"
                                   class="px-3 py-1 rounded-full text-blue-700 bg-blue-100 hover:bg-blue-200 text-xs font-semibold">
                                    Edit
                                </a>
                                <form action="{{ route('siswa.destroy', $s->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="px-3 py-1 rounded-full text-red-700 bg-red-100 hover:bg-red-200 text-xs font-semibold">
                                        Hapus
                                    </button>
                                </form>
                            </div>

                        </div>
                    @empty
                        <p class="text-center text-gray-500 text-sm py-4">
                            Tidak ada data siswa.
                        </p>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
