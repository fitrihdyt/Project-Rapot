<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kk extends Model
{
    use HasFactory;
    protected $table = 'kks';
    protected $fillable = [
        'nama_kk'
    ];

    public function sk()
    {
        return $this->hasMany(Sk::class, 'id', 'kk_id');
    }
}
