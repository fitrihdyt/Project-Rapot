<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guru;

class Md extends Model
{
    use HasFactory;
    protected $table = 'mds';
    protected $fillable = [
        'nama_md'
    ];

    public function guru()
    {
        return $this->belongsToMany(Guru::class, 'md_guru');
    }
}
