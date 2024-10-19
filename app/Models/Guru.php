<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Md;


class Guru extends Model
{
    protected $table = 'gurus';
    protected $fillable = [
        'nama_guru',
        'nip',
        'nama_md',
        'md_id',
    ];

    public function md()
    {
        return $this->belongsTo('App\Models\Md', 'md_id');
    }

    public function mapel()
    {
        return $this->belongsToMany(Md::class, 'md_guru');
    }
}
