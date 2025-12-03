<x-app-layout>
    <div class="max-w-4xl mx-auto mt-8 bg-white p-6 rounded-xl shadow">

        <h2 class="text-2xl font-semibold mb-6">Tambah Siswa</h2>

        <form action="{{ route('siswa.store') }}" method="POST">
            @csrf

            {{-- NISN --}}
            <div class="mb-4">
                <label class="block font-medium">NISN</label>
                <input type="text" name="nisn" class="w-full border rounded-lg p-2" required>
            </div>

            {{-- Nama --}}
            <div class="mb-4">
                <label class="block font-medium">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="w-full border rounded-lg p-2" required>
            </div>

            {{-- Jenis Kelamin --}}
            <div class="mb-4">
                <label class="block font-medium">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full border rounded-lg p-2" required>
                    <option value="">-- Pilih --</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>

            {{-- Tanggal Lahir --}}
            <div class="mb-4">
                <label class="block font-medium">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="w-full border rounded-lg p-2" required>
            </div>

            {{-- Alamat --}}
            <div class="mb-4">
                <label class="block font-medium">Alamat</label>
                <textarea name="alamat" class="w-full border rounded-lg p-2" rows="3" required></textarea>
            </div>

            {{-- Jurusan (Database) --}}
            <div class="mb-4">
                <label class="block font-medium">Jurusan</label>
                <select name="jurusan_id" class="w-full border rounded-lg p-2" required>
                    <option value="">-- Pilih Jurusan --</option>
                    @foreach($jurusan as $j)
                        <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Kelas (Database) --}}
            {{-- Kelas (Database) --}}
            <div class="mb-4">
                <label class="block font-medium">Kelas</label>
                <select name="kelas_id" class="w-full border rounded-lg p-2" required>
                    <option value="">-- Pilih Kelas --</option>
                    @foreach($kelas as $k)
                        <option value="{{ $k->id }}">
                            {{ $k->nama_kelas }} - {{ $k->level_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>


            {{-- Tahun Ajar (Database) --}}
            <div class="mb-4">
                <label class="block font-medium">Tahun Ajar</label>
                <select name="tahun_ajar_id" class="w-full border rounded-lg p-2" required>
                    <option value="">-- Pilih Tahun Ajar --</option>
                    @foreach($tahunAjar as $t)
                        <option value="{{ $t->id }}">{{ $t->kode_tahun_ajar }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Tombol --}}
            <button type="submit" class="bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700">
                Simpan Data
            </button>

        </form>
    </div>
</x-app-layout>