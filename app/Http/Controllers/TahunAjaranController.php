<?php

namespace App\Http\Controllers;

use App\Models\TahunAjar;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
   public function index(Request $request)
    {
        $search = $request->search;

        $data = TahunAjar::when($search, function ($query, $search) {
                $query->where('nama_tahun_ajar', 'like', "%{$search}%")
                      ->orWhere('kode_tahun_ajar', 'like', "%{$search}%");
            })
            ->orderBy('nama_tahun_ajar')
            ->get();

        // sesuaikan nama view dengan punyamu
        return view('admin.tahun_ajar.tahunajar', compact('data'));
    }


    public function create()
    {
        return view('admin.tahun_ajar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
        ]);

        TahunAjar::create([
            'kode_tahun_ajar' => $request->kode,
            'nama_tahun_ajar' => $request->nama,
        ]);

        return redirect()->route('tahun-ajar.index')
                         ->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($tahun_ajar)
    {
        $tahunAjar = TahunAjar::findOrFail($tahun_ajar);
        return view('admin.tahun_ajar.edit', compact('tahunAjar'));
    }

    public function update(Request $request, $tahun_ajar)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
        ]);

        $data = TahunAjar::findOrFail($tahun_ajar);

        $data->update([
            'kode_tahun_ajar' => $request->kode,
            'nama_tahun_ajar' => $request->nama,
        ]);

        return redirect()->route('tahun-ajar.index')
                         ->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($tahun_ajar)
    {
        $data = TahunAjar::findOrFail($tahun_ajar);
        $data->delete();

        return redirect()->route('tahun-ajar.index')
                         ->with('success', 'Data berhasil dihapus!');
    }
}
