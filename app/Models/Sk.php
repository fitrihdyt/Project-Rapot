<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\Kk;
use App\Models\Nilai;

class Sk extends Model
{
    use HasFactory;
    protected $table = 'sks';

    protected $fillable = [
        'kelas_id',
        'kk_id',
        'nama_sk',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id'); // Menggunakan 'kelas_id' sebagai kunci eksternal pada model Sk
    }

    public function kk()
    {
        return $this->belongsTo(Kk::class, 'kk_id'); // Menggunakan 'kk_id' sebagai kunci eksternal pada model Sk
    }

    public function nilai()
    {
        return $this->belongsTo(Nilai::class, 'nilai_id'); // Menggunakan 'kk_id' sebagai kunci eksternal pada model Sk
    }
}
