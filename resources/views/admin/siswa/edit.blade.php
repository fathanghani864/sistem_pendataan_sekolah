<x-app-layout>
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-xl p-6">

                <!-- Header -->
                <h2 class="text-2xl font-semibold mb-5 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A3 3 0 017 17h10a3 3 0 011.879.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Edit Data Siswa
                </h2>

                <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-2 gap-6">

                        <!-- NISN -->
                        <div>
                            <label class="block mb-1 text-gray-700">NISN</label>
                            <input type="text" name="nisn"
                                class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
                                value="{{ $siswa->nisn }}" required>
                        </div>

                        <!-- Nama Lengkap -->
                        <div>
                            <label class="block mb-1 text-gray-700">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap"
                                class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
                                value="{{ $siswa->nama_lengkap }}" required>
                        </div>

                        <!-- Jenis Kelamin (SUDAH DIPERBAIKI) -->
                        <div>
                            <label class="block mb-1 text-gray-700">Jenis Kelamin</label>
                            <select name="jenis_kelamin"
                                class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">

                                <option value="laki-laki"
                                    {{ $siswa->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>

                                <option value="perempuan"
                                    {{ $siswa->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>

                            </select>
                        </div>

                        <!-- Jurusan -->
                        <div>
                            <label class="block mb-1 text-gray-700">Jurusan</label>
                            <select name="jurusan_id"
                                class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                                @foreach ($jurusan as $j)
                                    <option value="{{ $j->id }}"
                                        {{ $siswa->jurusan_id == $j->id ? 'selected' : '' }}>
                                        {{ $j->nama_jurusan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Kelas -->
                        <div>
                            <label class="block mb-1 text-gray-700">Kelas</label>
                            <select name="kelas_id"
                                class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}"
                                        {{ $siswa->kelas_id == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Tahun Ajar -->
                        <div>
                            <label class="block mb-1 text-gray-700">Tahun Ajar</label>
                            <select name="tahun_ajar_id"
                                class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                                @foreach ($tahunAjar as $t)
                                    <option value="{{ $t->id }}"
                                        {{ $siswa->tahun_ajar_id == $t->id ? 'selected' : '' }}>
                                        {{ $t->tahun_ajaran }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('siswa.index') }}"
                            class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-full">Kembali</a>

                        <button
                            class="px-5 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded-full">
                            Simpan Perubahan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
