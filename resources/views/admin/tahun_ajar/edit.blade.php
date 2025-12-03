<x-app-layout>
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6 mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-700" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Edit Tahun Ajar
                </h2>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <form action="{{ route('tahun-ajar.update', $tahunAjar->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Kode Tahun Ajar</label>
                        <select name="kode" class="w-full border-gray-300 rounded-lg" required>
                            <option value="">-- Pilih Kode Tahun Ajar --</option>
                            <option value="Ganjil" {{ $tahunAjar->kode_tahun_ajar == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                            <option value="Genap" {{ $tahunAjar->kode_tahun_ajar == 'Genap' ? 'selected' : '' }}>Genap</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Nama Tahun Ajar</label>
                        <input type="text" name="nama"
                               class="w-full border-gray-300 rounded-lg"
                               value="{{ old('nama', $tahunAjar->nama_tahun_ajar) }}"
                               required>
                    </div>

                    <div class="flex justify-end gap-3 mt-6">
                        <a href="{{ route('tahun-ajar.index') }}"
                           class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">
                            Batal
                        </a>

                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                            Simpan Perubahan
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>
