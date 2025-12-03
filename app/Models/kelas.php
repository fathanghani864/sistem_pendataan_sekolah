<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jurusan;
use App\Models\Siswa;
use App\Models\Kelasdetail;


class kelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kelas',
        'level_kelas',
        'jurusan_id',
    ];
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
    public function siswa()
    {
        return $this->hasMany(siswa::class);
    }
    public function kelasdetails()
    {
        return $this->hasMany(Kelasdetail::class);
    }

}
