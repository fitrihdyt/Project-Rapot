<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wm extends Model
{
    use HasFactory;
    protected $table = 'wms';
    protected $fillable = [
        'nama',
        'nisn',
        'ttl',
        'jk',
        'alamat',
        'nama_ayah',
        'nama_ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'alamat_wali',
        'no_telp_wali',
    ];
}