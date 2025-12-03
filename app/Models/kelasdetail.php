<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\TahunAjar;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class kelasdetail extends Model
{
   
    use HasFactory;

    protected $table = 'kelas_details';

    protected $fillable = [
        'siswa_id',
        'kelas_id',
        'tahun_ajar_id',
        'status',
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(related: Siswa::class);
    }

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(related: Kelas::class);
    }

    public function tahunAjar(): BelongsTo
    {
        return $this->belongsTo(related: TahunAjar::class);
    }
}


