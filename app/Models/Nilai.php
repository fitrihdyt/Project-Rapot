<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Md;
use App\Models\Sk;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilais';

    protected $fillable = [
        'siswa_id',
        'sk_id',
        'md_id',
        'guru_id',
        'nilai_angka',
        'nilai_huruf',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }

    public function md()
    {
        return $this->belongsTo(Md::class, 'md_id', 'id');
    }

    public function sk()
    {
        return $this->belongsTo(Sk::class, 'sk_id', 'id');
    }
}