<x-app-layout>
    <div class="max-w-3xl mx-auto mt-8 bg-white p-6 rounded-xl shadow">

        <h2 class="text-2xl font-semibold mb-6">Tambah Kelas</h2>

        <form action="{{ route('kelas.store') }}" method="POST">
            @csrf

            <!-- Nama Kelas -->
            <div class="mb-4">
                <label class="block font-medium">Nama Kelas</label>
                <input type="text" name="nama_kelas" class="w-full border rounded-lg p-2" required>
            </div>

            <!-- Level Kelas -->
            <div class="mb-4">
                <label class="block font-medium">Level Kelas</label>
                <select name="level_kelas" class="w-full border rounded-lg p-2" required>
                    <option value="">-- Pilih --</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
            </div>

            <!-- Jurusan -->
            <div class="mb-4">
                <label class="block font-medium">Jurusan</label>
                <select name="jurusan_id" class="w-full border rounded-lg p-2" required>
                    <option value="">-- Pilih Jurusan --</option>
                    @foreach ($jurusan as $j)
                        <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Submit -->
            <button type="submit" class="bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700">
                Simpan Data
            </button>
        </form>

    </div>
</x-app-layout>
