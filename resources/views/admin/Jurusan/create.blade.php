<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="fas fa-plus mr-3 text-indigo-600"></i> Tambah Jurusan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <!-- Notifikasi Success/Error -->
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('jurusan.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="kode_jurusan" class="block font-medium mb-1 text-gray-700">Kode Jurusan</label>
                        <input type="text" name="kode_jurusan" id="kode_jurusan" 
                               value="{{ old('kode_jurusan') }}" required
                               class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('kode_jurusan') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nama_jurusan" class="block font-medium mb-1 text-gray-700">Nama Jurusan</label>
                        <input type="text" name="nama_jurusan" id="nama_jurusan" 
                               value="{{ old('nama_jurusan') }}" required
                               class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('nama_jurusan') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex justify-end gap-3 mt-6">
                        <a href="{{ route('jurusan.index') }}" 
                           class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</a>
                        <button type="submit" 
                                class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700">
                            Simpan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
