<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Jurusan
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-md rounded-xl">

                <!-- Title -->
                <div class="mb-6 border-b pb-4">
                    <h3 class="text-xl font-bold text-gray-800">Form Edit Jurusan</h3>
                </div>

                <!-- Form -->
                <form action="{{ route('jurusan.update', $jurusan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Kode Jurusan -->
                    <div class="mb-4">
                        <label for="kode_jurusan" class="block text-sm font-medium text-gray-700 mb-1">
                            Kode Jurusan
                        </label>
                        <input type="text"
                               name="kode_jurusan"
                               id="kode_jurusan"
                               value="{{ old('kode_jurusan', $jurusan->kode_jurusan) }}"
                               class="w-full border-gray-300 rounded-lg px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                        @error('kode_jurusan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nama Jurusan -->
                    <div class="mb-6">
                        <label for="nama_jurusan" class="block text-sm font-medium text-gray-700 mb-1">
                            Nama Jurusan
                        </label>
                        <input type="text"
                               name="nama_jurusan"
                               id="nama_jurusan"
                               value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}"
                               class="w-full border-gray-300 rounded-lg px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                        @error('nama_jurusan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end gap-3">
                        <a href="{{ route('jurusan.index') }}"
                           class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-700 rounded-full">
                            Batal
                        </a>

                        <button type="submit"
                                class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full shadow">
                            Simpan Perubahan
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
