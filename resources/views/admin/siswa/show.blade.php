<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- HEADER -->
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-semibold flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-gray-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A3 3 0 017 17h10a3 3 0 011.879.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Siswa / Detail - {{ Str::limit($siswa->nama_lengkap, 20) }}
                </h2>

                <a href="{{ route('siswa.index') }}"
                    class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-full">
                    ← Kembali
                </a>
            </div>

            <!-- MAIN 2 COLUMN -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- LEFT CARD: DETAIL -->
                <div class="bg-white shadow-md rounded-xl p-6">
                    <h3 class="text-xl font-semibold mb-4">{{ $siswa->nama_lengkap }}</h3>

                    <div class="space-y-4">

                        <div>
                            <p class="text-gray-500 text-sm">NISN</p>
                            <p class="text-lg font-semibold">{{ $siswa->nisn }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500 text-sm">Alamat</p>
                            <p class="text-lg font-semibold">
                                {{ Str::limit($siswa->alamat, 60) }}
                                @if(strlen($siswa->alamat) > 60)
                                    <span class="text-blue-500 cursor-pointer">Read more...</span>
                                @endif
                            </p>
                        </div>

                        <div>
                            <p class="text-gray-500 text-sm">Nama Siswa</p>
                            <p class="text-lg font-semibold">{{ $siswa->nama_lengkap }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500 text-sm">Jenis Kelamin</p>
                            <p class="text-lg font-semibold">{{ ucfirst($siswa->jenis_kelamin) }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500 text-sm">Tanggal Lahir</p>
                            <p class="text-lg font-semibold">{{ $siswa->tanggal_lahir }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500 text-sm">Kelas</p>
                            <p class="text-lg font-semibold">{{ $siswa->kelas->nama_kelas }}</p>
                        </div>

                        <div>
                            <p class="text-gray-500 text-sm">Tahun Ajar</p>
                            <p class="text-lg font-semibold">{{ $siswa->tahunAjar->nama_tahun_ajar }}</p>
                        </div>

                    </div>
                </div>

                <!-- RIGHT CARD: UPDATE -->
                <div class="bg-white shadow-md rounded-xl p-6">
                    <h3 class="text-xl font-semibold mb-4">Update Kelas dan Tahun Ajar</h3>

                    <!-- FORM UPDATED WITH NEW ROUTE -->
                    <form action="{{ route('siswa.updateKelasAjar', $siswa->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- PILIH KELAS -->
                        <div class="mb-4">
                            <label class="block text-gray-600 mb-1">Kelas</label>
                            <select name="kelas_id"
                                class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">-- Pilih Kelas --</option>

                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}" {{ $siswa->kelas_id == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- PILIH TAHUN AJAR -->
                        <div class="mb-4">
                            <label class="block text-gray-600 mb-1">Tahun Ajar</label>
                            <select name="tahun_ajar_id"
                                class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">-- Pilih Tahun Ajar --</option>

                                @foreach($tahunAjar as $t)
                                    <option value="{{ $t->id }}" {{ $siswa->tahun_ajar_id == $t->id ? 'selected' : '' }}>
                                        {{ $t->nama_tahun_ajar }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <button
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg w-full">
                            Update
                        </button>

                    </form>
                </div>

            </div>

            <!-- HISTORY SECTION -->
            <div class="bg-white shadow-md rounded-xl p-6 mt-8">
                <h3 class="text-xl font-semibold mb-4">Riwayat Kelas dan Tahun Ajar</h3>

                <table class="min-w-full">
                    <thead class="bg-gray-100">
                        <tr class="text-gray-600 text-sm">
                            <th class="px-4 py-2 text-left">Kelas</th>
                            <th class="px-4 py-2 text-left">Tahun Ajar</th>
                            <th class="px-4 py-2 text-left">Tanggal</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($siswa->kelasDetails as $detail)
                            <tr>
                                <td class="px-4 py-2">{{ $detail->kelas->nama_kelas ?? '-' }}</td>
                                <td class="px-4 py-2">{{ $detail->tahunAjar->nama_tahun_ajar ?? '-' }}</td>
                                <td class="px-4 py-2">{{ $detail->created_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-3 text-center text-gray-500">
                                    Belum ada riwayat.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
