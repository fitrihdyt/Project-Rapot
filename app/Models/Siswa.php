<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SiswaNilai;
use App\Models\Nilai;
use App\Models\Sk;
use App\Models\Kelas;
use App\Models\Kk;
use App\Models\Guru;
use App\Models\Md;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';
    protected $fillable = [
        'nama_siswa',
        'nisn',
        'jk',
        'tgl_lahir',
        'alamat',
        'kelas_id',
        'kk_id',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function kk()
    {
        return $this->belongsTo(KK::class, 'kk_id', 'id');
    }

    public function nilai()
    {
        return $this->hasMany(SiswaNilai::class, 'siswa_id', 'id');
    }

    public function md()
    {
        return $this->belongsToMany(Md::class, 'siswa_nilai', 'siswa_id', 'md_id')
            ->withPivot('nilai_angka');
    }

    public function guru()
    {
        return $this->belongsToMany(Guru::class, 'siswa_nilai', 'siswa_id', 'guru_id')
            ->withPivot('nilai_angka');
    }

    public function sk()
    {
        return $this->belongsToMany(Sk::class, 'siswa_nilai', 'siswa_id', 'sk_id')
            ->withPivot('nilai_angka');
    }
}
