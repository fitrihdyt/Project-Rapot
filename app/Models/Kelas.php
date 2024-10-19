<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelases';
    protected $fillable = [
        'kelas',
        'nama_kelas',
        'jumlah_siswa',
    ];

    public function sk()
    {
        return $this->hasMany(Sk::class, 'id', 'kelas_id');
    }
}
