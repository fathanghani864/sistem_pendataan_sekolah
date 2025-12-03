<x-app-layout>
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="bg-white shadow rounded-lg p-6 mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z" />
                    </svg>
                    Tambah Tahun Ajar
                </h2>
            </div>

            <!-- Form Card -->
            <div class="bg-white shadow rounded-lg p-6">

                <form action="{{ route('tahun-ajar.store') }}" method="POST">
                    @csrf

                    <!-- Kode Tahun Ajar -->
                    <div class="mb-4">
                        <label class="block font-medium mb-1 text-gray-700">Kode Tahun Ajar</label>
                        <select name="kode" class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="">-- Pilih Kode Tahun Ajar --</option>
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                    </div>

                    <!-- Nama Tahun Ajar -->
                    <div class="mb-4">
                        <label class="block font-medium mb-1 text-gray-700">Nama Tahun Ajar</label>
                        <input type="text" name="nama"
                               class="w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Contoh: 2025/2026"
                               required>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end gap-3 mt-6">
                        <a href="{{ route('tahun-ajar.index') }}"
                           class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 transition">
                            Batal
                        </a>

                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                            Simpan
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>
