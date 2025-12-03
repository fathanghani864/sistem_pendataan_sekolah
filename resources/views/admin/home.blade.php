<x-app-layout>

    {{-- HEADER --}}
    <x-slot name="header">
        <h2 class="font-semibold text-lg md:text-xl text-gray-800 leading-tight flex items-center gap-2">
            <i class="fas fa-fw fa-tachometer-alt text-indigo-600"></i> 
            {{ __('Dashboard Pengelolaan') }}
        </h2>
    </x-slot>


    <div class="py-6 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl rounded-xl p-4 md:p-6">

                {{-- TITLE --}}
                <div class="flex items-center mb-6 md:mb-8 border-b pb-3 md:pb-4">
                    <h3 class="text-xl md:text-2xl font-bold text-gray-800">
                        <i class="fas fa-grip-horizontal text-indigo-600 mr-2"></i> 
                        Dashboard
                    </h3>
                </div>

                <!-- ============================
                     1. INFORMATION CARDS
                ============================= -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-10">

                    <div class="bg-white rounded-xl shadow-lg p-4 md:p-6 hover:shadow-2xl transition">
                        <div class="text-xs md:text-sm text-gray-500 font-semibold uppercase mb-1">
                            Total Tahun Ajar
                        </div>
                        <div class="text-3xl md:text-4xl font-extrabold text-gray-900">
                            {{ $totalTahunAjar }}
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-4 md:p-6 hover:shadow-2xl transition">
                        <div class="text-xs md:text-sm text-gray-500 font-semibold uppercase mb-1">
                            Total Jurusan
                        </div>
                        <div class="text-3xl md:text-4xl font-extrabold text-gray-900">
                            {{ $totalJurusan }}
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-4 md:p-6 hover:shadow-2xl transition">
                        <div class="text-xs md:text-sm text-gray-500 font-semibold uppercase mb-1">
                            Total Kelas
                        </div>
                        <div class="text-3xl md:text-4xl font-extrabold text-gray-900">
                            {{ $totalKelas }}
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-4 md:p-6 hover:shadow-2xl transition">
                        <div class="text-xs md:text-sm text-gray-500 font-semibold uppercase mb-1">
                            Total Siswa
                        </div>
                        <div class="text-3xl md:text-4xl font-extrabold text-gray-900">
                            {{ $totalSiswa }}
                        </div>
                    </div>

                </div>


                <!-- ============================
                     2. SISWA TERBARU
                ============================= -->
                <div class="bg-white shadow-xl rounded-xl overflow-hidden">

                    {{-- HEADER --}}
                    <div class="p-4 bg-indigo-600 flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                        <h6 class="text-white font-bold text-base md:text-lg">Siswa Terbaru</h6>

                        <a href="#" 
                            class="px-3 py-1 text-xs md:text-sm bg-white text-indigo-600 rounded-full font-semibold shadow hover:bg-gray-100">
                            Lebih Banyak <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>

                    {{-- ============================
                        DESKTOP TABLE VIEW
                    ============================= --}}
                    <div class="hidden md:block p-4 overflow-x-auto">

                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase text-xs">Nama</th>
                                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase text-xs">NISN</th>
                                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase text-xs">Kelas</th>
                                    <th class="px-6 py-3 text-left font-medium text-gray-500 uppercase text-xs">Jurusan</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($recentStudents as $student)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-3 font-medium text-gray-900">{{ $student->nama_lengkap }}</td>
                                        <td class="px-6 py-3 text-gray-500">{{ $student->nisn }}</td>
                                        <td class="px-6 py-3 text-gray-500">{{ $student->kelas->nama_kelas ?? 'N/A' }}</td>
                                        <td class="px-6 py-3 text-gray-500">{{ $student->jurusan->nama_jurusan ?? 'N/A' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-500 text-sm">
                                            Tidak ada data siswa terbaru.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>

                    {{-- ============================
                        MOBILE CARD VIEW
                    ============================= --}}
                    <div class="md:hidden p-4 space-y-3">

                        @forelse ($recentStudents as $student)
                            <div class="bg-white border border-gray-200 rounded-lg shadow p-3">

                                <div class="font-semibold text-gray-900 text-sm">
                                    {{ $student->nama_lengkap }}
                                </div>

                                <div class="text-xs text-gray-600 mt-1">
                                    <span class="font-semibold">NISN:</span>
                                    {{ $student->nisn }}
                                </div>

                                <div class="text-xs text-gray-600 mt-1">
                                    <span class="font-semibold">Kelas:</span>
                                    {{ $student->kelas->nama_kelas ?? 'N/A' }}
                                </div>

                                <div class="text-xs text-gray-600 mt-1">
                                    <span class="font-semibold">Jurusan:</span>
                                    {{ $student->jurusan->nama_jurusan ?? 'N/A' }}
                                </div>

                            </div>
                        @empty
                            <p class="text-center text-gray-500 py-4 text-sm">
                                Tidak ada data siswa terbaru.
                            </p>
                        @endforelse

                    </div>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>
