<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\TahunAjar;
use App\Models\KelasDetail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nisn',
        'nama_lengkap',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'jurusan_id',
        'kelas_id',
        'tahun_ajar_id',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(related: Jurusan::class);
    }

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(related: Kelas::class);
    }

    public function tahunAjar(): BelongsTo
    {
        return $this->belongsTo(related: TahunAjar::class);
    }

    public function kelasDetails(): HasMany
    {
        return $this->hasMany(related: KelasDetail::class);
    }
}

