<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();

            // Nama kelas, contoh: "RPL A", "TKJ 1"
            $table->string('nama_kelas');

            // Level kelas pakai VARCHAR karena isinya X, XI, XII
            $table->string('level_kelas', 10);

            // Relasi dengan tabel jurusans
            $table->foreignId('jurusan_id')
                ->constrained('jurusans')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
