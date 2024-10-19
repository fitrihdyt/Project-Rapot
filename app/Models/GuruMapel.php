<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruMapel extends Model
{
    use HasFactory;
    protected $table = 'md_guru';
    protected $fillable = [
        'md_id', 'guru_id'
    ];
}
