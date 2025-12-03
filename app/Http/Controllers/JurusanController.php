<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $jurusans = Jurusan::when($search, function ($query, $search) {
                $query->where('kode_jurusan', 'like', "%{$search}%")
                      ->orWhere('nama_jurusan', 'like', "%{$search}%");
            })
            ->orderBy('kode_jurusan')
            ->get();

        return view('admin.jurusan.jurusan', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_jurusan' => 'required|string|unique:jurusans,kode_jurusan|max:10',
            'nama_jurusan' => 'required|string|max:100',
        ]);

        Jurusan::create([
            'kode_jurusan' => $request->kode_jurusan,
            'nama_jurusan' => $request->nama_jurusan,
        ]);

        return redirect()->route('jurusan.index')
                         ->with('success', 'Jurusan baru berhasil ditambahkan!');
    }

    public function create()
{
    return view('admin.jurusan.create');
}


    public function edit(Jurusan $jurusan)
    {
        return view('admin.jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $request->validate([
            'kode_jurusan' => 'required|string|max:10|unique:jurusans,kode_jurusan,' . $jurusan->id,
            'nama_jurusan' => 'required|string|max:100',
        ]);

        $jurusan->update([
            'kode_jurusan' => $request->kode_jurusan,
            'nama_jurusan' => $request->nama_jurusan,
        ]);

        return redirect()->route('jurusan.index')
                         ->with('success', 'Jurusan berhasil diperbarui!');
    }

    public function destroy(Jurusan $jurusan)
    {
        try {
            $jurusan->delete();
            return redirect()->route('jurusan.index')
                             ->with('success', 'Jurusan berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('jurusan.index')
                             ->with('error', 'Jurusan tidak dapat dihapus karena masih terhubung dengan data lain.');
        }
    }
}
