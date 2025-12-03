<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\siswa;
use App\Models\kelasdetail;


class TahunAjar extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_tahun_ajar',
        'nama_tahun_ajar',
    ];

    public function siswas()
    {
        return $this->hasMany(siswa::class);
    }
    public function kelasdetails()
    {
        return $this->hasMany(kelasdetail::class);
    }
}
