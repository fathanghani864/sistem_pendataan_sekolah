<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $kelas = Kelas::with('jurusan') // kalau ada relasi jurusan
            ->when($search, function ($query, $search) {
                $query->where('nama_kelas', 'like', "%{$search}%")
                      ->orWhere('level_kelas', 'like', "%{$search}%")
                      ->orWhereHas('jurusan', function ($q) use ($search) {
                          $q->where('nama_jurusan', 'like', "%{$search}%");
                      });
            })
            ->orderBy('nama_kelas')
            ->get();

        // GANTI view() ini dengan nama view milikmu
        // mis: 'admin.kelas.kelas' atau 'kelas.index'
        return view('admin.kelas.kelas', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $jurusan = Jurusan::all();
    return view('admin.kelas.create', compact('jurusan'));
}


    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
{
    $request->validate([
        'nama_kelas' => 'required',
        'level_kelas' => 'required',
        'jurusan_id' => 'required|exists:jurusans,id',
    ]);

    Kelas::create([
        'nama_kelas' => $request->nama_kelas,
        'level_kelas' => $request->level_kelas,
        'jurusan_id' => $request->jurusan_id,
    ]);

    return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil ditambahkan!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit($id)
{
    $kelas   = Kelas::findOrFail($id);
    $jurusan = Jurusan::all(); // untuk dropdown

    return view('admin.kelas.edit', compact('kelas', 'jurusan'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama_kelas'  => 'required|string|max:255',
        'level_kelas' => 'required|string|max:50',
        'jurusan_id'  => 'required|exists:jurusans,id', // ✅ UDAH BENAR
    ]);

    $kelas = Kelas::findOrFail($id);

    $kelas->update([
        'nama_kelas'  => $request->nama_kelas,
        'level_kelas' => $request->level_kelas,
        'jurusan_id'  => $request->jurusan_id,
    ]);

    return redirect()->route('kelas.index')
        ->with('success', 'Data kelas berhasil diperbarui.');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
