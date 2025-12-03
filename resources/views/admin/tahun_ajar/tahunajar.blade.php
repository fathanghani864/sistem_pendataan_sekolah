<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Header --}}
            <div class="bg-white shadow rounded-lg p-6 mb-6">
                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-700" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M8 7V3m8 4V3m-9 8h10m-11 8h12a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <h2 class="text-2xl font-semibold text-gray-800">Tahun Ajar / Admin</h2>
                </div>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                {{-- SEARCH + BUTTON TAMBAH --}}
                <div class="flex flex-col sm:flex-row sm:justify-between gap-4 mb-5">

                    {{-- FORM SEARCH --}}
                    <form method="GET" action="{{ route('tahun-ajar.index') }}" class="flex gap-2 w-full sm:w-1/2">
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="w-full border-gray-300 rounded-lg"
                            placeholder="Cari nama / kode tahun ajar..."
                        >

                        <button
                            type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                            Cari
                        </button>

                        <a
                            href="{{ route('tahun-ajar.index') }}"
                            class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">
                            Clear
                        </a>
                    </form>

                    {{-- TOMBOL TAMBAH DATA --}}
                    <a href="{{ route('tahun-ajar.create') }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                        + Tambah Data
                    </a>
                </div>

                {{-- Table --}}
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border">No</th>
                                <th class="px-4 py-2 border">Nama Tahun Ajar</th>
                                <th class="px-4 py-2 border">Kode Tahun Ajar</th>
                                <th class="px-4 py-2 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $i => $item)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 border text-center">{{ $i + 1 }}</td>
                                    <td class="px-4 py-3 border text-center">{{ $item->nama_tahun_ajar}}</td>
                                    <td class="px-4 py-3 border text-center">
                                        @if($item->kode_tahun_ajar == 'Ganjil')
                                            <span
                                                class="px-2 py-1 bg-green-200 text-green-800 rounded-full text-sm font-semibold">Ganjil</span>
                                        @else
                                            <span
                                                class="px-2 py-1 bg-blue-200 text-blue-800 rounded-full text-sm font-semibold">Genap</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 border text-center">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('tahun-ajar.edit', $item->id) }}"
                                                class="px-3 py-1 bg-blue-500 text-white rounded shadow hover:bg-blue-600 transition">
                                                Edit
                                            </a>

                                            <form action="{{ route('tahun-ajar.destroy', $item->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus?');">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="px-3 py-1 bg-red-500 text-white rounded shadow hover:bg-red-600 transition">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>
