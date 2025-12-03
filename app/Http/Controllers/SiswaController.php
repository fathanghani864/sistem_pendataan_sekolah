<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\TahunAjar;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index(Request $request)
{
    $search         = $request->search;
    $filterJurusan  = $request->jurusan_id;
    $filterKelas    = $request->kelas_id;
    $filterTahun    = $request->tahun_ajar_id;
    $filterKelamin  = $request->jenis_kelamin;

    $siswa = Siswa::with(['jurusan', 'kelas', 'tahunAjar'])
        ->when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('nisn', 'like', "%{$search}%")
                  ->orWhere('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('jenis_kelamin', 'like', "%{$search}%")
                  ->orWhereHas('jurusan', function ($q) use ($search) {
                      $q->where('nama_jurusan', 'like', "%{$search}%");
                  })
                  ->orWhereHas('kelas', function ($q) use ($search) {
                      $q->where('nama_kelas', 'like', "%{$search}%");
                  })
                  ->orWhereHas('tahunAjar', function ($q) use ($search) {
                      $q->where('nama_tahun_ajar', 'like', "%{$search}%");
                  });
            });
        })
        ->when($filterJurusan, function ($q, $jurusanId) {
            $q->where('jurusan_id', $jurusanId);
        })
        ->when($filterKelas, function ($q, $kelasId) {
            $q->where('kelas_id', $kelasId);
        })
        ->when($filterTahun, function ($q, $tahunId) {
            $q->where('tahun_ajar_id', $tahunId);
        })
        ->when($filterKelamin, function ($q, $kelamin) {
            $q->where('jenis_kelamin', $kelamin);
        })
        ->orderBy('nama_lengkap')
        ->get();

    // data buat dropdown filter
    $jurusan   = Jurusan::orderBy('nama_jurusan')->get();
    $kelas     = Kelas::orderBy('nama_kelas')->get();
    $tahunAjar = TahunAjar::orderBy('nama_tahun_ajar')->get();

    return view('admin.siswa.siswa', compact('siswa', 'jurusan', 'kelas', 'tahunAjar'));
}


    /**
     * Display detail siswa
     */
    public function show($id)
    {
        $siswa = Siswa::with(['jurusan', 'kelas', 'tahunAjar', 'kelasDetails.kelas', 'kelasDetails.tahunAjar'])
            ->findOrFail($id);

        $kelas = Kelas::all();
        $tahunAjar = TahunAjar::all();

        return view('admin.siswa.show', compact('siswa', 'kelas', 'tahunAjar'));
    }

    /**
     * Create page
     */
    public function create()
    {
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $tahunAjar = TahunAjar::all();

        return view('admin.siswa.create', compact('kelas', 'jurusan', 'tahunAjar'));
    }

    /**
     * Store new siswa
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'jurusan_id' => 'required',
            'kelas_id' => 'required',
            'tahun_ajar_id' => 'required',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    /**
     * Edit page
     */
    public function edit(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $tahunAjar = TahunAjar::all();

        return view('admin.siswa.edit', compact('siswa', 'kelas', 'jurusan', 'tahunAjar'));
    }

    /**
     * Update full data siswa (halaman edit)
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'nisn' => 'required',
        'nama_lengkap' => 'required',
        'jenis_kelamin' => 'required',
        'jurusan_id' => 'required',
        'kelas_id' => 'required',
        'tahun_ajar_id' => 'required',
    ]);

    $siswa = Siswa::findOrFail($id);

    $siswa->update($request->all());

    return redirect()->route('siswa.index')
        ->with('success', 'Data siswa berhasil diupdate!');
}


    
    public function updateKelasAjar(Request $request, $id)
    {
        $request->validate([
            'kelas_id' => 'required',
            'tahun_ajar_id' => 'required',
        ]);

        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            'kelas_id' => $request->kelas_id,
            'tahun_ajar_id' => $request->tahun_ajar_id,
        ]);

        return redirect()->route('siswa.index')
            ->with('success', 'Kelas dan Tahun Ajar berhasil diperbarui!');
    }

    /**
     * Delete siswa
     */
    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus!');
    }
}
