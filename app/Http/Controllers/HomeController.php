<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunAjar;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan total hitungan untuk 4 kotak dashboard
        $totalTahunAjar = TahunAjar::count();
        $totalJurusan = Jurusan::count();
        $totalKelas = Kelas::count(); 
        $totalSiswa = Siswa::count();

        // Mendapatkan daftar 5 siswa terbaru untuk tabel
        // NOTE: Fungsi ->latest() adalah alias dari orderBy('created_at', 'desc')
        $recentStudents = Siswa::latest()
                                 ->limit(5)
                                 ->get();

        // Mengirimkan semua data ke view
        return view('admin.home', [
            'totalTahunAjar' => $totalTahunAjar,
            'totalJurusan' => $totalJurusan,
            'totalKelas' => $totalKelas,
            'totalSiswa' => $totalSiswa,
            'recentStudents' => $recentStudents,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
