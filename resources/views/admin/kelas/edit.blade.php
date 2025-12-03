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
                <div>
                    <h1 class="text-xl md:text-2xl font-semibold text-gray-700">Edit Kelas</h1>
                    <p class="text-xs md:text-sm text-gray-500">
                        Ubah data kelas yang sudah terdaftar
                    </p>
                </div>
            </div>

            {{-- CARD FORM --}}
            <div class="bg-white shadow-md rounded-xl p-4 md:p-6">
                {{-- ALERT ERROR VALIDASI --}}
                @if ($errors->any())
                    <div class="mb-4 bg-red-50 border border-red-200 text-red-700 text-sm rounded-lg p-3">
                        <div class="font-semibold mb-1">Terjadi kesalahan:</div>
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('kelas.update', $kelas->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    {{-- NAMA KELAS --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Nama Kelas <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            name="nama_kelas"
                            value="{{ old('nama_kelas', $kelas->nama_kelas) }}"
                            class="w-full rounded-lg border-gray-300 text-sm md:text-base
                                   focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Contoh: XII RPL 1">
                    </div>

                    {{-- LEVEL KELAS --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Level Kelas <span class="text-red-500">*</span>
                        </label>

                        {{-- kalau mau pakai text biasa --}}
                        <input
                            type="text"
                            name="level_kelas"
                            value="{{ old('level_kelas', $kelas->level_kelas) }}"
                            class="w-full rounded-lg border-gray-300 text-sm md:text-base
                                   focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Contoh: X / XI / XII">
                        
                        {{-- 
                        Atau kalau kamu sudah punya pilihan fix, bisa ganti jadi <select>:

                        <select name="level_kelas"
                            class="w-full rounded-lg border-gray-300 text-sm md:text-base
                                   focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">-- Pilih Level --</option>
                            <option value="X" {{ old('level_kelas', $kelas->level_kelas) == 'X' ? 'selected' : '' }}>X</option>
                            <option value="XI" {{ old('level_kelas', $kelas->level_kelas) == 'XI' ? 'selected' : '' }}>XI</option>
                            <option value="XII" {{ old('level_kelas', $kelas->level_kelas) == 'XII' ? 'selected' : '' }}>XII</option>
                        </select>
                        --}}
                    </div>

                    {{-- JURUSAN --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Jurusan <span class="text-red-500">*</span>
                        </label>
                        <select
                            name="jurusan_id"
                            class="w-full rounded-lg border-gray-300 text-sm md:text-base
                                   focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">-- Pilih Jurusan --</option>
                            @foreach ($jurusan as $j)
                                <option
                                    value="{{ $j->id }}"
                                    {{ old('jurusan_id', $kelas->jurusan_id ?? null) == $j->id ? 'selected' : '' }}>
                                    {{ $j->nama_jurusan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- TOMBOL AKSI --}}
                    <div class="pt-3 flex flex-col sm:flex-row gap-3 justify-end">
                        <a href="{{ route('kelas.index') }}"
                            class="px-4 py-2 rounded-full border border-gray-300 text-gray-700 text-sm md:text-base text-center">
                            Batal
                        </a>
                        <button
                            type="submit"
                            class="px-5 py-2 rounded-full bg-indigo-500 hover:bg-indigo-600 text-white text-sm md:text-base">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
